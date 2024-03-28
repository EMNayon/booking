<?php

use Illuminate\Support\Facades\Route;


Route::get('/money', function (){
    return view('policy');
});


Route::get('/', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login.submit');
Route::get('i', [\App\Http\Controllers\MemberController::class, 'scanResult'])->name('scan');
Route::get('/print_wecare/{code}', [\App\Http\Controllers\MemberController::class, 'printWecarePdf'])->name('print_wecare');
Route::get('/print_travelvisit/{code}', [\App\Http\Controllers\MemberController::class, 'printTravelvisitPdf'])->name('print_travelvisit');

Route::group(['middleware' => 'user_middleware'], function () {
    Route::get('/user/dashboard', [\App\Http\Controllers\UserController::class, 'index'])->name('user.home');
    Route::get('/user/file-submission', [\App\Http\Controllers\UserController::class, 'getAllFileSubmissionList'])->name('user_submission_list');

    Route::get('/member/registration', [\App\Http\Controllers\MemberController::class, 'showMemberForm'])->name('show-member-form');
    Route::post('/member/registration', [\App\Http\Controllers\MemberController::class, 'submitMemberForm'])->name('submit-member-form');
    Route::get('/{code}', [\App\Http\Controllers\UserController::class, 'getMemberDataByCode'])->name('get-member-data');

    // Route::get('/member/{code}/edit', [\App\Http\Controllers\UserController::class, 'userMemberEdit'])->name('member_edit');
    // Route::post('/member/update', [\App\Http\Controllers\UserController::class, 'userMemberUpdate'])->name('member_update');

});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/home', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.home');
    Route::get('/agent/list', [\App\Http\Controllers\AgentController::class, 'index'])->name('agent_list');
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
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/auth/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});
