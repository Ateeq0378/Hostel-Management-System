<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\WardenController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ComplainController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Middleware\ValidUser;
use App\Http\Middleware\ValidRole;
use App\Http\Middleware\ValidStudent;
use App\Http\Middleware\CheckLoggedIn;

Route::get('/', function () {
    return view('welcome');
})->name('home-page');

Route::view('/login-page','login')->name('login-page')->middleware(CheckLoggedIn::class);
Route::post('/login',[UserController::class, 'login'])->name('login');
Route::get('/logout',[UserController::class, 'logout'])->name('logout');

Route::middleware([ValidUser::class])->group(function(){
    Route::post('/update-password',[UserController::class, 'updatePassword'])->name('update-password');
    Route::get('/change-password/{user_email}',[UserController::class, 'changePassword'])->name('change-password');
    Route::get('/forgot-password/{user_email}',[UserController::class, 'forgotPassword'])->name('forgot-password');
    Route::get('/show-dahboard/{user_email}',[UserController::class, 'showDashboard'])->name('show-dashboard');
});

Route::middleware([ValidUser::class, ValidRole::class])->group(function(){

    Route::get('/dashboard', [UserController::class, 'admin'])->name('admin-dashboard');
    Route::get('/warden',[WardenController::class, 'index'])->name('warden');
    Route::get('/add-warden',[WardenController::class, 'addWarden'])->name('add-warden');
    Route::post('/warden-create', [WardenController::class, 'create'])->name('warden-create');
    Route::get('/edit-warden/{warden_id}',[WardenController::class, 'edit'])->name('edit-warden');
    Route::post('/warden-update/{warden_id}',[WardenController::class, 'update'])->name('warden-update');
    Route::get('/warden-delete/{email}',[WardenController::class, 'delete'])->name('warden-delete');

    Route::get('/department', [DepartmentController::class, 'index'])->name('department');
    Route::get('/add-department', [DepartmentController::class, 'addDepartment'])->name('add-department');
    Route::post('/create-department', [DepartmentController::class, 'create'])->name('create-department');

    Route::get('/course', [CourseController::class, 'index'])->name('course');
    Route::get('/add-course', [CourseController::class, 'addCourse'])->name('add-course');
    Route::post('/create-course', [CourseController::class, 'create'])->name('create-course');

    Route::get('/admin-notice',[NoticeController::class, 'index'])->name('admin-notice');
    Route::get('/issue-notice',[NoticeController::class, 'addNotice'])->name('issue-notice');
    Route::post('/notice-create',[NoticeController::class, 'create'])->name('notice-create');
    Route::get('/edit-notice/{notice_id}',[NoticeController::class, 'edit'])->name('edit-notice');
    Route::post('/notice-update/{notice_id}',[NoticeController::class, 'update'])->name('notice-update');
    Route::get('/notice-delete/{notice_id}',[NoticeController::class, 'delete'])->name('notice-delete');

    Route::get('/admin-student',[StudentController::class, 'index'])->name('admin-student');
    Route::get('/admin-add-student',[StudentController::class, 'addStudent'])->name('admin-add-student');
    Route::post('/student-create',[StudentController::class, 'create'])->name('student-create');
    Route::get('/show-student/{enroll_number}',[StudentController::class, 'show'])->name('show-student');
    Route::get('/edit-student/{student_id}',[StudentController::class, 'edit'])->name('edit-student');
    Route::post('/student-update/{student_id}',[StudentController::class, 'update'])->name('student-update');
    Route::get('/student-delete/{email}',[StudentController::class, 'delete'])->name('student-delete');

    Route::get('/admin-room',[RoomController::class, 'index'])->name('admin-room');
    Route::post('/add-room',[RoomController::class, 'add'])->name('add-room');
    Route::get('/show-room/{student_id}',[RoomController::class, 'show'])->name('show-room');
    Route::get('/room-allotment',[RoomController::class, 'getStudentsForAllotment'])->name('allotment');
    Route::post('/room-alloted',[RoomController::class, 'roomAllotment'])->name('room-alloted');
    Route::get('/room-cancelation',[RoomController::class, 'getStudentsForCancelation'])->name('cancelation');
    Route::post('/room-canceled',[RoomController::class, 'roomCancelation'])->name('room-canceled');

    Route::get('/admin-complain',[ComplainController::class, 'complain'])->name('admin-complain');
    Route::get('/show-complain/{conplain_id}/{enroll_number}',[ComplainController::class, 'show'])->name('show-complain');
    Route::post('/resolved-complain/{complain_id}',[ComplainController::class, 'resolvedComplain'])->name('resolved-complain');

    Route::get('/history',[HistoryController::class, 'history'])->name('history');
    Route::get('/show-history/{student_id}/{history_id}',[HistoryController::class, 'show'])->name('show-history');

});

Route::middleware([ValidUser::class, ValidStudent::class])->group(function(){

    Route::get('/student-dashboard', [UserController::class, 'student'])->name('student-dashboard');
    Route::get('/student-notice',[NoticeController::class, 'show'])->name('student-notice');
    Route::get('/student-complain',[ComplainController::class, 'index'])->name('student-complain');
    Route::get('/register-complain',[ComplainController::class, 'addComplain'])->name('register-complain');
    Route::post('/register-complain',[ComplainController::class, 'create'])->name('register-complain');
});
