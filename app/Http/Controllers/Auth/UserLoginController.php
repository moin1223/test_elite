<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{

    public function store(Request $request)
    {
        if ($request->role == 'user') {
            $this->validate($request, [
                'mobile_number' => 'required',
                'password' => 'required'
            ]);
            // dd($request->mobile_number);
            $userDetails = UserDetails::where('mobile_number', $request->mobile_number)->first();
            // dd($request->password);

            if ($userDetails) {
                $user = User::find($userDetails->user_id);
                if ($userDetails->mobile_number == $request->mobile_number && Hash::check($request->password, $user->password)) {

                    // dd($user);
                    Auth::login($user);
                    return redirect('/home-page');
                } else {
                    return back()->with('message', 'User credentail incorrect!');
                }
            } else {
                return back()->with('message', 'phone number not registered!');
            }
        }
    
    }


}
