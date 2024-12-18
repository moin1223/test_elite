@extends('frontend.layouts.default')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
.text-align {
  text-align: justify;
  word-spacing: 2px;
}
.products-wrapper {
  position: relative;
  overflow: hidden; /* Hide overflow to allow for scrolling effect */
  display: flex;
  align-items: center; /* Center align items vertically */
}
.scroll-arrow {


  border-radius: 50%; /* Circular background */
  width: 50px; /* Width of the arrow button */
  height: 50px; /* Height of the arrow button */
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: background-color 0.3s; /* Smooth transition for hover effect */
  z-index: 10;
}
.scroll-arrow:hover {
  background-color: #0056b3; /* Darker shade on hover */
}
.scroll-arrow i {
  font-size: 35px; /* Size of the icon */
}
.wrapper {
  display: flex; /* Ensure product items are aligned in a row */
  overflow-x: auto; /* Allow horizontal scrolling */
}
.item {
  min-width: 20rem; /* Ensure each item has a minimum width */
  margin-right: 1rem; /* Space between items */
}
</style>

@include('frontend.includes.slider')
@php
    $products = \App\Models\Category::with('product')->get();
    $collection = \App\Models\AuthImageVideo::all();
@endphp

<div class="text-center mt-5 ">
    <h1 class="fw-bold" id="products">Our Products</h1>
</div>

<section class="container ps-3 pt-4 ">
    @foreach ($products as $category)
        <h4 class="fw-bold mb-4">{{ $category->category_name }}
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAtNJREFUaEPdWVtSxDAMU2/Gzdo9GdxsmZI2m4cfchKWGfrFbB3HkhzbDRuEZwPwlF780W9WPOc7/YkiidoDGFhSxWsDeCfjDRIRWPnj9XcPYICSgSUNNRuwPQN5+9rx9xRwUbkGrv6nhyUKpJ3mAyojZr39ngIufwzsHkb6RUghBnG2CaUs45lEK5f8mQ00hhh2eRsNXnUGZmDkDUqJcitc4rnHUJVRbQ8yVYgQPwB8mV2f3Kv1wR9iI0oHwAFgB/AAcP49/ggKJwBMcATNQmR38PerBzYcw4OWEAPfBxiJ6w3OtPkUQDlK2IUhkEI25a4gyaBV4FbbAGEcSEG6k1dieGZs1NQ+sGEX9p4/E+IoMX7ErJWVEgUdFQiRJoe7JVVILdL1iz6d0vsMgtG5tckAyheMI1so1YML4vYr9sTYKMGUndJjb6/AODZgvz9ZtXRqPKuVVzzETCHjVRItaSWksll+rxtngAwxE18qQK3tQFyrlGaX3qpnoJdMDeKHAL5LUGBaouUSKxxUUQFny44GPsTG0q4cCcSyMvriaOLKiIeay+ssAGH9BAC6S14p5ANu+oBWf5oD5PvVI32t1Q8xcJbaVDqd2mBUIYYtslf0gA9g24WLoPB8RA5z5LCQzUyJhntAFcW1RVKgrOVNz4tmi2hvpM0VVJj5YuSIhhhVI9uHmHeIuHkXbua01J/DGQg+tlF/iGPrC7jqwkDwTOGobSarkLFhwuNWG7sZuzOLf7k7LAhAfdRrnYfVwlZgIvqruB3PdCd0P8FrlaaBCoI0nZjFHbKLX2wFiHsHgBMtdbXYf3b5SIxObCz2/eY63U1+5NpSY6snLKlCAzGFctAyzqMEc185HyjjgbF5QSI/6pcRttzRP0khhhdS2WymfSqUBqH/4sgBDCvg4nENEmukmUrxMABGtOhgOzJWGABmuVEGVTGFxtVYq8Aw5mYh6ec0+wa3lg5EVzT9PAAAAABJRU5ErkJggg==" />
        </h4>
        <div class="products-wrapper">
            <div id="health-products" class="wrapper">
                @foreach ($category->product as $single_product)
                    <div class="item">
                        <img src="{{ $single_product->image }}" class="card-img-top disable-right-click-image" alt="...">
                        <div class="card-body pt-3 ps-4">
                            <h5 class="card-title text-uppercase fw-bold mb-2 border-bottom pb-2">
                                {{ $single_product->product_name }}</h5>
                            <p class="text-muted mt-2 mb-0">{{ $single_product->weight }}gm</p>
                            <p class="card-text mb-0 text-decoration-line-through d-inline text-danger">
                                {{ $single_product->old_price }}TK</p>
                            <span class='mx-2 fs-4'>{{ $single_product->new_price }}Tk</span>
                            <div class="d-flex justify-content-between pe-4">
                                @auth
                                    <div class="mt-3 ">
                                        <a href="{{ route('product-review', $single_product->id) }}"
                                           class="btn btn-dark px-4 py-2">Review</a>
                                    </div>
                                @endauth
                                <div class="mt-3 ">
                                    <a href="{{ route('product-details', $single_product->id) }}"
                                       class="btn btn-dark px-4 py-2">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="scroll-arrow" onclick="scrollRight(this)">
                <i class="fas fa-arrow-right"></i> <!-- Font Awesome icon -->
            </div>
        </div>
    @endforeach
