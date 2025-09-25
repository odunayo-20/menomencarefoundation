<?php

use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Admin\Auth\AdminForget;
use App\Livewire\Admin\Auth\AdminLogin;
use App\Livewire\Admin\Auth\AdminReset;
use App\Livewire\Admin\Contact\AdminContact;
use App\Livewire\Admin\Contact\AdminContactView;
use App\Livewire\Admin\Donate\AdminDonate;
use App\Livewire\Admin\Donate\AdminDonateView;
use App\Livewire\Admin\Event\AdminEvent;
use App\Livewire\Admin\Event\AdminEventCreate;
use App\Livewire\Admin\Event\AdminEventEdit;
use App\Livewire\Admin\Event\AdminEventUpload;
use App\Livewire\Admin\Event\AdminEventView;
use App\Livewire\Admin\Gallery\GalleryCreate;
use App\Livewire\Admin\Gallery\GalleryList;
use App\Livewire\Admin\Membership\AdminMembership;
use App\Livewire\Admin\Membership\AdminMembershipCreate;
use App\Livewire\Admin\Membership\AdminMembershipEdit;
use App\Livewire\Admin\Membership\AdminMembershipView;
use App\Livewire\Admin\Newsletter\AdminNewsletter;
use App\Livewire\Admin\Profile\AdminChangePassword;
use App\Livewire\Admin\Profile\AdminProfile;
use App\Livewire\Admin\Report\AdminReport;
use App\Livewire\Admin\Report\AdminReportCreate;
use App\Livewire\Admin\Report\AdminReportEdit;
use App\Livewire\Admin\Testimonial\AdminTestimonial;
use App\Livewire\Admin\Testimonial\AdminTestimonialCreate;
use App\Livewire\Admin\Testimonial\AdminTestimonialEdit;
use App\Livewire\Admin\Volunteer\AdminVolunteer;
use App\Livewire\Admin\Volunteer\AdminVolunteerCreate;
use App\Livewire\Admin\Volunteer\AdminVolunteerEdit;
use App\Livewire\Admin\Volunteer\AdminVolunteerView;
use App\Livewire\Admin\Team\AdminTeam;
use App\Livewire\Admin\Team\AdminTeamCreate;
use App\Livewire\Admin\Team\AdminTeamEdit;
use App\Livewire\Frontend\About;
use App\Livewire\Frontend\Contact;
use App\Livewire\Frontend\Donate;
use App\Livewire\Frontend\Event\FrontEvent;
use App\Livewire\Frontend\Event\FrontEventView;
use App\Livewire\Frontend\FrontGallery;
use App\Livewire\Frontend\FrontMemberships;
use App\Livewire\Frontend\FrontReports;
use App\Livewire\Frontend\FrontVolunteer;
use App\Livewire\Frontend\Index;
use App\Livewire\Frontend\Service;
use App\Livewire\Frontend\Team;
use App\Livewire\Frontend\Testimonial;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('guest')->prefix('/')->group(function () {

    Route::get('/', Index::class)->name('index');
    Route::get('about', About::class)->name('about');
    Route::get('service', Service::class)->name('service');
    Route::get('testimonial', Testimonial::class)->name('testimonial');
    Route::get('contact', Contact::class)->name('contact');
    Route::get('team', Team::class)->name('team');
    Route::get('donate', Donate::class)->name('donate');
    Route::get('stripe/create', Donate::class)->name('stripe_create');
    Route::get('stripe/success', [Donate::class, 'success'])->name('stripe_success');
    Route::get('stripe/cancel', [Donate::class, 'cancel'])->name('stripe_cancel');
    Route::get('paypal/success', [Donate::class, 'done'])->name('paypal_done');
    Route::get('paypal/cancel', [Donate::class, 'error'])->name('paypal_cancel');
    Route::get('events', FrontEvent::class)->name('event_front');
    Route::get('events/view/{event}', FrontEventView::class)->name('event_view');
    Route::get('gallery', FrontGallery::class)->name('gallery');
    Route::get('report', FrontReports::class)->name('report');
    Route::get('volunteers', FrontVolunteer::class)->name('volunteers');
    Route::get('memberships', FrontMemberships::class)->name('memberships');
    Route::get('bible-quote', \App\Livewire\Frontend\BibleQuote\Index::class)->name('bible_quote');
    Route::get('bible-quote/{quote}', \App\Livewire\Frontend\BibleQuote\View::class)->name('bible-quote.single');

    Route::get('medical-advice', \App\Livewire\Frontend\MedicalAdvice\Index::class)->name('medical_advice');
    Route::get('medical-advice/{advice}', \App\Livewire\Frontend\MedicalAdvice\View::class)->name('medical_advice.single');

});

