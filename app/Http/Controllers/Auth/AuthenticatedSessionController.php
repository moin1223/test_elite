<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\RequestedUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }
    public function userLogin()
    {
        return view('auth.user-login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        // Check the director accept the user
        // $checkIfTheUserIsAccepted = RequestedUser::where([['email', $request->email], ['status', 0]])->first();
        // if ($checkIfTheUserIsAccepted) {
        //     throw ValidationException::withMessages([
        //         'email' => "Looks like the Director didn't accepted your request yet. Please be patient.",
        //     ]);
        // }

        $request->authenticate();

        $request->session()->regenerate();
        if (Auth::user()->hasRole('user|seller')) {
            return redirect('/home-page'); // Redirect admin users to a different home route
        }
    
        return redirect('/dashboard');

        // return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
