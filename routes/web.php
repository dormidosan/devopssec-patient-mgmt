<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;

use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;

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
    return view('welcome');
    //return \redirect('login'); ERROR WITH LOAD BALANCER
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
});

/*DASHBOARD FOR DOCTOR*/
Route::middleware(['auth', 'role:doctor'])->group(function () {
    Route::get('/doctor/dashboard', [DoctorController::class, 'DoctorDashboard'])->name('doctor.dashboard');
});


Route::middleware(['auth', 'role:doctor'])->group(function () {
    /*Route::resource('patients', DoctorController::class)->missing(function (Request $request) {
        return Redirect::route('doctor.index');
    });
    */
    Route::prefix('doctor')->group(function () {
        Route::get('/dashboard', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');

    });

    //Route::resource('patients', PatientController::class)->only(['index', 'create']);
    Route::resource('patients', PatientController::class);


});


Route::middleware(['auth', 'role:doctor'])->group(function () {


    Route::resource('drugs', DrugController::class);
    Route::resource('diseases', DiseaseController::class);


});
