<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingController as ControllersBookingController;
use App\Http\Controllers\CarrerController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialSettingsController;
use App\Http\Controllers\SiteSettingsController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\StepController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WhyUsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CompanyDocumentController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\frontend\BookingController;
use App\Http\Controllers\ManpowerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\TrustController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceSubCategoryController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DemandController;
use App\Http\Controllers\DemandDocumentController;
use App\Http\Controllers\InCaseGrievanceController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\StrengthController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\BreadCrumbController;
use App\Http\Controllers\GradeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('clear', function () {
	Artisan::call('cache:clear');
	Artisan::call('config:clear');
	Artisan::call('config:cache');
});

//admin dashboard routes
Route::group(['prefix' => 'dashboard',  'middleware' => 'auth'], function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    //site settings
    Route::get('/settings',[SettingController::class,'index'])->name('settings.index');
    Route::patch('/general-setting/{id}', [SettingController::class, 'general_setting_update'])->name('general.update');
    Route::patch('/contact-info/{id}', [SettingController::class, 'contact_info_store'])->name('contact.update');
    Route::post('/social-media',[SettingController::class,'social_media_store'])->name('social.store');
    Route::post('/social-media/edit',[SettingController::class,'edit_social_store'])->name('social.edit');
    Route::post('/social-media/update',[SettingController::class,'social_media_update'])->name('social.update');
    Route::get('/social-media/{id}',[SettingController::class,'delete_social'])->name('delete.social');
    Route::patch('/breadcrumb/{id}',[SettingController::class,'breadcrumb_image'])->name('breadcrumb_image');


    //profile settings
    Route::get('/profile',[ProfileController::class,'edit_profile'])->name('profile.edit');
    Route::post('/profile',[ProfileController::class,'update_profile'])->name('profile.update');
    Route::post('/profile/change_password',[ProfileController::class,'updatePassword'])->name('profile.update_password');

    //user, roles and permissions
    Route::resource('/roles', RoleController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/permissions', PermissionController::class);

    Route::get('/social_settings', [SocialSettingsController::class, 'index'])->name('social');
    // Route::post('/social_settings', [SocialSettingsController::class, 'store'])->name('socialStore');
    Route::patch('/social_settings/edit/{id}', [SocialSettingsController::class, 'update'])->name('socialUpdate');
    // Route::resource('/settings', SiteSettingsController::class);

    //Grade
    Route::resource('grades',GradeController::class);

    Route::get('/blogs/update-status',[BlogController::class,'update_status'])->name('blog.update_status');
    Route::get('/category/update-featured',[ServiceCategoryController::class,'featured_status'])->name('category.featured_status');
    Route::post('/city/get_city_by_district',[CityController::class,'get_city_by_district'])->name('city.get_city_by_district');


    Route::post('/subcat/get_subcat_by_category',[SubcategoryController::class,'sub_cat_by_category'])->name('subcat.get_subcat_by_category');
    Route::post('/manpower/get_manpower_by_subcategory',[ManpowerController::class,'manpower_by_subcategory'])->name('manpower.get_manpower_by_subcategory');
    Route::post('/manpower/get_manpower_by_category',[ManpowerController::class,'manpower_by_category'])->name('manpower.get_manpower_by_category');
    // Route::post('/number/get_number_by_customer',[TaskController::class,'get_number_by_customer'])->name('customer.get_number_by_customer');
    Route::post('/customer/get_details_by_customer',[TaskController::class,'get_number_by_customer'])->name('customer.get_number_by_customer');

    Route::get('/customers-order/cost-details/{id}',[TaskController::class,'add_extra_cost'])->name('customers-order.add-cost');
    Route::post('/customers-order/cost-details/{id}',[TaskController::class,'store_extra_cost'])->name('add-cost.store');

    Route::post('/customers-order/assign-manpower/',[TaskController::class,'assign_manpower_modal'])->name('order.assign');
    Route::patch('/customers-order/assign-manpower/{id}',[TaskController::class,'assign_manpower'])->name('assign.manpower');

    Route::patch('/customers-order/change-status/{id}',[TaskController::class,'change_status'])->name('order.status');
    Route::get('/trust&security/create',[TrustController::class,'create'])->name('trustsecurity.create');
    Route::get('/trust&security/{id}',[TrustController::class,'edit'])->name('trustsecurity.edit');
    Route::delete('/trust&security/{id}',[TrustController::class,'destroy'])->name('trustsecurity.delete');
    Route::patch('/trust&security/{id}',[TrustController::class,'update'])->name('trustsecurity.update');

    Route::get('/manpower/payment',[ManpowerController::class,'index'])->name('manpower_payment.index');
    Route::post('/manpower/payment/',[ManpowerController::class,'payment_edit'])->name('manpower_payment.edit');
    Route::patch('/manpower/payment/{id}',[ManpowerController::class,'payment_update'])->name('manpower_payment.update');
    Route::get('/manpower/payment-history/{id}',[ManpowerController::class,'payment_history'])->name('payment.history');
    Route::get('/customer/payment-history/{id}',[CustomerController::class,'payment_history'])->name('customer.payment.history');
    Route::get('/customers-order/pending-orders',[TaskController::class,'index'])->name('customers-order.pending');
    Route::get('/customers-order/assigned-orders',[TaskController::class,'index'])->name('customers-order.assigned');
    Route::get('/customers-order/inprogress-orders',[TaskController::class,'index'])->name('customers-order.progress');
    Route::get('/customers-order/completed-orders',[TaskController::class,'index'])->name('customers-order.completed');
    Route::post('/get_servicesubcat_by_category',[ServiceSubCategoryController::class,'sub_cat_by_category'])->name('subcat.get_servicesubcat_by_category');
    //Organization Chart
    Route::get('/organization-chart',[AboutController::class,'edit_organization_chart'])->name('organization.chart.edit');
    Route::patch('/organization-chart/{id}', [AboutController::class, 'update_organization_chart'])->name('organization.chart.update');
    //Message From Chairman
    Route::get('/message-from-chairman',[AboutController::class,'message_chairman'])->name('message.chairman');
    Route::patch('/message-from-chairman/{id}',[AboutController::class,'update_message_chairman'])->name('message.chairman.update');
    //Mission & Vision
    Route::get('/message-vision',[AboutController::class,'mission_vision'])->name('mission.vision');
    Route::patch('/message-vision/{id}',[AboutController::class,'update_mission_vision'])->name('mission.vision.update');
    //About
    Route::resource('/about',AboutController::class);
    Route::resource('/company-document',CompanyDocumentController::class);
    Route::resource('/demand-document',DemandDocumentController::class);
    Route::resource('/policy',PolicyController::class);
    Route::resource('/in-case-of-grievance',InCaseGrievanceController::class);




    Route::resource('/trust&security', TrustController::class);
    //client section
    Route::get('/client-section',[ClientController::class,'client_section'])->name('client.section');
    Route::post('/client-section/{id}',[ClientController::class,'client_section_update'])->name('client.section.update');
    Route::resource('/enquiry',EnquiryController::class);
    Route::resource('/client',ClientController::class);
    Route::resource('/counter',CounterController::class);
    Route::resource('/training',TrainingController::class);
    Route::resource('/why-us',WhyUsController::class);
    Route::resource('/services',ServiceController::class);

    Route::resource('/bookings',ControllersBookingController::class);
    Route::resource('/manpowers',ManpowerController::class);
    Route::resource('/customers',CustomerController::class);
    Route::resource('/customers-order',TaskController::class);
    Route::resource('/testimonials', TestimonialController::class);
    Route::resource('/category', ServiceCategoryController::class);
    Route::resource('/subcategory', ServiceSubCategoryController::class);



    Route::resource('/countries',CountryController::class);
    Route::resource('/awards',AwardController::class);


    Route::resource('/districts',DistrictController::class);
    Route::resource('/city',CityController::class);
    Route::resource('/payment',PaymentController::class);



    Route::get('/sliders/update-status',[SliderController::class,'update_status'])->name('slider.update_status');

    Route::post('ckeditor/upload', [CkeditorController::class,'upload'])->name('ckeditor.upload');
    Route::resource('/blogs',BlogController::class);



    Route::resource('/teams', TeamController::class);

    Route::resource('/banners', BannerController::class);
    Route::resource('/sliders', SliderController::class);
    Route::get('/hiring-image',[StepController::class,'process_image'])->name('steps.process_image');
    Route::post('/hiring-image/{id}', [StepController::class, 'update_process_image'])->name('update.process_image');
    Route::resource('/steps', StepController::class);

	Route::resource('/pages', PageController::class);

    Route::get('gallery/photo',[GalleryController::class,'index'])->name('photo.index');
    Route::get('gallery/add-photo',[GalleryController::class,'create'])->name('photo.create');
    Route::post('/gallery/photo',[GalleryController::class,'upload_photo'])->name('upload_photo');
    Route::delete('/photo/destroy/{id}', [GalleryController::class,'delete_photo'])->name('delete.photo');
	Route::resource('/opportunity', OpportunityController::class);
	Route::resource('/demand', DemandController::class);


    Route::resource('/categories', CategoryController::class);
    Route::resource('/subcategories', SubcategoryController::class);

    Route::get('/contact', [MessageController::class,'index'])->name('messages.index');
	Route::get('/contact/{id}', [MessageController::class,'show'])->name('messages.show');
	Route::delete('/contact/{id}', [MessageController::class,'delete'])->name('messages.destroy');

    Route::get('/callbacks', [MessageController::class,'callbacks'])->name('callbacks.index');
    Route::get('/callback/{id}', [MessageController::class,'callbacks_show'])->name('callback.show');
	Route::delete('/callback/{id}', [MessageController::class,'callback_delete'])->name('callback.destroy');

    Route::resource('/career',CarrerController::class);
    Route::resource('/strength',StrengthController::class);
    Route::resource('/faq',FaqController::class);
    Route::resource('/breadcrumb-image',BreadCrumbController::class);

});


