<?php

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


Route::get('/create-password', ['as' => 'create-password', 'uses' => 'Employer\CreatePasswordController@checkStatusToken']);
Route::post('/create-password', ['as' => 'create-password', 'uses' => 'Employer\CreatePasswordController@changPasswordEmployer']);

Route::get('/change-password', 'Employer\CreatePasswordController@getChangePassword');
Route::post('/change-password', 'Employer\CreatePasswordController@postChangePassword');

Route::get('/login', 'AuthEmployer\AuthEmployerController@getLogin')->name('getLogin');
Route::post('/login', 'AuthEmployer\AuthEmployerController@postLogin')->name('postLogin');
Route::get('/logout', 'AuthEmployer\AuthEmployerController@logout')->name('logout');
Route::group(['middleware' => 'authSamacomUser'], function () {

    Route::post('/product/send-request', ['as' => 'send-request', 'uses' => 'ProductPackage\ProductPackageController@sendRequestBuyPacket']);
    Route::get('/product-of-package/{id}', ['as' => 'product-of-package', 'uses' => 'ProductPackage\ProductPackageController@listPackageOfGroupPackage']);
    Route::get('/list-cv', ['as' => 'danh-sach-ung-vien', 'uses' => 'Candidate\CandidateController@getListCv']);
    Route::get('/list-cv-apply-job', ['as' => 'list-cv-apply-job', 'uses' => 'Candidate\CandidateController@getListCvApplyJob']);
    Route::get('/cv-apply-job/{id}', ['as' => 'cv-apply-job', 'uses' => 'Candidate\CandidateController@getDetailCvApplyJob']);
    Route::get('/list-cv/detail-cv/{id}', ['as' => 'chi-tiet-ung-vien', 'uses' => 'Candidate\CandidateController@getDetailCv']);
    Route::post('/like-cv', ['as' => 'click-like', 'uses' => 'LikeCv\LikeCvController@likeCv']);
    Route::post('/like-cv-detail', ['as' => 'click-like-detail', 'uses' => 'LikeCv\LikeCvController@likeCvDetail']);
    Route::post('/click-view-cv', ['as' => 'click-view-cv', 'uses' => 'ViewCv\ViewCvController@viewCv']);
    Route::post('/click-open-contact', ['as' => 'open-contact', 'uses' => 'Contact\OpenContactController@insertViewContact']);
    Route::get('/list-package', ['as' => 'list-package', 'uses' => 'ProductPackage\ProductPackageController@listGroupPackage']);
    Route::get('/detail-package/{id}', ['as' => 'detail-package', 'uses' => 'ProductPackage\ProductPackageController@getDetailPackage']);

    // ajx
    Route::get('/district/list-by-city', ['as' => 'district.list_by_city', 'uses' => 'Candidate\CandidateController@getListDistrictByCity']);
});
//forgot-password

Route::get('/forgot-password',['as'=>'forgot-password','uses'=>'AuthEmployer\ForgotPasswordController@index']);
Route::post('/post-forgot-password',['as'=>'post-forgot-password','uses'=>'AuthEmployer\ForgotPasswordController@checkEmailEmployer']);


Route::get('/dieu-khoan-chinh-sach', function () {
    return view('policy.policy');
});
Route::get('/test', function () {
    return view('AuthEmployer.changePassword');
});
Route::get('/', function(){
    return view('landing-page.landingPage');
});
Route::get('/dich-vu', function(){
    return view('landing-page.landingPage');
})->name('dichvu');
Route::get('/goi-dang-tin', function(){
    return view('landing-page.page.goidangtin');
});
Route::post('/goi-dang-tin', ['as' => 'goi-dang-tin', 'uses' => 'EmployerLandingPage\EmployerLandingPageControllers@creatAdvisoryForPackage1']);


Route::get('/goi-loc-cv', function(){
    return view('landing-page.page.goiloccv');
});
Route::post('/goi-loc-cv', ['as' => 'goi-loc-cv', 'uses' => 'EmployerLandingPage\EmployerLandingPageControllers@creatAdvisoryForPackage2']);

Route::get('/goi-combo', function(){
    return view('landing-page.page.goicombo');
});
Route::post('/goi-combo', ['as' => 'goi-combo', 'uses' => 'EmployerLandingPage\EmployerLandingPageControllers@creatAdvisoryForPackage3']);

Route::get('/goi-ung-vien', function(){
    return view('landing-page.page.goiungvientdpv');
});
Route::post('/goi-ung-vien', ['as' => 'goi-ung-vien', 'uses' => 'EmployerLandingPage\EmployerLandingPageControllers@creatAdvisoryForPackage4']);

Route::get('/goi-nhan-su-tc', function(){
    return view('landing-page.page.goinhansutd');
});
Route::post('/goi-nhan-su-tc', ['as' => 'goi-nhan-su-tc', 'uses' => 'EmployerLandingPage\EmployerLandingPageControllers@creatAdvisoryForPackage5']);

Route::get('/goi-dao-tao', function(){
    return view('landing-page.page.goidaotao');
});
Route::post('/goi-dao-tao', ['as' => 'goi-dao-tao', 'uses' => 'EmployerLandingPage\EmployerLandingPageControllers@creatAdvisoryForPackage6']);
