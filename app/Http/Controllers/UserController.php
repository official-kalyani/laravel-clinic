<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\AppointmentMaster;
use App\Models\DoctorInformation;
use App\Models\User;
use App\Models\HospitalData;
use App\Models\PatientInfo;
use App\Models\Speciality;
use App\Models\State;
use App\Models\StateCity;
use App\Models\Symptom;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function loginRegister(){
        return view('home.login_register');
    }

    // public function registerUser(Request $request){
    //     if($request->isMethod('post')){
    //         Session::forget('error_message');
    //         Session::forget('success_message');
    //         $data = $request->all();
    //         // echo "<pre>"; print_r($data); die;
    //         $rules=[
    //             'name'=>'required|regex:/^[\pL\s\-]+$/u',
    //             'mobile'=>'required|numeric|digits:10',
    //             'email'=> 'required|email|max:255',
    //             'password'=>'required',
    //             'password'=>'required|digits:8',
    //             'password.required'=>'Password Must be Minimum 8 Digit',
                
    //         ];
    //         $customMessages=[
    //             'name.required'=>'Name is Required',
    //             'name.alpha'=>'Valid Name is Required',
    //             'mobile.required'=>'Mobile No. is Required',
    //             'mobile.numeric'=>'valid Mobile no. is Required',
    //             'mobile.digits'=>'Number Must be 10 Digit',
    //             'email.required'=> 'Email is Required',
    //             'email.email'=>'Valid Email is Required',
    //             'password.required'=>'Password is Required',
                
    //         ];
            
    //         $this->validate($request,$rules,$customMessages);

    //         $userCount=User::where('email',$data['email'])->count();
    //         if($userCount>0){
    //             $message="Email Already Exists!";
    //             Session::flash('error_message',$message);
    //             return redirect()->back(); 
    //         }
    //         else{
    //             $user = new User;
    //             $user->name=$data['name'];
    //             $user->email=$data['email'];
    //             $user->mobile=$data['mobile'];
    //             $user->password=bcrypt($data['password']);
    //             $user->address="";
    //             $user->status=1;
    //             // $user->status=0;
    //             $user->save();

    //             // Send Confirmation Email
    //             $email = $data['email'];
    //             $messageData = [
    //                 'email'=> $data['email'],
    //                 'name'=>$data['name'],
    //                 'code'=>base64_encode($data['email'])
    //             ];
    //             // Mail::send('emails.confirmation',$messageData,function($message) use($email){
    //             // $message->to($email)->subject('Confirm Your Email Account for Registration');
    //             // });

    //             // Redirect Back With Success Message

    //             $message="Successfully registered!";
    //             // $message="Please Check Your Email For Confirmation to Activate Your Account!";
    //             Session::put('success_message',$message);
    //             return redirect()->back();

    //             // if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
    //             //     // echo "<pre>"; print_r(Auth::User()); die;
    //             //     if(!empty(Session::get('session_id'))){
    //             //         $user_id = Auth::user()->id;
    //             //         $session_id = Session::get('session_id');
    //             //         Cart::where('session_id',$session_id)->update(['user_id'=>$user_id]);
    //             //     }

    //             //     $email=$data['email'];
    //             //     $messageData=['name'=>$data['name'],'mobile'=>$data['mobile'],'email'=>$data['email']];
    //             //     Mail::send('emails.register',$messageData,function($message) use($email){
    //             //         $message->to($email)->subject('Welcome to Airsoft Point');
    //             //     });
    //             //     return redirect('/products/my-cart');
    //             // }
    //         }
    //     }
    // }

    public function confirmAccount($email){
        Session::forget('error_message');
        Session::forget('success_message');
        $email = base64_decode($email);

        // Check User Email Exists

        $userCount = User::where('email',$email)->count();
        if($userCount>0){
             // User Email is already activated or not
             $userDetails=User::where('email',$email)->first();
             if($userDetails->status==1){
                 $message = "Your Account is Already Activated. Please Login.";
                 Session::put('error_message',$message);
                 return redirect('/login-register');
             }else{
                 // Update User Status to 1 to Activate Account
                 User::where('email',$email)->update(['status'=>1]);
    
                         $messageData=['name'=>$userDetails['name'],'mobile'=>$userDetails['mobile'],'email'=>$email];
                         Mail::send('emails.register',$messageData,function($message) use($email){
                             $message->to($email)->subject('Welcome to Our E-Commerce');
                        });

                    //redirect to login/register with success page
                    $message = " Your Account is Activated. You Can Login Now!";
                    Session::put('success_message',$message);
                    return redirect('/login-register');
             }
        }else{
            abort(404);
        }

    }

    public function logoutUser(){
        Auth::logout();
        return redirect('/login-register');
    }

    public function loginUser(Request $request){
        if($request->isMethod('post')){
            Session::forget('error_message');
            Session::forget('success_message');
            $data = $request->all();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                $request->session()->put('loginId', $data['email']);
                // Session::flash('error_message','Invalid Email or Password!');
                // //Check Email is Activator or Not
                // $userStatus = User::where('email',$data['email'])->first();
                // if($userStatus->status==0){
                //     Auth::logout();
                //     $message = "Your Account is Not Activated Yet! Please Confirm Your Email to Activate!";
                //     Session::put('error_message',$message);
                //     return redirect()->back();
                // }
              
                return redirect('/dashboard');
            }else{
                $message="Invalid Email or Password!";
                Session::flash('error_message',$message);
                return redirect()->back();
            }
        }
    }

    public function forgotPassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            Session::forget('error_message');
            Session::forget('success_message');
            // echo "<pre>"; print_r($data); die;
            $emailCount = User::where('email',$data['email'])->count();
            if($emailCount==0){
                $message= "Email Does Not Exists!";
                Session::put('error_message','Email Does Not Exists!');
                Session::forget('success_message');
                return redirect()->back();
            }

            //Generate New Random Password
            $random_password = Str::random(8);
            //Encode/secure password
            $new_password = bcrypt($random_password);
            User::where('email',$data['email'])->update(['password'=>$new_password]);
            $userName = User::select('name')->where('email',$data['email'])->first();
            $email = $data['email'];
            $name = $userName->name;
            $messageData = [
                'email'=>$email,
                'name'=>$name,
                'password'=>$random_password
            ];
            Mail::send('emails.forgot_password',$messageData,function($message) use($email){
            $message->to($email)->subject("Get New Password - E-Commerce");
            });

            $message = "Please Check Email For New Password!";
            Session::put('success_message',$message);
            return redirect('/login-register');
        }
        return view('home.forgot_password');
    }

    

    // public function chkUserPassword(Request $request){
    //     if($request->isMethod('post')){
    //         $data = $request->all();
    //         // echo "<pre>"; print_r($data); die;
    //         $user_id = Auth::User()->id;
    //         $checkPassword = User::select('password')->where('id',$user_id)->first();
    //         if(Hash::check($data['current_pwd'],$checkPassword->password)){
    //             return "true";
    //         }else{
    //             return "false";
    //         }
    //     }
    // }
    // public function updateUserPassword(Request $request){
    //     if($request->isMethod('post')){
    //         $data = $request->all();
    //         Session::forget('error_message');
    //         Session::forget('success_message');
            
    //         // echo "<pre>"; print_r($data); die;
    //         $user_id = Auth::User()->id;
    //         $checkPassword = User::select('password')->where('id',$user_id)->first();
    //         if(Hash::check($data['current_pwd'],$checkPassword->password)){
    //             //Update Password
    //             $new_pwd = bcrypt($data['new_pwd']);
    //             User::where('id',$user_id)->update(['password'=>$new_pwd]);
    //             $message = "Password Updated Successfully";
    //             Session::put('success_message',$message);
    //             return redirect()->back();

    //         }else{
    //             $message = "Current Password is Incorrect!";
    //             Session::put('error_message',$message);
    //             return redirect()->back();
    //         }
    //     }
    // }
    public function addClinic(Request $request){
        return view('layouts.admin_layout.add_clinic');
    }
    public function saveInstitution(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $user = new HospitalData;
            $users = new User;
            $user->institute_type=$data['institute_type'];
            $user->institute_name=$data['institute_name'];
            $user->email=$data['email'];
            $user->phone=$data['phone'];
            $user->password=bcrypt($data['password']);
            $user->address=$data['address'];
            $users->email=$data['email'];
            $users->mobile=$data['phone'];
            $users->password=bcrypt($data['password']);
            $users->address=$data['address'];
            $users->user_type='hospital';
            $user->year_drp_down=$data['year_drp_down'];
            $user->latitude=$data['latitude'];
            $user->longitude=$data['longitude'];
            if($request->hasfile('logo'))
        {
                $file = $request->file('logo');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads/userdata/', $filename);
                $user->logo = $filename;
        }
            // $user->status=0;
            $user->save();
            $users->save();
            
            return redirect('/list-clinic')->with('success', 'Data added successfully');
            // return redirect()->back()->with('status','Data added successfully');
        }
       
       
       
        
    }

    public function listClinic(){
        $clinicdata = HospitalData::paginate(5);
       
        $count = HospitalData::count();
        return view('layouts.admin_layout.all_clinic_list',compact('clinicdata','count'));
    }
    public function editInstitution($id){
        $clinicdata = HospitalData::find($id);
        return view('layouts.admin_layout.clinic_edit',compact('clinicdata'));
    }
    public function updateInstitution(Request $request,$id){
        // dd($request);
        $clinicdata = HospitalData::find($id);
        $clinicdata->institute_type=$request->institute_type;
        $clinicdata->institute_name=$request->institute_name;
        $clinicdata->email=$request->email;
        $clinicdata->phone=$request->phone;
        $clinicdata->password=bcrypt($request->password);
        $clinicdata->address= $request->address;
        $clinicdata->year_drp_down=$request->year_drp_down;
        $clinicdata->latitude=$request->latitude;
        $clinicdata->longitude=$request->longitude;
        if($request->hasfile('logo'))
        {
            $destination ="uploads/userdata/".$clinicdata->logo;
            if (File::exists($destination)) {
               File::delete($destination);
            }
            $file = $request->file('logo');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/userdata/', $filename);
            $clinicdata->logo = $filename;
        }
        $clinicdata->update();
        return redirect('/list-clinic')->with('status', 'Data updated successfully');
    }
    public function deleteInstitution($id){
        $clinicdata = HospitalData::find($id);
        $destination ="uploads/userdata/".$clinicdata->logo;
        if (File::exists($destination)) {
            File::delete($destination);
         }
         $clinicdata->delete();
         return redirect('/list-clinic')->with('status', 'Data deleted successfully');
    }
    public function email_available_check(Request $request){
        if($request->get('email'))
        {
            $email = $request->get('email');
            $data = DB::table("users")
            ->where('email', $email)
            ->count();
            if($data > 0)
            {
            echo 'not_unique';
            }
            else
            {
            echo 'unique';
            }
        }
    
    }


    // Speciality code start
    public function speciality_available_check(Request $request){
        if($request->get('speciality'))
        {
            $speciality = $request->get('speciality');
            $data = DB::table("specialities")
            ->where('speciality', $speciality)
            ->count();
            if($data > 0)
            {
            echo 'not_unique';
            }
            else
            {
            echo 'unique';
            }
        }
    
    }
    public function add_speciality(){
        return view('layouts.admin_layout.add_speciality');
    }
    public function save_speciality(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $speciality_data = new Speciality;
            $speciality_data->speciality = $data['speciality'];
           
            if($request->hasfile('icon'))
            {
                    $file = $request->file('icon');
                    $extention = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extention;
                    $file->move('uploads/speciality/', $filename);
                    $speciality_data->icon = $filename;
            }
            
            $speciality_data->save();
            
            return redirect('/list-speciality')->with('success', 'Data added successfully');
        }
    }
    public function list_speciality(){
        $specialitydata = Speciality::paginate(5);       
        $count = Speciality::count();
        return view('layouts.admin_layout.speciality_list',compact('specialitydata','count'));
    }
    public function edit_speciality($id){
        $specialitydata = Speciality::find($id);
        return view('layouts.admin_layout.speciality_edit',compact('specialitydata')); 
    }
    // update_speciality
    public function update_speciality(Request $request,$id){
        
        $specialitydata = Speciality::find($id);
        $specialitydata->speciality=$request->speciality;
        if($request->hasfile('icon'))
        {
            $destination ="uploads/speciality/".$specialitydata->icon;
            if (File::exists($destination)) {
               File::delete($destination);
            }
            $file = $request->file('icon');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/speciality/', $filename);
            $specialitydata->icon = $filename;
        }
        $specialitydata->update();
        return redirect('/list-speciality')->with('status', 'Data updated successfully');
    }
    public function delete_speciality($id){
        $specialitydata = Speciality::find($id);
        $destination ="uploads/speciality/".$specialitydata->icon;
        if (File::exists($destination)) {
            File::delete($destination);
         }
         $specialitydata->delete();
         return redirect('/list-speciality')->with('status', 'Data deleted successfully');
    }
    // Speciality code end

    // Doctor code start

    public function add_doctor(){
        return view('layouts.admin_layout.add_doctor');
    }
    public function dropDownShow()
    {
        $specialities = Speciality::all();
        return response()->json($specialities);
        // return view('layouts.admin_layout.add_doctor', compact('id', 'items'));
    }
    public function dropDownHospital()
    {
        $hospitaldata = HospitalData::all();
        return response()->json($hospitaldata);
    }
    public function save_doctor(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $doctor_data = new DoctorInformation();
            $doctor_data->hospital_name = $data['hospital_name'];
            $doctor_data->name = $data['name'];
            $doctor_data->email = $data['email'];
            $doctor_data->mobile = $data['mobile'];
            $doctor_data->dob = $data['dob'];
            $doctor_data->experience = $data['experience'];
            $doctor_data->docstatus = $data['docstatus'];
            $doctor_data->designation = $data['designation'];
            $doctor_data->password = bcrypt($data['password']);
            $doctor_data->landline = $data['landline'];
            $doctor_data->gender = $data['gender'];
            $doctor_data->licenseno = $data['licenseno'];
            $doctor_data->about = $data['about'];
            $doctor_data->degree = $data['degree'];
            $doctor_data->pyear = $data['pyear'];
            $doctor_data->speciality = $data['speciality'];
            $doctor_data->clinicfee = $data['clinicfee'];
            $doctor_data->commissionfee = $data['commissionfee'];
            $doctor_data->onlinefee = $data['onlinefee'];
            // $doctor_data->addrs_name = $data['addrs_name'];
            $doctor_data->state = $data['state'];
            $doctor_data->street = $data['street'];
            $doctor_data->full_addrs = $data['full_addrs'];
            $doctor_data->city = $data['city'];
            $doctor_data->zip = $data['zip'];
           
            if($request->hasfile('profilepic'))
            {
                    $file = $request->file('profilepic');
                    $extention = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extention;
                    $file->move('uploads/profilepic/', $filename);
                    $doctor_data->profilepic = $filename;
            }
            
            $doctor_data->save();
            
            return redirect('/list-doctor')->with('success', 'Data added successfully');
        }
    }
    public function list_doctor(){
        $doctordata = DoctorInformation::paginate(5);       
        $count = DoctorInformation::count();
        return view('layouts.admin_layout.list_doctor',compact('doctordata','count'));
    }
    public function edit_doctor($id){
        $doctordata = DoctorInformation::find($id);
        $hospitalanames = HospitalData::where('id',$doctordata->hospital_name)->get();
        return view('layouts.admin_layout.doctor_edit',compact('doctordata','hospitalanames'));
    }
    public function update_doctor(Request $request,$id){
        $doctordata = DoctorInformation::find($id);
        // dd($doctordata);
        $doctordata->hospital_name=$request->hospital_name;
        $doctordata->name=$request->name;
        $doctordata->email=$request->email;
        $doctordata->mobile=$request->mobile;
        $doctordata->dob=$request->dob;
        $doctordata->experience=$request->experience;
        $doctordata->docstatus=$request->docstatus;
        $doctordata->designation=$request->designation;
        $doctordata->password=$request->password;
        $doctordata->landline=$request->landline;
        $doctordata->gender=$request->gender;
        $doctordata->licenseno=$request->licenseno;
        $doctordata->about=$request->about;
        $doctordata->degree=$request->degree;
        $doctordata->pyear=$request->pyear;
        $doctordata->speciality=$request->speciality;
        $doctordata->clinicfee=$request->clinicfee;
        $doctordata->commissionfee=$request->commissionfee;
        $doctordata->onlinefee=$request->onlinefee;
        // $doctordata->addrs_name=$request->addrs_name;
        $doctordata->state=$request->state;
        $doctordata->street=$request->street;
        $doctordata->full_addrs=$request->full_addrs;
        $doctordata->city=$request->city;
        $doctordata->zip=$request->zip;
        if($request->hasfile('profilepic'))
        {
            $destination ="uploads/profilepic/".$doctordata->profilepic;
            if (File::exists($destination)) {
               File::delete($destination);
            }
            $file = $request->file('profilepic');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/profilepic/', $filename);
            $doctordata->profilepic = $filename;
        }
        $doctordata->update();
        return redirect('/list-doctor')->with('status', 'Data updated successfully');
    }
    public function delete_doctor($id){
        $doctordata = DoctorInformation::find($id);
        $destination ="uploads/profilepic/".$doctordata->icon;
        if (File::exists($destination)) {
            File::delete($destination);
         }
         $doctordata->delete();
         return redirect('/list-doctor')->with('status', 'Data deleted successfully');
    }
    // Doctor code end
    // Symptoms start

    public function list_symptom(){
        $symptomdata = Symptom::paginate(5);       
        $count = Symptom::count();
        return view('layouts.admin_layout.symptom_list',compact('symptomdata','count'));
    }
    public function save_symptom(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $symptomdata = new Symptom;
            $symptomdata->symptom = $data['symptom'];
           
            if($request->hasfile('icon'))
            {
                    $file = $request->file('icon');
                    $extention = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extention;
                    $file->move('uploads/symptom/', $filename);
                    $symptomdata->icon = $filename;
            }
            
            $symptomdata->save();
            
            return redirect('/list-symptom')->with('success', 'Data added successfully');
        }
    }
    public function delete_symptom($id){
        $symptomdata = Symptom::find($id);
        $destination ="uploads/symptom/".$symptomdata->icon;
        if (File::exists($destination)) {
            File::delete($destination);
         }
         $symptomdata->delete();
         return redirect('/list-symptom')->with('status', 'Data deleted successfully');
    }
    public function symptom_available_check(Request $request){
        if($request->get('symptom'))
        {
            $symptom = $request->get('symptom');
            $data = DB::table("symptoms")
            ->where('symptom', $symptom)
            ->count();
            if($data > 0)
            {
            echo 'not_unique';
            }
            else
            {
            echo 'unique';
            }
        }
    }
    // Symptoms end
    
    // list_state state code start
    public function list_state(){
        $statecitydata = State::paginate(5);       
        // $statecitydata = StateCity::paginate(5);       
        $count = State::count();
        return view('layouts.admin_layout.state_city_list',compact('statecitydata','count'));
    }
    public function list_city(){
        $statecitydata = StateCity::paginate(5);       
        // $statecitydata = StateCity::paginate(5);       
        $count = State::count();
        return view('layouts.admin_layout.city_list',compact('statecitydata','count'));
    }
    public function save_state(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $statedata = new State;
            $statedata->state = $data['state'];
            $statedata->save();
            // $state_id = $statedata->id;
            // $citydata = new StateCity;
            
            // $citydata->city = $data['city'];
            // $citydata->state_id = $state_id;
            // $citydata->save();
            
            
            return redirect('/list-state-city')->with('success', 'Data added successfully');
        }
    }
    public function save_city(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $statedata = new StateCity;
            $statedata->state_id = $data['state'];
            $statedata->city = $data['city'];
            $statedata->save();
          
            
            
            return redirect('/list-city')->with('success', 'Data added successfully');
        }
    }
    public function delete_state($id){
        $statedata = State::find($id);
       
         $statedata->delete();
         return redirect('/list-state-city')->with('status', 'Data deleted successfully');
    }
    public function delete_city($id){
        $statedata = StateCity::find($id);
       
         $statedata->delete();
         return redirect('/list-city')->with('status', 'Data deleted successfully');
    }
    public function state_available_check(Request $request){
        if($request->get('state'))
        {
            $state = $request->get('state');
            $data = DB::table("states")
            ->where('state', $state)
            ->count();
            if($data > 0)
            {
            echo 'not_unique';
            }
            else
            {
            echo 'unique';
            }
        }
    }
    public function city_available_check(Request $request){
        if($request->get('city'))
        {
            $state = $request->get('city');
            $data = DB::table("state_cities")
            ->where('city', $state)
            ->count();
            if($data > 0)
            {
            echo 'not_unique';
            }
            else
            {
            echo 'unique';
            }
        }
    }
    //  state code end

    // patient code start
    public function delete_patient($id){
        $patientdata = PatientInfo::find($id);
        $destination ="uploads/patientfile/".$patientdata->profilepic;
        if (File::exists($destination)) {
            File::delete($destination);
         }
         $patientdata->delete();
         return redirect('/list-patient')->with('status', 'Data deleted successfully');
    }
    public function list_patient(){
        $patientdata = PatientInfo::paginate(5);       
        $count = PatientInfo::count();
        return view('layouts.admin_layout.list_patient',compact('patientdata','count'));
    }
    public function add_patient(){
        return view('layouts.admin_layout.add_patient');
    }
    public function save_patient(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $doctor_data = new PatientInfo();
            $doctor_data->name = $data['name'];
            $doctor_data->password = $data['password'];
            $doctor_data->email = $data['email'];
            $doctor_data->gender = $data['gender'];
            $doctor_data->mobile = $data['mobile'];
            $doctor_data->dob = $data['dob'];
            $doctor_data->blood = $data['blood'];
            $doctor_data->height = $data['height'];
            $doctor_data->weight = $data['weight'];
            $doctor_data->patientstatus = $data['patientstatus'];
            $doctor_data->password = bcrypt($data['password']);
            
            $doctor_data->latitude = $data['latitude'];
            $doctor_data->longitude = $data['longitude'];
            $doctor_data->state = $data['state'];
            $doctor_data->full_addrs = $data['full_addrs'];
            $doctor_data->city = $data['city'];
           
            if($request->hasfile('profilepic'))
            {
                    $file = $request->file('profilepic');
                    $extention = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extention;
                    $file->move('uploads/patientfile/', $filename);
                    $doctor_data->profilepic = $filename;
            }
            
            $doctor_data->save();
            
            return redirect('/list-patient')->with('success', 'Data added successfully');
        }
    }
    public function update_patient(Request $request,$id){
        
            
            $doctor_data =  PatientInfo::find($id);
            
            $doctor_data->name = $request->name;
            $doctor_data->password = $request->password;
            $doctor_data->email = $request->email;
            $doctor_data->gender = $request->gender;
            $doctor_data->mobile = $request->mobile;
            $doctor_data->dob = $request->dob;
            $doctor_data->blood = $request->blood;
            $doctor_data->height = $request->height;
            $doctor_data->weight = $request->weight;
            $doctor_data->patientstatus = $request->patientstatus;
            $doctor_data->password = bcrypt($request->password);
            
            $doctor_data->latitude = $request->latitude;
            $doctor_data->longitude = $request->longitude;
            $doctor_data->state = $request->state;
            $doctor_data->full_addrs = $request->full_addrs;
            $doctor_data->city = $request->city;
           
            if($request->hasfile('profilepic'))
            {
                    $file = $request->file('profilepic');
                    $extention = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extention;
                    $file->move('uploads/patientfile/', $filename);
                    $doctor_data->profilepic = $filename;
            }
            
            $doctor_data->update();
            
            return redirect('/list-patient')->with('success', 'Data added successfully');
       
    }
    public function dropDownState()
    {
        $states = State::all();
        return response()->json($states);
        // return view('layouts.admin_layout.add_doctor', compact('id', 'items'));
    }
    public function dropDownCity(Request $request)
    {
        $cities = StateCity::where("state_id", $request->stateid)
                                ->get(["city", "id"]);
        return response()->json($cities);
        
    }
    public function edit_patient($id){
        $patientdata = PatientInfo::find($id);
        $states = State::all();
        $citynames = StateCity::where('state_id',$states[0]['id'])->get();
        return view('layouts.admin_layout.patient_edit',compact('patientdata','states','citynames'));
    }
    public function showPatient(Request $request)
    {
       $patients = PatientInfo::all();
       if($request->keyword != ''){
       $patients = PatientInfo::where('name','LIKE','%'.$request->keyword.'%')->get();
       }
       return response()->json([
          'patients' => $patients
       ]);
     }
 
    // patient code end

    // Appointment code start

        public function add_new_appointment(){
            return view('layouts.admin_layout.add_new_appointment');
        }
        public function add_existing_appointment(){
            return view('layouts.admin_layout.add_existing_appointment');
        }
        public function update_existing_appointment(Request $request){
            if ($request->isMethod('post')) {
                $data = $request->all();
                // echo '<pre>';print_r($data);
                $exist_appointment = new Appointment();
                $exist_appointment->hospital_id = $data['hospital_id'];
                $exist_appointment->doctor_id = $data['doctor_id'];
                $exist_appointment->appoint_date = $data['appoint_date'];
                // $exist_appointment->appoint_date = $data['appoint_date'];
                $exist_appointment->patient_id = $data['patient_id'];
                $exist_appointment->slot_time = $data['slot_time'];
                $exist_appointment->save();
            }
            return redirect('/list-new-appointment')->with('success', 'Data added successfully');
            // return view('layouts.admin_layout.list_new_appointment');
        }
        public function update_appointment(Request $request,$patient_id){
            
            
                
                $data = $request->all();
                
                $exist_appointment = Appointment::where('patient_id',$patient_id)->first();
                $exist_appointment->hospital_id = $data['hospital_id'];
                $exist_appointment->doctor_id = $data['doctor_id'];
                $exist_appointment->appoint_date = $data['appoint_date'];
                $exist_appointment->slot_time = $data['slot_time'];
                $exist_appointment->update();
            
            return redirect('/list-new-appointment')->with('success', 'Data added successfully');
            
        }
        public function appointment_delete($id){
            $appointdata = Appointment::find($id);
            $appointdata->delete();
            return redirect('/list-new-appointment')->with('status', 'Data deleted successfully');
        }
        public function appointment_edit($patient_id){
            $appointment_data = Appointment::where('patient_id',$patient_id)->first();
            // dd($appointment_data);
            $hospitalinfo = HospitalData::all();
            $docinfo = DoctorInformation::where('hospital_name',$hospitalinfo[0]['id'])->get();
            return view('layouts.admin_layout.appointment_edit',compact('appointment_data','docinfo','hospitalinfo'));
            
        }
        public function search_patient_name(Request $request){
            
                $keyword = $request->keyword;
                $patientdata = PatientInfo::where('id', $keyword)->orWhere('name', 'like', '%' . $keyword . '%')->get();
            
                return response()->json(['patientdata' => $patientdata]);
          
        }
        public function get_patient_details(Request $request){
            
                $keyword = $request->name;
                $patientdetails = PatientInfo::where('name',  $keyword )->first();
            
                return response()->json(['patientdetails' => $patientdetails]);
          
        }
        public function doctorname(Request $request){
            $hospital_id = $request->hospital_name;
            
            $doctornames = DoctorInformation::where("hospital_name", $hospital_id)
            ->where('docstatus','active')
            ->get(["name", "id"]);
            return response()->json([
                'doctornames' => $doctornames
             ]);
        }
        public function save_new_appointment(Request $request){
            if($request->isMethod('post')){
                $data = $request->all();
                $doctor_data = new PatientInfo();
                $doctor_data->name = $data['name'];
                $doctor_data->password = $data['password'];
                $doctor_data->email = $data['email'];
                $doctor_data->gender = $data['gender'];
                $doctor_data->mobile = $data['mobile'];
                $doctor_data->dob = $data['dob'];
                $doctor_data->blood = $data['blood'];
                $doctor_data->height = $data['height'];
                $doctor_data->weight = $data['weight'];
                $doctor_data->patientstatus = $data['patientstatus'];
                $doctor_data->password = bcrypt($data['password']);
                
                $doctor_data->latitude = $data['latitude'];
                $doctor_data->longitude = $data['longitude'];
                $doctor_data->state = $data['state'];
                $doctor_data->full_addrs = $data['full_addrs'];
                $doctor_data->city = $data['city'];
               
                if($request->hasfile('profilepic'))
                {
                        $file = $request->file('profilepic');
                        $extention = $file->getClientOriginalExtension();
                        $filename = time().'.'.$extention;
                        $file->move('uploads/patientfile/', $filename);
                        $doctor_data->profilepic = $filename;
                }
                
                $doctor_data->save();
                $last_id = $doctor_data->id;

                $appointment_data = new Appointment();
                $appointment_data->hospital_id = $data['hospital_name'];
                $appointment_data->doctor_id = $data['doc_name'];
                $appointment_data->appoint_date = $data['appoint_date'];
                $appointment_data->slot_time = $data['slot_time'];
                // $appointment_data->slot_time = implode(',',$data['slot_time']);
                $appointment_data->patient_id = $last_id;
                $appointment_data->save();
                return redirect('/add-new-appointment')->with('success', 'Data added successfully');
            }
        }
        public function list_new_appointment(){
            $date = request()->input('date');
            // dd($date);
            if ($date) {
               
                // Convert the date string to a DateTime object
                $dateTime = DateTime::createFromFormat('d-m-Y', $date);
                
                // Retrieve data for the specified date
                $appointmentdata = Appointment::where('appoint_date', $dateTime->format('Y-m-d'))->paginate(5);
                
                $count = Appointment::count();
            }else{
                $appointmentdata = Appointment::paginate(5);
                $count = Appointment::count();
            }
            
              
            
            return view('layouts.admin_layout.list_new_appointment',compact('appointmentdata','count'));
        }
        
        // public function available_selected_slot(Request $request){
        //     $appointment_data = AppointmentMaster::where("doctor_id", $request->doctor_id)
        //                         ->first(["available_category", "slot_start_time","slot_end_time",                "break_start_time","break_end_time"]);
        //     $template = view('layouts.admin_layout.available_slot_ajax',compact('appointment_data'))->render();
        //     return response()->json(['template' => $template]);
        // }

        // appointment master code start
        public function add_appointment_slot(){
            $appointment_master = AppointmentMaster::paginate(5);       
            $count = AppointmentMaster::count();
            return view('layouts.admin_layout.add_appointment_slot',compact('appointment_master','count'));
        }
        public function save_appointment_master(Request $request){
            if ($request->isMethod('post')) {
                $data = $request->all();
                $appointment_data = new AppointmentMaster();
                $appointment_data->hospital_id = $data['hospital_id'];
                $appointment_data->doctor_id = $data['doctor_id'];
                $appointment_data->date = $data['date'];
                $appointment_data->available_category = $data['available_category'];
                $appointment_data->slot_start_time = $data['slot_start_time'];
                $appointment_data->slot_end_time = $data['slot_end_time'];
                $appointment_data->break_start_time = $data['break_start_time'];
                $appointment_data->break_end_time = $data['break_end_time'];
                $appointment_data->save();
                return redirect('/add-appointment-slot')->with('success', 'Data added successfully');
            }
        }
        public function available_slot(Request $request){
            $appointment_data = AppointmentMaster::where("doctor_id", $request->doctor_id)
                                ->first(["available_category", "slot_start_time","slot_end_time","break_start_time","break_end_time"]);
            $selected_slot_time = Appointment::where('doctor_id',$request->doctor_id)->first();
            
            $template = view('layouts.admin_layout.available_slot_ajax',compact('appointment_data','selected_slot_time'))->render();
            return response()->json(['template' => $template]);
        }
        public function show_available_slot(Request $request){
           
            $appointment_data = AppointmentMaster::where("doctor_id", $request->doc_id)
            ->first(["available_category", "slot_start_time","slot_end_time","break_start_time","break_end_time"]);
            
            $selected_slot_time = Appointment::where('doctor_id',$request->doc_id)->where('patient_id',$request->patient_id)->first();

            $template = view('layouts.admin_layout.show_available_slot_ajax',compact('appointment_data','selected_slot_time'))->render();
            return response()->json(['template' => $template]);
        }
        public function appointment_master_delete($id){
            $patientdata = AppointmentMaster::find($id);
             $patientdata->delete();
             return redirect('/add-appointment-slot')->with('status', 'Data deleted successfully');
        }
    // Appointment master code end


    // consultation code start 
    public function add_consultation($patient_id){
        $appointment_data = Appointment::where('patient_id',$patient_id)->first();
        $hospitalinfo = HospitalData::all();
        $docinfo = DoctorInformation::where('hospital_name',$hospitalinfo[0]['id'])->get();
            // return view('layouts.admin_layout.appointment_edit',compact('appointment_data','docinfo','hospitalinfo'));
        return view('layouts.admin_layout.add_consultation',compact('appointment_data','docinfo','hospitalinfo'));
    }
    // consultation code end
        
}
