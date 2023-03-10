<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImpersonateController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth','can:admin']);
    // }
    public function impersonate($email){
        // if (session()->has('impersonate')) {
        //     abort(403, 'Cannot impersonate while already impersonating.');
        // }
    
        // session()->put('impersonate', auth()->id());
        // auth()->login($user);
    
        $user = User::where('email',$email)->first();
        session()->put('impersonate', auth()->id());
        Auth::loginUsingId($user->id);

        // $user = User::where('email',$email)->first();
        // session()->put('impersonate', $user->id);
        // Auth::loginUsingId($user->id);
        return redirect()->away('/dashboard')->with(['target' => '_blank']);
        // return redirect('/dashboard');
    }
    public function destroy(){
        if (session()->has('impersonate')) {
            // auth()->onceUsingId(session()->get('impersonate'));
            session()->forget('impersonate');
        }
       
        return redirect('/dashboard');
    }
}
