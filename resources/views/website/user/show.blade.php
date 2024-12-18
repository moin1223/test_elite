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
                        <h3 class="m-0">User Details</h3>
                    </div>
                    <div class="serach_field_2">
                        <div class="search_inner">

                        </div>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <div class="QA_section">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mt-3"><span class="fw-bolder">Name:</span> {{ $user->first_name }}</h6>

                            @if ($userDetails->gender)
                            <h6 class="mt-3"><span class="fw-bolder">Gender:</span> {{ $userDetails->gender }}</h6>
                            @endif

                            @if ($userDetails->whats_app_number)
                                <h6 class="mt-3"><span class="fw-bolder">WhatsAp Number:</span>
                                    {{ $userDetails->whats_app_number }} </h6>
                            @endif

                            @if ($userDetails->monitor_name)
                                <h6 class="mt-3"><span class="fw-bolder">Monitor Name: </span>
                                    {{ $userDetails->monitor_name }}</h6>
                            @endif

                            @if ($userDetails->drector_name)
                                <h6 class="mt-3"><span class="fw-bolder">Director Name:</span>
                                    {{ $userDetails->drector_name }}</h6>
                            @endif


                            <h6 class="mt-3"><span class="fw-bolder">Division:</span>
                                {{ $userDetails->division->name}}</h6>
                                <h6 class="mt-3"><span class="fw-bolder">Ditrict:</span> {{ $userDetails->district->name }}
                                </h6>
                                @if ($userDetails->thana)
                            <h6 class="mt-3"><span class="fw-bolder">Thana:</span>
                                {{ $userDetails->thana->name }}
                            </h6>
                            @endif



                            @if ($userDetails->group && $userDetails->group->name)
                                <h6 class="mt-3"><span class="fw-bolder">Group Name:</span>
                                    {{ $userDetails->group->name }}</h6>
                            @endif


                        </div>
                        <div class="col-md-6">
                            <h6 class="mt-3"><span class="fw-bolder">Email: </span>{{ $user->email }}</h6>
                            <h6 class="mt-3"><span class="fw-bolder">Mobile Number:</span>
                                {{ $userDetails->mobile_number }} </h6>
                            <h6 class="mt-3"><span class="fw-bolder">Role:</span>
                                {{ $userDetails->role }} </h6>
                            @if ($userDetails->monitor_number)
                                <h6 class="mt-3"><span class="fw-bolder">Monitor Number:</span>
                                    {{ $userDetails->monitor_number }}</h6>
                            @endif

                            @if ($userDetails->director_number)
                                <h6 class="mt-3"><span class="fw-bolder">Drector Number:</span>
                                    {{ $userDetails->director_number }}</h6>
                            @endif
                            @if ($userDetails->ward_no)
                                <h6 class="mt-3"><span class="fw-bolder">Ward No:</span> {{ $userDetails->ward_no }}</h6>
                            @endif

                        </div>
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
                                <form method="POST" action="{{ route('accept-user-register-request') }}"
                                    class="row g-3 mt-3 text-dark">
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

{{-- @section('content-js')
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
                                <h6><span class="fw-bold">Name: </span>${response.first_name}</h6>
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
@endsection --}}
