@extends('frontend.layouts.default')

@section('content')

<section class="py-5 py-lg-5 px-4 px-lg-5 signin-bg">
    <div class="row ">
        <div class="col-12 col-lg-6 p-4 p-lg-5  fw-bold ">
            @if (session('message'))
            <div class="alert bg-danger text-white">
                {{ session('message') }} 
            </div>
        @endif
            <h2 class="mb-2 mb-lg-5">LOGIN</h2>
            {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
            <form method="POST" action="{{ route('user-login-store') }}">
               {{ csrf_field() }}
                <input type="hidden" name="role" value="user">
            <div class="mb-4">
                <label for="phone" class="d-block text-uppercase mb-2">Mobile Number</label>
                <input class="w-100 w-lg-75 px-2 py-3 rounded" id="mobile_number"type="text" name="mobile_number" value="88"  placeholder="Enter mobile number" required>
                <p class="text-danger" id="phone_number_validation_message"></p>
                @error('mobile_number')
                <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>
            <div class="mb-5">
                <label for="password" class="d-block text-uppercase mb-2 ">Password</label>
                <input type="password" class="w-100 w-lg-75 px-2 py-3 rounded" name="password" 
                    placeholder="Password" required>
                    @error('password')
                    <p class="text-danger">{{ $message }}</p>
                   @enderror
            </div>
            <div class="w-100 w-lg-75 border text-center px-2 py-3
             bg-black">
                {{-- <a href="index.html" class="text-decoration-none "> --}}
                    <button type="submit" class="btn btn-outline text-white text-uppercase">
                        LOGIN
                    </button>
                {{-- </a> --}}

            </div>
              Don't have an account yet? please
                         <a href="{{ route('user-register') }}" class= dropbtn-bg">Sign Up</a>
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
@section('content-js')
    {{-- <script>
        $(document).ready(() => {
            $('#image').change(function() {
                const file = this.files[0];
                console.log(file);
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        $('#imgPreview').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script> --}}
    <script>
        $('#division').on('change', function() {
            var division_id = $(this).val();
            var html = '';
            $.ajax({
                url: "{{ route('get-districts') }}",
                data: {
                    division_id: division_id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    data.forEach(element => {
                        html += '<option value="' + element.id + '">' + element.text +
                            '</option>';
                    });
                    $('#district').html(html);
                }
            });
        });

        $('#district').on('change', function() {
            var district_id = $(this).val();
            var html = '';
            $.ajax({
                url: "{{ route('get-thanas') }}",
                data: {
                    district_id: district_id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    data.forEach(element => {
                        html += '<option value="' + element.id + '">' + element.text +
                            '</option>';
                    });
                    $('#thana').html(html);
                }
            });
        });

        // Validation for phone number in BD
        $("#mobile_number").keyup(function() {
            const phoneNumber = $(this).val();
            const bdPhoneNumberPattern = /^8801\d{9}$/;

            if (bdPhoneNumberPattern.test(phoneNumber)) {
                $("#phone_number_validation_message").text("")
            } else {
                $("#phone_number_validation_message").text(
                    "Invalid phone number. Please enter a valid Bangladeshi phone number.")
            }
        });
    </script>
@endsection