Route::middleware('guest')->group(function () {

    Route::get('admin/login', AdminLogin::class)->name('admin_login');
    Route::get('admin/forget', AdminForget::class)->name('admin_forget');
    Route::get('admin/reset/password/{token}/{email}', AdminReset::class)->name('admin_reset');
});

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', AdminDashboard::class)->name('admin_dashboard');
    Route::get('/event', AdminEvent::class)->name('admin_event');
    Route::get('/event/create', AdminEventCreate::class)->name('admin_event_create');
    Route::get('/event/edit/{event}', AdminEventEdit::class)->name('admin_event_edit');
    Route::get('/event/view/{event}', AdminEventView::class)->name('admin_event_view');
    Route::get('/event/upload', AdminEventUpload::class)->name('admin_event_upload');
    Route::get('/testimonial', AdminTestimonial::class)->name('admin_testimonial');
    Route::get('/testimonial/create', AdminTestimonialCreate::class)->name('admin_testimonial_create');
    Route::get('/testimonial/edit/{testimonial}', AdminTestimonialEdit::class)->name('admin_testimonial_edit');
    Route::get('/contact', AdminContact::class)->name('admin_contact');
    Route::get('/contact/view/{contact}', AdminContactView::class)->name('admin_contact_view');
    Route::get('/profile', AdminProfile::class)->name('admin_profile');
    Route::get('/change/password', AdminChangePassword::class)->name('admin_change_password');
    Route::get('/donate', AdminDonate::class)->name('admin_donate');
    Route::get('/donate/view/{donate}', AdminDonateView::class)->name('admin_donate_view');
    Route::get('/gallery', GalleryList::class)->name('admin_gallery');
    Route::get('/gallery/list', GalleryCreate::class)->name('admin_gallery_create');
    Route::get('/report', AdminReport::class)->name('admin_report');
    Route::get('/report/create', AdminReportCreate::class)->name('admin_report_create');
    Route::get('/report/edit/{report}', AdminReportEdit::class)->name('admin_report_edit');
    Route::get('/membership', AdminMembership::class)->name('admin_membership');
    Route::get('/membership/create', AdminMembershipCreate::class)->name('admin_membership_create');
    Route::get('/membership/edit/{membership}', AdminMembershipEdit::class)->name('admin_membership_edit');
    Route::get('/membership/view/{membership}', AdminMembershipView::class)->name('admin_membership_view');
    Route::get('/volunteer', AdminVolunteer::class)->name('admin_volunteer');
    Route::get('/volunteer/create', AdminVolunteerCreate::class)->name('admin_volunteer_create');
    Route::get('/volunteer/edit/{volunteer}', AdminVolunteerEdit::class)->name('admin_volunteer_edit');
    Route::get('/volunteer/view/{volunteer}', AdminVolunteerView::class)->name('admin_volunteer_view');
    Route::get('/newsletter', AdminNewsletter::class)->name('admin_newsletter');
    Route::get('/team', AdminTeam::class)->name('admin_team');
    Route::get('/team/create', AdminTeamCreate::class)->name('admin_team_create');
    Route::get('/team/edit/{team}', AdminTeamEdit::class)->name('admin_team_edit');


    Route::get('/bible-quote', \App\Livewire\Admin\BibleQuote\Index::class)->name('admin_bible_quote');
    Route::get('/bible-quote/create', \App\Livewire\Admin\BibleQuote\Create::class)->name('admin_bible_quote_create');
    Route::get('/bible-quote/edit/{quote}', \App\Livewire\Admin\BibleQuote\Edit::class)->name('admin_bible_quote_edit');

    Route::get('/medical-advice', \App\Livewire\Admin\MedicalAdvice\Index::class)->name('admin_medical_advice');
    Route::get('/medical-advice/create', \App\Livewire\Admin\MedicalAdvice\Create::class)->name('admin_medical_create');
    Route::get('/medical-advice/edit/{advice}', \App\Livewire\Admin\MedicalAdvice\Edit::class)->name('admin_medical_edit');

});
