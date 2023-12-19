@extends('layouts.assistant')
@section('page-content')
<div class="container">
    <h2>Issue Book</h2>
    <div class="bread-crumb">
        <a href="{{url('assistant')}}">Home</a>
        <div>/</div>
        <div>Issue Book</div>
    </div>
    <div class="h-96 flex justify-center items-center">
        <div class="w-full md:w-1/2 mx-auto">
            <!-- page message -->
            @if($errors->any())
            <x-message :errors='$errors'></x-message>
            @else
            <x-message></x-message>
            @endif

            <form action="{{route('library.assistant.book-issuance.scan')}}" method='post' class="mt-4" onsubmit="return validate(event)">
                @csrf

                <div id="reader" width="600px"></div>

                <div class="relative">
                    <i class="bx bx-book absolute right-2 top-4"></i>
                    <input type="text" id='book_ref' name='book_ref' class="custom-input" placeholder="Scan here" value="">
                </div>
                <div class="relative mt-2">
                    <i class="bx bx-user absolute right-2 top-4"></i>
                    <input type="text" id='user_cnic' name='user_cnic' class="custom-input" placeholder="Scan here" value="">
                </div>
                <div class="flex mt-4 float-right">
                    <button type="submit" class="btn-teal rounded px-4">Next</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    Html5Qrcode.getCameras().then(devices => {
        /**
         * devices would be an array of objects of type:
         * { id: "id", label: "label" }
         */
        if (devices && devices.length) {
            var cameraId = devices[0].id;
            // .. use this to start scanning.
            const html5QrCode = new Html5Qrcode( /* element id */ "reader");
            html5QrCode.start({
                        facingMode: {
                            exact: "environment"
                        }
                    },
                    cameraId, {
                        fps: 10, // Optional, frame per seconds for qr code scanning
                        qrbox: {
                            width: 250,
                            height: 250
                        } // Optional, if you want bounded box UI
                    },
                    (decodedText, decodedResult) => {
                        // do something when code is read
                        $('#book_ref').val(decodedText);
                    },
                    (errorMessage) => {
                        // parse error, ignore it.
                        console.log('error');
                    })
                .catch((err) => {
                    // Start failed, handle it.
                    console.log('camera not opened')
                });

        }
    }).catch(err => {
        // handle err
    });

    function validate(event) {

        var bookRef = $('#book_ref').val();
        var bookRegex = /^[A-e][0-9]-[0-9]{4}-[0-9]{1,2}$/;

        var userCnic = $('#user_cnic').val();
        var cnicRegex = /^[3][0-9]{12}$/;

        if (!bookRegex.test(bookRef)) {
            event.preventDefault();
            Swal.fire({
                title: "Book Ref?",
                text: "Invalid format",
                icon: "warning",
                showConfirmButton: false,
                timer: 1500

            });
            return false;
        } else if (!cnicRegex.test(userCnic)) {
            event.preventDefault();
            Swal.fire({
                title: "Student Ref?",
                text: "Invalid format",
                icon: "warning",
                showConfirmButton: false,
                timer: 1500

            });
            return false;
        } else {
            //validated
            return true;
        }

    }
</script>
@endsection