Route::get('/auth/github/redirect',[SocialController::class,'githubRedirect'])->name('githubLogin');
Route::get('/auth/github/callback',[SocialController::class,'callback']);

require __DIR__ . '/auth.php';

//frontend routes
Route::get('/',[FrontendController::class,'index'])->name('home');
Route::get('/about',[FrontendController::class,'about'])->name('about');
Route::get('/awards',[FrontendController::class,'awards'])->name('awards');
Route::get('/mission-vision',[FrontendController::class,'mission_vision'])->name('mission-vision');
Route::get('/chairman-message',[FrontendController::class,'chairman_message'])->name('chairman-message');
Route::get('/organization-chart',[FrontendController::class,'organization_chart'])->name('organization-chart');
Route::get('/company-documents',[FrontendController::class,'company_documents'])->name('company-documents');
Route::get('/demand-documents',[FrontendController::class,'demand_documents'])->name('demand-documents');

Route::get('/countries',[FrontendController::class,'countries'])->name('countries');

Route::get('/blogs',[FrontendController::class,'blog'])->name('blogs');
Route::get('/blogs/{slug}',[FrontendController::class,'blog_detail'])->name('blog.detail');
Route::get('/teams',[FrontendController::class,'teams'])->name('teams');
Route::get('/team/{id}',[FrontendController::class,'team_detail'])->name('team.detail');
Route::get('/contact',[FrontendController::class,'contact'])->name('contact');
Route::get('/gallery',[FrontendController::class,'photo_gallery'])->name('photos');
Route::get('/career',[FrontendController::class,'career'])->name('carrer');

