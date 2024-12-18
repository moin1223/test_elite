<nav class="sidebar dark_sidebar">
    <div class="logo d-flex justify-content-between">
        <a class="large_logo" href="index.html">
            <img src={{ asset('website/img/logo_white.png') }} alt="">
        </a>
        <a class="small_logo" href="index.html">
            <img src={{ asset('website/img/mini_logo.png') }} alt="">
        </a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        @include('website.component.sidebar-component', [
            'title' => 'User Management',
            'links' => [['title' => 'Users', 'route' => 'assignedUsers', 'link' => route('assignedUsers')]],
            'active_links' => [route('assignedUsers')],
        ])
        @role('director')
            @include('website.component.sidebar-component', [
                'title' => 'Admin',
                'links' => [
                    ['title' => 'Check new request', 'route' => 'checkRequest', 'link' => 'check-request'],
                    [
                        'title' => 'Check Edit request',
                        'route' => 'checkEditRequest',
                        'link' => route('checkEditRequest'),
                    ],
                ],
                'active_links' => ['check-request', route('checkEditRequest')],
            ])
        @endrole
    </ul>
</nav>
