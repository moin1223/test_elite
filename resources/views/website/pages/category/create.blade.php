@extends('website.layouts.default')

@section('content')
    {{-- @can('can_add_product') --}}
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h3 class="m-0">Create Category</h3>
                    </div>
                </div>
            </div>
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
            @endif --}}
            <div class="white_card_body">
                <form method="POST" action="{{ route('category.store') }}">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label class="form-label" for="name">Category Name</label>
                        <input type="text" name="category_name" class="form-control" 
                            placeholder="Enter category name" value="{{ old('category_name') ? old('category_name') : '' }}"
                            required />
                        @error('category_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <a href="{{ back()->getTargetUrl() }}" type="submit" class="btn btn-warning">Back</a>
                    <button type="submit" class="btn btn-primary"> Submit </button>
                </form>
            </div>
        </div>
    </div>
    {{-- @endcan --}}
@endsection

@section('content-js')
    <script></script>
@endsection
