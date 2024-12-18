@extends('frontend.layouts.default')
@section('content')
<style>
    .img-wrapper {
    display: flex;
    gap: 10px;
    overflow-x: auto;

}

.img-wrapper::-webkit-scrollbar {
    width: 0;
}

.photo input {
    display: none;
}

.photo label {
    width: 100%;
    height: 200px;
    border: 2px dashed black;
    border-radius: 6px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.photo label:hover {
    color: #de0611;
    border: 2px dashed #de0611;
}
</style>

<section class="container">
    <!-- Authorized partner image -->
    <p class="text-center mt-3 fs-3 fw-bold ">Authorized Partner </p>
    <div class=" img-wrapper border">
        @foreach ($authorizePartners as $authorizePartner)
        <img class="w-25 item disable-right-click-image" src="{{$authorizePartner->image}}" alt="">
        @endforeach
    

    </div>


    <!-- Photo gallery image  -->
    <div class="container">
        <h2 class="text-center my-5 fw-bold">Photo gallery </h2>

        <div class="row  g-4 px-4 px-lg-3 ">
            @foreach ($events as $event)
            <div class="col-12 col-lg-3 ">
                <div class="card h-100 w-100">
                    <img src="{{$event->image}}" class="card-img-top disable-right-click-image" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$event->event_name}}</h5>
                        <p class="card-text">{{$event->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>


        <!-- Add Photo  -->
{{-- 
        <div class=" py-4">
            <h3 class="text-center fw-bold mt-5">Upload Your Photo</h3>
            <div class="mt-5 row container">
                <div class="col-12 col-lg">
                    <div class="photo px-2 px-lg-5 pt-2 mx-auto ms-1">
                        <label for="file" class="fs-2 me-2"><span>Upload Photo:</span>
                            <i class="bi bi-images"></i></label>
                        <input type="file" name="image" id="file" accept="image/*" class="">

                    </div>
                </div>

                <div class="ms-3 ms-lg-4 col-12 col-lg mt-5 mt-lg-0">
                    <div class="mb-2">
                        <label for="title" class="fs-4 mb-2">Event Title:</label>
                        <br>
                        <input type="text" placeholder="Event Title" class="w-75 ps-2 py-2">
                    </div>
                    <div>

                        <label for="title" class="fs-4 mb-2">Description:</label>
                        <br>
                        <textarea name="description" id="" cols="30" rows="5" class="px-2 py-2 w-100"></textarea>
                    </div>
                </div>

            </div>
        </div> --}}
    </div>
</section>



@endsection

@section('content-js')
   <script>
        document.addEventListener('DOMContentLoaded', function() {
            var images = document.getElementsByClassName('disable-right-click-image');

            for (var i = 0; i < images.length; i++) {
                images[i].addEventListener('contextmenu', function(event) {
                    event.preventDefault(); // Prevent the default right-click context menu
                });
            }
        });
    </script>
@endsection
