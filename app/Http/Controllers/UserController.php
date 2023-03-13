<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\HospitalData;
use App\Models\Speciality;
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
    // Doctor code end
}
