@extends('frontend.layouts.default')

@section('content')
    <style>
        .card {
            width: 350px;
            padding: 10px;
            border-radius: 20px;
            background: #fff;
            border: 1px solid red;
            height: 490px;
            position: relative;
        }

        .mobile-text {
            color: #989696b8;
            font-size: 15px;
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #ff8880;
            outline: 0;
            box-shadow: none;
        }

        .cursor {
            cursor: pointer;
        }
    </style>

    <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div class="card py-5 px-3">
            <h5 class="m-0">Mobile phone verification</h5>
            <span class="mobile-text">
                Enter the code we just send on your mobile phone {{ $contact_no }}
                <b class="text-danger" id="user_phone_number"></b>
            </span>

            <div class="valid_message text-center my-3">
                <span id="valid_message"></span>
            </div>

            <div class="d-flex flex-row mt-5">
                <input type="text" class="form-control otp_input" autofocus="" oninput='digitValidate(this)' onkeyup='tabChange(1)' name="otp_field_1"
                    id="otp_field_1" maxlength=1>
                <input type="text" class="form-control otp_input" oninput='digitValidate(this)' onkeyup='tabChange(2)' name="otp_field_2"
                    id="otp_field_2" maxlength=1>
                <input type="text" class="form-control otp_input" oninput='digitValidate(this)' onkeyup='tabChange(3)' name="otp_field_3"
                    id="otp_field_3" maxlength=1>
                <input type="text" class="form-control otp_input" oninput='digitValidate(this)' onkeyup='tabChange(4)' name="otp_field_4"
                    id="otp_field_4" maxlength=1>
            </div>

            <div class="timer text-center my-3">
                <span id="timer"></span>
            </div>

            <div class="text-center">
                <button class="dropbtn px-2 px-lg-3 pt-1 pb-2 rounded text-center text-white bg-black" id="validate_button">
                    Validate
                </button>
            </div>
            <div class="text-center mt-5">
                <span class="d-block mobile-text">
                    Don't receive the code?
                </span>
                <span class="font-weight-bold text-danger cursor resend" onclick="resend()">Resend</span>
            </div>
        </div>
    </div>
@endsection

@section('content-js')
    <script>
        $(document).ready(function() {
            var timerElement = $('#timer');
            localStorage.removeItem('timerValue');

            // Check if timer value is stored in local storage
            var timeLeft = localStorage.getItem('timerValue');
            if (timeLeft === null) {
                timeLeft = 120; // Set initial timer value to 60 if not found in local storage
            } else {
                timeLeft = parseInt(timeLeft);
            }

            // Function to update timer
            function updateTimer() {
                var minute = Math.floor(timeLeft / 60);
                var second = timeLeft % 60;
                timerElement.text(minute + " : " + second);
                timeLeft--;

                // Save timer value in local storage
                localStorage.setItem('timerValue', timeLeft);

                if (timeLeft < 0) {
                    clearInterval(timerInterval);
                    $("#validate_button").attr("disabled", true);
                    $(".otp_input").attr("disabled", true);
                    $(".timer").text('Time\'s up!');
                    // Clear timer value from local storage when it reaches 0
                    localStorage.removeItem('timerValue');
                }
                if (timeLeft < 10) {
                    $(".timer").addClass('text-danger');
                }
            }

            // Call updateTimer function immediately to display the initial timer value
            updateTimer();

            // Start the timer interval
            var timerInterval = setInterval(updateTimer, 1000);
        });

        let digitValidate = function(ele) {
            console.log(ele.value);
            ele.value = ele.value.replace(/[^0-9]/g, '');
        }

        let tabChange = function(val) {
            console.log(val);
            let ele = document.querySelectorAll('.otp_input');
            if (ele[val - 1].value != '') {
                ele[val].focus()
            } else if (ele[val - 1].value == '') {
                ele[val - 2].focus()
            }
        }

        $("#validate_button").click(function() {
            var otp = $("#otp_field_1").val() + $("#otp_field_2").val() + $("#otp_field_3").val() + $("#otp_field_4").val();

            $.ajax({
                url: "{{ route('verifyOtp') }}",
                type: 'GET',
                data: {
                    otp: otp,
                    contact_no: {{ $contact_no }}
                },
                success: function(response) {
                    console.log(response);
                    var result = response.result;
                    var message = response.message;
                    if (result) {
                        $(".valid_message").text(message);
                        localStorage.setItem('accountCreationStatus',
                            "Account created. Please wait untill the admin accept your request.");
                        window.location.href = response.route;
                    } else {
                        $(".valid_message").addClass('text-danger').text(message);
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                }
            });
        })

        function resend() {
            $.ajax({
                url: "{{ route('resendOtp') }}",
                type: 'GET',
                data: {
                    contact_no: {{ $contact_no }}
                },
                success: function(response) {
                    //
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                }
            });
        }
    </script>
@endsection
