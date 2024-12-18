<div class="container-fluid g-0">
    <div class="row">
        <div class="col-lg-12 p-0 ">
            <div class="header_iner d-flex justify-content-between align-items-center">
                <div class="sidebar_icon d-lg-none">
                    <i class="ti-menu"></i>
                </div>
                <div class="line_icon open_miniSide d-none d-lg-block">
                    <img src={{ asset('website/img/line_img.png') }} alt="">
                </div>
                {{-- <div class="serach_field-area d-flex align-items-center">
                    <div class="search_inner">
                        <form action="#">
                            <div class="search_field">
                                <input type="text" placeholder="Search">
                            </div>
                            <button type="submit"> <img src={{ asset('website/img/icon/icon_search.svg') }} alt=""> </button>
                        </form>
                    </div>
                </div> --}}
                <div class="header_right d-flex justify-content-between align-items-center">

                    {{-- @include('website.includes.notification') --}}

                    <div class="profile_info">
                        <img  style="width: 50px; height: 50px; object-fit: cover;"  src={{ auth()->user()->userDetails->image ?? asset('assets/img/blank.png') }} alt="#">
                        {{-- <img src={{ asset('website/img/client_img.png') }} alt="#"> --}}
                        <div class="profile_info_iner">
                            <div class="profile_author_name">
                                {{-- <p>Neurologist </p> --}}
                                <h5>{{ auth()->user()->name}}</h5>
                            </div>
                            <div class="profile_info_details">
                                <a href="{{route("profile.edit")}}">My Profile </a>
                                {{-- <a href="#">Settings</a> --}}
                                {{-- <a href="#">Log Out </a> --}}
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <li><a class="#" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">Logout</a>
                                    </li>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
