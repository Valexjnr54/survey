<?php

use App\Http\Controllers\Admin\SurveyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/user/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/user/take-survey', [App\Http\Controllers\EntryController::class, 'index'])->name('take-survey');
Route::post('/user/take-survey', [App\Http\Controllers\EntryController::class, 'store'])->name('entries.store');

Route::get('/admin/dashboard', [CustomAuthController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/login', [CustomAuthController::class, 'index'])->name('admin.login');
Route::post('/admin/custom-login', [CustomAuthController::class, 'customLogin'])->name('admin.login.custom');
Route::get('/admin/register', [CustomAuthController::class, 'registration'])->name('admin.register');
Route::post('/admin/custom-registration', [CustomAuthController::class, 'customRegistration'])->name('admin.register.custom');

// Route::get('/data', function () {
//     return Datatables::of(User::query())->make(true);
// });

Route::group(['middleware' => ['auth']], function () { 
    Route::get('/admin/create-user', [DashboardController::class, 'create_user'])->name('admin.create-user');
    Route::post('/admin/create-user', [DashboardController::class, 'store_user'])->name('admin.store-user');
    Route::get('/admin/users', [DashboardController::class, 'users'])->name('admin.users');
    Route::get('/admin/edit-user', [DashboardController::class, 'edit_user'])->name('admin.edit-user');
    Route::put('/admin/edit-user/{id}', [DashboardController::class, 'update_user'])->name('admin.update-user');
    Route::delete('/admin/delete-user/{id}', [DashboardController::class, 'delete_user'])->name('admin.delete-user');
    Route::get('/admin/signout', [CustomAuthController::class, 'signOut'])->name('admin.signout');


    Route::get('/admin/view-survey',[SurveyController::class, 'view_survey'])->name('admin.view-survey');
    Route::get('/admin/user-survey',[SurveyController::class, 'view_user_survey'])->name('admin.view-user-survey');
    Route::get('/admin/survey-detail',[SurveyController::class, 'view_survey_detail'])->name('admin.survey-detail');
    Route::get('/admin/all-survey',[SurveyController::class, 'all_survey'])->name('admin.all-survey');
});