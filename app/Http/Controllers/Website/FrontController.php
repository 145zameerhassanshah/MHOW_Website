<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Campaign;
use App\Models\Country;
use App\Models\DonationForm;
use App\Models\EventEmailTemplate;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\Event;
use Carbon\Carbon;
use App\Models\Gallery;
use App\Models\EventTicket;
use App\Models\Project;
use App\Models\BookingFieldValue;
use App\Models\Donor;
use App\Models\VolunteerType;
use App\Models\EventExtraField;
use App\Models\DonationSource;
use Mail;
use App\Mail\DonationConfirmation;
use Stripe\Product;
use Stripe\Invoice;  // Add this line
use App\Mail\EventBookingConfirmation;
use App\Mail\EventAdminMail;
use App\Models\Donation;
use App\Models\Page;
use App\Models\Partner;
use App\Models\PaymentMethod;
use App\Models\EventSchedule;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Token;
use Stripe\Exception\CardException;
use Stripe\Exception\InvalidRequestException;
use Illuminate\Support\Facades\Validator;
use Stripe\PaymentIntent;
use Stripe\Exception\StripeException;
use Stripe\Price;
use Stripe\Customer;
use Stripe\Subscription;
use Stripe\PaymentMethod as StripePaymentMethod;
use Stripe\Exception\ApiErrorException;
use Log;
use Str;
use Illuminate\Support\Facades\Http;
class FrontController extends Controller
{
    public function about()
    {
        $countries = Country::all();
        return view('website.about', compact('countries'));
    }
    public function projects()
    {
        $projects = Project::where('status', 'active')->get();
        return view('website.projects', compact('projects'));
    }

    public function projectDetail($slug)
    {
        $project = Project::where('slug', $slug)->first();
        $page = Page::where('slug', $slug)->first();
        return view('website.project-detail', compact('project', 'page'));
    }
    public function events()
    {
        $events = Event::where('status', 'active')->orderBy('order_no', 'desc')->get();
        return view('website.events', compact('events'));
    }
    public function charityPages()
    {
        $events = Event::where('status', 'active')->where('page_type', 'charity')->orderBy('order_no', 'desc')->get();
        return view('website.events', compact('events'));
    }
    public function landingPages()
    {
        $events = Event::where('status', 'active')->where('page_type', 'lending')->orderBy('order_no', 'desc')->get();
        return view('website.events', compact('events'));
    }

    public function donateNowFrom()
    {

        return view('website.donate-now');
    }
    public function donateNow()
    {

        return view('website.donation_detail');
    }
    // public function booking(Request $request)
    // {





    //     // $request->validate([
    //     //     'name' => 'required',
    //     //     'email' => 'required',
    //     //     'phone_no' => 'required',
    //     //     'gender' => 'required',
    //     //     'amount' => 'required',
    //     //     'campaign_id' => 'required'
    //     // ]);

    //     $booking = new Booking();

    //     if ($request->event_type == 'paid') {
    //         $ticket = EventTicket::find($request->ticket_id);
    //         $booking->ticket_title = $ticket->title;
    //         $booking->ticket_quantity = $ticket->quantity;
    //         $booking->event_ticket_id = $ticket->id;
    //         $booking->amount = $ticket->amount;
    //     } else {
    //         $booking->amount = 0;
    //     }

    //     $booking->name = $request->name;
    //     $booking->email = $request->email;
    //     $booking->phone_no = $request->phone_no;
    //     $booking->gender = $request->gender;

    //     $booking->event_id = $request->event_id;
    //     $booking->event_type = $request->event_type;
    //     $booking->save();

    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'Event Booked Successfully!',
    //     ]);
    // }


