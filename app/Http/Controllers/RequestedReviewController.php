<?php

namespace App\Http\Controllers;

use App\Models\RequestedReview;
use App\Models\Review;
use Illuminate\Http\Request;

class RequestedReviewController extends Controller
{
    // public function requestedReview()
    // {
    //     $requestedReviews = RequestedReview::where('status', 0)->get();

    //     return view('website.pages.requested-review.index', compact('requestedReviews'));
    // }
    public function requestedReview()
{
    $requestedReviews = RequestedReview::where('status', 0)->paginate(10);

    return view('website.pages.requested-review.index', compact('requestedReviews'));
}
    public function getRequestedReviewDetails()
    {
        $review_id = request('review_id');
        $requestedReview = RequestedReview::findOrfail($review_id );

        return response()->json($requestedReview);
    }
    public function acceptReviewRequest(Request $request)
    {
        $requestedReview = RequestedReview::findOrfail($request->review_id);
        $requestedReview->update([
            'status' => 1,
        ]);
        $user = Review::create([
            'review' => $requestedReview->review,
            'user_id' => $requestedReview->user_id,
            'product_id' => $requestedReview->product_id,
        ]);
        return redirect()->back()->with(['message' => 'Review Request Accepted', 'alert-type' => 'success']);
    }
    public function cancelReviewRequest($id)
    {
        $requestedUReview= RequestedReview::findOrfail($id);
        $requestedUReview->delete();
        return redirect()->back()->with(['message' => 'Review Request Cancel', 'alert-type' => 'success']);
    }

    public function requestProdructReview(Request $request)
    {
        RequestedReview::create([
            'review' => $request->review,
            'user_id' => auth()->user()->id,
            'status' =>0,
            'product_id' => $request->product_id,
        ]);
        
        return redirect()->back()->with(['message' => 'Review Request send succes', 'alert-type' => 'success']);
    }
}
