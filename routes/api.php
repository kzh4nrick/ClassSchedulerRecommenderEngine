<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Subject;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::resource('/subject', \App\Http\Controllers\SubjectController::class);
});


Route::get('/subjects', function () {
    return Subject::all();
});

Route::post('/subjects', function () {

    request()->validate([
        'Subject_Code' => 'required',
        'Subject_Name' => 'required',
        'slug' => 'required',
        'Subject_Type' => 'required',
        'Units' => 'required',
    ]);  //For validation Daa

    return Subject::create([
        'Subject_Code' => request('Subject_Code'),
        'Subject_Name' => request('Subject_Name'),
        'slug' => request('slug'),
        'Subject_Type' => request('Subject_Type'),
        'Units' => request('Units'),
    ]);
});

Route::put('/subjects/{id}', function (Subject $id) {
    // $subject = Subject::findOrFail($id); 

    request()->validate([
        'Subject_Code' => 'required',
        'Subject_Name' => 'required',
        'slug' => 'required',
        'Subject_Type' => 'required',
        'Units' => 'required',
    ]); //For validation Daa

    $success = $id->update([
        'Subject_Code' => request('Subject_Code'),
        'Subject_Name' => request('Subject_Name'),
        'slug' => request('slug'),
        'Subject_Type' => request('Subject_Type'),
        'Units' => request('Units'),
    ]);

    return [
        'success' => $success
    ];
});


Route::delete('/subjects/{id}', function (Subject $id) {
    $success = $id->delete();
    return [
        'success' => $success
    ];
});
