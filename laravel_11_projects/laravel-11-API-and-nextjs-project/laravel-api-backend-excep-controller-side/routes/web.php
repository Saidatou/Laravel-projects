<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\SliderController; 
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\GatewayController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\AboutPageController;

Route::get('/', function () {
    return view('welcome');
});
 
Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

 Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

  Route::post('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

 Route::get('/verify', [AdminController::class, 'ShowVerification'])->name('custom.verification.form');

  Route::post('/verify', [AdminController::class, 'VerificationVerify'])->name('custom.verification.verify');



Route::middleware('auth')->group(function () {

 Route::get('/admin/profile', [ProfileController::class, 'AdminProfile'])->name('admin.profile');
  Route::post('/profile/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');

  Route::post('/user/password/update', [ProfileController::class, 'PasswordUpdate'])->name('user.password.update');
  
}); 

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {

 Route::controller(SliderController::class)->group(function(){
 	Route::get('/all/slider', 'AllSlider')->name('all.slider'); 
 	Route::get('/add/slider', 'AddSlider')->name('add.slider');
 	Route::post('/store/slider', 'StoreSlider')->name('store.slider');
 	Route::get('/edit/slider/{id}', 'EditSlider')->name('edit.slider');
 	Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
 	Route::get('/delete/slider/{id}', 'DeleteSlider')->name('delete.slider');

 });

  Route::controller(ServiceController::class)->group(function(){
 	Route::get('/all/service', 'AllService')->name('all.service'); 
 	Route::get('/add/service', 'AddService')->name('add.service');
 	Route::post('/store/service', 'StoreService')->name('store.service');
 	Route::get('/edit/service/{id}', 'EditService')->name('edit.service');
 	Route::post('/update/service', 'UpdateService')->name('update.service');
 	Route::get('/delete/service/{id}', 'DeleteService')->name('delete.service');

 });

    Route::controller(GatewayController::class)->group(function(){

 	Route::get('/gateway/one', 'GetWayOne')->name('gateway.one');
 	Route::post('/update/gateway/one', 'UpdateGetWayOne')->name('update.gateway.one'); 

 	Route::get('/gateway/two', 'GetWayTwo')->name('gateway.two');
 	Route::post('/update/gateway/two', 'UpdateGetWayTwo')->name('update.gateway.two');

 });


    Route::controller(TestimonialController::class)->group(function(){
 	Route::get('/all/testimonial', 'AllTestimonial')->name('all.testimonial'); 
 	Route::get('/add/testimonial', 'AddTestimonial')->name('add.testimonial');
 	Route::post('/store/testimonial', 'StoreTestimonial')->name('store.testimonial');
 	Route::get('/edit/testimonial/{id}', 'EditTestimonial')->name('edit.testimonial');
 	Route::post('/update/testimonial', 'UpdateTestimonial')->name('update.testimonial');
 	Route::get('/delete/testimonial/{id}', 'DeleteTestimonial')->name('delete.testimonial');

 });


 Route::controller(BlogController::class)->group(function(){
 	Route::get('/blog/category', 'BlogCategory')->name('blog.category'); 
 	Route::post('/blog/category/store', 'BlogCategoryStore')->name('blog.category.store');

 	Route::get('/edit/blog/category/{id}', 'EditBlogCategory');
 	Route::post('/blog/category/update', 'BlogCategoryUpdate')->name('blog.category.update');
 	Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category'); 

 });


 Route::controller(BlogController::class)->group(function(){
 	Route::get('/all/blog/post', 'AllBlogPost')->name('all.blog.post'); 
 	Route::get('/add/blog/post', 'AddBlogPost')->name('add.blog.post');
 	Route::post('/store/blog/post', 'StoreBlogPost')->name('store.blog.post');
 	Route::get('/edit/blog/post/{id}', 'EditBlogPost')->name('edit.blog.post');
 	Route::post('/update/blog/post', 'UpdateBlogPost')->name('update.blog.post');
 	Route::get('/delete/blog/post/{id}', 'DeleteBlogPost')->name('delete.blog.post');

 });

   Route::controller(SettingController::class)->group(function(){

 	Route::get('/site/setting', 'SiteSetting')->name('site.setting');
 	Route::post('/update/site/setting', 'UpdateSiteSetting')->name('update.site.setting');  
 });

     Route::controller(AboutPageController::class)->group(function(){

 	Route::get('/about/page', 'AboutPage')->name('about.page');
 	Route::post('/update/aboutus', 'UpdateAboutPage')->name('update.aboutus');

 	Route::get('/contact/message', 'ContactMessage')->name('contact.message');  
 });




  
});
