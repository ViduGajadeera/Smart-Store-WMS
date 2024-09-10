<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SregController;
use App\Http\Controllers\consigneeRegController;
use App\Http\Controllers\manifestController;
use App\Http\Controllers\StaffAllocationController;
use App\Http\Controllers\containerOperationController;


Route::get('/', function () {
    return view('login');
});


Route::get('/Ahome', function () {
    return view('Admin/home');
})->name('Ahome');



Route::get('/uploadmani', function () {
    return view('Admin/Manifest');
})->name('mani');
Route::post('/uploadmani', [manifestController::class, 'upload'])->name('manifestController.upload');



Route::get('/sreg', function () {
    return view('Admin/straffRegistration');
})->name('sreg');
Route::post('/sreg', [SregController::class, 'store'])->name('sreg.store');




Route::get('/Creg', function () {
    return view('Admin/consigneeRegistration');
})->name('Creg');
Route::post('/Creg', [consigneeRegController::class, 'store'])->name('consigneeRegController.store');









Route::get('/Uhome', function () {
    return view('US/Uhome');
})->name('Uhome');

Route::get('/Allocation', [StaffAllocationController::class, 'showstaff'])->name('Allocation');
Route::post('/Allocate/{id}',[StaffAllocationController::class,'allocate'])->name('allocate');
Route::post('/deallocate/{id}',[StaffAllocationController::class,'deallocate'])->name('deallocate');


Route::get('/Task', function () {
    return view('US/taskAllocation');
})->name('Task');


Route::get('/operation', [containerOperationController::class, 'getdata'])->name('operation');
Route::post('/operate/{containerNo}', [containerOperationController::class, 'containerIn'])->name('containerIn');
Route::post('/permission/{containerNo}', [containerOperationController::class, 'permission'])->name('permission');



Route::get('/ldcallocation', function () {
    return view('US/ldcallocation');
})->name('ldcallocation');