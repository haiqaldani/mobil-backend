@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <section class="section-profile">
        <div class="container">
            <div class="md:mx-20 mx-10 my-10">
                <h1 class="text-2xl font-bold text-center mb-5">Profile</h1>
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                @if (Auth::user()->email_verified_at == null)
                    <div class="bg-red-500 p-2 rounded-sm text-white">
                        Before proceeding, please check your email for a
                        verification link.
                    </div>
                @endif
                <div class="grid grid-cols-3 justify-center gap-5">
                    <div class="space-y-5">
                        <div class="border rounded">
                            <div class="flex flex-row m-5">
                                <img src="{{ Storage::url(Auth::user()->profil_picture) }}"
                                    class="rounded-full w-24 h-24 shadow-md object-cover z-10 border"
                                    alt="Foto {{ Auth::user()->username }}">
                                <div class="flex flex-col mx-3 my-5">
                                    <p class="text-xl font-semibold">{{ Auth::user()->full_name }}</p>
                                    <p class="text-sm">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col border">
                            <a href="{{ route('profile-seller.edit') }}"
                                class="p-3 text-gray-500 hover:bg-opacity-10 hover:bg-gray-500">Profile</a>
                            <hr />
                            <a href="{{ route('mycar') }}"
                                class="p-3 text-gray-500 hover:bg-opacity-10 hover:bg-gray-500">Iklan Saya</a>
                            <hr />
                            <a href="{{ route('favorite') }}"
                                class="p-3 text-gray-500 hover:bg-opacity-10 hover:bg-gray-500">Mobil Tersimpan</a>
                            <hr />
                            {{-- <a href="" class="p-3 text-gray-500 hover:bg-opacity-10 hover:bg-gray-500">Profile</a>
                            <hr /> --}}
                            <a href="{{ route('change-password') }}"
                                class="p-3 text-gray-500 hover:bg-opacity-10 hover:bg-gray-500">Change Password</a>
                        </div>
                    </div>

                    @yield('profile')

                </div>

            </div>
        </div>
    </section>


@endsection
@prepend('addon-script')
    <script>
        CKEDITOR.replace('description');
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-success").click(function() {
                var html = $(".clone").html();
                $(".increment").after(html);
            });
            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".control-group").remove();
            });
        });

    </script>
    <script type="text/javascript">
        function changeAtiveTab(event, tabID) {
            let element = event.target;
            while (element.nodeName !== "A") {
                element = element.parentNode;
            }
            ulElement = element.parentNode.parentNode;
            aElements = ulElement.querySelectorAll("li > a");
            tabContents = document.getElementById("tabs-id").querySelectorAll(".tab-content > div");
            for (let i = 0; i < aElements.length; i++) {
                aElements[i].classList.remove("underline");
                aElements[i].classList.remove("text-blue-600");
                aElements[i].classList.add("no-underline");
                aElements[i].classList.add("text-black");
                tabContents[i].classList.add("hidden");
                tabContents[i].classList.remove("block");
            }
            element.classList.remove("no-underline");
            element.classList.remove("text-black");
            element.classList.add("underline");
            element.classList.add("text-blue-600");
            document.getElementById(tabID).classList.remove("hidden");
            document.getElementById(tabID).classList.add("block");
        }

    </script>
    {{-- <script type="text/javascript">
        $(function() {
            $('#merk_id').on('change', function() {
                axios.post('{{ route('create-mobil.getmodel') }}', {
                        id: $(this).val()
                })
                .then(function(response) {
                        $('#car_model_id').empty();

                    $.each(response.data, function(id, merk) {
                        $('#car_model_id').append(new Option(merk, id))
                    })
                })
            });
        });
    </script> --}}
    <script>
        $('#merk_id').change(function() {
            var merksID = $(this).val();
            if (merksID) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('get-model-list') }}?merk_id=" + merksID,
                    success: function(res) {
                        if (res) {
                            $("#car_model_id").empty();
                            $("#car_model_id").append('<option>Pilih Model</option>');
                            $.each(res, function(key, value) {
                                $("#car_model_id").append('<option value="' + key + '">' + value +
                                    '</option>');
                            });

                        } else {
                            $("#car_model_id").empty();
                        }
                    }
                });
            } else {
                $("#car_model_id").empty();
                $("#car_variant_id").empty();
            }
        });
        $('#car_model_id').on('change', function() {
            var car_modelsID = $(this).val();
            if (car_modelsID) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('get-variant-list') }}?car_model_id=" + car_modelsID,
                    success: function(res) {
                        if (res) {
                            $("#car_variant_id").empty();
                            $("#car_variant_id").append('<option>Pilih Variant</option>');
                            $.each(res, function(key, value) {
                                $("#car_variant_id").append('<option value="' + key + '">' + value +
                                    '</option>');
                            });

                        } else {
                            $("#car_variant_id").empty();
                        }
                    }
                });
            } else {
                $("#car_variant_id").empty();
            }

        });

    </script>
     <script>
        $(document).ready(function() {

            // Format mata uang.
            $('#price , #km').mask('#.##0', {
                reverse: true
            });

        })

    </script>
@endprepend
