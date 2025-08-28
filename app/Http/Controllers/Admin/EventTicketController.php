<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\EventTicket;
use App\Models\Event;
use Illuminate\Http\Request;

class EventTicketController extends Controller
{
    public function index($slug)
    {
        $event = Event::where("slug","=", $slug)->first();
        $event_tickets = EventTicket::where("event_id","=", $event->id)->get();
        return view('admin.event.partials.event_ticket_list', compact('event_tickets', 'slug'));
    }

    // Show add form
    public function add($slug)
    {

        return view('admin.event.partials.event_ticket_add', compact('slug'));
    }

    // Store new ticket
    public function store(Request $request, $slug)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'amount' => 'required|numeric|min:0',
            'order_no' => 'nullable|integer',
        ]);

        $event = Event::where('slug', $slug)->firstOrFail();

        $eventTicket = new EventTicket();
        $eventTicket->event_id = $event->id;
        $eventTicket->title = $request->title;
        $eventTicket->quantity = $request->quantity;
        $eventTicket->amount = $request->amount;
        $eventTicket->order_no = $request->order_no ?? 0;
        $eventTicket->save();

        return redirect()->route('admin.eventticket.index', ['slug' => $event->slug])
            ->with('notification', [
                'alert' => 'success',
                'message' => 'Event Ticket created successfully!'
            ]);
    }


    // Show edit form
    public function edit($id)
    {

        $event_ticket = EventTicket::findOrFail($id);
        $slug = $event_ticket->event->slug;
        return view('admin.event.partials.event_ticket_edit', compact('event_ticket', 'slug'));
    }

    // Update ticket
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'amount' => 'required|numeric|min:0',
            'order_no' => 'nullable|integer',
        ]);

        $eventTicket = EventTicket::findOrFail($id);
        $eventTicket->title = $request->title;
        $eventTicket->quantity = $request->quantity;
        $eventTicket->amount = $request->amount;
        $eventTicket->order_no = $request->order_no ?? 0;
        $eventTicket->save();

        return redirect()->route('admin.eventticket.index', ['slug' => $eventTicket->event->slug])
            ->with('notification', [
                'alert' => 'success',
                'message' => 'Event Ticket Updated successfully!'
            ]);

    }

    // Delete ticket
    public function delete($id)
    {

        $event = EventTicket::findOrFail($id);
        $event->delete();

        return redirect()->back()->with('notification', ['alert' => 'success', 'message' => 'Event Ticket deleted successfully!']);
    }
}

