@extends('website.layouts.default')

@section('content-css2')
    <link rel="stylesheet" href="{{ asset('website/vendors/datatable/css/jquery.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/vendors/datatable/css/responsive.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/vendors/datatable/css/buttons.dataTables.min.css') }}" />
@endsection

@section('content')
    {{-- @can('can_add_product') --}}
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3 class="m-0">All Products</h3>
                        </div>
                        <div class="serach_field_2">
                            <div class="search_inner">
                                <form Active="#">
                                    <div class="search_field">
                                        <input type="text" placeholder="Search here..." />
                                    </div>
                                    <button type="submit">
                                        <i class="ti-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <h4>Products</h4>
                            <div class="box_right d-flex lms_block">
                                <div class="add_button ms-2">
                                    {{-- @can('can_add_product') --}}
                                        <a href="{{ route('product.create') }}" class="btn_1" style="padding: 5px">
                                            Create
                                        </a>
                                    {{-- @endcan --}}
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Old Price</th>
                                        <th scope="col">New Price</th>
                                        <th scope="col">Weight</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $product)
                                        <tr>
                                            <th scope="row">{{ $product->product_name }}</th>
                                            <td>{{ $product->old_price }}</td>
                                            <td>{{ $product->new_price }}</td>
                                            <td>{{ $product->weight }}</td>
                                            <td><img src="{{ $product->image }}" class="w-25 rounded border border-warning">
                                            </td>
                                            <td>
                                                <div class="action_btns d-flex">
                                                    <a href="{{ route('product.edit', $product->id) }}"
                                                        class="action_btn mr_10">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    @include('website.component.modal.delete-modal', [
                                                        'route' => 'product.destroy',
                                                        'id' => $product->id,
                                                    ])
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <td colspan="5">No Data</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- @endcan --}}
@endsection

@section('content-js')
    <script src="{{ asset('website/vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('website/vendors/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('website/vendors/datatable/js/dataTables.buttons.min.js') }}"></script>
@endsection
