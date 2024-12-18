@extends('frontend.layouts.default')

@section('content')

    <section class="py-5 py-lg-5 px-4 px-lg-5 signin-bg">
        <div class="row ">
            <div class="col-12 col-lg-6 p-4 p-lg-5  fw-bold ">
                @if (Session::has('status'))
                    <div class="alert alert-danger">
                        {{ Session::get('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2 class="mb-2 mb-lg-5">Forgot Password</h2>
                <form method="POST" action="{{ route('password.email') }}" >
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="d-block text-uppercase mb-2">Email</label>
                        <input class="w-100 w-lg-75 px-2 py-3 rounded" type="email" name="email" id="":value="old('email')"
                            placeholder="Enter email">
                    </div>
                    <div class="w-100 w-lg-75 border text-center px-2 py-3
             bg-black">
                        {{-- <a href="index.html" class="text-decoration-none "> --}}
                        <button type="submit" class="btn btn-outline text-white text-uppercase">
                            Submit
                        </button>
                        {{-- </a> --}}

                    </div>
                </form>
            </div>
            <div class="col-12 col-lg-6 mt-5 mt-lg-0 p-0 px-lg-2 mb-5 d-none d-lg-block">
                <img class="w-100 h-100 "
                    src="https://plus.unsplash.com/premium_photo-1681487814165-018814e29155?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTN8fGxvZ2lufGVufDB8fDB8fHww&auto=format&fit=crop&w=800&q=60"
                    alt="">
            </div>
        </div>
    </section>
@endsection
