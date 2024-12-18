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
                            <h3 class="m-0">Enter the start and end IDs</h3>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    {{-- <h6 class="card-subtitle mb-2">
                        Here you can add user under you. Remember default password for every user is <span class="text-danger">
                            123456 </span>.
                    </h6> --}}
                    <form method="POST" action="{{ route('product-code.download-pdf') }}">
                         @csrf
                         <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="name">
                                        Starting ID</label>
                                    <input type="number" name="start_id" class="form-control" id="name" placeholder="Enter starting id"
                                        value="{{ old('start_id') ? old('start_id') : '' }}" required />
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="name"> Total Number</label>
                                    <input type="number" name="end_id" class="form-control" id="name" placeholder="Enter total number"
                                        value="{{ old('end_id') ? old('end_id') : '' }}" required />
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                         </div>

                        <a href="{{ back()->getTargetUrl() }}" type="submit" class="btn btn-warning">Back</a>
                        <button type="submit" class="btn btn-danger">
                            Download pdf
                        </button>
                    </form>
                </div>
            </div>
        </div>

@endsection
{{-- 
@section('content-js')
  
@endsection --}}