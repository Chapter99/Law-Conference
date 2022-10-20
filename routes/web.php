<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index']);
Route::get('publish',[App\Http\Controllers\FrontendController::class, 'publish']);
Route::get('timeline',[App\Http\Controllers\FrontendController::class, 'timeline']);
Route::get('contact',[App\Http\Controllers\FrontendController::class, 'contact']);
Route::get('download',[App\Http\Controllers\FrontendController::class, 'download']);
Route::get('venue',[App\Http\Controllers\FrontendController::class, 'venue']);
Route::get('presenttype',[App\Http\Controllers\FrontendController::class, 'presenttype']);
Route::get('list',[App\Http\Controllers\FrontendController::class, 'list']);
Route::get('payment',[App\Http\Controllers\FrontendController::class, 'payment']);
Route::get('submissionstep',[App\Http\Controllers\FrontendController::class, 'submissionstep']);
Route::get('prepare',[App\Http\Controllers\FrontendController::class, 'prepare']);
Route::get('hotel',[App\Http\Controllers\FrontendController::class, 'hotel']);
Route::get('touristattraction',[App\Http\Controllers\FrontendController::class, 'touristattraction']);
Route::get('question',[App\Http\Controllers\FrontendController::class, 'question']);
Route::get('invitedspeaker',[App\Http\Controllers\FrontendController::class, 'invitedspeaker']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('login/reviewer', [App\Http\Controllers\Auth\LoginController::class, 'showReviewerLoginForm']);
Route::post('login/reviewer', [App\Http\Controllers\Auth\LoginController::class, 'reviewerLogin']);

// *** USER ****/
Route::group([
    'prefix' => 'users',
    'middleware' => 'auth'

], function(){

    Route::get('home', [App\Http\Controllers\UserloginController::class, 'index'])->name('users.home');
    Route::resource('papers', App\Http\Controllers\PaperController::class);
    Route::resource('travel', App\Http\Controllers\TravelController::class);
    Route::get('tour',[App\Http\Controllers\UserloginController::class, 'tour'])->name('tour.index');;
    Route::get('tour/edit', [App\Http\Controllers\UserloginController::class, 'tour_edit'])->name('tour.edit');
    Route::put('tour/{id}', [App\Http\Controllers\UserloginController::class, 'tour_update'])->name('tour.update');
    Route::get('payment', [App\Http\Controllers\UserloginController::class, 'payment']);
    Route::get('profile', [App\Http\Controllers\UserloginController::class, 'profile'])->name('users.profile');
    Route::get('profile/edit', [App\Http\Controllers\UserloginController::class, 'profile_edit'])->name('profile.edit');
    Route::put('profile/{id}', [App\Http\Controllers\UserloginController::class, 'profile_update'])->name('profile.update');
    Route::post('payment', [App\Http\Controllers\UserloginController::class, 'payment_store'])->name('payment.store');
    Route::get('pdf_accepted/{id}', [App\Http\Controllers\UserloginController::class, 'pdf_accepted'])->name('users.pdf_accepted');
    Route::get('pdf_accepted_full/{id}', [App\Http\Controllers\UserloginController::class, 'pdf_accepted_full'])->name('users.pdf_accepted_full');
    Route::get('result_abs/{id}', [App\Http\Controllers\PaperController::class, 'result_abs'])->name('users.result_abs');
    Route::get('result_full/{id}', [App\Http\Controllers\PaperController::class, 'result_full'])->name('users.result_full');
    Route::get('result_poster/{id}', [App\Http\Controllers\PaperController::class, 'result_poster'])->name('users.result_poster');
    Route::post('confirm_present/{id}', [App\Http\Controllers\PaperController::class, 'confirm_present'])->name('users.confirm_present');
    Route::get('upload_paper/{id}', [App\Http\Controllers\PaperController::class, 'upload_paper'])->name('users.upload_paper');
    Route::put('upload_paper/{id}', [App\Http\Controllers\PaperController::class, 'upload_paper_update'])->name('users.upload_paper_update');
    Route::get('loadFullPaper',[App\Http\Controllers\PaperController::class, 'loadFullPaper'])->name('users.loadFullPaper');
    Route::get('loadAbstractPaper',[App\Http\Controllers\PaperController::class, 'loadAbstractPaper'])->name('users.loadFullPaper');
    Route::get('loadPoster',[App\Http\Controllers\PaperController::class, 'loadPoster'])->name('users.loadPoster');
    Route::get('selectPublish/{id}',[App\Http\Controllers\PaperController::class, 'selectPublish'])->name('users.selectPublish');
    Route::put('selectPublish/{id}',[App\Http\Controllers\PaperController::class, 'selectPublish_save'])->name('users.selectPublish');
    Route::get('payment_edit/{id}', [App\Http\Controllers\UserloginController::class, 'payment_edit'])->name('users.payment_edit');
    Route::post('payment_update', [App\Http\Controllers\UserloginController::class, 'payment_update'])->name('users.payment_update');
    Route::get('receiptData', [App\Http\Controllers\UserloginController::class, 'receiptData'])->name('users.receiptData');
    Route::post('receiptDataSave', [App\Http\Controllers\UserloginController::class, 'receiptDataSave'])->name('users.receiptDataSave');
});

// *** Admin ****/
Route::group([
    'prefix' => 'backend',
    'middleware' => 'admin'
], function(){

    Route::get('home', [App\Http\Controllers\BackendController::class, 'home']);
    Route::get('presentlist', [App\Http\Controllers\BackendController::class, 'presentlist']);
    Route::get('participantlist', [App\Http\Controllers\BackendController::class, 'participantlist']);
    Route::get('userprofile/{id}', [App\Http\Controllers\BackendController::class, 'userprofile'])->name('backend.userprofile');
    Route::get('paperlist',[App\Http\Controllers\BackendController::class, 'paperlist'])->name('backend.paperlist');
    Route::get('paperdetail/{id}', [App\Http\Controllers\BackendController::class, 'paperdetail'])->name('backend.paperdetail');
    Route::get('resultabs/{id}', [App\Http\Controllers\BackendController::class, 'resultabs'])->name('backend.resultabs');
    Route::get('resultfull/{id}', [App\Http\Controllers\BackendController::class, 'resultfull'])->name('backend.resultfull');
    Route::get('resultposter/{id}', [App\Http\Controllers\BackendController::class, 'resultposter'])->name('backend.resultposter');
    Route::get('paymentlist',[App\Http\Controllers\BackendController::class, 'paymentlist'])->name('backend.paymentlist');
    Route::post('resultabs_save/{id}',[App\Http\Controllers\BackendController::class, 'resultabs_save'])->name('backend.resultabs_save');
    Route::post('resultfull_save/{id}',[App\Http\Controllers\BackendController::class, 'resultfull_save'])->name('backend.resultfull_save');
    Route::post('resultposter_save/{id}',[App\Http\Controllers\BackendController::class, 'resultposter_save'])->name('backend.resultposter_save');
    Route::get('pay/{id}', [App\Http\Controllers\BackendController::class, 'pay'])->name('backend.pay');
    Route::post('pay_save', [App\Http\Controllers\BackendController::class, 'pay_save'])->name('backend.pay_save');
    Route::resource('reviewers',  App\Http\Controllers\ReviewerController::class);
    Route::get('review_abstract/{id}',[App\Http\Controllers\ReviewerController::class, 'review_abstract'])->name('reviewers.review_abstract');
    Route::get('review_full/{id}',[App\Http\Controllers\ReviewerController::class, 'review_full'])->name('reviewers.review_full');
    Route::get('review_poster/{id}',[App\Http\Controllers\ReviewerController::class, 'review_poster'])->name('reviewers.review_poster');
    Route::post('review_abstract_save', [App\Http\Controllers\ReviewerController::class, 'review_abstract_save'])->name('reviewers.review_abstract_save');
    Route::post('review_full_save', [App\Http\Controllers\ReviewerController::class, 'review_full_save'])->name('reviewers.review_full_save');
    Route::post('review_poster_save', [App\Http\Controllers\ReviewerController::class, 'review_poster_save'])->name('reviewers.review_poster_save');
    Route::get('email_reviewer/{id}',[App\Http\Controllers\ReviewerController::class, 'email_reviewer'])->name('reviewers.email_reviewer');
    Route::get('addPayment/{id}', [App\Http\Controllers\BackendController::class, 'addPayment'])->name('backend.addPayment');
    Route::post('addPaymentSave', [App\Http\Controllers\BackendController::class, 'addPaymentSave'])->name('backend.addPaymentSave');
    Route::get('receiptName', [App\Http\Controllers\BackendController::class, 'receiptName'])->name('backend.receiptName');
    Route::get('hasPoster/{id}/{poster}', [App\Http\Controllers\BackendController::class, 'hasPoster'])->name('backend.hasPoster');
    Route::get('emailList', [App\Http\Controllers\BackendController::class, 'emailList']);
});

// *** Reviewer ****/
Route::group([
    'prefix' => 'reviewers',
    'middleware' => 'auth:reviewer'
], function () {
    Route::get('/', [App\Http\Controllers\ReviewerLoginController::class, 'index'])->name('reviewerlogin');
    Route::get('/abstract', [App\Http\Controllers\ReviewerLoginController::class, 'abstract'])->name('reviewerlogin.abstract');
    Route::get('/review_abs/{id}', [App\Http\Controllers\ReviewerLoginController::class, 'review_abs'])->name('reviewerlogin.review_abs');
    Route::put('/review_abs/{id}', [App\Http\Controllers\ReviewerLoginController::class, 'review_abs_save'])->name('reviewerlogin.review_abs_save');
    Route::get('/review_full/{id}', [App\Http\Controllers\ReviewerLoginController::class, 'review_full'])->name('reviewerlogin.review_full');
    Route::put('/review_full/{id}', [App\Http\Controllers\ReviewerLoginController::class, 'review_full_save'])->name('reviewerlogin.review_full_save');
    Route::get('/review_poster/{id}', [App\Http\Controllers\ReviewerLoginController::class, 'review_poster'])->name('reviewerlogin.review_poster');
    Route::put('/review_poster/{id}', [App\Http\Controllers\ReviewerLoginController::class, 'review_poster_save'])->name('reviewerlogin.review_poster_save');
    Route::get('/accept_evaluate/{id}', [App\Http\Controllers\ReviewerLoginController::class, 'accept_evaluate'])->name('reviewerlogin.accept_evaluate');
    Route::put('/accept_evaluate_save/{id}', [App\Http\Controllers\ReviewerLoginController::class, 'accept_evaluate_save'])->name('reviewerlogin.accept_evaluate_save');
    Route::get('/pdf_abs', [App\Http\Controllers\ReviewerLoginController::class, 'pdf_abs'])->name('reviewerlogin.pdf_abs');
    Route::get('/pdf_full', [App\Http\Controllers\ReviewerLoginController::class, 'pdf_full'])->name('reviewerlogin.pdf_full');
    Route::get('/view_pwd', [App\Http\Controllers\ReviewerLoginController::class, 'view_pwd'])->name('reviewerlogin.view_pwd');
    Route::post('/change_pwd', [App\Http\Controllers\ReviewerLoginController::class, 'change_pwd'])->name('reviewerlogin.change_pwd');
});