    public function booking(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_no' => 'required|string|max:20',
            'gender' => 'required|in:male,female,other',
            'event_id' => 'required|exists:events,id',
            'event_type' => 'required|in:free,paid',
            'ticket_id' => 'required_if:event_type,paid|exists:event_tickets,id',
        ]);
        try {
            $booking = new Booking();
            $booking->name = $request->name;
            $booking->email = $request->email;
            $booking->phone_no = $request->phone_no;
            $booking->gender = $request->gender;
            $booking->event_id = $request->event_id;
            $booking->event_type = $request->event_type;
            if ($request->event_type == 'paid') {
                $ticket = EventTicket::findOrFail($request->ticket_id);
                Stripe::setApiKey(env('STRIPE_SECRET'));
                $charge = Charge::create([
                    "amount" => $ticket->amount * 100,
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "Payment for event ticket: " . $ticket->title,
                    "metadata" => [
                        "event_id" => $request->event_id,
                        "customer_name" => $request->name,
                        "customer_email" => $request->email
                    ]
                ]);

                $booking->ticket_title = $ticket->title;
                $booking->ticket_quantity = 1;
                $booking->event_ticket_id = $ticket->id;
                $booking->amount = $ticket->amount;
                $booking->payment_status = 'paid';
                $booking->stripe_charge_id = $charge->id;
                $booking->payment_details = json_encode($charge);
            } else {
                $booking->amount = 0;
                $booking->payment_status = 'free';
            }

            $template = EventEmailTemplate::findOrFail($request->event_id);
            $event = Event::findOrFail($request->event_id);

            $replacements = [
                '{{title}}' => $event->title,
                '{{start_date}}' => $event->start_date,
                '{{end_date}}' => $event->end_date,
                '{{venue}}' => $event->venue,
                '{{location}}' => $event->location
            ];

            $body = str_replace(array_keys($replacements), array_values($replacements), $template->body);

            $booking->save();
            Mail::to($request->email)->send(new EventBookingConfirmation($template->subject, $body));
            return response()->json([
                'status' => 'success',
                'message' => 'Event Booked Successfully!',
            ]);

        } catch (CardException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Payment failed: ' . $e->getMessage()
            ], 400);

        } catch (ApiErrorException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Payment processing error: ' . $e->getMessage()
            ], 500);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }





    public function blogs()
    {
        return view('website.blogs');
    }
    public function becomeVolunteer()
    {
        $volunteer_types = VolunteerType::where('status', 'active')->get();
        $countries = Country::get();
        return view('website.volunteer', compact('volunteer_types', 'countries'));
    }

    public function storeVolunteer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone_no' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'country_id' => 'required|string|max:255',
            'volunteer_type_id' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $volunteer = new Volunteer();

        $volunteer->name = $request->name;
        $volunteer->email = $request->email;
        $volunteer->phone = $request->phone_no;
        $volunteer->country_id = $request->country_id;
        $volunteer->volunteer_type_id = $request->volunteer_type_id;
        $volunteer->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Form submitted successfully',
        ]);
    }
    public function gallery()
    {
        $galleries = Gallery::where('status', 1)->where("category_id", '!=', 2)->orderBy('serial_number', 'asc')->get();
        return view('website.gallery', compact('galleries'));
    }
    public function contactus()
    {
        return view('website.contact');
    }
    public function ourTeam()
    {
        $partners = Partner::where('status', 'published')->orderBy('order_no', 'ASC')->get();
        return view('website.team', compact('partners'));
    }
    public function ourPartners()
    {
        return view('website.partners');
    }
    public function wayToDonate()
    {
        return view('website.waystodonate');
    }

    public function contactUsStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone_no' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'enquiry_message' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $enquiry = new Enquiry();
        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->phone_no = $request->phone_no;
        $enquiry->subject = $request->subject;
        $enquiry->enquiry_message = $request->enquiry_message;
        $enquiry->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Form submitted successfully',
        ]);
    }
    public function donate(Request $request)
    {

        return view('website.donation_detail');
    }
    // public function donateStore(Request $request)
    // {
    //     // Validate the request
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'phone_no' => 'required|string|max:20',
    //         'city' => 'required|string|max:255',
    //         'country' => 'required|string|max:255',
    //         'amount' => 'required|numeric|min:1',
    //         'stripeToken' => 'required'
    //     ]);

    //     try {
    //         // Set Stripe API key
    //         Stripe::setApiKey(config('services.stripe.secret'));

    //         $charge = Charge::create([
    //             "amount" => round($validated['amount'] * 100), // Convert to cents
    //             "currency" => "usd",
    //             "source" => $validated['stripeToken'],
    //             "description" => "Donation from " . $validated['name'],
    //             "metadata" => [
    //                 "donor_name" => $validated['name'],
    //                 "donor_email" => $validated['email'],
    //                 "donor_phone" => $validated['phone_no'],
    //                 "donor_city" => $validated['city'],
    //                 "donor_country" => $validated['country']
    //             ]
    //         ]);
    //         $donor = Donor::create([
    //             'name' => $validated['name'],
    //             'account_name' => $validated['name'],
    //             'email' => $validated['email'],
    //             'phone' => $validated['phone_no'],
    //             'city' => $validated['city'],
    //             'country' => $validated['country']
    //         ]);

    //         $paymentMethod = PaymentMethod::firstOrCreate(
    //             ['name' => 'stripe'],
    //         );

    //         // Save donation record
    //         $donation = Donation::create([
    //             'donor_id' => $donor->id,
    //             'amount' => $validated['amount'],
    //             'payment_method_id' => $paymentMethod->id,
    //             'stripe_charge_id' => $charge->id
    //         ]);

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Donation successful! A confirmation has been sent to your email.'
    //         ]);

    //     } catch (CardException $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Payment failed: ' . $e->getMessage()
    //         ], 400);
    //     } catch (InvalidRequestException $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Invalid request: ' . $e->getMessage()
    //         ], 400);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Error: ' . $e->getMessage()
    //         ], 500);
    //     }
    // }




    public function donateStore(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_no' => 'required|string|max:20',

            'amount' => 'required|numeric|min:1',
            'stripeToken' => 'required',
            'message' => 'nullable|string',
            'campaign_id' => 'nullable|exists:campaigns,id'
        ]);

        try {
            // Set Stripe API key
            Stripe::setApiKey(config('services.stripe.secret'));

            // Process the charge
            $charge = Charge::create([
                "amount" => round($validated['amount'] * 100), // Convert to cents
                "currency" => "usd",
                "source" => $validated['stripeToken'],
                "description" => "Donation from " . $validated['name'],
                "metadata" => [
                    "donor_name" => $validated['name'],
                    "donor_email" => $validated['email'],
                    "donor_phone" => $validated['phone_no'],

                ]
            ]);

            // Find or create donor (using email as unique identifier)
            $donor = Donor::firstOrCreate(
                ['email' => $validated['email']],
                [
                    'name' => $validated['name'],
                    'account_name' => $validated['name'],
                    'phone' => $validated['phone_no'],

                    'status' => 'active',
                    'donor_type' => 'individual',
                    'is_receive_email' => true
                ]
            );

            // Get payment method
            $paymentMethod = PaymentMethod::firstOrCreate(
                ['name' => 'stripe'],
                ['name' => 'stripe']
            );

            // Generate receipt number
            $receiptNo = 'DON-' . strtoupper(Str::random(8)) . '-' . now()->format('Ymd');

            // Save donation record
            $donation = Donation::create([
                'donor_id' => $donor->id,
                'campaign_id' => $validated['campaign_id'] ?? null,
                'amount' => $validated['amount'],
                'transaction_id' => $charge->id,
                'receipt_no' => $receiptNo,
                'donation_date' => now(),
                'message' => $validated['message'] ?? null,
                'payment_method_id' => $paymentMethod->id,
                'donation_source_id' => DonationSource::where('name', 'website')->first()->id ?? null
            ]);

            Mail::to($donor->email)->send(new DonationConfirmation($donation));

            return response()->json([
                'success' => true,
                'message' => 'Donation successful! A confirmation has been sent to your email.',
                'receipt_no' => $receiptNo
            ]);

        } catch (CardException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Payment failed: ' . $e->getMessage()
            ], 400);
        } catch (InvalidRequestException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid request: ' . $e->getMessage()
            ], 400);
        } catch (\Exception $e) {
            Log::error('Donation error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing your donation. Please try again later.'
            ], 500);
        }
    }


    public function eventDetail($slug)
    {
        $event = Event::where('slug', $slug)->first();
        $fields = EventExtraField::where('event_id', $event->id)->get();
        $tickets = EventTicket::where('event_id', $event->id)->get();
        if (!$event) {
            abort(404);
        }


        if ($event->event_type == 'paid') {

            return view('website.page.view-donation', compact('event', 'tickets', 'fields'));
        }
        return view('website.page.view', compact('event', 'fields', 'tickets'));
    }

    // public function freeBooking(Request $request)
    // {


    //     $request->validate([
    //         'name' => 'required|string|min:2|max:255',
    //         'phone_no' => 'required|string|min:2|max:255',
    //         'email' => 'required|email',
    //         'gender' => 'required|string|in:male,female',
    //         'source' => 'required|string|in:facebook,youtube,instagram,tiktok,whatsapp,email',
    //         'ticket_id' => $request->has('ticket_id') ? 'required' : 'nullable',
    //         'event_schedule_id' => $request->has('event_schedule_id') ? 'required' : 'nullable',
    //         'country' => $request->has('country') ? 'required' : 'nullable',
    //     ]);

    //     DB::beginTransaction();

    //     $event = Event::find($request->event_id);
    //     $fields = EventExtraField::where('event_id', $request->event_id)->get();

    //     $rules = [];
    //     foreach ($fields as $field) {
    //         $rules['extra.' . $field->field_name] = $field->is_required ? 'required' : 'nullable';
    //     }
    //     $request->validate($rules);

    //     // dd('ss');

    //     $booking = new Booking();
    //     $booking->event_id = $request->event_id;
    //     $booking->name = $request->name;
    //     $booking->email = $request->email;
    //     $booking->phone_no = $request->phone_no;
    //     $booking->gender = $request->gender;
    //     $booking->source = $request->source;
    //     $booking->event_type = 'free';
    //     $booking->amount = 0;
    //     if ($request->has('ticket_id')) {
    //         $ticket = EventTicket::find($request->ticket_id);
    //         $booking->ticket_title = $ticket->title;
    //         $booking->ticket_quantity = $ticket->quantity;
    //         $booking->event_ticket_id = $request->ticket_id;
    //     }

    //     if ($request->has('event_schedule_id')) {
    //         $event_schedule = EventSchedule::find($request->event_schedule_id);
    //         $booking->schedule_title = $event_schedule->title;
    //         $booking->event_schedule_id = $request->event_schedule_id;
    //     }

    //     if ($request->has('country'))
    //         $booking->country = $request->country;

    //     $booking->save();


    //     $emailTemplate = EventEmailTemplate::where('event_id', $event->id)->first();
    //     $replacements = [
    //         '{{title}}' => $event->title,
    //         '{{start_date}}' => Carbon::parse($event->start_date)->format('Y-m-d'),
    //         '{{end_date}}' => Carbon::parse($event->end_date)->format('Y-m-d'),
    //         '{{venue}}' => $event->venue,
    //         '{{location}}' => $event->location
    //     ];
    //     if ($request->has('extra')) {
    //         foreach ($fields as $field) {
    //             $value = $request->input('extra.' . $field->field_name);
    //             if (!is_null($value)) {
    //                 BookingFieldValue::create([
    //                     'event_extra_field_id' => $field->id,
    //                     'booking_id' => $booking->id,
    //                     'value' => $value,
    //                 ]);
    //             }
    //         }
    //     }
    //     $paymentData = [
    //         'amount' => 0,
    //         'firstName' => $request->name,
    //         'email' => $request->email,
    //     ];


    //     $emailTemplate = EventEmailTemplate::where('event_id', $event->id)->first();


    //     $replacements = [
    //         '{{title}}' => $event->title,
    //         '{{start_date}}' => $event->start_date,
    //         '{{end_date}}' => $event->end_date,
    //         '{{venue}}' => $event->venue,
    //         '{{location}}' => $event->location
    //     ];

    //     $body = str_replace(array_keys($replacements), array_values($replacements), $emailTemplate->body);

    //     Mail::to($booking->email)->send(new EventBookingConfirmation(
    //         $emailTemplate->subject,
    //         $body,
    //     ));

    //     if ($event->email) {
    //         Mail::to($event->email)->send(new EventAdminMail(
    //             $event->title,
    //             $booking->email,
    //         ));
    //     }

    //     DB::commit();

    //     session()->flash('success');
    //     return redirect()->route('front.event.detail', $event->slug);
    // }
    // public function paidBooking(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|min:2|max:255',
    //         'phone_no' => 'required|string|min:2|max:255',
    //         'email' => 'required|email',
    //         'gender' => 'required|string|in:male,female',
    //         'ticket_id' => 'required|exists:event_tickets,id',
    //         'event_id' => 'required|exists:events,id',
    //         'payment_method_id' => 'required',
    //         'source' => 'required|string|in:facebook,youtube,instagram,tiktok,whatsapp,email',
    //         'event_schedule_id' => $request->has('event_schedule_id') ? 'required' : 'nullable',
    //         'country' => $request->has('country') ? 'required' : 'nullable',
    //     ]);

    //     $event = Event::findOrFail($request->event_id);
    //     $ticket = EventTicket::findOrFail($request->ticket_id);
    //     $fields = EventExtraField::where('event_id', $request->event_id)->get();
    //     $rules = [];
    //     foreach ($fields as $field) {
    //         $rules['extra.' . $field->field_name] = $field->is_required ? 'required' : 'nullable';
    //     }
    //     $request->validate($rules);
    //     Stripe::setApiKey(config('services.stripe.secret'));

    //     try {
    //         $paymentIntent = PaymentIntent::create([
    //             'amount' => $ticket->amount * 100,
    //             'currency' => 'gbp',
    //             'payment_method' => $request->payment_method_id,
    //             'confirm' => true,
    //             'description' => 'Booking for ' . $event->title,
    //             'metadata' => [
    //                     'event_id' => $event->id,
    //                     'ticket_id' => $ticket->id,
    //                     'customer_name' => $request->name,
    //                     'customer_email' => $request->email,
    //                     'event_slug' => $event->slug
    //                 ],
    //             'return_url' => route('event.paid.booking.return'),
    //         ]);

    //         if ($paymentIntent->status === 'requires_action') {
    //             return response()->json([
    //                 'requires_action' => true,
    //                 'payment_intent_client_secret' => $paymentIntent->client_secret
    //             ]);
    //         }

    //         // Create booking record
    //         $booking = new Booking();
    //         $booking->event_id = $request->event_id;
    //         $booking->name = $request->name;
    //         $booking->email = $request->email;
    //         $booking->phone_no = $request->phone_no;
    //         $booking->gender = $request->gender;
    //         $booking->source = $request->source;
    //         $booking->event_type = 'paid';
    //         $booking->amount = $ticket->amount;
    //         $booking->ticket_title = $ticket->title;
    //         $booking->ticket_quantity = $ticket->quantity;
    //         $booking->event_ticket_id = $ticket->id;
    //         $booking->payment_method = 'stripe';
    //         $booking->payment_status = 'paid';
    //         $booking->transaction_id = $paymentIntent->id;
    //         $booking->save();


    //         // return $event->email;

    //         if ($request->has('event_schedule_id')) {
    //             $event_schedule = EventSchedule::find($request->event_schedule_id);
    //             $booking->schedule_title = $event_schedule->title;
    //             $booking->event_schedule_id = $request->event_schedule_id;
    //         }

    //         if ($request->has('country'))
    //             $booking->country = $request->country;

    //         $paymentData = [
    //             'amount' => $ticket->amount,
    //             'firstName' => $request->name,
    //             'email' => $request->email,
    //         ];
    //         $emailTemplate = EventEmailTemplate::where('event_id', $event->id)->first();
    //         $replacements = [
    //             '{{title}}' => $event->title,
    //             '{{start_date}}' => Carbon::parse($event->start_date)->format('Y-m-d'),
    //             '{{end_date}}' => Carbon::parse($event->end_date)->format('Y-m-d'),
    //             '{{venue}}' => $event->venue,
    //             '{{location}}' => $event->location
    //         ];
    //         $body = str_replace(array_keys($replacements), array_values($replacements), $emailTemplate->body);
    //         Mail::to($booking->email)->send(new EventBookingConfirmation(
    //             $emailTemplate->subject,
    //             $body,
    //         ));

    //         if ($event->email) {
    //             Mail::to($event->email)->send(new EventAdminMail(
    //                 $event->title,
    //                 $booking->email,
    //             ));
    //         }

    //         return response()->json([
    //             'success' => true,
    //             'redirect_url' => route('front.event.detail', $event->slug) . '?payment-success=1',
    //             'paymentData' => $paymentData
    //         ]);

    //     } catch (CardException $e) {
    //         return response()->json([
    //             'error' => true,
    //             'message' => 'Payment failed: ' . $e->getError()->message
    //         ], 400);
    //     } catch (StripeException $e) {
    //         return response()->json([
    //             'error' => true,
    //             'message' => 'Payment processing error: ' . $e->getMessage()
    //         ], 400);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'error' => true,
    //             'message' => 'Failed to save booking: ' . $e->getMessage()
    //         ], 500);
    //     }
    // }



    public function freeBooking(Request $request)
    {
        // Validate main request fields
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'phone_no' => 'required|string|min:2|max:255',
            'email' => 'required|email',
            'gender' => 'required|string|in:male,female',
            'source' => 'required|string|in:facebook,youtube,instagram,tiktok,whatsapp,email',
            'event_id' => 'required|exists:events,id',
            'ticket_id' => $request->has('ticket_id') ? 'required|exists:event_tickets,id' : 'nullable',
            'event_schedule_id' => $request->has('event_schedule_id') ? 'required|exists:event_schedules,id' : 'nullable',
            // 'country' => $request->has('country') ? 'required|string|max:255' : 'nullable',
        ]);

        // Validate extra fields
        $fields = EventExtraField::where('event_id', $request->event_id)->get();
        $rules = [];
        foreach ($fields as $field) {
            $rules['extra.' . $field->field_name] = $field->is_required ? 'required' : 'nullable';
        }
        $request->validate($rules);

        DB::beginTransaction();

        try {
            $event = Event::findOrFail($request->event_id);

            // Create booking record
            $bookingData = [
                'event_id' => $event->id,
                'name' => $request->name,
                'email' => $this->cleanEmail($request->email),
                'phone_no' => $request->phone_no,
                'gender' => $request->gender,
                'source' => $request->source,
                'event_type' => 'free',
                'amount' => 0,
                'payment_status' => 'free',
                // 'country' => $request->has('country') ? $request->country : null,
            ];

            if ($request->has('ticket_id')) {
                $ticket = EventTicket::findOrFail($request->ticket_id);
                $bookingData['ticket_title'] = $ticket->title;
                $bookingData['ticket_quantity'] = $ticket->quantity;
                $bookingData['event_ticket_id'] = $ticket->id;
            }

            if ($request->has('event_schedule_id')) {
                $eventSchedule = EventSchedule::findOrFail($request->event_schedule_id);
                $bookingData['schedule_title'] = $eventSchedule->title;
                $bookingData['event_schedule_id'] = $eventSchedule->id;
            }

            $booking = Booking::create($bookingData);

            // Save extra field values
            if ($request->has('extra')) {
                foreach ($fields as $field) {
                    $value = $request->input('extra.' . $field->field_name);
                    if (!is_null($value)) {
                        BookingFieldValue::create([
                            'event_extra_field_id' => $field->id,
                            'booking_id' => $booking->id,
                            'value' => $value,
                        ]);
                    }
                }
            }

            // Send confirmation emails
            $this->sendFreeBookingEmails($event, $booking, $fields, $eventSchedule);

            DB::commit();

            return redirect()
                ->route('front.event.detail', $event->slug)
                ->with('success', 'Your booking has been confirmed!');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Free booking failed: ' . $e->getMessage());

            return back()
                ->withInput()
                ->with('error', 'Booking failed. Please try again.');
        }
    }

    protected function sendFreeBookingEmails($event, $booking, $fields, $eventSchedule)
    {
        $emailTemplate = EventEmailTemplate::where(['event_id' => $event->id, 'send_timing' => "after_registration"])->first();
        if ($emailTemplate) {
            $replacements = [
                '{{ name }}' => $booking->name,
                '{{ schedule }}' => $eventSchedule->title,
                '{{ start_time }}' => $eventSchedule->start_time,
                '{{ title }}' => $event->title,
                '{{ start_date }}' => Carbon::parse($event->start_date)->format('F j, Y'),
                '{{ end_date }}' => Carbon::parse($event->end_date)->format('F j, Y'),
                '{{ venue }}' => $event->venue,
                '{{ location }}' => $event->location,

            ];

            $body = str_replace(
                array_keys($replacements),
                array_values($replacements),
                $emailTemplate->body
            );
            $htmlContent = view('admin.mail.event_mail', ['content' => $body])->render();
            $this->sendEmail(
                $booking->email,
                $emailTemplate->subject,
                $htmlContent
            );
        }
        // Send admin notification
        if ($event->admin_emails) {
            $adminEmails = explode(',', $event->admin_emails);

            $adminContent = view('admin.mail.admin_event_mail', [
                'event' => $event,
                'eventSchedule' => $eventSchedule,
                'booking' => $booking,
            ])->render();

            foreach ($adminEmails as $adminEmail) {

                $this->sendEmail(
                    $adminEmail,
                    "New Booking: {$event->title}",
                    html: $adminContent
                );
            }
        }

        // Send marketing notification
        if ($event->marketing_emails) {
            $marketingEmails = explode(',', $event->marketing_emails);

            $marketingContent = view('admin.mail.admin_event_mail', [
                'event' => $event,
                'eventSchedule' => $eventSchedule,
                'booking' => $booking,
            ])->render();

            foreach ($marketingEmails as $marketingEmail) {

                $this->sendEmail(
                    $marketingEmail,
                    "New Booking: {$event->title}",
                    html: $marketingContent
                );
            }
        }
    }

    protected function generateAdminEmailContent($event, $booking, $fields)
    {
        $content = "New free booking received:\n\n";
        $content .= "Event: {$event->title}\n";
        $content .= "Name: {$booking->name}\n";
        $content .= "Email: {$booking->email}\n";
        $content .= "Phone: {$booking->phone_no}\n";

        if ($booking->ticket_title) {
            $content .= "Ticket: {$booking->ticket_title}\n";
        }

        if ($booking->schedule_title) {
            $content .= "Schedule: {$booking->schedule_title}\n";
        }

        if ($fields->count() > 0) {
            $content .= "\nAdditional Information:\n";
            foreach ($fields as $field) {
                $value = BookingFieldValue::where([
                    'booking_id' => $booking->id,
                    'event_extra_field_id' => $field->id
                ])->first();

                if ($value) {
                    $content .= "{$field->field_label}: {$value->value}\n";
                }
            }
        }

        return $content;
    }



    public function paidBooking(Request $request)
    {
        // Validate main request fields
        $validated = $request->validate([
            'name' => 'required|string|min:2|max:255',
            'phone_no' => 'required|string|min:2|max:255',
            'email' => 'required|email',
            'gender' => 'required|string|in:male,female',
            'ticket_id' => 'required|exists:event_tickets,id',
            'event_id' => 'required|exists:events,id',
            'payment_method_id' => 'required',
            'source' => 'required|string|in:facebook,youtube,instagram,tiktok,whatsapp,email',
            'event_schedule_id' => $request->has('event_schedule_id') ? 'required|exists:event_schedules,id' : 'nullable',
            'country' => $request->has('country') ? 'required|string|max:255' : 'nullable',
        ]);

        // Validate extra fields
        $fields = EventExtraField::where('event_id', $request->event_id)->get();
        $rules = [];
        foreach ($fields as $field) {
            $rules['extra.' . $field->field_name] = $field->is_required ? 'required' : 'nullable';
        }
        $request->validate($rules);

        // Get event and ticket
        $event = Event::findOrFail($request->event_id);
        $ticket = EventTicket::findOrFail($request->ticket_id);
        $eventSchedule = EventSchedule::findOrFail($request->event_schedule_id);

        // Process payment with Stripe
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => $ticket->amount * 100,
                'currency' => 'gbp',
                'payment_method' => $request->payment_method_id,
                'confirm' => true,
                'description' => 'Booking for ' . $event->title,
                'metadata' => [
                    'event_id' => $event->id,
                    'ticket_id' => $ticket->id,
                    'customer_name' => $request->name,
                    'customer_email' => $request->email,
                    'event_slug' => $event->slug
                ],
                'return_url' => route('event.paid.booking.return'),
            ]);

            if ($paymentIntent->status === 'requires_action') {
                return response()->json([
                    'requires_action' => true,
                    'payment_intent_client_secret' => $paymentIntent->client_secret
                ]);
            }

            // Create booking record
            $booking = $this->createBookingRecord($request, $event, $ticket, $eventSchedule, $paymentIntent->id);

            // Send confirmation emails
            $this->sendBookingConfirmation($event, $booking, $eventSchedule);

            return response()->json([
                'success' => true,
                'redirect_url' => route('front.event.detail', $event->slug) . '?payment-success=1',
                'paymentData' => [
                    'amount' => $ticket->amount,
                    'firstName' => $request->name,
                    'email' => $request->email,
                ]
            ]);

        } catch (CardException $e) {
            return $this->handlePaymentError($e->getError()->message, 400);
        } catch (StripeException $e) {
            return $this->handlePaymentError($e->getMessage(), 400);
        } catch (\Exception $e) {
            return $this->handlePaymentError($e->getMessage(), 500);
        }
    }

    protected function createBookingRecord($request, $event, $ticket, $eventSchedule, $transactionId)
    {
        $booking = new Booking([
            'event_id' => $event->id,
            'name' => $request->name,
            'email' => $this->cleanEmail($request->email),
            'phone_no' => $request->phone_no,
            'gender' => $request->gender,
            'source' => $request->source,
            'event_type' => 'paid',
            'amount' => $ticket->amount,
            'ticket_title' => $ticket->title,
            'ticket_quantity' => $ticket->quantity,
            'event_ticket_id' => $ticket->id,
            'payment_method' => 'stripe',
            'payment_status' => 'paid',
            'transaction_id' => $transactionId,
        ]);

        if ($request->has('event_schedule_id')) {
            $booking->schedule_title = $eventSchedule->title;
            $booking->event_schedule_id = $request->event_schedule_id;
        }

        if ($request->has('country')) {
            $booking->country = $request->country;
        }

        $booking->save();

        return $booking;
    }

    protected function sendBookingConfirmation($event, $booking, $eventSchedule)
    {
        $emailTemplate = EventEmailTemplate::where(['event_id' => $event->id, 'send_timing' => "after_registration"])->first();

        if ($emailTemplate) {
            $replacements = [
                '{{ name }}' => $booking->name,
                '{{ schedule }}' => $eventSchedule->title,
                '{{ start_time }}' => $eventSchedule->start_time,
                '{{ title }}' => $event->title,
                '{{ start_date }}' => Carbon::parse($event->start_date)->format('F j, Y'),
                '{{ end_date }}' => Carbon::parse($event->end_date)->format('F j, Y'),
                '{{ venue }}' => $event->venue,
                '{{ location }}' => $event->location,
            ];

            $body = str_replace(
                array_keys($replacements),
                array_values($replacements),
                $emailTemplate->body
            );

            $this->sendEmail(
                $booking->email,
                $emailTemplate->subject,
                view('admin.mail.event_mail', ['content' => $body])->render()
            );
        }

        // Send admin notification
        if ($event->admin_emails) {
            $adminEmails = explode(',', $event->admin_emails);

            $adminContent = view('admin.mail.admin_event_mail', [
                'event' => $event,
                'eventSchedule' => $eventSchedule,
                'booking' => $booking,
            ])->render();

            foreach ($adminEmails as $adminEmail) {

                $this->sendEmail(
                    $adminEmail,
                    "New Booking: {$event->title}",
                    html: $adminContent
                );
            }
        }

        // Send marketing notification
        if ($event->marketing_emails) {
            $marketingEmails = explode(',', $event->marketing_emails);

            $marketingContent = view('admin.mail.admin_event_mail', [
                'event' => $event,
                'eventSchedule' => $eventSchedule,
                'booking' => $booking,
            ])->render();

            foreach ($marketingEmails as $marketingEmail) {

                $this->sendEmail(
                    $marketingEmail,
                    "New Booking: {$event->title}",
                    html: $marketingContent
                );
            }
        }


    }

    protected function sendEmail($to, $subject, $html)
    {
        $to = $this->cleanEmail($to);
        if (!$this->isValidEmail($to)) {
            Log::error('Invalid email format', ['email' => $to]);
            return $this->sendFallbackEmail($to, $subject, $html);
        }
        if ($this->sendViaBrevo($to, $subject, $html)) {
            return true;
        }
        // Fallback to Laravel Mail
        return $this->sendFallbackEmail($to, $subject, $html);
    }
    protected function sendViaBrevo($to, $subject, $html)
    {
        //         $html = "
// <p><span style=\"font-weight: bolder;\">Dear {$name},</span></p>
// <p><br></p>
// <p>Thank you for registering for our upcoming event with the following details.</p>
// <p><span style=\"font-weight: bolder;\">Date:</span>&nbsp;{$start_date}</p>
// <p><span style=\"font-weight: bolder;\">Time:</span>&nbsp;{$start_time}</p>
// <p><span style=\"font-weight: bolder;\">Event:</span>&nbsp;{$schedule}</p>
// <p><br></p>
// <p>The team at Wiselife Academy is excited to meet you and looks forward to hearing from you. We're thrilled to share a powerful presentation that explores The Purpose of Life and provides guidance on achieving true peace and fulfillment.</p>
// ";

        try {
            $response = Http::withHeaders([
                'api-key' => env('BREVO_API_KEY'),
                'accept' => 'application/json',
                'Content-Type' => 'application/json'
            ])->post('https://api.brevo.com/v3/smtp/email', [
                        'sender' => [
                            'name' => $subject,
                            'email' => env('BREVO_FROM_ADDRESS', config('mail.from.address')),
                        ],
                        'to' => [['email' => $to]],
                        'subject' => $subject,
                        'htmlContent' => $html,
                    ]);
            Log::info('Sending email to Brevo', [
                'payload' => [
                    'to' => $to,
                    'subject' => $subject,
                    'htmlContent' => $html,
                ],
                'response' => $response->body(),
            ]);
            if ($response->successful()) {
                return true;
            }

            Log::error('Brevo API Error', [
                'status' => $response->status(),
                'response' => $response->json(),
                'email' => $to
            ]);

            return false;

        } catch (\Exception $e) {
            Log::error('Brevo Email Failed', [
                'error' => $e->getMessage(),
                'email' => $to
            ]);
            return false;
        }
    }

    protected function sendFallbackEmail($to, $subject, $html)
    {
        try {
            Mail::send([], [], function ($message) use ($to, $subject, $html) {
                $message->to($to)
                    ->subject($subject)
                    ->html($html);
            });

            Log::warning('Used fallback email system', ['email' => $to]);
            return true;

        } catch (\Exception $e) {
            Log::error('Fallback email failed', [
                'email' => $to,
                'error' => $e->getMessage()
            ]);
            return false;
        }
    }

    protected function cleanEmail($email)
    {
        return strtolower(trim($email));
    }

    protected function isValidEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    protected function handlePaymentError($message, $statusCode)
    {
        Log::error('Payment Processing Error', ['error' => $message]);

        return response()->json([
            'error' => true,
            'message' => $statusCode === 400 ? $message : 'An unexpected error occurred'
        ], $statusCode);
    }






    public function handlePaymentReturn(Request $request)
    {
        try {
            if (!$request->has('payment_intent')) {
                throw new \Exception('Payment intent missing');
            }

            $paymentIntent = PaymentIntent::retrieve($request->payment_intent);

            if ($paymentIntent->status !== 'succeeded') {
                throw new \Exception('Payment not completed');
            }

            $event = Event::findOrFail($paymentIntent->metadata->event_id);
            $ticket = EventTicket::findOrFail($paymentIntent->metadata->ticket_id);

            $booking = new Booking();
            $booking->event_id = $paymentIntent->metadata->event_id;
            $booking->name = $paymentIntent->metadata->customer_name;
            $booking->email = $paymentIntent->metadata->customer_email;
            $booking->phone_no = ''; // Not available in metadata
            $booking->gender = ''; // Not available in metadata
            $booking->event_type = 'paid';
            $booking->amount = $paymentIntent->amount / 100;
            $booking->ticket_title = $ticket->title;
            $booking->ticket_quantity = $ticket->quantity;
            $booking->event_ticket_id = $ticket->id;
            $booking->payment_method = 'stripe';
            $booking->payment_status = 'paid';
            $booking->transaction_id = $paymentIntent->id;
            $booking->save();

            return redirect()->route('front.event.detail', $paymentIntent->metadata->event_slug)
                ->with([
                    'payment-success' => true,
                    'paymentData' => [
                        'amount' => $paymentIntent->amount / 100,
                        'firstName' => $paymentIntent->metadata->customer_name,
                        'email' => $paymentIntent->metadata->customer_email,
                    ]
                ]);

        } catch (\Exception $e) {
            return redirect()->route('front.event.detail', $event->slug ?? 'home')
                ->with(['error' => 'Failed to complete booking: ' . $e->getMessage()]);
        }
    }











    public function showOptions()
    {
        return view('website.page.donation');
    }









    public function processSubscription(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'amount' => 'required|integer|in:20,50,100',
            'payment_method_id' => 'required|string'
        ]);

        dd($request->all());

        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $customer = Customer::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'payment_method' => $validated['payment_method_id'],
                'invoice_settings' => [
                    'default_payment_method' => $validated['payment_method_id']
                ]
            ]);

            $product = Product::create(['name' => 'Monthly Donation', 'type' => 'service']);
            $price = Price::create([
                'unit_amount' => $validated['amount'] * 100,
                'currency' => 'gbp',
                'recurring' => ['interval' => 'month'],
                'product' => $product->id,
            ]);

            $subscription = Subscription::create([
                'customer' => $customer->id,
                'items' => [['price' => $price->id]],
                'payment_behavior' => 'default_incomplete',
                'expand' => ['latest_invoice.payment_intent'],
                'payment_settings' => [
                    'save_default_payment_method' => 'on_subscription',
                    'payment_method_options' => ['card' => ['request_three_d_secure' => 'automatic']]
                ]
            ]);

            $paymentIntent = $subscription->latest_invoice->payment_intent
                ?? Invoice::retrieve([
                    'id' => $subscription->latest_invoice,
                    'expand' => ['payment_intent']
                ])->payment_intent;

            $returnUrl = filter_var(
                rtrim('http://127.0.0.1:8000', '/') . '/payment/return',
                FILTER_SANITIZE_URL
            );



            Log::info("return_url: {$returnUrl}");

            $paymentIntent = PaymentIntent::update($paymentIntent->id, [
                'return_url' => 'http://127.0.0.1:8000/payment/return',
                'receipt_email' => $validated['email']
            ]);

            return response()->json([
                'success' => true,
                'requires_action' => $paymentIntent->status === 'requires_action',
                'client_secret' => $paymentIntent->client_secret,
                'subscription_id' => $subscription->id,
                'return_url' => $returnUrl
            ]);

        } catch (ApiErrorException $e) {
            Log::error("Stripe API: {$e->getMessage()}");
            return response()->json(['error' => $e->getMessage()], 400);
        } catch (\Exception $e) {
            Log::error("Donation error: {$e->getMessage()}");
            return response()->json(['error' => 'An error occurred.'], 500);
        }
    }

    // public function handlePaymentReturn(Request $request)
    // {
    //     Stripe::setApiKey(config('services.stripe.secret'));
    //     $paymentIntentId = $request->input('payment_intent');

    //     if (!$paymentIntentId) {
    //         return redirect()->route('donation.form')->with('error', 'Missing payment intent.');
    //     }

    //     try {
    //         $pi = PaymentIntent::retrieve($paymentIntentId);
    //         Log::info("PI status: {$pi->status}");

    //         if ($pi->status === 'succeeded') {
    //             return redirect()->route('donation.success');
    //         } elseif (in_array($pi->status, ['requires_action', 'requires_payment_method'])) {
    //             return redirect()->route('donation.form')
    //                 ->with('error', "Payment requires action: {$pi->status}");
    //         }

    //         return redirect()->route('donation.form')->with('error', "Payment not completed: {$pi->status}");
    //     } catch (\Exception $e) {
    //         Log::error("Return handling error: {$e->getMessage()}");
    //         return redirect()->route('donation.form')->with('error', 'Payment verification failed.');
    //     }
    // }


    public function showSuccess()
    {
        return view('website.page.donation-success');
    }
}






