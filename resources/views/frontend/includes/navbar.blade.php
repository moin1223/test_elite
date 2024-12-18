<style>
    #btn {
        /* max-height: 0;*/
        overflow: hidden;
        transition: max-height 0.3s ease-in-out;
        /* Adjust the duration as needed */
    }

    .black-button {
        background-color: black;
        color: white;
    }

    @media screen and (min-width: 350px) and (max-width: 412px) {
        .serach {
            margin-left: 30px;
        }

        /* Your CSS styles for screens between 300px and 500px go here */
        /* For example, you can adjust font size or layout for smaller screens */
    }
</style>

<header>
    <!-- Navbar  -->
    <nav class="navbar navbar-expand-md fw-bold shadow bg-white ">
        <div class="d-flex  align-items-center ">
            <a href="{{ route('home-page') }}" class="navabar-brand fs-3 me-1 me-md-2 me-lg-5 ms-1 ms-md-2 ms-lg-4 mb-1 mb-lg-3">
                <img src="/frontend/images/elit-logo.jpg" style="height: 55px" alt="">
            </a>
        </div>

        <button class="navbar-toggler  me-2 me-lg-3" type="button" data-bs-toggle="collapse" id="custom"
            data-bs-target="#btn">
            <i class='bx bx-menu bx-sm'></i>
        </button>
        <form action="{{ route('seller-search') }}" method="POST">
            @csrf
            <div class="container mt-4 ms-1 serach">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="mobile_number" value="88"
                        placeholder="Enter authorized seller number" aria-label="Search" aria-describedby="basic-addon2"
                        style="width: 200px;">
                    <div class="input-group-append">
                        <button class="btn black-button" type="submit">Search</button>
                    </div>
                </div>

                @if (session('sellerMessage'))
                    <div id="emailHelp" class="form-text text-danger">{{ session('sellerMessage') }}</div>
                @else
                    <div id="emailHelp" class="form-text text-danger">মোবাইল নাম্বার দ্বারা অথেন্টিক সেলার কে যাচাই করুন</div>
                @endif
            </div>

        </form>
        <div class="collapse navbar-collapse " id="btn">
            <ul class="navbar-nav ms-auto ul-bg">
                <li class="nav-item mx-3 mx-lg-2 fs-lg-5">
                    <a href="{{ route('home-page') }}"class="nav-link">
                        Home
                    </a>
                </li>
                <li class="nav-item mx-3 mx-lg-2 fs-lg-5">
                    <a href="{{ route('check-authenticity') }}" class="nav-link">
                        Check authenticity
                    </a>
                </li>
                <li class="nav-item mx-3 mx-lg-2 fs-lg-5">
                    <a href="{{ route('authorized-prtbners') }}" class="nav-link">
                        Authorized Partner
                    </a>
                      @if (Auth::check())
                </li>
                    <li class="nav-item mx-3 mx-lg-2 fs-lg-5">
                    <a href="{{ route('reseller') }}" class="nav-link">
                        Reseller
                    </a>
                </li>
                <li class="nav-item mx-3 mx-lg-2 fs-lg-5">
                    <a href="{{ route('ব্যবহারবিধি') }}" class="nav-link">
                        ব্যবহারবিধি
                    </a>
                </li>
                    @endif
                @isset($products)
                    <li class="nav-item mx-3 mx-lg-2 fs-lg-5">
                        <a href="#products" class="nav-link">
                            Products
                        </a>
                    </li>
                @else
                    <li class="nav-item mx-3 mx-lg-2 fs-lg-5">
                        <a href="{{ route('home-page') }}" class="nav-link">
                            Products
                        </a>
                    </li>
                @endisset
                @isset($products)
                    <li class="nav-item mx-3 mx-lg-2 fs-lg-5">
                        <a href="#about" class="nav-link">
                            About us
                        </a>
                    </li>
                @else
                    <li class="nav-item mx-3 mx-lg-2 fs-lg-5">
                        <a href="{{ route('home-page') }}" class="nav-link">
                            About us
                        </a>
                    </li>
                @endisset

            </ul>
        </div>
    </nav>
</header>
<!-- nav for mobile device  -->
<!--<section class="d-block d-lg-none container py-2 nav-bg ">-->
<!--    <div class="nav-wrapper">-->
<!--        <a href="{{ route('home-page') }}" class="item text-decoration-none text-black">-->
<!--            Home-->
<!--        </a>-->
<!--        <a href="{{ route('check-authenticity') }}" class="item text-decoration-none text-black">-->
<!--            Check authenticity-->
<!--        </a>-->
<!--        <a href="{{ route('authorized-prtbners') }}" class="item text-decoration-none text-black">-->
<!--            Authorized Partner-->
<!--        </a>-->
<!--         @if (Auth::check())-->
<!--            <a href="{{ route('reseller') }}" class="item text-decoration-none text-black">-->
<!--            Reseller-->
<!--        </a>-->
<!--        <a href="{{ route('ব্যবহারবিধি') }}" class="item text-decoration-none text-black">-->
<!--            ব্যবহারবিধি-->
<!--        </a>-->
<!--          @endif-->
<!--        @isset($products)-->
<!--            <a href="#products" class="item text-decoration-none text-black">-->
<!--                Products-->
<!--            </a>-->
<!--        @else-->
<!--            <a href="{{ route('home-page') }}" class="item text-decoration-none text-black">-->
<!--                Products-->
<!--            </a>-->
<!--        @endisset-->
<!--        @isset($products)-->
<!--            <a href="#about" class="item text-decoration-none text-black">-->
<!--                About us-->
<!--            </a>-->
<!--        @else-->
<!--            <a href="{{ route('home-page') }}" class="item text-decoration-none text-black">-->
<!--                About us-->
<!--            </a>-->
<!--        @endisset-->
<!--    </div>-->
<!--</section>-->
<nav class="navbar navbar-expand-lg bg-body-tertiary d-block d-lg-none">
  <div class="container-fluid">
   <a href="{{ route('home-page') }}" class="nav-link">
            Home
        </a>
        <a href="{{ route('check-authenticity') }}" class="nav-link">
            Check authenticity
        </a>
        <a href="{{ route('authorized-prtbners') }}" class="nav-link">
            Authorized Partner
        </a>
         @if (Auth::check())
            <a href="{{ route('reseller') }}" class="nav-link">
            Reseller
        </a>
          <a href="{{ route('ব্যবহারবিধি') }}" class="nav-link">
            ব্যবহারবিধি
        </a
          @endif
        @isset($products)
            <a href="#products" class="nav-link">
                Products
            </a>
        @else
            <a href="{{ route('home-page') }}" class="nav-link">
                Products
            </a>
        @endisset
        @isset($products)
            <a href="#about" class="nav-link">
                About us
            </a>
        @else
            <a href="{{ route('home-page') }}" class="nav-link">
                About us
            </a>
        @endisset
    </div>
  </div>
</nav>


<script>
    const customButton = document.getElementById("custom");
    const customNav = document.getElementById("btn");

    customButton.addEventListener("click", function() {
        // Toggle the visibility of customNav with a slide-up/slide-down effect
        if (customNav.style.maxHeight === "0px" || customNav.style.maxHeight === "") {
            customNav.style.maxHeight = customNav.scrollHeight + "px";
        } else {
            customNav.style.maxHeight = "0px";
        }
    });
</script>
