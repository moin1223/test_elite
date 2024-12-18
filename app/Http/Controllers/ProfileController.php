<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    public function editProfile()
    {
        $userDetails = UserDetails::where('user_id', auth()->user()->id)->first();
        return view('website.pages.profile.edit-profile', compact('userDetails'));
    }
    public function updateProfile(ProfileUpdateRequest $request)
    {

        // dd($request->all());

        $userDetails = UserDetails::where('user_id', auth()->user()->id)->first();
        // dd($userDetails);
        if ($userDetails) {
            if ($request->hasFile('image')) {
                if ($userDetails->image) {
                    $filename = substr($userDetails->image, 17);
                    Storage::delete('public/user/' . $filename);
                }
            }
            $image = $request->hasFile('image') ? Storage::url($request->image->store('public/user')) : $userDetails->image;
            $userDetails->update([
                'address' => $request->address,
                'contact_number' => $request->contact_number,
                'image' => $image,
            ]);
        } else {
            $image = $request->hasFile('image') ? Storage::url($request->image->store('public/user')) : null;
            UserDetails::create([
                'address' => $request->address,
                'contact_number' => $request->contact_number,
                'image' => $image,
                'user_id' => auth()->user()->id
            ]);
        }
        return redirect()->back()->with(['message' => 'Profile updated successfully', 'alert-type' => 'success']);
    }
    public function changePassword()
    {
        return view('website.pages.profile.change-password');
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|min:6|max:100',
            'new_password' => 'required|min:6|max:100',
            'confirm_password' => 'required|same:new_password'
        ]);

        $current_user = auth()->user();

        if (Hash::check($request->current_password, $current_user->password)) {

            $current_user->update([
                'password' => Hash::make($request->new_password)

            ]);

            return redirect()->back()->with('message', 'Password successfully updated.');
        } else {
            return redirect()->back()->with('error', 'Current password does not matched.');
        }
    }
}
