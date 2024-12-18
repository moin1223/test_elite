@extends('frontend.layouts.default')
@section('content')
<section class="container mt-5">
    <h3 class="text-center fs-2 fw-bold">Review</h3>

    <div>
        <!-- product and reviw input field -->
        <div class="row pb-3">
            <!-- product image -->
            <div class="col-12 col-lg-6 pt-5 ">
                <img class="w-100 mb-3 disable-right-click-image" src="{{$productReviews->image}}" alt="">
                <div class="ms-3">
                    <h5 class="card-title text-uppercase fw-bold mb-2 border-bottom pb-2">{{$productReviews->product_name}}</h5>
                    <p class="card-text mb-0">{{$productReviews->weight}}</p>
                </div>
            </div>

            <!-- product review field -->
            <form method="POST" action="{{ route('request-prodruct-review') }}">
                {{ csrf_field() }}
                <div class="col-12 col-lg-6 px-3 pt-4 p-lg-5 mt-5 mt-lg-0">
                    <input type="hidden" name="product_id" value="{{$productReviews->id}}">
                    <textarea class="w-100" name="review" id="" cols="30" rows="10"></textarea>
                    <div class="w-100 w-lg-75 border text-center px-2 py-3
                    bg-black mt-2">
                        <a href="index.html" class="text-decoration-none ">
                            <button type="submit" class="btn btn-outline text-white text-uppercase">
                                Submit
                            </button>
                        </a>
                    </div>
                </div>
            </form>
         
        </div>
         @auth
        <hr>
        <!-- Review card -->
        <h2 class="text-center mt-5">What Our Customer Says About Our Product.</h2>
        <div class="container mt-5">
            <div class="row gap-2">
                @foreach ($productReviews->reviews as $singleReview)
                <div class="col-12  border border-2 shadow pb-2 mb-3">
                    <div class="fs-5">
                        <p class="mb-0 mt-3"><span class="me-2 ">Name:{{$singleReview->user->first_name}}</span>
                        <p><span class="me-2">Email:</span>{{$singleReview->user->email}}</p>
                    </div>
                    <hr>
            
                    <p class="ps-2 ">{{$singleReview->review}}</p>
                </div>
                @endforeach
            </div>
        </div>
        @endauth
    </div>
</section>





@endsection

@section('content-js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var images = document.getElementsByClassName('disable-right-click-image');

            for (var i = 0; i < images.length; i++) {
                images[i].addEventListener('contextmenu', function(event) {
                    event.preventDefault(); // Prevent the default right-click context menu
                });
            }
        });
    </script>
@endsection
