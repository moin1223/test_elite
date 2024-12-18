@extends('website.layouts.default')

@section('content')
    {{-- @can('can_add_product') --}}
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3 class="m-0">Edit Event</h3>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <form method="POST" action="{{ route('event.update', $event) }}" id="updateProduct"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" for="name">Title</label>
                            <input type="text" name="event_name" class="form-control" id="event_name"
                                placeholder="Enter product name"
                                value="{{ old('event_name') ? old('event_name') : $event->event_name }}" required />
                            @error('event_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="name">Description</label>
                            <textarea type="text" rows="5" name="description" class="form-control" id="description"
                                placeholder="Enter product name"
                                value="{{ old('description') ? old('description') : $event->description }}" required >{{ old('description') ? old('description') : $event->description }}</textarea>
                            @error('description')
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
                                <img src="{{ $product->image ?? 'https://placehold.co/200x200' }}" id="imgPreview"
                                    class="w-50">
                            </div>
                        </div>

                        <a href="{{ back()->getTargetUrl() }}" type="submit" class="btn btn-warning">Back</a>
                        <button type="submit" class="btn btn-primary"> Update </button>
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