Route::get('/categories',[FrontendController::class,'serviceCategory'])->name('category');
Route::get('/services/{slug}',[FrontendController::class,'services'])->name('services');
Route::get('/service/{slug}',[FrontendController::class,'service_detail'])->name('service.detail');
Route::get('/service',[FrontendController::class,'search'])->name('search');

Route::get('/portfolio',[FrontendController::class,'portfolio'])->name('portfolio');
Route::get('/training/{slug}',[FrontendController::class,'training_detail'])->name('single-training');
Route::get('/training',[FrontendController::class,'training'])->name('training');
Route::get('/payment',[FrontendController::class,'payment'])->name('payment');

Route::post('/contact-us',[FrontendController::class,'contact_us'])->name('contact_us');
Route::post('/callback',[FrontendController::class,'callback'])->name('callback');
Route::get('/policy/{policy}',[FrontendController::class,'policy'])->name('policy');
Route::get('/our-strength',[FrontendController::class,'our_strength'])->name('strength');
Route::get('/our-strength/{strength}',[FrontendController::class,'strength_detail'])->name('strength.detail');
Route::get('/calendar',[FrontendController::class,'calendar'])->name('calendar');
Route::get('/apply-demands/{current}',[FrontendController::class,'apply_demands'])->name('apply-demands');
Route::get('/current-demands',[FrontendController::class,'current_demands'])->name('current-demands');
Route::get('/hiring-process',[FrontendController::class,'hiring_process'])->name('hiring-process');


Route::get('/{slug}',[PageController::class,'show_custom_page'])->name('custom_page');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/book-now',[BookingController::class,'store'])->name('book_now');
});
