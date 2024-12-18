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
                            <h3 class="m-0">All Slider</h3>
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
                            <h4>Sliders</h4>
                            <div class="box_right d-flex lms_block">
                                <div class="add_button ms-2">
                                    {{-- @can('can_add_product') --}}
                                        <a href="{{ route('slider.create') }}" class="btn_1" style="padding: 5px">
                                            Create
                                        </a>
                                    {{-- @endcan --}}
                                </div>
                            </div>
                        </div>
                        <div class="QA_table mb_30">
                            <table class="table lms_table_active">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($sliders as $slider)
                                        <tr>
                                            <th scope="row">{{ $slider->slider_name }}</th>
                                            <td><img src="{{ $slider->image }}" class="w-50 rounded border border-warning">
                                            </td>
                                            <td>
                                                <div class="action_btns d-flex">
                                                    <a href="{{ route('slider.edit', $slider->id) }}"
                                                        class="action_btn mr_10">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    @include('website.component.modal.delete-modal', [
                                                        'route' => 'slider.destroy',
                                                        'id' => $slider->id,
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
