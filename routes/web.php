<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\userController;
use App\Models\skills;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/dashboard', [DashController::class, 'index'])->middleware(['auth'])->name('dashboard');



Route::resource('announcements', AnnouncementController::class);
Route::resource('companies', companyController::class);
Route::resource('skills', SkillsController::class);
Route::resource('users', userController::class);


    // Route::get('/hello', function () {
    //     return view('hello');
    // });
    // Route::get('announcements', [AnnouncementController::class, 'index']);
    // Route::post('announcements', [AnnouncementController::class, 'store']);
    
    // Route::get('announcements/create', [AnnouncementController::class, 'create']);
    // Route::get('announcements/{announcement}', [AnnouncementController::class, 'show']);
    // Route::get('announcements/{announcement}/edit', [AnnouncementController::class, 'edit']);
    // Route::put('announcements/{announcement}', [AnnouncementController::class, 'update']);
    // Route::delete('announcements/{announcement}', [AnnouncementController::class, 'destroy']);
    
    // // Similarly for other resources
    // Route::get('companies', [CompanyController::class, 'index']);
    // Route::post('companies', [CompanyController::class, 'store']);
    
    // Route::get('companies/create', [CompanyController::class, 'create']);
    // Route::get('companies/{company}', [CompanyController::class, 'show']);
    // Route::get('companies/{company}/edit', [CompanyController::class, 'edit']);
    // Route::put('companies/{company}', [CompanyController::class, 'update']);
    // Route::delete('companies/{company}', [CompanyController::class, 'destroy']);
    
    // Routes for 'skills' and 'users' similarly
    




;

// Route::get('/', function () {
//     return view('home');
// })->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile', [ProfileController::class, 'updateSkills'])->name('profile.updateSkills');
    Route::post('/announcements/{announcement}/record-apply', [AnnouncementController::class, 'recordapply'])
    ->name('announcements.recordapply');

Route::delete('/announcements/{announcement}/unrecord-apply', [AnnouncementController::class, 'unrecordapply'])
    ->name('announcements.unrecordapply');
});

require __DIR__ . '/auth.php';
