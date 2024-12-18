<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from demo.dashboardpack.com/user-management-html/empty_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 May 2023 17:07:52 GMT -->

<head>
    @include('website.includes.head')
    @livewireStyles
</head>

<body class="crm_body_bg">
    @role('admin')
    @include('website.includes.sidebar')


    <section class="main_content dashboard_part large_header_bg">

        @include('website.includes.navbar')


        <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">

                <div class="row">
                    @include('website.includes.alert')
                    <div class="col-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        @include('website.includes.footer')

    </section>

    <div id="back-top" style="display: none;">
        <a title="Go to Top" href="#">
            <i class="ti-angle-up"></i>
        </a>
    </div>

    @include('website.includes.scripts')
    @livewireScripts
</body>
@endrole
<!-- Mirrored from demo.dashboardpack.com/user-management-html/empty_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 May 2023 17:07:52 GMT -->

</html>
