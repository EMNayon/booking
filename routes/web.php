<?php

use Illuminate\Support\Facades\Route;

Route::get('/money', function () {
    return view('money');
});


// Route::get('/money_receipt/{code}', [\App\Http\Controllers\MemberController::class, 'moneyReceiptPdf'])->name('money_receipt');


Route::get('/', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login.submit');
Route::get('m', [\App\Http\Controllers\MemberController::class, 'scanResultMoney'])->name('scan');
Route::get('m/{code}', [\App\Http\Controllers\MemberController::class, 'moneyVerifiedPdf']);
Route::get('/money_receipt/{code}', [\App\Http\Controllers\MemberController::class, 'moneyReceiptPdf'])->name('money_receipt');
Route::get('/policy/{code}', [\App\Http\Controllers\MemberController::class, 'policyPdf'])->name('policy');
Route::get('/{code}', [\App\Http\Controllers\MemberController::class, 'policyPdf'])->name('policy');
Route::get('/p', [\App\Http\Controllers\MemberController::class, 'policyPdf'])->name('scanp');

Route::group(['middleware' => 'user_middleware'], function () {
    Route::get('/user/dashboard', [\App\Http\Controllers\UserController::class, 'index'])->name('user.home');

    // Route::get('/user/dashboard', [\App\Http\Controllers\AgodaController::class, 'index'])->name('user.agoda');
    // Route::get('/user/dashboard', [\App\Http\Controllers\BookingController::class, 'index'])->name('user.booking');
    Route::get('/user/file-submission', [\App\Http\Controllers\UserController::class, 'getAllFileSubmissionList'])->name('user_submission_list');

    Route::post('/member/registration', [\App\Http\Controllers\AgodaController::class, 'store'])->name('submit-agoda-form');


    Route::get('/member/registration', [\App\Http\Controllers\MemberController::class, 'showMemberForm'])->name('show-member-form');
    Route::post('/member/registration', [\App\Http\Controllers\MemberController::class, 'submitMemberForm'])->name('submit-member-form');
    Route::get('/{code}', [\App\Http\Controllers\UserController::class, 'getMemberDataByCode'])->name('get-member-data');
    // Route::get('/member/{code}/edit', function(){
    //     dd("edit");
    // });

    Route::get('/member/{code}/edit', [\App\Http\Controllers\UserController::class, 'userMemberEdit'])->name('member_edit');
    Route::post('/member/update', [\App\Http\Controllers\UserController::class, 'userMemberUpdate'])->name('member_update');

});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/home', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.home');
    Route::get('/agent/list', [\App\Http\Controllers\AgentController::class, 'index'])->name('agent_list');
    Route::get('/agent/view-point/{id}', [\App\Http\Controllers\AgentController::class, 'viewPoint'])->name('view_point');
    Route::post('/agent/add-point', [\App\Http\Controllers\AgentController::class, 'addPoint'])->name('add_point');

    Route::get('/agent/request', [\App\Http\Controllers\AgentController::class, 'requestList'])->name('agent_request');
    Route::post('/agent/status-change', [\App\Http\Controllers\AgentController::class, 'agentStatusChange'])->name('agent_status_change');
    Route::get('/admin/file-submission', [\App\Http\Controllers\FileSubmissionController::class, 'index'])->name('submission_list');

    Route::get('/member/{code}/edit', [\App\Http\Controllers\MemberController::class, 'memberEdit'])->name('member_edit');
    Route::post('/member/update', [\App\Http\Controllers\MemberController::class, 'memberUpdate'])->name('member_update');

    Route::get('/member/{code}/toggle', [\App\Http\Controllers\MemberController::class, 'memberToggle'])->name('member_toggle');
    Route::get('/member/{code}/delete', [\App\Http\Controllers\MemberController::class, 'memberDelete'])->name('member_delete');

    Route::get('/agent/signup', [\App\Http\Controllers\AuthController::class, 'showSignupForm'])->name('signup');
    Route::post('/agent/signup', [\App\Http\Controllers\AuthController::class, 'signup'])->name('signup.submit');

    Route::get('/user/change-password/{id}', [\App\Http\Controllers\AuthController::class, 'showChangePasswordForm'])->name('show_change_password');
    Route::post('/user/change-password', [\App\Http\Controllers\AuthController::class, 'submitChangePasswordForm'])->name('submit_change_password');


    Route::get('/admin/countries', [\App\Http\Controllers\CountryController::class, 'index'])->name('country');
    Route::get('/admin/countries/create', [\App\Http\Controllers\CountryController::class, 'create'])->name('create_country');
    Route::post('/admin/countries/store', [\App\Http\Controllers\CountryController::class, 'store'])->name('store_country');
    Route::post('/admin/countries/update', [\App\Http\Controllers\CountryController::class, 'update'])->name('update_country');
    Route::get('/admin/countries/edit/{id}', [\App\Http\Controllers\CountryController::class, 'edit'])->name('edit_country');
    Route::get('/admin/countries/delete/{id}', [\App\Http\Controllers\CountryController::class, 'destroy'])->name('delete_country');


    Route::get('/admin/states', [\App\Http\Controllers\StateController::class, 'index'])->name('state');
    Route::get('/admin/states/create', [\App\Http\Controllers\StateController::class, 'create'])->name('create_state');
    Route::post('/admin/states/store', [\App\Http\Controllers\StateController::class, 'store'])->name('store_state');
    Route::post('/admin/states/update', [\App\Http\Controllers\StateController::class, 'update'])->name('update_state');
    Route::get('/admin/states/edit/{id}', [\App\Http\Controllers\StateController::class, 'edit'])->name('edit_state');
    Route::get('/admin/states/delete/{id}', [\App\Http\Controllers\StateController::class, 'destroy'])->name('delete_state');
    Route::post('/admin/states/fetch-state', [\App\Http\Controllers\StateController::class, 'fetchStates'])->name('fetch_state');


    Route::get('/admin/cities', [\App\Http\Controllers\CityController::class, 'index'])->name('city');
    Route::get('/admin/cities/create', [\App\Http\Controllers\CityController::class, 'create'])->name('create_city');
    Route::post('/admin/cities/store', [\App\Http\Controllers\CityController::class, 'store'])->name('store_city');
    Route::post('/admin/citiess/update', [\App\Http\Controllers\CityController::class, 'update'])->name('update_city');
    Route::get('/admin/cities/edit/{id}', [\App\Http\Controllers\CityController::class, 'edit'])->name('edit_city');
    Route::get('/admin/cities/delete/{id}', [\App\Http\Controllers\CityController::class, 'destroy'])->name('delete_city');



    // Route::get('/admin/cities', [\App\Http\Controllers\CityController::class, 'index'])->name('city');
    // Route::get('/admin/hotels', [\App\Http\Controllers\HotelController::class, 'index'])->name('hotel');

});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/auth/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});
