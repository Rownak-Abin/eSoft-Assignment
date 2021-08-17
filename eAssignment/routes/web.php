<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegiForm;
use App\Http\Controllers\adminController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', [RegiForm::class, 'FormSubmit']);
Route::post('/signup', [RegiForm::class, 'insertMember'])->name('signup');

Route::get('/admin', [adminController::class, 'adminLogin']);
Route::post('/admin', [adminController::class, 'verify']);
Route::get('/logout', [adminController::class, 'logout']);


Route::group(['middleware'=>['check']], function(){

        Route::get('/admin/dashboard', [adminController::class, 'getMembers'])->name('admin.dash');

        Route::get('/admin/edit/{id}', [adminController::class, 'editMember'])->name('admin.edit');
        Route::post('/admin/edit/{id}', [adminController::class, 'updateMember'])->name('admin.update');

        Route::get('/admin/delete/{id}', [adminController::class, 'deleteMember'])->name('admin.delete');
        Route::post('/admin/delete/{id}', [adminController::class, 'destroy']);

        Route::get('/searchPage', [adminController::class, 'getSearchpage']);
        Route::post('/searchPage', [adminController::class, 'search']);


}); 


