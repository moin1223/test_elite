<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\UserDetails; 
use Exception;

class SendSms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:sms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send sms to user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //test
        //   try {
            // Fetch all user details where sms is between 1 and 6
            $userDetailsList = UserDetails::whereBetween('sms', [1, 6])->get();
    
            // Define messages based on the sms value
            $messages = [
                1 => 'এলিট কর্পোরেশন এর অরজিনাল পণ্য সম্পর্কে জানতে নিচের লিংকটিতে ক্লিক করুন।',
                2 => 'এলিট কর্পোরেশন এর পণ্য, গুনে মানে অনন্য। বাংলাদেশের সকল ভিআইপি এবং সেলিব্রেটিদের প্রথম পছন্দ, এলিট কর্পোরেশন এর পণ্য।',
                3 => 'এলিট কর্পোরেশন এর পণ্য গুণগত মানে সেরা হওয়ায়, বাজারে নকল পণ্য ব্যাপকভাবে বিক্রয় হচ্ছে। যা নিজের টাকা দিয়ে নিজের ক্ষতি নিজেই করা।',
                4 => 'পণ্য অর্ডার দেওয়ার আগে কাস্টমার কেয়ারের নাম্বার www.elitecorpo.com ওয়েবসাইটে চেক করে দেখুন। পণ্য রিসিভ করার পূর্বে পণ্যটি অথেন্টিক কিনা একই ওয়েবসাইটে ব্যবহার করে যাচাই করুন।',
                5 => 'পার্সেলটি রিসিভ করার পরে অবশ্যই কাস্টমার কেয়ারে কল দিয়ে আরেকবার পন্যের ব্যবহার বিধি এবং অতিরিক্ত নিয়ম ভালোভাবে জেনে নিন।',
                6 => 'পণ্য সঠিকভাবে ব্যবহার করে দশ দিনের মধ্যে ফিডব্যাক জানান এবং পরামর্শ করুন। ভালো রেজাল্ট পাওয়ার পরে অবশ্যই একটি রিভিউ দিবেন ওয়েবসাইটে। এছাড়াও রয়েছে  উদ্যোক্তা হওয়ার সুযোগ।',
            ];
    
            $smsSentCount = 0; // Counter to track successful SMS sends
    
            // Loop through each user detail record
            foreach ($userDetailsList as $userDetails) {
                // Check if sms value is within the allowed range
                if (!array_key_exists($userDetails->sms, $messages)) {
                    continue; // Skip if sms value is out of range
                }
    
                // Prepare the SMS data
                $postUrl = "https://api.smsinbd.com/sms-api/sendsms";
                $postValues = [
                    'api_token' => 'WHXg6jQhZzc5Lqd0N9f3mvp9qAeTmKJ7IgTEM8L0',  // Replace with your actual API key
                    'senderid' => 'Elite Corpo',  // Replace with your sender ID
                    'message' => $messages[$userDetails->sms],  // Select message based on sms value
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
    
                // Check if the SMS was sent successfully and update sms column
                if ($array['status'] === 'success') {
                    $userDetails->sms = $userDetails->sms + 1;
                    $userDetails->save();
                    $smsSentCount++;
                }
            }
    
            // Return a JSON response with the success count
            // return response()->json([
            //     'status' => 'success',
            //     'message' => "$smsSentCount SMS messages sent successfully!",
            //     'smsSentCount' => $smsSentCount,
            // ]);
    
        // } catch (Exception $e) {
        //     // Catch and handle exceptions
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => $e->getMessage(),
        //     ], 500);
        // }
        // return response()->json('gagzazf');
     
     
     
     
     //test
    }
}
