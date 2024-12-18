<?php

namespace App\Http\Controllers;

use App\Models\AuthImageVideo;
use App\Models\AuthorizedPartne;
use App\Models\Category;
use App\Models\Event;
use App\Models\ProductCode;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use App\Models\UserDetails;
use Carbon\Carbon;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Support\Str;



// use App\Http\Requests\CheckCodeAuthenticityRequest;

class FrontendController extends Controller
{


    // User Part
    public function checkAuthenticity()
    {
        $collection = AuthImageVideo::all();

        return view('frontend.pages.check-authenticity', compact('collection'));
    }
    
     public function checkCodeAuthenticity(Request $request)
    {
        $productCode = ProductCode::where('product_code', $request->product_code)->first();
    if($productCode)
    {
        if($productCode->code_search == 0){
            $productCode->update([
                'code_search' => 1,
            ]);
            return redirect()->route('check-authenticity')->with('message', 'আপনার প্রোডাক্টটি অরিজিনাল');
           }           
           if($productCode->code_search == 1){
            $message = 'আপনার কোডটি মেয়াদ উত্তীর্ণ হয়ে গিয়েছে';
         
            function convertToBengaliNumerals($number)
            {
                $bengaliNumerals = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                $westernNumerals = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
            
                return str_replace($westernNumerals, $bengaliNumerals, $number);
            }         
            $date = Carbon::parse($productCode->updated_at)->locale('bn');
            $day = convertToBengaliNumerals($date->format('d'));
            $year = convertToBengaliNumerals($date->format('Y'));
            $time = convertToBengaliNumerals($date->format('h:i:s'));
            $month = $date->translatedFormat('F');            
            $codeExpireDate = "$day $month, $year, $time";
            return redirect()->route('check-authenticity')->with(compact('message', 'codeExpireDate'));
           } 
    }
                
    return redirect()->route('check-authenticity')->with('message', 'আপনার প্রোডাক্টটি অরিজিনাল না');
    }
    public function checkCodeAuthenticityAjax(Request $request)
    {
        function convertToBengaliNumerals($number)
        {
            $bengaliNumerals = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
            $westernNumerals = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        
            return str_replace($westernNumerals, $bengaliNumerals, $number);
        } 

        $productCode = ProductCode::where('product_code', $request->product_code)->first();
        if ($productCode) {
            if ($productCode->code_search == 0) {
                $productCode->update([
                    'code_search' => 1,
                ]);
                return response()->json(['message'=>'আপনার প্রোডাক্টটি অরিজিনাল']);
            }
            if ($productCode->code_search == 1) {
                $message = '
                আপনার কোডটি মেয়াদ উত্তীর্ণ হয়ে গিয়েছে';
                // $date = Carbon::parse($productCode->updated_at)->locale('bn');
                // $day = $date->format('d');
                // $year = $date->format('Y');
                // $time = $date->format('h:i:s');
                // $month = $date->translatedFormat('F');
                // $codeExpireDate = "Your code has expired: $day $month, $year, $time";
                $date = Carbon::parse($productCode->updated_at)->locale('bn');
                $day = convertToBengaliNumerals($date->format('d'));
                $year = convertToBengaliNumerals($date->format('Y'));
                $time = convertToBengaliNumerals($date->format('h:i:s'));
                $month = $date->translatedFormat('F');            
                $codeExpireDate = "আপনার কোডটি মেয়াদ উত্তীর্ণ হয়ে গিয়েছে: $day $month, $year, $time";
                return response()->json(['message'=>$message, 'codeExpireDate' =>$codeExpireDate]);
            }
        }
        return response()->json(['message'=>'আপনার প্রোডাক্টটি অরিজিনাল না']);
    }






    public function homePage()
    {
        $products = Category::with('product')->get();
        $sliders = Slider::all();
        $collection = AuthImageVideo::all();
        // dd($products);
        return view('frontend.pages.home', compact('products', 'sliders', 'collection'));
    }

    public function product()
    {
        $products = Product::all();
        // dd($products);
        return view('frontend.pages.product', compact('products'));
    }
    public function contactUs()
    {
        return view('frontend.pages.contact-us');
    }
    public function aboutUs()
    {
        return view('frontend.pages.about-us');
    }

    public function getAuthorizedPartbner()
    {
        $authorizePartners = AuthorizedPartne::all();
        $events = Event::all();
        return view('frontend.pages.authorized-partners', compact('authorizePartners', 'events'));
    }
    public function sellerSearch(Request $request)
    {
        $mobile_number = $request->input('mobile_number');
        $userDetails = UserDetails::with('division', 'district', 'thana', 'group')->where('mobile_number', $mobile_number)->first();
        // dd($userDetails);
        if ($userDetails) {
            $user = User::find($userDetails->user_id);
            return view('frontend.pages.seller-details', compact('userDetails', 'user'));
        } else {
            return redirect()->back()->with('sellerMessage', 'No seller found for given number!');
        }
    }
        public function reseller()
    {
        return view('frontend.pages.reseller');
    }
    public function ব্যবহারবিধি()
    {
        return view('frontend.pages.ব্যবহারবিধি');
    }
}
