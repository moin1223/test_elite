@extends('frontend.layouts.default')
@section('content')
<style>
    .text-align {
      text-align: justify;
        word-spacing: 2px;
    }
    </style>
<section class="container mt-5">
    <h3 class="text-center fs-2 fw-bold">Details</h3>

    <div>
        <!-- product and reviw input field -->
        <div class="row pb-3">
            <!-- product image -->
            <div class="col-12 col-lg-6 pt-5 ">
                <img class="w-100 mb-3 disable-right-click-image" src="{{$productDetails->image}}" alt="">
                <div class="ms-3">
                    <h5 class="card-title text-uppercase fw-bold mb-2 border-bottom pb-2">{{$productDetails->product_name}}</h5>
                    {{-- <p class="card-text mb-0">{{$productDetails->weight}}</p> --}}
                </div>
            </div>

            <!-- product review field -->
            {{-- <form method="POST" action="{{ route('request-prodruct-review') }}">
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
            </form> --}}
         
        </div>
       <h4 class="text center">Description</h4>
       <p class="text-align">{{$productDetails->description}}</p>
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
