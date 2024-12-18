@extends('website.layouts.default')

@section('content-css1')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="row">
        @include('website.pages.profile.profile-sidebar')
        <div class="col-lg-9">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3 class="m-0">Change Password</h3>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <form method="POST" action="{{ route('update_password') }}" id="createUser">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" for="name">Current Password</label>
                            <input type="text" name="current_password"
                                class="form-control @error('current_password') is-invalid @enderror" id="name"
                                placeholder="Enter current password" value="" required />
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @if (session('error'))
                                <p class="text-danger pt-1 fw-bold">{{ session('error') }}</p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="name">New Password</label>
                            <input type="text" name="new_password"
                                class="form-control @error('new_password') is-invalid @enderror" id="name"
                                placeholder="Enter current password" value="" required />
                            @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="name">Confirm Password</label>
                            <input type="text" name="confirm_password"
                                class="form-control @error('confirm_password') is-invalid @enderror" id="name"
                                placeholder="Confirm password" value="" required />
                            @error('confirm_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
