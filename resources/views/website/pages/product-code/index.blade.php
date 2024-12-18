@extends('website.layouts.default')

@section('content-css2')
    <link rel="stylesheet" href="{{ asset('website/vendors/datatable/css/jquery.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/vendors/datatable/css/responsive.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/vendors/datatable/css/buttons.dataTables.min.css') }}" />
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    {{-- <div class="main-title">
                        <h3 class="m-0">Users who works under me</h3>
                    </div> --}}
                    <div class="serach_field_2">
                        <div class="search_inner">
                            {{-- <form Active="#">
                                <div class="search_field">
                                    <input type="text" placeholder="Search here..." />
                                </div>
                                <button type="submit">
                                    <i class="ti-search"></i>
                                </button>
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h6>Product Code</h6>
                        <div class="box_right d-flex lms_block">
                            <div class="add_button ms-2">
                                <a href="{{ route('product-code.generate-pdf') }}" class="btn btn-danger">
                                    Generate Pdf
                                </a>
                                <a href="{{ route('product-code.create') }}" class="btn btn-primary">
                                    Generate Code
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="QA_table mb_30">
                        <table class="table lms_table_active">
                            <thead>
                                <tr>
                                    <th scope="col">Serial No</th>
                                    <th scope="col">Code</th>


                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($productCodes as $productCode)
                                    <tr>

                                        <td>{{ $productCode->id }}</td>

                                        <td>{{ $productCode->product_code }}</td>
                                    </tr>
                                @empty
                                    <td colspan="5">No Data</td>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $productCodes->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content-js')
    <script src="{{ asset('website/vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('website/vendors/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('website/vendors/datatable/js/dataTables.buttons.min.js') }}"></script>
@endsection
