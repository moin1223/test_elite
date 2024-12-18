<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\OTPService;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\UserDetails;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class OtpController extends Controller
{
    public function sendOtp()
    {
        $contact_no = Session::get('contact_no');
        $role = Session::get('role');

        if ($contact_no) {
            // $contact_no = 1234;
            (new OTPService)->sendOtp($contact_no);
            return view('auth.otp', compact('contact_no'));
        }if ($role === 'user') {
            return redirect()->route('user-register');
        } else {
            return redirect()->route('seller-register');
        }
    }

    public function resendOtp(Request $request)
    {
        (new OTPService)->sendOtp($request->contact_no);

        return response()->json([
            'sent' => true
        ]);
    }

    public function verifyOtp(Request $request)
    {
        // Check if session data exists at the start
        // if (!Session::has('role') || (!Session::has('user_form_data') && !Session::has('seller_form_data'))) {
        //     return response()->json(['error' => 'Session data is missing'], 400);
        // }
    
        // Proceed with the OTP verification
        $verify = (new OTPService)->verifyOtp($request);
        
        if ($verify['result']) {
            $role = Session::get('role');
    
            if ($role === 'user') {
            
    
                try {
                    // Create a new User
              
                    $first_name = Session::get('first_name');
                    $password = Session::get('password');
                    $gender = Session::get('gender');
                    $division_id = Session::get('division_id');
                    $district_id = Session::get('district_id');
                    $thana_id = Session::get('thana_id');
                    $mobile_number = Session::get('mobile_number');
                    $role = Session::get('role');
                    $user = User::create([
                        'first_name' => $first_name,
                        'last_name' => 'test' ,
                        'password' => Hash::make($password),
                     
                    ]);
    
                    // Create UserDetails for the user
                    $userDetails = UserDetails::create([
                        'gender' => $gender, 
                        'division_id' => $division_id,
                        'district_id' => $district_id,
                        'thana_id' => $thana_id,
                        'mobile_number' => $mobile_number,
                        'role' => $role,
                        'user_id' => $user->id,
                        
                    ]);
                    $userDetails->sms = 1;
                    $userDetails->save();
                             //sms start//
                    // Prepare the SMS data
                $postUrl = "https://api.smsinbd.com/sms-api/sendsms";
                $postValues = [
                    'api_token' => 'WHXg6jQhZzc5Lqd0N9f3mvp9qAeTmKJ7IgTEM8L0',  // Replace with your actual API key
                    'senderid' => 'Elite Corpo',  // Replace with your sender ID
                    'message' => 'বাংলাদেশের ব্র্যান্ডিং ফুড এন্ড কসমেটিক্স প্রতিষ্ঠান এলিট কর্পোরেশন এর পক্ষ থেকে আপনাকে জানাই স্বাগতম।',  // Select message based on sms value
                    'contact_number' => $userDetails->mobile_number,  // Use mobile number from userDetails
                ];
    
                // Convert the data to a query string
                $postString = http_build_query($postValues);
    
                // Initialize cURL
                $ch = curl_init($postUrl);
                if ($ch === false) {
                    throw new Exception('Failed to initialize cURL.');
                }
    
                // Set cURL options
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
                // Execute the request
                $response = curl_exec($ch);
                if ($response === false) {
                    throw new Exception('cURL Error: ' . curl_error($ch));
                }
    
                curl_close($ch);
    
                // Handle the JSON response
                $array = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $response), true);
                if (!$array) {
                    throw new Exception('Invalid JSON response.');
                }
                    //sms end//
                    
                } catch (\Exception $e) {
                    return response()->json(['error' => 'Failed to create user', 'message' => $e->getMessage()], 500);
                }
                
            } else {
                // For other roles, use the seller data and call the existing method
                $data = Session::get('seller_form_data');
                (new RegisteredUserController)->createRequestedUser((object)$data);
            }
        }
    
        return response()->json($verify);
    }
    
}
