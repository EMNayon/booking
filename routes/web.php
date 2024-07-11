<?php

// use Exception;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RoomTypeController;

Route::get('/money', function () {
    return view('money');
});

Route::get('/migration', function(){
    try{
        Artisan::call('migrate:fresh');
        // Artisan::call('db:seed');
        echo 'Migration done';
    }catch(Exception $ex){
        dd($ex->getMessage());
    }

});
// Route::get('/money_receipt/{code}', [\App\Http\Controllers\MemberController::class, 'moneyReceiptPdf'])->name('money_receipt');


Route::get('/', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login.submit');

// Route::get('m', [\App\Http\Controllers\MemberController::class, 'scanResultMoney'])->name('scan');
// Route::get('m/{code}', [\App\Http\Controllers\MemberController::class, 'moneyVerifiedPdf']);

Route::get('/download-pdf-agoda/{id}', [\App\Http\Controllers\PdfController::class, 'downloadAgoda'])->name('download_agoda');
Route::get('/show-agoda/{id}', [\App\Http\Controllers\PdfController::class,'showAgoda'])->name('show_agoda');
Route::get('/download-pdf-booking/{id}', [\App\Http\Controllers\PdfController::class, 'downloadBooking'])->name('download_booking');

Route::get('/show-booking/{id}', [\App\Http\Controllers\PdfController::class, 'showBooking'])->name('show_booking');

// Route::get('/policy/{code}', [\App\Http\Controllers\MemberController::class, 'policyPdf'])->name('policy');
// Route::get('/{code}', [\App\Http\Controllers\MemberController::class, 'policyPdf'])->name('policy');
// Route::get('/p', [\App\Http\Controllers\MemberController::class, 'policyPdf'])->name('scanp');

Route::group(['middleware' => 'user_middleware'], function () {
    Route::get('/user/dashboard', [\App\Http\Controllers\AgodaController::class, 'index'])->name('user.home');
    Route::post('/user/store-agoda', [\App\Http\Controllers\AgodaController::class, 'store'])->name('store_agoda');
    Route::get('/user/file-submission-agoda', [\App\Http\Controllers\AgodaController::class, 'getAllFileSubmissionList'])->name('agoda_user_submission_list');
    Route::get('/user/file-submission-agoda-show/{id}', [\App\Http\Controllers\AgodaController::class, 'show'])->name('agoda_file_submission_show');
    // Route::delete('/user/agoda-delete/{id}', [\App\Http\Controllers\AgodaController::class, 'destroy'])->name('agoda_delete');
    Route::delete('/agodas/{id}', [\App\Http\Controllers\AgodaController::class, 'destroy'])->name('agodas.destroy');


    Route::get('/user/dashboard/booking', [\App\Http\Controllers\BookingController::class, 'index'])->name('user.booking');
    Route::post('/user/store-booking', [\App\Http\Controllers\BookingController::class, 'store'])->name('store_booking');
    Route::get('/user/file-submission-booking', [\App\Http\Controllers\BookingController::class, 'getAllFileSubmissionList'])->name('booking_user_submission_list');
    Route::get('/user/file-submission-show/{id}', [\App\Http\Controllers\BookingController::class, 'show'])->name('booking_file_submission_show');
    // Route::delete('/user/booking-delete/{id}', [\App\Http\Controllers\BookingController::class, 'destroy'])->name('booking_delete');
    Route::delete('/bookings/{id}', [\App\Http\Controllers\BookingController::class, 'destroy'])->name('bookings.destroy');


    // Route::get('/user/dashboard', [\App\Http\Controllers\AgodaController::class, 'index'])->name('user.agoda');
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

    //manage dependent drop down in the user form
    Route::post('fetch-states', [App\Http\Controllers\LocationController::class, 'fetchStates'])->name('fetch_states');
    Route::post('fetch-cities', [App\Http\Controllers\LocationController::class, 'fetchCities'])->name('fetch_cities');
    Route::post('fetch-hotels', [App\Http\Controllers\LocationController::class, 'fetchHotels'])->name('fetch_hotels');
    Route::post('fetch-price', [App\Http\Controllers\BookingController::class, 'getPricePerNight'])->name('get_price_per_night');
    Route::post('fetch-room-types', [RoomTypeController::class, 'fetchRoomTypes'])->name('fetch_room_types');

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
    Route::post('/admin/cities/fetch-city', [\App\Http\Controllers\CityController::class, 'fetchCities'])->name('fetch_city');




    Route::get('/admin/hotels', [\App\Http\Controllers\HotelController::class, 'index'])->name('hotel');
    Route::get('/admin/hotels/create', [\App\Http\Controllers\HotelController::class, 'create'])->name('create_hotel');
    Route::post('/admin/hotels/store', [\App\Http\Controllers\HotelController::class, 'store'])->name('store_hotel');
    Route::post('/admin/hotels/update', [\App\Http\Controllers\HotelController::class, 'update'])->name('update_hotel');
    Route::get('/admin/hotels/edit/{id}', [\App\Http\Controllers\HotelController::class, 'edit'])->name('edit_hotel');
    Route::get('/admin/hotels/delete/{id}', [\App\Http\Controllers\HotelController::class, 'destroy'])->name('delete_hotel');

    Route::get('/admin/room-type/room-types', [RoomTypeController::class, 'index'])->name('room_types');
    Route::get('/admin/room-type/create', [RoomTypeController::class, 'create'])->name('create_room_type');
    Route::post('/admin/room-type/store', [RoomTypeController::class, 'store'])->name('store_room_type');
    Route::get('/admin/room-type/edit/{id}', [RoomTypeController::class, 'edit'])->name('edit_room_type');
    Route::post('/admin/rom-type/update', [RoomTypeController::class, 'update'])->name('update_room_type');
    Route::delete('/admin/room-type/delete/{id}', [RoomTypeController::class, 'destroy'])->name('delete_room_type');


    Route::get('/admin/add-room-type/{id}', [RoomTypeController::class, 'addRoomType'])->name('add_room_type');
    Route::get('/admin/hotel-room-type-list/{id}', [RoomTypeController::class, 'roomTypeListOfHotel'])->name('hotel_room_type_list');

    Route::post('/admin/assign-room-type', [RoomTypeController::class, 'assignRoomType'])->name('assign_room_type');





    // Route::get('/admin/cities', [\App\Http\Controllers\CityController::class, 'index'])->name('city');
    // Route::get('/admin/hotels', [\App\Http\Controllers\HotelController::class, 'index'])->name('hotel');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/auth/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});
