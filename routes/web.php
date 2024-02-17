<?php

use App\Http\Controllers\CashOutController;
use App\Http\Controllers\ClientClassController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ReceiveCashController;
use App\Http\Controllers\ReceiveCashReminderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
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




Route::group([
    'middleware' => ['auth:web']
], function () {
    Route::get('/', [DashboardController::class , 'index'])->name('dashboard');
    Route::group([], function () {
        Route::get('users', [UserController::class,'index'])->name('users.index');
        Route::get('users/create', [UserController::class,'create'])->name('users.create');
        Route::post('users/store', [UserController::class,'store'])->name('users.store');
        Route::get('users/edit/{id}', [UserController::class,'edit'])->name('users.edit');
        Route::put('users/update/{id}', [UserController::class,'update'])->name('users.update');
        Route::delete('users/delete/{id}', [UserController::class,'destroy'])->name('users.delete');
    });

    Route::group([], function () {

        Route::get('roles', [RoleController::class,'index'])->name('roles.index');
        Route::get('roles/create', [RoleController::class,'create'])->name('roles.create');
        Route::post('roles/store', [RoleController::class,'store'])->name('roles.store');
        Route::get('roles/edit/{id}', [RoleController::class,'edit'])->name('roles.edit');
        Route::put('roles/update/{id}', [RoleController::class,'update'])->name('roles.update');
        Route::delete('roles/delete/{id}', [RoleController::class,'destroy'])->name('roles.delete');

    });


    Route::group([], function () {
        Route::get('clients-autoComplete', [ClientController::class,'clientsAutocomplete'])->name('clients.autocomplete');
        Route::get('clients', [ClientController::class,'index'])->name('clients.index');
        Route::get('client_info/{id}', [ClientController::class,'clientInfo'])->name('clients.clientInfo');
        Route::get('client_pay/{id}', [ClientController::class,'payShow'])->name('clients.payShow');
        Route::post('client_pay_store', [ClientController::class,'payStore'])->name('clients.payStore');

        Route::get('clients/create', [ClientController::class,'create'])->name('clients.create');
        Route::post('clients/store', [ClientController::class,'store'])->name('clients.store');
        Route::get('clients/edit/{client}', [ClientController::class,'edit'])->name('clients.edit');
        Route::put('clients/update/{client}', [ClientController::class,'update'])->name('clients.update');
        Route::delete('clients/delete/{client}', [ClientController::class,'destroy'])->name('clients.delete');
    });

    Route::group([], function () {
        Route::get('clients_class', [ClientClassController::class,'index'])->name('clients_class.index');
        Route::get('clients_class/create', [ClientClassController::class,'create'])->name('clients_class.create');
        Route::post('clients_class/store', [ClientClassController::class,'store'])->name('clients_class.store');
        Route::get('clients_class/edit/{clientClass}', [ClientClassController::class,'edit'])->name('clients_class.edit');
        Route::put('clients_class/update/{clientClass}', [ClientClassController::class,'update'])->name('clients_class.update');
        Route::delete('clients_class/delete/{clientClass}', [ClientClassController::class,'destroy'])->name('clients_class.delete');
    });

    Route::group([], function () {
        Route::get('materials', [MaterialController::class,'index'])->name('materials.index');
        Route::get('materials/create', [MaterialController::class,'create'])->name('materials.create');
        Route::post('materials/store', [MaterialController::class,'store'])->name('materials.store');
        Route::get('materials/edit/{material}', [MaterialController::class,'edit'])->name('materials.edit');
        Route::put('materials/update/{material}', [MaterialController::class,'update'])->name('materials.update');
        Route::delete('materials/delete/{material}', [MaterialController::class,'destroy'])->name('materials.delete');
    });

    Route::group([], function () {
        Route::get('prices', [PriceController::class,'index'])->name('prices.index');
        Route::get('getPrice', [PriceController::class,'getPrice'])->name('prices.getPrice');
        Route::get('prices/create', [PriceController::class,'create'])->name('prices.create');
        Route::post('prices/store', [PriceController::class,'store'])->name('prices.store');
        Route::get('prices/edit/{price}', [PriceController::class,'edit'])->name('prices.edit');
        Route::put('prices/update/{price}', [PriceController::class,'update'])->name('prices.update');
        Route::delete('prices/delete/{price}', [PriceController::class,'destroy'])->name('prices.delete');
    });

    Route::group([], function () {
        Route::get('suppliers', [SupplierController::class,'index'])->name('suppliers.index');
        Route::get('suppliers/create', [SupplierController::class,'create'])->name('suppliers.create');
        Route::post('suppliers/store', [SupplierController::class,'store'])->name('suppliers.store');
        Route::get('suppliers/edit/{supplier}', [SupplierController::class,'edit'])->name('suppliers.edit');
        Route::put('suppliers/update/{supplier}', [SupplierController::class,'update'])->name('suppliers.update');
        Route::delete('suppliers/delete/{supplier}', [SupplierController::class,'destroy'])->name('suppliers.delete');
    });




    Route::group([], function () {

        Route::get('receive_cash', [ReceiveCashController::class,'index'])->name('receive_cash.index');
        Route::get('cashReceive', [ReceiveCashController::class,'cashReceive'])->name('receive_cash.cashReceive');
        Route::get('onlineReceive', [ReceiveCashController::class,'onlineReceive'])->name('receive_cash.onlineReceive');
        Route::get('receive_cash/reports', [ReceiveCashController::class,'reports'])->name('receive_cash.reports');
        Route::get('receive_cash/create', [ReceiveCashController::class,'create'])->name('receive_cash.create');
        Route::post('receive_cash/store', [ReceiveCashController::class,'store'])->name('receive_cash.store');
        Route::get('receive_cash/edit/{id}', [ReceiveCashController::class,'edit'])->name('receive_cash.edit');
        Route::put('receive_cash/update/{id}', [ReceiveCashController::class,'update'])->name('receive_cash.update');
        Route::delete('receive_cash/delete/{id}', [ReceiveCashController::class,'destroy'])->name('receive_cash.delete');
        Route::get('receive_cash/pdf_report/{id}', [ReceiveCashController::class,'pdfReport'])->name('receive_cash.pdfReport');
        Route::get('test/{id}', [ReceiveCashController::class,'test'])->name('test');

    });

    Route::group([], function () {
        Route::get('receive_cash_reminder', [ReceiveCashReminderController::class,'index'])->name('receive_cash_reminder.index');
        Route::get('receive_cash_reminder/show_reminders/{id}', [ReceiveCashReminderController::class,'show_reminders'])->name('receive_cash_reminder.show_reminders');
        Route::get('receive_cash_reminder/create/{id}', [ReceiveCashReminderController::class,'create'])->name('receive_cash_reminder.create');
        Route::post('receive_cash_reminder/store', [ReceiveCashReminderController::class,'store'])->name('receive_cash_reminder.store');
        Route::get('receive_cash_reminder/edit/{id}', [ReceiveCashReminderController::class,'edit'])->name('receive_cash_reminder.edit');
        Route::put('receive_cash_reminder/update/{id}', [ReceiveCashReminderController::class,'update'])->name('receive_cash_reminder.update');
        Route::delete('receive_cash_reminder/delete/{id}', [ReceiveCashReminderController::class,'destroy'])->name('receive_cash_reminder.delete');
        Route::get('receive_cash_reminder/pdf_report/{id}', [ReceiveCashReminderController::class,'pdfReport'])->name('receive_cash_reminder.pdfReport');
    });

    Route::group([], function () {

        Route::get('cash_out', [CashOutController::class,'index'])->name('cash_out.index');
        Route::get('cash_out/reports', [CashOutController::class,'reports'])->name('cash_out.reports');
        Route::get('cash_out/create', [CashOutController::class,'create'])->name('cash_out.create');
        Route::post('cash_out/store', [CashOutController::class,'store'])->name('cash_out.store');
        Route::get('cash_out/edit/{id}', [CashOutController::class,'edit'])->name('cash_out.edit');
        Route::put('cash_out/update/{id}', [CashOutController::class,'update'])->name('cash_out.update');
        Route::delete('cash_out/delete/{id}', [CashOutController::class,'destroy'])->name('cash_out.delete');
        Route::get('cash_out/pdf_report/{id}', [CashOutController::class,'pdfReport'])->name('cash_out.pdfReport');
        Route::get('cash_out/getProvider', [CashOutController::class,'getProvider'])->name('cash_out.getProvider');

    });


});
