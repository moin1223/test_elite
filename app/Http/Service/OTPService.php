<?php

namespace App\Http\Service;

use Carbon\Carbon;
use App\Models\OTPGeneration;
use Xenon\LaravelBDSms\Sender;
use Xenon\LaravelBDSms\Facades\SMS;
use Illuminate\Support\Facades\Session;
use Xenon\LaravelBDSms\Provider\Mobireach;
use App\Http\Controllers\Auth\RegisteredUserController;
use Exception;


class OTPService
{
    // public function sendOtp($contact_no)
    public function sendOtp($contact_no)

    {
       
        $otp = rand(1000, 9999);

        $message = "Your OTP To Login is - " . $otp;

        // $sender = Sender::getInstance();
        // $sender->setProvider(Mobireach::class);
        // $sender->setMobile($contact_no);
        // $sender->setMessage($message);
        // $sender->setConfig(
        //     [
        //         'Username' => 'elitecor',
        //         'Password' => '3Kaieschy-78',
        //         'From' => 'Elite Corpo'
        //     ]
        // );
        // $sender->send();
        
        //test
        
            // Prepare the SMS data
            $postUrl = "https://api.smsinbd.com/sms-api/sendsms";
            $postValues = [
                'api_token' => 'WHXg6jQhZzc5Lqd0N9f3mvp9qAeTmKJ7IgTEM8L0',  // Replace with your actual API key
                'senderid' => 'Elite Corpo', // Replace with your sender ID
                'message' =>  $message , // Message you want to send
                'contact_number' => $contact_no, // Replace with the mobile number(s)
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

            // Extract data from the response
            $status = $array['status'];
            $message = $array['message'];
            $success = $array['success'] ?? null;
            $failed = $array['failed'] ?? null;

            // Return a JSON response
            // return response()->json([
            //     'status' => $status,
            //     'message' => $message,
            //     'success' => $success,
            //     'failed' => $failed,
            // ]);
                  //test
            return OTPGeneration::create([
                'contact_no' => $contact_no,
                'otp' => $otp,
                'expire_at' => Carbon::now()->addSeconds(120)
            ]);

 
  

        // return OTPGeneration::create([
        //     'contact_no' => $contact_no,
        //     'otp' => $otp,
        //     'expire_at' => Carbon::now()->addSeconds(120)
        // ]);
    }

    // public function verifyOtp($request)
    // {
    //     $REQ_contact_no = '0' . $request->contact_no;
    //     $REQ_otp = $request->otp;
    //     $result = false;
    //     $message = '';
    //     $storedOtp = OTPGeneration::where([
    //         ['contact_no', $REQ_contact_no],
    //         ['otp', $REQ_otp],
    //     ])->latest()->first();

    //     if ($storedOtp) {
    //         $now = Carbon::now();
    //         if ($storedOtp && $now->isBefore($storedOtp->expire_at) && $now->between($storedOtp->created_at, $storedOtp->expire_at)) {
    //             $result = true;
    //             $message = "Success";
    //         } else {
    //             $result = false;
    //             $message = "Invalid Otp!!!";
    //         }
    //     } else {
    //         $result = false;
    //         $message = "Invalid Otp!!!";
    //     }

    //     return [
    //         'result' => $result,
    //         'message' => $message,
    //         'route' => route('seller-register')
    //     ];
    // }
    public function verifyOtp($request)
    {
        $REQ_contact_no = strval($request->contact_no);
        $firstThreeCharacters = substr($REQ_contact_no, 0, 3);
        if ($firstThreeCharacters === '880') {
            $REQ_contact_no = $request->contact_no;
        } else {
            $REQ_contact_no = '0' . $request->contact_no;
        }
        $REQ_otp = $request->otp;
        $result = false;
        $message = '';
        $storedOtp = OTPGeneration::where([
            ['contact_no', $REQ_contact_no],
            ['otp', $REQ_otp],
        ])->latest()->first();

        if ($storedOtp) {
            $now = Carbon::now();
            if ($storedOtp && $now->isBefore($storedOtp->expire_at) && $now->between($storedOtp->created_at, $storedOtp->expire_at)) {
                $result = true;
                $message = "Success";
            } else {
                $result = false;
                $message = "Invalid Otp!!!";
            }
        } else {
            $result = false;
            $message = "Invalid Otp!!!";
        }
        $role = Session::get('role');
        return [  
            'result' => $result,
            'message' => $message,
            'route' => $role === 'user' ? route('user-register') : route('seller-register')
        ];
    }
}
