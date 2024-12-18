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
                        <h3 class="m-0">Requested Review</h3>
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
                    <div class="QA_table mb_30">
                        <table class="table lms_table_active">
                            <thead>
                                <tr>
                                    <th scope="col">Review</th>
                                    <th scope="col">Accept</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($requestedReviews as $requestedReview)
                                    <tr>
                                        <td>{{ $requestedReview->review }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <form method="POST" action="{{ route('accept-review-request') }}" class="row g-3 mt-3 text-dark">
                                                    @csrf
                                                    <input type="hidden" name="review_id" value="{{ $requestedReview->id }}">
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary me-2">Confirm</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                @include('website.component.modal.cancel-modal', [
                                                    'route' => 'cancel-review-request',
                                                    'id' => $requestedReview->id,
                                                ])
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No Data Available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $requestedReviews->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @endcan --}}
    
    <!-- Modal -->
    <div class="modal fade mt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="row justify-content-center mt-3">
                            <div class="col-md-11 custom-form">
                                <div class="d-flex justify-content-between">
                                    <h4 class="text-dark">Review Details</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="text-dark mt-4" id="user-info">
                                    <!-- Review Details will be inserted here -->
                                </div>
                                <form method="POST" action="{{ route('accept-review-request') }}" class="row g-3 mt-3 text-dark">
                                    @csrf
                                    <input id="review_id" type="hidden" name="review_id">
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
                const review_id = $(this).attr("data-id");
                console.log(review_id)
                const actionName = $(this).attr("action-name");
                $('#review_id').val(review_id);
                $('#exampleModal').modal('show');
                $.ajax({
                    url: "{{ route('get-requested-review-details') }}",
                    data: {
                        review_id: review_id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log(response);
                        $("#user-info").html(
                            `
                                <h6><span class="fw-bold">Review: </span>${response.review}</h6>
                            `
                        );
                    }
                });
            });
        });
    </script>
@endsection
