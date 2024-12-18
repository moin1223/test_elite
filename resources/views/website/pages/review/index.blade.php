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
                        <h3 class="m-0">All Review</h3>
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
                        <h4>Reviews</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="add_button ms-2">
                                {{-- @can('can_add_product') --}}
                                {{-- <a href="{{ route('category.create') }}" class="btn_1" style="padding: 5px">
                                    Create
                                </a> --}}
                                {{-- @endcan --}}
                            </div>
                        </div>
                    </div>
                    <div class="QA_table mb_30">
                        <table class="table lms_table_active">
                            <thead>
                                <tr>
                                    <th scope="col">Review</th>
                                    <!-- <th scope="col">Requested Role</th> -->
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($reviews as $Singlereview)
                                    <tr>
                                        {{-- <th scope="row">{{ $requestedUser->first_name }}</th> --}}
    
                                        <td>{{ $Singlereview->review }}</td>
                                        {{-- <td>{{ $requestedUser->role }}</td> --}}


                                        <td>
                                            <div class="d-flex">
                                                @include('website.component.modal.delete-modal', [
                                                    'route' => 'review.destroy',
                                                    'id' => $Singlereview->id,
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
    <!-- modal -->
    <div class="modal fade mt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="row justify-content-center mt-3">
                            <div class="col-md-11 custom-form">
                                <div class="d-flex justify-content-between">
                                    <h4 class="text-dark">User Info</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="text-dark mt-4" id="user-info">

                                </div>
                                <form method="POST" action="{{route('accept-user-register-request')}}" class="row g-3 mt-3 text-dark">
                                    @csrf
                                    <input id="user-id" type="hidden" name="user_id">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-2">Confirm</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
    <script>
        $(document).ready(function() {
            $(document).on('click', '.donation-action', function() {

                const user_id = $(this).attr("data-id");
                const actionName = $(this).attr("action-name");
                $('#user-id').val(user_id);
                $('#exampleModal').modal('show');
                $.ajax({
                    url: "{{ route('get-requested-user-details') }}",
                    data: {
                        user_id: user_id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log(response.first_name);
                        $("#user-info").html(
                            `
                                <h6><span class="fw-bold">Name: </span>${response.first_name} ${response.last_name}</h6>
                                <h6 class="mt-3"><span class="fw-bold">Email Address: </span>${response.email}</h6>
                                <h6 class="mt-3"><span class="fw-bold"> Requested Role: </span>${response.role}</6>
                                <h6 class="mt-3"><span class="fw-bold">Monitor Name: </span>${response.monitor_name}</6>
                                <h6 class="mt-3"><span class="fw-bold">Monitor Number: </span>${response.monitor_number}</6>
                                <h6 class="mt-3"><span class="fw-bold">Drector Name: </span>${response.drector_name}</6>
                                <h6 class="mt-3"><span class="fw-bold">Director Number: </span>${response.director_number}</6>
                                <h6 class="mt-3"><span class="fw-bold">Address: </span>${response.address}</6>
                                    

                                    `);
                    }
                });

            });
        });

        // delete confirmation
        // $('.show-confirm').click(function(event) {
        //     // console.log('click')
        //     let form = $(this).closest('form');
        //     event.preventDefault()

        //     Swal.fire({
        //         title: 'Are you sure?',
        //         text: "You won't be able to revert this!",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Yes, delete it!'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             form.submit()
        //             Swal.fire(
        //                 'Deleted!',
        //                 'Your file has been deleted.',
        //                 'success'
        //             )
        //         }
        //     })
        // })
    </script>
@endsection
