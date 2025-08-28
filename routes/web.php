<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
// Middleware
use App\Http\Middleware\Localization;
use App\Http\Middleware\SetLocale;
// Models
use App\Models\Enquiry;
// Frontend Controllers
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\RealEstateController;
use App\Http\Controllers\Front\VATRegController;
use App\Http\Controllers\Front\TypingAttestationController;
use App\Http\Controllers\{
    DashboardController,
    ProfileController
};


use App\Http\Controllers\Admin\DonationFormController;



use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\DonarController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\DonationSourceController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\EventEmailTemplateController;
use App\Http\Controllers\Admin\EventTicketController;
use App\Http\Controllers\Admin\EventImageController;
use App\Http\Controllers\Admin\ReferralSourceController;

use App\Http\Controllers\Admin\{
    BcategoryController,
    BlogController,
    BlockController,
    BlockGalleryController,
    BulkDeleteController,
    CallToActionController,
    DocumentRequiredController,
    EnquiryController,
    FaqController,
    FeatureController,
    FeatureImageController,
    GalleryController,
    GcategoryController,
    HeroSectionController,
    IntroSectionController,
    JcategoryController,
    JobController,
    NotificationController,
    PageController,
    PartnerController,
    ProcedureController,
    SectionTitleController,
    ServiceSectionController,
    SettingController,
    TestimonialController,
    UserController,
    WhyChooseUsController,
    WhyUsImageController,
    PageSectionController,
    ElementController,

    SliderController,
    ClientController,
    VolunteerTypeController,
    EventController,
    EventScheduleController,
    EventExtraFieldController,
    VolunteerController

};
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Front\DHAController;
use App\Http\Controllers\Front\LegalServicesController;
Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');

Route::get('/pending-user', [UserController::class, 'pendingUser'])->name('pending.user');
Route::get('/blocked-user', [UserController::class, 'blockedUser'])->name('blocked.user');

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// Route::get('/hijrah-data-migrate', function(){
//     $tours = Illuminate\Support\Facades\DB::table('tours')->where('title', 'hijrah-tour')->get();
//     // dd($tours);
//     foreach($tours as $tour)
//     {
//         $booking = new App\Models\Booking();

//         $booking->name = $tour->first_name . ' ' . $tour->surname;
//         $booking->email = $tour->email;
//         $booking->phone_no = $tour->phone;
//         $booking->gender = $tour->gender;
//         $booking->source = $tour->referral_source;
//         $booking->event_id = 26;
//         $booking->event_type = "free";
//         $booking->amount = 0.00;

//         $booking->save();

//         $extra = new App\Models\BookingFieldValue();
//         $extra->event_extra_field_id = 1;
//         $extra->booking_id = $booking->id;
//         $extra->value = $tour->age ?? NULL;
//         $extra->save();

//         $extra = new App\Models\BookingFieldValue();
//         $extra->event_extra_field_id = 2;
//         $extra->booking_id = $booking->id;
//         $extra->value = $tour->fitness_level ?? NULL;
//         $extra->save();

//         $extra = new App\Models\BookingFieldValue();
//         $extra->event_extra_field_id = 3;
//         $extra->booking_id = $booking->id;
//         $extra->value = $tour->experience ?? NULL;
//         $extra->save();

//         $extra = new App\Models\BookingFieldValue();
//         $extra->event_extra_field_id = 4;
//         $extra->booking_id = $booking->id;
//         $extra->value = $tour->health ?? NULL;
//         $extra->save();

//     }

// });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get("/slider", [SliderController::class, "index"])->name("admin.slider");
    Route::get("/slider/add", [SliderController::class, "add"])->name("admin.slider.add");
    Route::post("/slider/store", [SliderController::class, "store"])->name("admin.slider.store");
    Route::post("/slider/delete/{id}/", [SliderController::class, "delete"])->name("admin.slider.delete");
    Route::get("/slider/edit/{id}/", [SliderController::class, "edit"])->name("admin.slider.edit");
    Route::post("/slider/update/{id}/", [SliderController::class, "update"])->name("admin.slider.update");


    // Home Clients Section
    Route::get('/client', [ClientController::class, 'index'])->name('admin.client.index');
    Route::get('/client/add', [ClientController::class, 'add'])->name('admin.client.add');
    Route::post('/client/store', [ClientController::class, 'store'])->name('admin.client.store');
    Route::post('/client/delete/{id}/', [ClientController::class, 'delete'])->name('admin.client.delete');
    Route::get('/client/edit/{id}/', [ClientController::class, 'edit'])->name('admin.client.edit');
    Route::post('/client/update/{id}/', [ClientController::class, 'update'])->name('admin.client.update');
});

