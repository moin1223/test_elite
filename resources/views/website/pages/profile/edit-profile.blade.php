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
                            <h2 class="m-0">Profile</h2>
                            <img id="imgPreview" class="rounded-circle mt-3"
                                src="{{ $userDetails->image ?? asset('assets/img/blank.png') }}"
                                style="width: 100px; height: 100px; object-fit: cover;" alt="">
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <form method="POST" action="{{ route('profile.update') }}" id="createUser"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-8">
                            <input type="file" name="image" id="image" placeholder="Choose image"
                                accept="image/gif, image/jpeg" />
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="my-3">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="name" placeholder="Enter name" value="{{ auth()->user()->name }}" disabled />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="my-3">
                            <label class="form-label" for="name">Email</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="name" placeholder="Enter name" value="{{ auth()->user()->email }}" disabled />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="name">Address</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                                id="name" placeholder="Enter address" value="{{ $userDetails->address ?? '' }}"
                                required />
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="name">Contact Number</label>
                            <input onkeypress="return onlyNumberKey(event)" type="text" name="contact_number"
                                class="form-control @error('contact_number') is-invalid @enderror" id="name"
                                placeholder="Enter contact number" value="{{ $userDetails->contact_number ?? '' }}"
                                required />
                            @error('contact_number')
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
@section('content-js')
    <script>
        $(document).ready(() => {
            $('#image').change(function() {
                const file = this.files[0];
                console.log(file);
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        $('#imgPreview').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });

        function onlyNumberKey(evt) {
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (43 > ASCIICode || 43 < ASCIICode && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
    </script>
@endsection
