<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\ShiftController;
use App\Http\Controllers\Api\AttendanceController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile',  [AuthController::class, 'profile']);
    Route::post('/logout',  [AuthController::class, 'logout']);

    Route::apiResource('employees', EmployeeController::class);
    Route::apiResource('shifts', ShiftController::class);

    Route::post('/attendance/check-in', [AttendanceController::class, 'checkIn']);
    Route::post('/attendance/{attendance}/check-out', [AttendanceController::class, 'checkOut']);
    Route::post('/attendance/{attendance}/break-in', [AttendanceController::class, 'breakIn']);
    Route::post('/attendance/{attendance}/break-out', [AttendanceController::class, 'breakOut']);

    Route::get('/attendance/report/{employeeId}', [AttendanceController::class, 'report']);
});