Route::get('/edit-profile', [UserController::class, 'editProfile'])->name('user.profile.edit');
Route::post('/update-Profile', [ProfileController::class, 'updateProfile'])->name('user.profile.update');
Route::post('/update-
        word', [ProfileController::class, 'updatePassword'])->name('user.password.update');

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'status'])->group(function () {
    Route::middleware(['auth', 'user'])->group(function () {
        Route::get('/user-dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');
    });
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin-dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
        // profile routes
        Route::get('/editProfile', [ProfileController::class, 'editProfile'])->name('admin.profile.edit');
        Route::post('/updateProfile', [ProfileController::class, 'updateProfile'])->name('admin.profile.update');
        Route::post('/updatePassword', [ProfileController::class, 'updatePassword'])->name('admin.password.update');
        // user routes
        Route::get('/users', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/add-user', [UserController::class, 'add'])->name('admin.user.add');
        Route::post('/store-user', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/update-user/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::post('/delete-user/{id}', [UserController::class, 'delete'])->name('admin.user.delete');

        Route::post('/makependingUser/{id}', [UserController::class, 'makependingUser'])->name('admin.user.makependingUser');
        Route::post('/makeapprovedUser/{id}', [UserController::class, 'makeapprovedUser'])->name('admin.user.makeapprovedUser');
        Route::post('/makeblockedUser/{id}', [UserController::class, 'makeblockedUser'])->name('admin.user.makeblockedUser');

        Route::get('/pendingUsers', [UserController::class, 'pendingUsers'])->name('admin.user.pendingUsers');
        Route::get('/approvedUsers', [UserController::class, 'approvedUsers'])->name('admin.user.approvedUsers');
        Route::get('/blockedUsers', [UserController::class, 'blockedUsers'])->name('admin.user.blockedUsers');
        // Bulk Delete Routes:-
        Route::get('bulk/deletes', [BulkDeleteController::class, 'bulkDelete'])->name('back.bulk.delete');
        // Page Routes:-
        Route::get('/pages', [PageController::class, 'pagelist'])->name('admin.page.index');
        Route::get('/page-detail/{slug}', [PageController::class, 'detail'])->name('admin.page.detail');
        Route::get('/page/add', [PageController::class, 'add'])->name('admin.page.add');
        Route::post('/page/store', [PageController::class, 'store'])->name('admin.page.store');
        // Route::post('/page/store', [PageController::class, 'store'])->middleware(['auth', 'can:create-page']);
        Route::get('/page/edit/{id}', [PageController::class, 'edit'])->name('admin.page.edit');
        Route::put('/page/update/{id}', [PageController::class, 'update'])->name('admin.page.update');
        Route::post('/page/delete/{id}', [PageController::class, 'delete'])->name('admin.page.delete');


        Route::resource('admin/pages', PageController::class)->except(['show']);
        Route::delete('admin/pages/{page}', [PageController::class, 'destroy'])->name('admin.page.destroy');

        // Partner Routes:-
        Route::get('/partners', [PartnerController::class, 'index'])->name('admin.partner.index');
        Route::get('/partner/add', [PartnerController::class, 'add'])->name('admin.partner.add');
        Route::post('/partner/store', [PartnerController::class, 'store'])->name('admin.partner.store');
        Route::get('/partner/edit/{id}', [PartnerController::class, 'edit'])->name('admin.partner.edit');
        Route::post('/partner/update/{id}', [PartnerController::class, 'update'])->name('admin.partner.update');
        Route::post('/partner/delete/{id}', [PartnerController::class, 'delete'])->name('admin.partner.delete');

        // Gallery Category Routes:-
        Route::get('/gallery-categories', [GcategoryController::class, 'gcategory'])->name('admin.gcategory.index');
        Route::get('/gallery-category/add', [GcategoryController::class, 'add'])->name('admin.gcategory.add');
        Route::post('/gallery-category/store', [GcategoryController::class, 'store'])->name('admin.gcategory.store');
        Route::get('/gallery-category/edit/{id}', [GcategoryController::class, 'edit'])->name('admin.gcategory.edit');
        Route::post('/gallery-category/update/{id}', [GcategoryController::class, 'update'])->name('admin.gcategory.update');
        Route::get('/gallery-category/delete/{id}', action: [GcategoryController::class, 'delete'])->name('admin.gcategory.delete');


        // Gallery Routes:-
        Route::get('/galleries', [GalleryController::class, 'index'])->name('admin.gallery.index');
        Route::get('/gallery/add', [GalleryController::class, 'add'])->name('admin.gallery.add');
        Route::post('/gallery/store', [GalleryController::class, 'store'])->name('admin.gallery.store');
        Route::get('/gallery/edit/{id}', [GalleryController::class, 'edit'])->name('admin.gallery.edit');
        Route::post('/gallery/update/{id}', [GalleryController::class, 'update'])->name('admin.gallery.update');
        Route::get('/gallery/delete/{id}', action: [GalleryController::class, 'delete'])->name('admin.gallery.delete');


        // Blog Category Routes:-
        Route::get('/blog-categories', [BcategoryController::class, 'bcategory'])->name('admin.bcategory.index');
        Route::get('/blog-category/add', [BcategoryController::class, 'add'])->name('admin.bcategory.add');
        Route::post('/blog-category/store', [BcategoryController::class, 'store'])->name('admin.bcategory.store');
        Route::get('/blog-category/edit/{id}', [BcategoryController::class, 'edit'])->name('admin.bcategory.edit');
        Route::post('/blog-category/update/{id}', [BcategoryController::class, 'update'])->name('admin.bcategory.update');
        Route::get('/blog-category/delete/{id}', action: [BcategoryController::class, 'delete'])->name('admin.bcategory.delete');


        // Blog Routes:-
        Route::get('/blogs', [BlogController::class, 'blog'])->name('admin.blog.index');
        Route::get('/blog/add', [BlogController::class, 'add'])->name('admin.blog.add');
        Route::post('/blog/store', [BlogController::class, 'store'])->name('admin.blog.store');
        Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('admin.blog.edit');
        Route::post('/blog/update/{id}', [BlogController::class, 'update'])->name('admin.blog.update');
        Route::get('/blog/delete/{id}', action: [BlogController::class, 'delete'])->name('admin.blog.delete');

        // Job Routes:-
        Route::get('/jobs', [JobController::class, 'jobs'])->name('admin.job.index');
        Route::get('/job/add', [JobController::class, 'add'])->name('admin.job.add');
        Route::post('/job/store', [JobController::class, 'store'])->name('admin.job.store');
        Route::get('/job/edit/{id}', [JobController::class, 'edit'])->name('admin.job.edit');
        Route::post('/job/update/{id}', [JobController::class, 'update'])->name('admin.job.update');
        Route::get('/job/delete/{id}', action: [JobController::class, 'delete'])->name('admin.job.delete');

        // Job Category Routes:-
        Route::get('/job-categories', [JcategoryController::class, 'jcategory'])->name('admin.jcategory.index');
        Route::get('/job-category/add', [JcategoryController::class, 'add'])->name('admin.jcategory.add');
        Route::post('/job-category/store', [JcategoryController::class, 'store'])->name('admin.jcategory.store');
        Route::get('/job-category/edit/{id}', [JcategoryController::class, 'edit'])->name('admin.jcategory.edit');
        Route::post('/job-category/update/{id}', [JcategoryController::class, 'update'])->name('admin.jcategory.update');
        Route::get('/job-category/delete/{id}', action: [JcategoryController::class, 'delete'])->name('admin.jcategory.delete');


        // Feature Routes:-
        // Route::get('/features', [FeatureController::class, 'index'])->name('admin.feature.index');
        Route::get('/feature/{pageId}', [FeatureController::class, 'getByPageId'])->name('admin.feature');
        Route::get('/features/{id}/list', [FeatureController::class, 'list'])->name('admin.feature.list');
        Route::get('/feature/{id}/add', [FeatureController::class, 'add'])->name('admin.feature.add');
        Route::post('/feature/store', [FeatureController::class, 'store'])->name('admin.feature.store');
        Route::get('/feature/edit/{id}', [FeatureController::class, 'edit'])->name('admin.feature.edit');
        Route::put('/feature/update/{id}', [FeatureController::class, 'update'])->name('admin.feature.update');
        Route::delete('/feature/delete/{id}', [FeatureController::class, 'delete'])->name('admin.feature.delete');

        // Feature images Routes
        Route::get('/feature-images/{slug}', [FeatureImageController::class, 'index'])->name('admin.feature_image.index');
        Route::get('/feature-image/{slug}/add', [FeatureImageController::class, 'add'])->name('admin.feature_image.add');
        Route::post('/feature-image/store/{slug}', [FeatureImageController::class, 'store'])->name('admin.feature_image.store');
        Route::get('/feature-image/edit/{id}', [FeatureImageController::class, 'edit'])->name('admin.feature_image.edit');
        Route::put('/feature-image/update/{id}', [FeatureImageController::class, 'update'])->name('admin.feature_image.update');
        Route::post('/feature-image/delete/{id}', [FeatureImageController::class, 'delete'])->name('admin.feature_image.delete');

        // Why Choose Us Routes
        Route::get('/why-choose-us/{slug}', [WhyChooseUsController::class, 'index'])->name('admin.why-choose-us.index');
        Route::get('/why-choose-us/{slug}/add', [WhyChooseUsController::class, 'add'])->name('admin.why-choose-us.add');
        Route::post('/why-choose-us/store/{slug}', [WhyChooseUsController::class, 'store'])->name('admin.why-choose-us.store');
        Route::get('/why-choose-us/edit/{id}', [WhyChooseUsController::class, 'edit'])->name('admin.why-choose-us.edit');
        Route::post('/why-choose-us/update/{id}', [WhyChooseUsController::class, 'update'])->name('admin.why-choose-us.update');
        Route::post('/why-choose-us/delete/{id}', [WhyChooseUsController::class, 'delete'])->name('admin.why-choose-us.delete');

        // Documents Required Routes:-
        // Route::get('/document-required', [DocumentRequiredController::class, 'index'])->name('admin.document-required.index');
        Route::get('/document-required/{slug}', [DocumentRequiredController::class, 'index'])->name('admin.document-required.index');
        Route::get('/document-required/{slug}/add', [DocumentRequiredController::class, 'add'])->name('admin.document-required.add');
        Route::post('/document-required/store/{slug}', [DocumentRequiredController::class, 'store'])->name('admin.document-required.store');
        Route::get('/document-required/edit/{id}', [DocumentRequiredController::class, 'edit'])->name('admin.document-required.edit');
        Route::post('/document-required/update/{id}', [DocumentRequiredController::class, 'update'])->name('admin.document-required.update');
        Route::post('/document-required/delete/{id}', [DocumentRequiredController::class, 'delete'])->name('admin.document-required.delete');

        // Documents Required Routes:-
        Route::get('/call-to-action/{slug}', [CallToActionController::class, 'index'])->name('admin.call-to-action.index');
        Route::get('/call-to-action/{slug}/add', [CallToActionController::class, 'add'])->name('admin.call-to-action.add');
        Route::post('/call-to-action/store/{slug}', [CallToActionController::class, 'store'])->name('admin.call-to-action.store');
        Route::get('/call-to-action/edit/{id}', [CallToActionController::class, 'edit'])->name('admin.call-to-action.edit');
        Route::post('/call-to-action/update/{id}', [CallToActionController::class, 'update'])->name('admin.call-to-action.update');
        Route::post('/call-to-action/delete/{id}', [CallToActionController::class, 'delete'])->name('admin.call-to-action.delete');

        // SectionTitle Routes
        Route::get('/section-titles/{slug}', [SectionTitleController::class, 'index'])->name('admin.section_title.index');
        Route::get('/section-titles/{slug}/list', [SectionTitleController::class, 'list'])->name('admin.section_title.list');
        Route::get('/section-title/{slug}/add', [SectionTitleController::class, 'add'])->name('admin.section_title.add');
        Route::post('/section-title/store/{slug}', [SectionTitleController::class, 'store'])->name('admin.section_title.store');
        Route::get('/section-title/edit/{id}', [SectionTitleController::class, 'edit'])->name('admin.section_title.edit');
        Route::post('/section-title/update/{id}', [SectionTitleController::class, 'update'])->name('admin.section_title.update');
        Route::post('/section-title/delete/{id}', [SectionTitleController::class, 'delete'])->name('admin.section_title.delete');


        Route::get('/page-section/{slug}', [PageSectionController::class, 'index'])->name('admin.page.section.index');
        Route::get('/page-section/add/{slug}', [PageSectionController::class, 'add'])->name('admin.page.section.add');
        Route::post('/page-section/store/{slug}', [PageSectionController::class, 'store'])->name('admin.page.section.store');
        Route::get('/page-section/edit/{id}', [PageSectionController::class, 'edit'])->name('admin.page.section.edit');
        Route::post('/page-section/update/{id}', [PageSectionController::class, 'update'])->name('admin.page.section.update');
        Route::post('/page-section/delete/{id}', [PageSectionController::class, 'delete'])->name('admin.page.section.delete');

        // Elements Routes
        Route::get('/element/{slug}', [ElementController::class, 'index'])->name('admin.element.index');
        Route::get('/element/add/{slug}', [ElementController::class, 'add'])->name('admin.element.add');
        Route::post('/element/store/{slug}', [ElementController::class, 'store'])->name('admin.element.store');
        Route::get('/element/edit/{id}', [ElementController::class, 'edit'])->name('admin.element.edit');
        Route::post('/element/update/{id}', [ElementController::class, 'update'])->name('admin.element.update');
        Route::post('/element/delete/{id}', [ElementController::class, 'delete'])->name('admin.element.delete');
        // End of Elements Routes

        // Blocks  Routes
        Route::get('/block/{slug}', [BlockController::class, 'index'])->name('admin.block.index');
        Route::get('/block/add/{slug}', [BlockController::class, 'add'])->name('admin.block.add');
        Route::post('/block/store/{slug}', [BlockController::class, 'store'])->name('admin.block.store');
        Route::get('/block/edit/{id}', [BlockController::class, 'edit'])->name('admin.block.edit');
        Route::post('/block/update/{id}', [BlockController::class, 'update'])->name('admin.block.update');
        Route::post('/block/delete/{id}', [BlockController::class, 'delete'])->name('admin.block.delete');
        // End of Blocks Routes

        Route::get("/block/{slug}/galleries/add/{id}", [BlockGalleryController::class, "add"])->name("admin.block_gallery.add");
        Route::post("/block/galleries/store", [BlockGalleryController::class, "store"])->name("admin.block_gallery.store");
        Route::get("/block/galleries/edit/{id}/", [BlockGalleryController::class, "edit"])->name("admin.block_gallery.edit");
        Route::post("/block/galleries/update/{id}/", [BlockGalleryController::class, "update"])->name("admin.block_gallery.update");
        Route::post("/block/galleries/delete/{id}/", [BlockGalleryController::class, "delete"])->name("admin.block_gallery.delete");

        Route::get('/admin/testimonials/{slug}', [TestimonialController::class, 'index'])->name('admin.testimonial.index');
        Route::get('admin/testimonials/add/{slug}', [TestimonialController::class, 'add'])->name('admin.testimonial.add');
        Route::post('/testimonials/store/{slug}', [TestimonialController::class, 'store'])->name('admin.testimonial.store');
        Route::get('admin/testimonials/edit/{id}', [TestimonialController::class, 'edit'])->name('admin.testimonial.edit');
        Route::post('/admin/testimonials/update/{id}', [TestimonialController::class, 'update'])->name('admin.testimonial.update');
        Route::post('/admin/testimonials/delete/{id}', [TestimonialController::class, 'destroy'])->name('admin.testimonial.destroy');

        // Hero Sections Routes
        // Route::get('/hero-sections/{pageId}', [HeroSectionController::class, 'getByPageId'])->name('admin.hero_section.index');
        Route::get('/hero-sections/{slug}', [HeroSectionController::class, 'index'])->name('admin.hero_section.index');
        Route::get('/hero-section/{slug}/add', [HeroSectionController::class, 'add'])->name('admin.hero_section.add');
        Route::post('/hero-section/store/{slug}', [HeroSectionController::class, 'store'])->name('admin.hero_section.store');
        Route::get('/hero-section/edit/{id}', [HeroSectionController::class, 'edit'])->name('admin.hero_section.edit');
        Route::post('/hero-section/update/{id}', [HeroSectionController::class, 'update'])->name('admin.hero_section.update');
        Route::post('/hero-section/delete/{id}', [HeroSectionController::class, 'delete'])->name('admin.hero_section.delete');
        // Route::get('/hero-sections', [HeroSectionController::class, 'index'])->name('admin.hero_section.index');

        // Why Us Images Routes
        Route::get('/why-us-image/{slug}', [WhyUsImageController::class, 'index'])->name('admin.why-us-image.index');
        Route::get('/why-us-image/{slug}/add', [WhyUsImageController::class, 'add'])->name('admin.why-us-image.add');
        Route::post('/why-us-image/store/{slug}', [WhyUsImageController::class, 'store'])->name('admin.why-us-image.store');
        Route::get('/why-us-image/edit/{id}', [WhyUsImageController::class, 'edit'])->name('admin.why-us-image.edit');
        Route::post('/why-us-image/update/{id}', [WhyUsImageController::class, 'update'])->name('admin.why-us-image.update');
        Route::post('/why-us-image/delete/{id}', [WhyUsImageController::class, 'delete'])->name('admin.why-us-image.delete');
        // faqs Routes
        Route::get('/faqs/{slug}', [FaqController::class, 'index'])->name('admin.faq.index');
        Route::get('/faqs/{slug}/add', [FaqController::class, 'add'])->name('admin.faq.add');
        Route::post('/faqs/store/{slug}', [FaqController::class, 'store'])->name('admin.faq.store');
        Route::get('/faqs/edit/{id}', [FaqController::class, 'edit'])->name('admin.faq.edit');
        Route::put('/faqs/update/{id}', [FaqController::class, 'update'])->name('admin.faq.update');
        Route::delete('/faqs/delete/{id}', [FaqController::class, 'delete'])->name('admin.faq.delete');


        // Route::get('/admin/procedures/{pageId}', [ProcedureController::class, 'getByPageId'])->name('admin.procedures');
        Route::get('/admin/procedures/{slug}', [ProcedureController::class, 'index'])->name('admin.procedures.index');
        Route::get('/admin/procedures/add/{slug}', [ProcedureController::class, 'add'])->name('admin.procedures.add');
        Route::post('/procedures/store/{slug}', [ProcedureController::class, 'store'])->name('admin.procedures.store');
        Route::get('/admin/procedures/{id}/edit', [ProcedureController::class, 'edit'])->name('admin.procedures.edit');
        Route::post('/admin/procedures/update/{id}', [ProcedureController::class, 'update'])->name('admin.procedures.update');
        Route::post('/admin/procedures/{id}', [ProcedureController::class, 'delete'])->name('admin.procedures.delete');


        // Feature Routes:-
        // Route::get('/features', [FeatureController::class, 'index'])->name('admin.feature.index');
        Route::get('/features/{slug}', [FeatureController::class, 'index'])->name('admin.feature.index');
        Route::get('/feature/{slug}/add', [FeatureController::class, 'add'])->name('admin.feature.add');
        Route::post('/feature/store/{slug}', [FeatureController::class, 'store'])->name('admin.feature.store');
        Route::get('/feature/edit/{id}', [FeatureController::class, 'edit'])->name('admin.feature.edit');
        Route::post('/feature/update/{id}', [FeatureController::class, 'update'])->name('admin.feature.update');
        Route::post('/feature/delete/{id}', [FeatureController::class, 'delete'])->name('admin.feature.delete');



        // introduction Routes
        Route::get('/introduction-sections/{slug}', [IntroSectionController::class, 'index'])->name('admin.introduction_section.index');
        // Route::get('/introduction-sections/{id}/list', [IntroSectionController::class, 'list'])->name('admin.introduction_section.list');
        Route::get('/introduction-section/{slug}/add', [IntroSectionController::class, 'add'])->name('admin.introduction_section.add');
        Route::post('/introduction-section/store/{slug}', [IntroSectionController::class, 'store'])->name('admin.introduction_section.store');
        Route::get('/introduction-section/edit/{id}', [IntroSectionController::class, 'edit'])->name('admin.introduction_section.edit');
        Route::post('/introduction-section/update/{id}', [IntroSectionController::class, 'update'])->name('admin.introduction_section.update');
        Route::post('/introduction-section/delete/{id}', [IntroSectionController::class, 'delete'])->name('admin.introduction_section.delete');

        // event Routes:-
        Route::get('/event-list', [EventController::class, 'eventlist'])->name('admin.event.index');
        Route::get('/event-detail/{slug}', [EventController::class, 'detail'])->name('admin.event.detail');
        Route::get('/event/add', [EventController::class, 'add'])->name('admin.event.add');
        Route::post('/event/store', [EventController::class, 'store'])->name('admin.event.store');
        Route::get('/event/edit/{id}', [EventController::class, 'edit'])->name('admin.event.edit');
        Route::put('/event/update/{id}', [EventController::class, 'update'])->name('admin.event.update');
        Route::post('/event/delete/{id}', [EventController::class, 'delete'])->name('admin.event.delete');

        Route::get('/event/booking/{slug}', [EventController::class, 'eventBooking'])->name('admin.event.booking');


        // event-schedule Routes
        Route::get('/event-schedule/{slug}', [EventScheduleController::class, 'index'])->name('admin.event_schedule.index');
        Route::get('/event-schedule/{slug}/add', [EventScheduleController::class, 'add'])->name('admin.event_schedule.add');
        Route::post('/event-schedule/store/{slug}', [EventScheduleController::class, 'store'])->name('admin.event_schedule.store');
        Route::get('/event-schedule/edit/{id}', [EventScheduleController::class, 'edit'])->name('admin.event_schedule.edit');
        Route::post('/event-schedule/update/{id}', [EventScheduleController::class, 'update'])->name('admin.event_schedule.update');
        Route::post('/event-schedule/delete/{id}', [EventScheduleController::class, 'delete'])->name('admin.event_schedule.delete');


        // event-Email template Routes
        Route::get('/event-email-template/{slug}', [EventEmailTemplateController::class, 'index'])->name('admin.event.template.index');
        Route::get('/event-email-template/{slug}/add', [EventEmailTemplateController::class, 'add'])->name('admin.event.template.add');
        Route::post('/event-email-template/store/{slug}', [EventEmailTemplateController::class, 'store'])->name('admin.event.template.store');
        Route::get('/event-email-template/edit/{slug}', [EventEmailTemplateController::class, 'edit'])->name('admin.event.template.edit');
        Route::post('/event-email-template/update/{id}', [EventEmailTemplateController::class, 'update'])->name('admin.event.template.update');
        Route::post('/event-email-template/delete/{id}', [EventEmailTemplateController::class, 'delete'])->name('admin.event.template.delete');

        // event-Extra Feilds Routes
        Route::get('/event-extra-field/{slug}', [EventExtraFieldController::class, 'index'])->name('admin.event_extra_field.index');
        Route::get('/event-extra-field/{slug}/add', [EventExtraFieldController::class, 'add'])->name('admin.event_extra_field.add');
        Route::post('/event-extra-field/store/{slug}', [EventExtraFieldController::class, 'store'])->name('admin.event_extra_field.store');
        Route::get('/event-extra-field/edit/{id}', [EventExtraFieldController::class, 'edit'])->name('admin.event_extra_field.edit');
        Route::post('/event-extra-field/update/{id}', [EventExtraFieldController::class, 'update'])->name('admin.event_extra_field.update');
        Route::post('/event-extra-field/delete/{id}', [EventExtraFieldController::class, 'delete'])->name('admin.event_extra_field.delete');


        //EventTicket Routes
        Route::get('/eventticket/{slug}', [EventTicketController::class, 'index'])->name('admin.eventticket.index');
        Route::get('/eventticket/add/{slug}', [EventTicketController::class, 'add'])->name('admin.eventticket.add');
        Route::post('/eventticket/store/{slug}', [EventTicketController::class, 'store'])->name('admin.eventticket.store');
        Route::get('/eventticket/edit/{id}', [EventTicketController::class, 'edit'])->name('admin.eventticket.edit');
        Route::post('/eventticket/update/{id}', [EventTicketController::class, 'update'])->name('admin.eventticket.update');
        Route::post('/eventticket/delete/{id}', [EventTicketController::class, 'delete'])->name('admin.eventticket.delete');

        // Event Image Routes
        Route::prefix('event')->group(function () {
            Route::get('/eventimage/{slug}', [EventImageController::class, 'index'])->name('admin.event_image.index');
            Route::get('/eventimage/add/{slug}', [EventImageController::class, 'add'])->name('admin.event_image.add');
            Route::post('/eventimage/store/{slug}', [EventImageController::class, 'store'])->name('admin.event_image.store');
            Route::get('/eventimage/edit/{id}', [EventImageController::class, 'edit'])->name('admin.event_image.edit');
            Route::post('/eventimage/update/{id}', [EventImageController::class, 'update'])->name('admin.event_image.update');
            Route::post('/eventimage/delete/{id}', [EventImageController::class, 'delete'])->name('admin.event_image.delete');
        });


        // Service Section Routes
        Route::get('/service-section/{id}', [ServiceSectionController::class, 'index'])->name('admin.service.section.index');
        Route::get('/service-section/add/{id}', [ServiceSectionController::class, 'add'])->name('admin.service.section.add');
        Route::post('/service-section/store', [ServiceSectionController::class, 'store'])->name('admin.service.section.store');
        Route::get('/service-section/edit/{id}', [ServiceSectionController::class, 'edit'])->name('admin.service.section.edit');
        Route::post('/service-section/update/{id}', [ServiceSectionController::class, 'update'])->name('admin.service.section.update');
        Route::post('/service-section/delete/{id}', [ServiceSectionController::class, 'delete'])->name('admin.service.section.delete');
        // End of Service Section Routes

        // Enquiry Routes
        Route::get('/enquiry', [EnquiryController::class, 'index'])->name('admin.enquiry.index');
        Route::get('/enquiry/add', [EnquiryController::class, 'add'])->name('admin.enquiry.add');
        Route::post('/enquiry/store', [EnquiryController::class, 'store'])->name('admin.enquiry.store');
        Route::get('enquiry/restore', [EnquiryController::class, 'restorePage'])->name('admin.enquiry.restore.page');
        Route::get('/enquiry/edit/{id}', [EnquiryController::class, 'edit'])->name('admin.enquiry.edit');
        Route::post('/enquiry/update/{id}', [EnquiryController::class, 'update'])->name('admin.enquiry.update');
        Route::post('/enquiry/delete/{id}', [EnquiryController::class, 'delete'])->name('admin.enquiry.delete');
        Route::get('/enquiry/detail/{id}', [EnquiryController::class, 'detail'])->name('admin.enquiry.detail');
        Route::post('/enquiry/comment/{id}', [EnquiryController::class, 'comment'])->name('admin.enquiry.comment.store');
        Route::get('/enquiry/comment/delete/{id}', [EnquiryController::class, 'deleteComment'])->name('admin.enquiry.comment.delete');
        Route::get('enquiry/restore/{id}', [EnquiryController::class, 'restore'])->name('admin.enquiry.restore');
        Route::post('enquiry/force_delete/{id}', [EnquiryController::class, 'forceDelete'])->name('admin.enquiry.force.delete');
        // End of Enquiry

        // Setting Routes
        Route::get('/setting', [SettingController::class, 'edit'])->name('admin.setting.edit');
        Route::post('/setting/update', [SettingController::class, 'update'])->name('admin.setting.update');
        // End of Setting Routes
    });


    Route::get('admin-notification', [NotificationController::class, 'adminNotification'])->name('admin.notifications');
    Route::get('admin-notify/{id}', [NotificationController::class, 'adminNotifyDetail'])->name('admin.notify.detail');
    Route::post('admin-mark-as-read', [NotificationController::class, 'admin_Notify_MarkRead'])->name('admin.mark.read');
    Route::get('admin-all-read', [NotificationController::class, 'adminNotify_Mark_all_Read'])->name('admin.all.read');

    // Testimonial routes start

    Route::get('/admin/testimonials/{pageId}', [TestimonialController::class, 'getByPageId'])->name('admin.testimonials');
    Route::get('/admin/testimonials', [TestimonialController::class, 'list'])->name('admin.testimonials');
    Route::get('/admin/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
    Route::post('/testimonials/store', [TestimonialController::class, 'store'])->name('testimonials.store');
    Route::get('admin/testimonials/{id}/edit', [TestimonialController::class, 'edit'])->name('testimonials.edit');
    Route::put('/admin/testimonials/{id}', [TestimonialController::class, 'update'])->name('testimonials.update');
    Route::delete('/admin/testimonials/{id}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');
    Route::get('admin/testimonials/{id}/list', [TestimonialController::class, 'list'])->name('admin.testimonial.list');


    Route::get('/admin/call-to-actions/page/{pageId}', [CallToActionController::class, 'getByPageId'])->name('call-to-actions.byPage');
    Route::resource('admin/call-to-actions', CallToActionController::class);

    Route::get('/test', [FrontController::class, 'test'])->name('front.test')->middleware(Localization::class);
    ;



    // country routes

    Route::get("/country", [CountryController::class, "index"])->name("admin.country.index");

    Route::get("country/add", [CountryController::class, "add"])->name("admin.country.add");
    Route::post("country/store", [CountryController::class, "store"])->name("admin.country.store");
    Route::get("country/restore", [CountryController::class, "restorePage"])->name("admin.country.restore.page");
    Route::get("country/edit/{id}/", [CountryController::class, "edit"])->name("admin.country.edit");
    Route::post("country/update/{id}/", [CountryController::class, "update"])->name("admin.country.update");
    Route::post("country/delete/{id}/", [CountryController::class, "delete"])->name("admin.country.delete");
    Route::get("country/restore/{id}", [CountryController::class, "restore"])->name('admin.country.restore');
    Route::delete('/admin/country/{id}/force-delete', [CountryController::class, 'forceDelete'])
    ->name('admin.country.force.delete');

    Route::post("country/force_delete/{id}", [CountryController::class, "forceDelete"])->name('admin.city.force.delete');
    // end of country routes

    //     // city routes
    Route::prefix('admin/city')->as('admin.city.')->group(function () {

        Route::get("/add/{id}", [CityController::class, "add"])->name("add");
        Route::post("/store", [CityController::class, "store"])->name("store");
        Route::get("/restore", [CityController::class, "restorePage"])->name("restore.page");
        Route::get("/edit/{id}/", [CityController::class, "edit"])->name("edit");
        Route::post("/update/{id}/", [CityController::class, "update"])->name("update");
        Route::post("/delete/{id}/", [CityController::class, "delete"])->name("delete");
        Route::get("/restore/{id}", [CityController::class, "restore"])->name('restore');
        Route::post("/force_delete/{id}", [CityController::class, "forceDelete"])->name('force.delete');
    }); // end of ciry routes


    // Payment Method routes
    Route::prefix('payment-method')->as('payment.method.')->group(function () {
        Route::get("/", [PaymentMethodController::class, "index"])->name("index");
        Route::get("/add", [PaymentMethodController::class, "add"])->name("add");
        Route::post("/store", [PaymentMethodController::class, "store"])->name("store");
        Route::get("/restore", [PaymentMethodController::class, "restorePage"])->name("restore.page");
        Route::get("/edit/{id}/", [PaymentMethodController::class, "edit"])->name("edit");
        Route::post("/update/{id}/", [PaymentMethodController::class, "update"])->name("update");
        Route::post("/delete/{id}/", [PaymentMethodController::class, "delete"])->name("delete");
        Route::get("/restore/{id}", [PaymentMethodController::class, "restore"])->name('restore');
        Route::post("/force_delete/{id}", [PaymentMethodController::class, "forceDelete"])->name('force.delete');
    }); // end of  Payment Method routes routes

    //     // DOnation Sources routes
    Route::prefix('/admin.donation-source')->as('admin.donation-source.')->group(function () {
        Route::get("/", [DonationSourceController::class, "index"])->name("index");
        Route::get("/add", [DonationSourceController::class, "add"])->name("add");
        Route::post("/store", [DonationSourceController::class, "store"])->name("store");
        Route::get("/edit/{id}", [DonationSourceController::class, "edit"])->name("edit");
        Route::post("/update/{id}", [DonationSourceController::class, "update"])->name("update");
        Route::post("/delete/{id}", [DonationSourceController::class, "delete"])->name("delete");

        Route::get("/trash", [DonationSourceController::class, "trash"])->name("trash");
        Route::get("/restore/{id}", [DonationSourceController::class, "restore"])->name("restore");
        Route::post("/force_delete/{id}", [DonationSourceController::class, "forceDelete"])->name("force.delete");
    }); // end of  Donation Sources  routes

    //     // department routes
    Route::prefix('admin/department')->as('admin.department.')->group(function () {
        Route::get("/", [DepartmentController::class, "index"])->name("index");
        Route::get("/add", [DepartmentController::class, "add"])->name("add");
        Route::post("/store", [DepartmentController::class, "store"])->name("store");
        Route::get("/restore", [DepartmentController::class, "restorePage"])->name("restore.page");
        Route::get("/edit/{id}/", [DepartmentController::class, "edit"])->name("edit");
        Route::post("/update/{id}/", [DepartmentController::class, "update"])->name("update");
        Route::post("/delete/{id}/", [DepartmentController::class, "delete"])->name("delete");
        Route::post('/search', [DepartmentController::class, 'search'])->name('search');
        Route::get("/restore/{id}", [DepartmentController::class, "restore"])->name('restore');
        Route::post("/force_delete/{id}", [DepartmentController::class, "forceDelete"])->name('force.delete');
        Route::post('toggle-status/{id}', [DepartmentController::class, 'toggleStatus'])
            ->name('toggleStatus'); // admin.department.toggleStatus

    }); // end of department routes


    //     // booking routes
    Route::prefix('admin/booking')->as('admin.booking.')->group(function () {
        Route::get("/", [BookingController::class, "index"])->name("index");
        Route::get("/detail/{id}/", [BookingController::class, "detail"])->name("detail");
        Route::post("/delete/{id}/", [BookingController::class, "delete"])->name("delete");
        Route::post('/search', [BookingController::class, 'search'])->name('search');
        Route::get("/bookings/{slug}/", [BookingController::class, "eventWiseBookings"])->name("event-wise");

    }); // end of booking routes

    //     // project-category routes
    Route::prefix('admin/project-category')->as('admin.project-category.')->group(function () {
        Route::get("/", [ProjectCategoryController::class, "index"])->name("index");
        Route::get("/add", [ProjectCategoryController::class, "add"])->name("add");
        Route::post("/store", [ProjectCategoryController::class, "store"])->name("store");
        Route::get("/restore", [ProjectCategoryController::class, "restorePage"])->name("restore.page");
        Route::get("/edit/{id}/", [ProjectCategoryController::class, "edit"])->name("edit");
        Route::post("/update/{id}/", [ProjectCategoryController::class, "update"])->name("update");
        Route::post("/delete/{id}/", [ProjectCategoryController::class, "delete"])->name("delete");
        Route::get("/restore/{id}", [ProjectCategoryController::class, "restore"])->name('restore');
        Route::post("/force_delete/{id}", [ProjectCategoryController::class, "forceDelete"])->name('force.delete');
        Route::post('toggle-status/{id}', [ProjectCategoryController::class, 'toggleStatus'])
            ->name('toggleStatus');
    }); // end of project-category routes
    //     // referral-source routes
    Route::prefix('admin/referral-source')->as('admin.referralsource.')->group(function () {
        Route::get("/", [ReferralSourceController::class, "index"])->name("index");
        Route::get("/add", [ReferralSourceController::class, "add"])->name("add");
        Route::post("/store", [ReferralSourceController::class, "store"])->name("store");
        Route::get("/restore", [ReferralSourceController::class, "restorePage"])->name("restore.page");
        Route::get("/edit/{id}/", [ReferralSourceController::class, "edit"])->name("edit");
        Route::put("/update/{id}/", [ReferralSourceController::class, "update"])->name("update");
        Route::post("/delete/{id}/", [ReferralSourceController::class, "delete"])->name("delete");
        Route::get("/restore/{id}", [ReferralSourceController::class, "restore"])->name('restore');
        Route::post("/force_delete/{id}", [ReferralSourceController::class, "forceDelete"])->name('force.delete');
        Route::post('toggle-status/{id}', [ReferralSourceController::class, 'toggleStatus'])
            ->name('toggleStatus');
    }); // end of referral-source routes


    // project routes
    Route::prefix('admin/project')->as('admin.project.')->group(function () {
        Route::get("/", [ProjectController::class, "index"])->name("index");
        Route::get("/add", [ProjectController::class, "add"])->name("add");
        Route::post("/store", [ProjectController::class, "store"])->name("store");
        Route::get("/restore", [ProjectController::class, "restorePage"])->name("restore.page");
        Route::get("/edit/{id}/", [ProjectController::class, "edit"])->name("edit");
        Route::post("/update/{id}/", [ProjectController::class, "update"])->name("update");
        Route::post("/delete/{id}/", [ProjectController::class, "delete"])->name("delete");
        Route::post('/search', [ProjectController::class, 'search'])->name('search');
        Route::get("/restore/{id}", [ProjectController::class, "restore"])->name('restore');
        Route::post("/force_delete/{id}", [ProjectController::class, "forceDelete"])->name('force.delete');
        Route::post('toggle-status/{id}', [ProjectController::class, 'toggleStatus'])
            ->name('toggleStatus');
    }); // end of project routes

    // campaign routes
    Route::prefix('admin/campaign')->as('admin.campaign.')->group(function () {
        Route::get("/", [CampaignController::class, "index"])->name("index");
        Route::get("/add", [CampaignController::class, "add"])->name("add");
        Route::post("/store", [CampaignController::class, "store"])->name("store");
        Route::get("/restore", [CampaignController::class, "restorePage"])->name("restore.page");
        Route::get("/edit/{id}/", [CampaignController::class, "edit"])->name("edit");
        Route::post("/update/{id}/", [CampaignController::class, "update"])->name("update");
        Route::post("/delete/{id}/", [CampaignController::class, "delete"])->name("delete");
        Route::post('/search', [CampaignController::class, 'search'])->name('search');
        Route::get("/restore/{id}", [CampaignController::class, "restore"])->name('restore');
        Route::post("/force_delete/{id}", [CampaignController::class, "forceDelete"])->name('force.delete');
        //
        Route::post('/toggle-status/{id}', [CampaignController::class, 'toggleStatus'])
            ->name('toggleStatus');
    }); // end of campaign routes

    // donor routes
    Route::prefix('admin/donor')->as('admin.donor.')->group(function () {
        Route::get("/", [DonarController::class, "index"])->name("index");
        Route::get("/add", [DonarController::class, "add"])->name("add");
        Route::post("/store", [DonarController::class, "store"])->name("store");
        Route::get("/restore", [DonarController::class, "restorePage"])->name("restore.page");
        Route::get("/edit/{id}/", [DonarController::class, "edit"])->name("edit");
        Route::post("/update/{id}/", [DonarController::class, "update"])->name("update");

        Route::delete("/delete/{id}/", [DonarController::class, "delete"])->name("delete");
        Route::post('/search', [DonarController::class, 'search'])->name('search');

        Route::get('/get-cities', [DonarController::class, 'getCities'])->name('getCities');
        Route::get("/restore/{id}", [DonarController::class, "restore"])->name('restore');
        Route::post("/force_delete/{id}", [DonarController::class, "forceDelete"])->name('force.delete');
        Route::post("/import", [DonarController::class, "donarImport"])->name('import');
        Route::post("/send-email", [DonarController::class, "sendEmail"])->name('send-email');
        Route::post('/toggle-status/{id}', [DonarController::class, 'toggleStatus'])
            ->name('toggleStatus');
    }); // end of donor routes
    Route::prefix('admin/donation')->as('admin.donation.')->group(function () {
        Route::get("/", [DonationController::class, "index"])->name("index");
        Route::get("/add", [DonationController::class, "add"])->name("add");
        Route::post("/store", [DonationController::class, "store"])->name("store");
        Route::get("/edit/{id}", [DonationController::class, "edit"])->name("edit");
        Route::put("/update/{id}", [DonationController::class, "update"])->name("update");
        Route::post("/delete/{id}", [DonationController::class, "delete"])->name("delete");
        Route::post('/search', [DonationController::class, 'search'])->name('search');

        // Route::post("/store", [DonarController::class, "store"])->name("store");
        // Route::get("/restore", [DonarController::class, "restorePage"])->name("restore.page");
        // Route::get("/edit/{id}/", [DonarController::class, "edit"])->name("edit");
        // Route::post("/update/{id}/", [DonarController::class, "update"])->name("update");
        // Route::post("/delete/{id}/", [DonarController::class, "delete"])->name("delete");
        // Route::get('/get-cities', [DonarController::class, 'getCities'])->name('getCities');
        // Route::get("/restore/{id}", [DonarController::class, "restore"])->name('restore');
        // Route::post("/force_delete/{id}", [DonarController::class, "forceDelete"])->name('force.delete');
        Route::post("/import", [DonationController::class, "importDonations"])->name('import');
    });

    // start of Email Template Routes

    Route::prefix('admin/email-templates')->name('admin.email-templates.')->middleware(['auth'])->group(function () {
        Route::get('/', [EmailTemplateController::class, 'index'])->name('index');
        Route::get('/add', [EmailTemplateController::class, 'add'])->name('add');
        Route::post('/', [EmailTemplateController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [EmailTemplateController::class, 'edit'])->name('edit');
        Route::put('/{id}', [EmailTemplateController::class, 'update'])->name('update');
        Route::delete('/{id}', [EmailTemplateController::class, 'destroy'])->name('delete');
        Route::get('/{id}/detail', [EmailTemplateController::class, 'show'])->name('show');

        // Route::delete('/email-attachments/{id}', [EmailTemplateController::class, 'destroyAttachment'])->name('email-attachments.destroy');

        Route::post('/upload-attachment', [EmailTemplateController::class, 'uploadAttachment'])->name('upload.attachment');
    });




    Route::prefix('/admin/volunteer-type')->as('admin.volunteer-type.')->group(function () {
        Route::get("/", [VolunteerTypeController::class, "index"])->name("index");
        Route::get("/add", [VolunteerTypeController::class, "add"])->name("add");
        Route::post("/store", [VolunteerTypeController::class, "store"])->name("store");
        Route::get("/edit/{id}", [VolunteerTypeController::class, "edit"])->name("edit");
        Route::post("/update/{id}", [VolunteerTypeController::class, "update"])->name("update");
        Route::post("/delete/{id}", [VolunteerTypeController::class, "delete"])->name("delete");

        Route::get("/trash", [VolunteerTypeController::class, "trash"])->name("trash");
        Route::get("/restore/{id}", [VolunteerTypeController::class, "restore"])->name("restore");
        Route::post("/force_delete/{id}", [VolunteerTypeController::class, "forceDelete"])->name("force.delete");
    });





    Route::prefix('/admin/volunteer')->as('admin.volunteer.')->group(function () {
        Route::get("/", [VolunteerController::class, "index"])->name("index");
        Route::get("/add", [VolunteerController::class, "add"])->name("add");
        Route::post("/store", [VolunteerController::class, "store"])->name("store");
        Route::get("/edit/{id}", [VolunteerController::class, "edit"])->name("edit");
        Route::post("/update/{id}", [VolunteerController::class, "update"])->name("update");
        Route::post("/delete/{id}", [VolunteerController::class, "delete"])->name("delete");

        Route::get("/trash", [VolunteerController::class, "trash"])->name("trash");
        Route::get("/restore/{id}", [VolunteerController::class, "restore"])->name("restore");
        Route::post("/force_delete/{id}", [VolunteerController::class, "forceDelete"])->name("force.delete");
    });




    Route::resource('/donation-forms', DonationFormController::class);


});
