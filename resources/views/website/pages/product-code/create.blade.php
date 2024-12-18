@extends('website.layouts.default')

@section('content-css1')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3 class="m-0">Generate Product Code</h3>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    {{-- <h6 class="card-subtitle mb-2">
                        Here you can add user under you. Remember default password for every user is <span class="text-danger">
                            123456 </span>.
                    </h6> --}}
                    <form method="POST" action="{{ route('product-code.store') }}">
                         @csrf
                        <div class="mb-3">
                            <label class="form-label" for="name">
                                How much code do you want to generate?</label>
                            <input type="number" name="number" class="form-control" id="name" placeholder="Enter number"
                                value="{{ old('number') ? old('number') : '' }}" required />
                            @error('number')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    

                        <a href="{{ back()->getTargetUrl() }}" type="submit" class="btn btn-warning">Back</a>
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>

@endsection
{{-- 
@section('content-js')
  
@endsection --}}