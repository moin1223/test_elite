@extends('frontend.layouts.default')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="text-center mb-3 font-weight-bold">Seller Information</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Left Column -->
                                {{-- <h4>Left Column</h4> --}}
                                <h6 class="mt-3"><span class="fw-bolder">Name:</span> {{ $user->first_name }}</h6>
                                <h6 class="mt-3"><span class="fw-bolder">Gender:</span> {{ $userDetails->gender }}</h6>
                                <h6 class="mt-3"><span class="fw-bolder">WhatsAp Number:</span>
                                    {{ $userDetails->whats_app_number }} </h6>
                            
                                <h6 class="mt-3"><span class="fw-bolder">Division:</span>
                                    {{ $userDetails->division->name }}</h6>
                    
                            </div>
                            <div class="col-md-6">
                                <!-- Right Column -->
                                {{-- <h4>Right Column</h4> --}}
                           
                                <h6 class="mt-3"><span class="fw-bolder">Mobile Number:</span>
                                    {{ $userDetails->mobile_number }} </h6>
                                <h6 class="mt-3"><span class="fw-bolder">Role:</span>
                                    {{ $userDetails->role }} </h6>
                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="col-lg-12">
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h3 class="m-0">User Details</h3>
                </div>
                <div class="serach_field_2">
                    <div class="search_inner">

                    </div>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <div class="QA_section">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="mt-3"><span class="fw-bolder">Name:</span> {{ $user->first_name }}</h6>


                        <h6 class="mt-3"><span class="fw-bolder">Mobile Number:</span>
                            {{ $userDetails->mobile_number }} </h6>

                        <h6 class="mt-3"><span class="fw-bolder">Monitor Name: </span>
                            {{ $userDetails->monitor_name }}</h6>
                        <h6 class="mt-3"><span class="fw-bolder">Director Name:</span>
                            {{ $userDetails->drector_name }}</h6>
                        <h6 class="mt-3"><span class="fw-bolder">Division:</span>
                            {{ $userDetails->division->name }}</h6>
                        <h6 class="mt-3"><span class="fw-bolder">Thana:</span>
                            {{ $userDetails->thana->name }}</h6>
                        <h6 class="mt-3"><span class="fw-bolder">Thana:</span>
                            {{ $userDetails->thana->name }}</h6>
                    </div>
                    <div class="col-md-6">
                        <h6 class="mt-3"><span class="fw-bolder">Email: </span>{{ $user->email }}</h6>
                        <h6 class="mt-3"><span class="fw-bolder">Monitor Number:</span>
                            {{ $userDetails->monitor_number }}</h6>
                        <h6 class="mt-3"><span class="fw-bolder">Drector Number:</span>
                            {{ $userDetails->director_number }}</h6>
                        <h6 class="mt-3"><span class="fw-bolder">Ditrict:</span> {{ $userDetails->district->name }}
                        </h6>
                        <h6 class="mt-3"><span class="fw-bolder">Address:</span> {{ $userDetails->address }}</h6>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div> --}}
@endsection
