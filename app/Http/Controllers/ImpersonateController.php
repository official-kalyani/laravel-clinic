<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImpersonateController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','can:admin']);
    }
    public function impersonate(Request $request){
        $user = User::where('email',$request->email)->first();
        auth()->loginUsingId($user->id);
        // session()->put('impersonate_by',auth()->id());
        // Auth::attempt(['email' => $request->email]);
        return redirect('/dashboard');
    }
}
