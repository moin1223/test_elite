@extends('website.layouts.default')

@section('content')
    {{-- @can('can_add_product') --}}
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3 class="m-0">Create Auth image video</h3>
                        </div>
                    </div>
                </div>
                {{-- @if ($errors->any())
<div class="alert alert-danger">
<ul>
    @endif --}}
                <div class="white_card_body">
                    <form method="POST" action="{{ route('auth-image-video.store') }}" id="createProduct" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label class="form-label" for="name">Video Url</label>
                            <input type="text" name="video_url" class="form-control" 
                                placeholder="Enter category name" value="{{ old('video_url') ? old('video_url') : '' }}"
                                required />
                            @error('video_url')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label class="form-label" for="price">Image</label>
                                <input type="file" name="image" class="form-control" id="image"
                                    placeholder="Choose image" accept="image/gif, image/jpeg" />
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <img src="https://placehold.co/200x200" id="imgPreview" class="w-50">
                            </div>
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
    </script>
@endsection
