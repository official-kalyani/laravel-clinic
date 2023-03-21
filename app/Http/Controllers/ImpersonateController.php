<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ImpersonateController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth','can:admin']);
    // }
    public function impersonate($email){
        
    
        $user = User::where('email',$email)->first();
        if ($user) {
            session()->put('impersonate', $user->id);        
            // Auth::loginUsingId($user->id);
        }
        
        return redirect('/dashboard');

       
       
    }
    public function destroy(){
//         $value = $request->session()->get('key');
// dd($value);
        if (session()->has('impersonate')) {
        //    echo 'x';exit();
            // auth()->onceUsingId(session()->get('impersonate'));
            session()->forget('impersonate');
            
        }
        return redirect('/dashboard');
        
    }
}
