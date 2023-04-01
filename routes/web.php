<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     // return view('home.index');
// });

Auth::routes();
Route::get('/login-register', ['as'=>'login','uses'=> 'App\Http\Controllers\UserController@loginRegister']);
Route::post('/login', [App\Http\Controllers\UserController::class, 'loginUser']);
// Route::post('/register', [App\Http\Controllers\UserController::class, 'registerUser']);
Route::get('/logout', [App\Http\Controllers\UserController::class, 'logoutUser']);
Route::get('/', [App\Http\Controllers\UserController::class, 'loginRegister']);

Route::group(['middleware'=>['auth']],function(){

    Route::get('/dashboard', function () {
        return view('home.index');
    });
    // Route::get('/user/account',[App\Http\Controllers\UserController::class, 'account']);
    Route::get('/clinic-edit/{id}',[App\Http\Controllers\UserController::class, 'editInstitution']);
    Route::delete('/clinic-delete/{id}',[App\Http\Controllers\UserController::class, 'deleteInstitution']);
    // Route::get('/clinic-delete/{id}',[App\Http\Controllers\UserController::class, 'deleteInstitution']);
    Route::post('/user/account',[App\Http\Controllers\UserController::class, 'account']);
    Route::get('/add-clinic',[App\Http\Controllers\UserController::class, 'addClinic']);
    Route::get('/list-clinic',[App\Http\Controllers\UserController::class, 'listClinic']);
    Route::post('/save-institution',[App\Http\Controllers\UserController::class, 'saveInstitution']);
    Route::put('update-institution/{id}',[App\Http\Controllers\UserController::class, 'updateInstitution']);

    Route::get('/impersonate/user/{email}',[App\Http\Controllers\ImpersonateController::class, 'impersonate']);
    Route::post('/email_available_check',[App\Http\Controllers\UserController::class,'email_available_check']);
    
// Speciality code start
    Route::get('/add-speciality',[App\Http\Controllers\UserController::class,'add_speciality']);
    Route::post('/save-speciality',[App\Http\Controllers\UserController::class,'save_speciality']);
    Route::get('/list-speciality',[App\Http\Controllers\UserController::class,'list_speciality']);   
    Route::get('/speciality-edit/{id}',[App\Http\Controllers\UserController::class, 'edit_speciality']);
    Route::put('/update-speciality/{id}',[App\Http\Controllers\UserController::class, 'update_speciality']);
    Route::delete('/speciality-delete/{id}',[App\Http\Controllers\UserController::class, 'delete_speciality']);
    Route::post('/speciality_available_check',[App\Http\Controllers\UserController::class,'speciality_available_check']);
// Speciality code end
// Doctor code start
    Route::get('/add-doctor',[App\Http\Controllers\UserController::class,'add_doctor']);
    Route::post('/save-doctor',[App\Http\Controllers\UserController::class,'save_doctor']);
    Route::get('/list-doctor',[App\Http\Controllers\UserController::class,'list_doctor']);   
    Route::get('/doctor-edit/{id}',[App\Http\Controllers\UserController::class, 'edit_doctor']);
    Route::put('/update-doctor/{id}',[App\Http\Controllers\UserController::class, 'update_doctor']);
    Route::delete('/doctor-delete/{id}',[App\Http\Controllers\UserController::class, 'delete_doctor']);
    // Route::post('/speciality_available_check',[App\Http\Controllers\UserController::class,'speciality_available_check']);
    Route::get('/dropdown-speciality', [App\Http\Controllers\UserController::class,'dropDownShow']);
    Route::get('/dropdown-hospital', [App\Http\Controllers\UserController::class,'dropDownHospital']);
    
// Doctor code end

// symptoms start
    Route::get('/add-symptom',[App\Http\Controllers\UserController::class,'add_symptom']);
    Route::post('/save-symptom',[App\Http\Controllers\UserController::class,'save_symptom']);
    Route::get('/list-symptom',[App\Http\Controllers\UserController::class,'list_symptom']);   
    Route::delete('/symptom-delete/{id}',[App\Http\Controllers\UserController::class, 'delete_symptom']);
    Route::post('/symptom_available_check',[App\Http\Controllers\UserController::class,'symptom_available_check']);
// symptoms end

// statecity start
    Route::get('/add-state',[App\Http\Controllers\UserController::class,'add_state']);
    Route::post('/save-state',[App\Http\Controllers\UserController::class,'save_state']);
    Route::post('/save-city',[App\Http\Controllers\UserController::class,'save_city']);
    Route::get('/list-state-city',[App\Http\Controllers\UserController::class,'list_state']);   
    Route::get('/list-city',[App\Http\Controllers\UserController::class,'list_city']);   
    Route::delete('/state-delete/{id}',[App\Http\Controllers\UserController::class, 'delete_state']);
    Route::delete('/city-delete/{id}',[App\Http\Controllers\UserController::class, 'delete_city']);
    Route::post('/state_available_check',[App\Http\Controllers\UserController::class,'state_available_check']);
    Route::post('/city_available_check',[App\Http\Controllers\UserController::class,'city_available_check']);
    Route::get('/dropdown-state', [App\Http\Controllers\UserController::class,'dropDownState']);
    Route::post('/dropdown-city', [App\Http\Controllers\UserController::class,'dropDownCity']);
// statecity end

// patient start
    Route::get('/add-patient',[App\Http\Controllers\UserController::class,'add_patient']);
    Route::post('/save-patient',[App\Http\Controllers\UserController::class,'save_patient']);
    Route::put('/update-patient/{id}',[App\Http\Controllers\UserController::class, 'update_patient']);
    Route::get('/list-patient',[App\Http\Controllers\UserController::class,'list_patient']);   
    Route::delete('/patient-delete/{id}',[App\Http\Controllers\UserController::class, 'delete_patient']);
    Route::post('/patient_available_check',[App\Http\Controllers\UserController::class,'state_available_check']);
    Route::get('/patient-edit/{id}',[App\Http\Controllers\UserController::class, 'edit_patient']);
    Route::post('/patient/search',[App\Http\Controllers\UserController::class,'showPatient'])->name('patient.search');
// patient end

// Appointment start
    Route::get('/add-new-appointment',[App\Http\Controllers\UserController::class,'add_new_appointment']);
    Route::get('/add-existing-appointment',[App\Http\Controllers\UserController::class,'add_existing_appointment']);

    Route::get('/search-patient-name',[App\Http\Controllers\UserController::class,'search_patient_name']);
    Route::get('/get-patient-details',[App\Http\Controllers\UserController::class,'get_patient_details']);

    Route::post('/dropdown-doctor',[\App\Http\Controllers\UserController::class,'doctorname']);
    Route::post('/save-new-appointment',[\App\Http\Controllers\UserController::class,'save_new_appointment']);
    Route::get('/list-new-appointment',[App\Http\Controllers\UserController::class,'list_new_appointment']); 
    // Route::get('/list-new-appointment/{date?}', [App\Http\Controllers\UserController::class,'list_new_appointment']);

    // Route::get('/available-selected-slot',[App\Http\Controllers\UserController::class,'available_selected_slot']); 
    Route::post('/update-existing-appointment',[\App\Http\Controllers\UserController::class,'update_existing_appointment']);
    Route::put('/update-appointment/{patient_id}',[\App\Http\Controllers\UserController::class,'update_appointment']);
    Route::delete('/appointment-delete/{id}',[\App\Http\Controllers\UserController::class,'appointment_delete']);
    Route::get('/appointment-edit/{id}',[\App\Http\Controllers\UserController::class,'appointment_edit']);
    
// Appointment end

// Appointment master start
    Route::get('/add-appointment-slot',[App\Http\Controllers\UserController::class,'add_appointment_slot']); 
    Route::post('/save-appointment-master',[App\Http\Controllers\UserController::class,'save_appointment_master']); 
    Route::post('/available-slot',[App\Http\Controllers\UserController::class,'available_slot']);
    Route::post('/show-available-slot',[App\Http\Controllers\UserController::class,'show_available_slot']);
    Route::delete('/appointment-master-delete/{id}',[App\Http\Controllers\UserController::class, 'appointment_master_delete']); 
// Appointment master end

// Consultation code start
 Route::get('/add_consultation/{patient_id}',[App\Http\Controllers\UserController::class,'add_consultation']);
// Consultation code end


});
Route::get('/impersonate/destroy',[App\Http\Controllers\ImpersonateController::class, 'destroy']);