</section>

{{-- about us --}}
<section id="about" class="container">
    <h3 class="text-center fs-2 fw-bold mt-5">About Us</h3>
    <div class="row p-2 mt-4">
        <div class="col-12 col-lg-6">
            {{-- <img class="w-100" src="./frontend/images/about.jpg" alt=""> --}}
            {{-- <img src="/frontend/images/elit-logo.jpg" class="" style="height: 55px" alt=""> --}}
        </div>
        <div class="text-center">
            <p class="fs-5">
                Welcome to Elite Corporation.
                Elite Corporation is mainly supplying health, cosmetic and spice products all over Bangladesh. <br>
            <p class="text-align">Each product is hygienic and chemical free. Organic products are mainly needed to keep our body
                healthy,
                especially during corona time doctors advised to consume different types of tea or masala tea or
                organic products to avoid that dangerous virus.</p>
            <p class="text-align">
                During the Corona period, we have realized that
                we
                need to boost our immune system to keep our body healthy and protect us from the clutches of
                Corona. Only organic or natural products can boost our body's immune system. Each of our products is
                tested by Bangladesh Science Lab and some products are packaged approved by BSTI.</p>

            <p>Stay healthy by
                consuming Elite Corporation products.</p>
            </p>
        </div>
    </div>
</section>
@endsection

@section('content-js')
@endsection
@section('content-js')
<script src="{{ asset('website/vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('website/vendors/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('website/vendors/datatable/js/dataTables.buttons.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.donation-action', function() {
            const user_id = $(this).attr("data-id");
            const actionName = $(this).attr("action-name");
            $('#user-id').val(user_id);
            $('#exampleModal').modal('show');
            $.ajax({
                url: "{{ route('get-requested-user-details') }}",
                data: {
                    user_id: user_id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    $("#user-info").html(
                        `
                        <h6><span class="fw-bold">Name: </span>${response.first_name} ${response.last_name}</h6>
                        <h6 class="mt-3"><span class="fw-bold">Email Address: </span>${response.email}</h6>
                        <h6 class="mt-3"><span class="fw-bold">Requested Role: </span>${response.role}</h6>
                        <h6 class="mt-3"><span class="fw-bold">Division: </span>${response.division.name}</h6>
                        <h6 class="mt-3"><span class="fw-bold">District: </span>${response.district.name}</h6>
                        <h6 class="mt-3"><span class="fw-bold">Thana: </span>${response.thana.name}</h6>
                        <h6 class="mt-3"><span class="fw-bold">Mobile Number: </span>${response.mobile_number}</h6>
                        ${response.whats_app_number ? `<h6 class="mt-3"><span class="fw-bold">Whats Number: </span>${response.whats_app_number}</h6>` : ''}
                        ${response.gender ? `<h6 class="mt-3"><span class="fw-bold">Gender: </span>${response.gender}</h6>` : ''}
                        ${response.group?.name ? `<h6 class="mt-3"><span class="fw-bold">Group Name: </span>${response.group.name}</h6>` : ''}
                        ${response.ward_no ? `<h6 class="mt-3"><span class="fw-bold">Ward No: </span>${response.ward_no}</h6>` : ''}
                        ${response.monitor_name ? `<h6 class="mt-3"><span class="fw-bold">Monitor Name: </span>${response.monitor_name}</h6>` : ''}
                        ${response.monitor_number ? `<h6 class="mt-3"><span class="fw-bold">Monitor Number: </span>${response.monitor_number}</h6>` : ''}
                        ${response.drector_name ? `<h6 class="mt-3"><span class="fw-bold">Drector Name: </span>${response.drector_name}</h6>` : ''}
                        ${response.director_number ? `<h6 class="mt-3"><span class="fw-bold">Director Number: </span>${response.director_number}</h6>` : ''}
                        ${response.address ? `<h6 class="mt-3"><span class="fw-bold">Address: </span>${response.address}</h6>` : ''}
                    `);
                }
            });
        });

        window.scrollRight = function(element) {
            const wrapper = $(element).siblings('#health-products');
            wrapper.animate({ scrollLeft: '+=300' }, 500); // Adjust scroll amount and duration as needed
        };
    });
</script>
@endsection
