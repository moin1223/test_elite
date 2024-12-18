<script src="{{ asset('website/js/jquery1-3.4.1.min.js') }}"></script>

<script src="{{ asset('website/js/popper1.min.js') }}"></script>

<script src="{{ asset('website/js/bootstrap1.min.js') }}"></script>

<script src="{{ asset('website/js/metisMenu.js') }}"></script>

<script src="{{ asset('website/vendors/count_up/jquery.waypoints.min.js') }}"></script>

@yield('content-js')

<script src="{{ asset('website/js/custom.js') }}"></script>

@stack('custom-scripts')
