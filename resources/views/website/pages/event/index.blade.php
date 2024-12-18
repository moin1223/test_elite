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
                            <h3 class="m-0">All Events</h3>
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
                            <h4>Event</h4>
                            <div class="box_right d-flex lms_block">
                                <div class="add_button ms-2">
                                    {{-- @can('can_add_product') --}}
                                        <a href="{{ route('event.create') }}" class="btn_1" style="padding: 5px">
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
                                        <th scope="col">Title</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($events as $event)
                                        <tr>
                                            <th scope="row">{{ $event->event_name }}</th>
                                            <td><img src="{{ $event->image }}" class="w-50 rounded border border-warning">
                                            </td>
                                            <td>{{ $event->description }}</td>
                                            <td>
                                                <div class="action_btns d-flex">
                                                    <a href="{{ route('event.edit', $event->id) }}"
                                                        class="action_btn mr_10">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    @include('website.component.modal.delete-modal', [
                                                        'route' => 'event.destroy',
                                                        'id' => $event->id,
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
