@extends('website.layouts.default')

@section('content')
    {{-- @can('can_add_product') --}}
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3 class="m-0">Create product</h3>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <form method="POST" action="{{ route('product.update', $product) }}" id="updateProduct"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" for="name">Product Name</label>
                            <input type="text" name="product_name" class="form-control" id="product_name"
                                placeholder="Enter product name"
                                value="{{ old('product_name') ? old('product_name') : $product->product_name }}" required />
                            @error('product_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- <div class="mb-3">
                            <label class="form-label" for="name">Select a category</label>
                                <select class="form-select" aria-label="Category select" name="category_id">
                                    <option selected>Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                
                            @error('category_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div> --}}
                        <div class="mb-3">
                            <label class="form-label" for="name">Select a category</label>
                            <select class="form-select" aria-label="Category select" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if ($category->category_name == $selectedCategory->category_name) selected @endif>{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        
                            @error('category_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label" for="image">Old Price</label>
                            <input type="number" name="old_price" class="form-control" id="price" placeholder="Enter old price"
                                step="0.01" value="{{ old('old_price') ? old('old_price') : $product->old_price }}" required />
                            @error('old_price')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="image">New Price</label>
                            <input type="number" name="new_price" class="form-control" id="price" placeholder="Enter new price"
                                step="0.01" value="{{ old('new_price') ? old('new_price') : $product->new_price }}" required />
                            @error('new_price')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="image">Weight</label>
                            <input type="text" name="weight" class="form-control" id="price" placeholder="Enter new weight"
                                step="0.01" value="{{ old('weight') ? old('weight') : $product->weight }}" required />
                            @error('weight')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                          <div class="mb-3">
                            <label class="form-label" for="name">Description</label>
                            <textarea type="text" rows="5" name="description" class="form-control" id="description"
                                placeholder="Enter product name"
                                value="{{ old('description') ? old('description') : $product->description }}" required >{{ old('description') ? old('description') : $product->description }}</textarea>
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
