
<nav class="sidebar dark_sidebar">
    <div class="logo d-flex justify-content-between">
        <a class="large_logo" href="dashboard">
            <img class="ms-5" src="{{ asset('/frontend/images/elit-logo.jpg') }}" alt="Dream-Walkers" style="width: 100px; height: auto;">

            
        </a>
        <a class="small_logo" href="dashboard">
            <img src={{ asset('/frontend/images/elit-logo.jpg') }} alt="Dream-Walkers" style="width: 50px; height: auto;">
        </a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
               
              
        @include('website.component.sidebar-component', [
            'title' => 'User Management',
            'links' => [
                ['title' => 'List', 'route' => 'user.index', 'link' => route('user.index')],
                //  ['title' => 'Check new request', 'route' => 'checkRequest', 'link' => route('checkRequest')],
                // [
                //     'title' => 'Create',
                //     'route' => 'category.create',
                //     'link' => route('category.create'),
                // ],
            ],
            'active_links' => ['check-request', route('checkEditRequest')],
        ])
        @include('website.component.sidebar-component', [
            'title' => 'Seller Management',
            'links' => [
                ['title' => 'List', 'route' => 'get-seller-list', 'link' => route('get-seller-list')],
                //  ['title' => 'Check new request', 'route' => 'checkRequest', 'link' => route('checkRequest')],
                // [
                //     'title' => 'Create',
                //     'route' => 'category.create',
                //     'link' => route('category.create'),
                // ],
            ],
            'active_links' => ['check-request', route('checkEditRequest')],
        ])
                @include('website.component.sidebar-component', [
                    'title' => 'Authorized Partner',
                    'links' => [
                        ['title' => 'List', 'route' => 'authorized-partner.index', 'link' => route('authorized-partner.index')],
                       //  ['title' => 'Check new request', 'route' => 'checkRequest', 'link' => route('checkRequest')],
                        [
                            'title' => 'Create',
                            'route' => 'authorized-partner.create',
                            'link' => route('authorized-partner.create'),
                        ],
                    ],
                    'active_links' => ['check-request', route('checkEditRequest')],
                ])
                @include('website.component.sidebar-component', [
                    'title' => 'Category',
                    'links' => [
                        ['title' => 'List', 'route' => 'category.index', 'link' => route('category.index')],
                       //  ['title' => 'Check new request', 'route' => 'checkRequest', 'link' => route('checkRequest')],
                        [
                            'title' => 'Create',
                            'route' => 'category.create',
                            'link' => route('category.create'),
                        ],
                    ],
                    'active_links' => ['check-request', route('checkEditRequest')],
                ])
                @include('website.component.sidebar-component', [
                    'title' => 'Product',
                    'links' => [
                        ['title' => 'List', 'route' => 'product.index', 'link' => route('product.index')],
                       //  ['title' => 'Check new request', 'route' => 'checkRequest', 'link' => route('checkRequest')],
                        [
                            'title' => 'Create',
                            'route' => 'product.create',
                            'link' => route('product.create'),
                        ],
                    ],
                    'active_links' => ['check-request', route('checkEditRequest')],
                ])
                @include('website.component.sidebar-component', [
                    'title' => 'Review',
                    'links' => [
                        ['title' => 'List', 'route' => 'review.index', 'link' => route('review.index')],
                       //  ['title' => 'Check new request', 'route' => 'checkRequest', 'link' => route('checkRequest')],
                        // [
                        //     'title' => 'Create',
                        //     'route' => 'product.create',
                        //     'link' => route('product.create'),
                        // ],
                    ],
                    'active_links' => ['check-request', route('checkEditRequest')],
                ])
                      @include('website.component.sidebar-component', [
                        'title' => 'Requested Review',
                        'links' => [
                            ['title' => 'List', 'route' => 'requested-review', 'link' => route('requested-review')],
                           //  ['title' => 'Check new request', 'route' => 'checkRequest', 'link' => route('checkRequest')],
                            // [
                            //     'title' => 'Create',
                            //     'route' => 'slider.create',
                            //     'link' => route('slider.create'),
                            // ],
                        ],
                        'active_links' => ['check-request', route('checkEditRequest')],
                    ])


                @include('website.component.sidebar-component', [
                    'title' => 'Slider',
                    'links' => [
                        ['title' => 'List', 'route' => 'slider.index', 'link' => route('slider.index')],
                       //  ['title' => 'Check new request', 'route' => 'checkRequest', 'link' => route('checkRequest')],
                        [
                            'title' => 'Create',
                            'route' => 'slider.create',
                            'link' => route('slider.create'),
                        ],
                    ],
                    'active_links' => ['check-request', route('checkEditRequest')],
                ])
                @include('website.component.sidebar-component', [
                    'title' => 'Requested Seller',
                    'links' => [
                        ['title' => 'List', 'route' => 'requested-user', 'link' => route('slider.index')],
                       //  ['title' => 'Check new request', 'route' => 'checkRequest', 'link' => route('checkRequest')],
                        // [
                        //     'title' => 'Create',
                        //     'route' => 'slider.create',
                        //     'link' => route('slider.create'),
                        // ],
                    ],
                    'active_links' => ['check-request', route('checkEditRequest')],
                ])
               @include('website.component.sidebar-component', [
                'title' => 'Event',
                'links' => [
                    ['title' => 'List', 'route' => 'event.index', 'link' => route('event.index')],
                   //  ['title' => 'Check new request', 'route' => 'checkRequest', 'link' => route('checkRequest')],
                    [
                        'title' => 'Create',
                        'route' => 'event.create',
                        'link' => route('event.create'),
                    ],
                ],
                'active_links' => ['check-request', route('checkEditRequest')],
            ])
                
      
               
         @include('website.component.sidebar-component', [
            'title' => 'Product Code',
            'links' => [
                ['title' => 'Code List', 'route' => 'product-code.index', 'link' => route('product-code.index')],
                ['title' => 'Generate Code', 'route' => 'product-code.create', 'link' => route('product-code.create')],
                ['title' => 'Download Code', 'route' => 'product-code.generate-pdf', 'link' => route('product-code.generate-pdf')],

            ],
            'active_links' => ['Code List', route('product-code.create')],
        ])
              @include('website.component.sidebar-component', [
                'title' => 'Auth Image Videos',
                'links' => [
                    ['title' => 'List', 'route' => 'auth-image-video.index', 'link' => route('auth-image-video.index')],
                   //  ['title' => 'Check new request', 'route' => 'checkRequest', 'link' => route('checkRequest')],
                    [
                        'title' => 'Create',
                        'route' => 'auth-image-video.create',
                        'link' => route('auth-image-video.create'),
                    ],
                ],
                'active_links' => ['check-request', route('checkEditRequest')],
            ])
 

    </ul>
</nav>
   
