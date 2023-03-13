@php
    $site_info = App\Models\CompanyInfo::first();
    $site_contact_info = App\Models\CompanyContact::first();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title', $site_info->title) </title>

    <!-- Favicon-->
    <link rel="icon" href="{{ asset($site_info->logo) }}" type="image/png">

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/style.css') }}">
    @stack('third_party_stylesheets')
    @stack('page_css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Main Header -->
        @include('backend.partial.nav')
        <!-- Left side column. contains the logo and sidebar -->
        @include('backend.partial.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper  py-md-5 px-md-5">
            @yield('content')
        </div>

        <!-- Main Footer -->
        @include('backend.partial.footer')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="{{asset('assets/backend/js/app.balde.js')}}"></script> --}}

    {{-- Custom js global js --}}
    <script>
        //======================================= multipule image design ========================
        //nedded one selector which is input field and height width poperties. css design needed class name 'image-box'
        function multiImage(selector, property) {
            let element = $(selector);
            element.hide();
            let name = element.attr('name');
            let design = `
                        <div class='d-none' id='ldr3fjf3shfd'></div>
                        <label for="inputPhoto" class="col-form-label">Add product gallery: <span style='font-size: 14px;font-weight: 400;'>(Last image is used as main product image)</span></label> <br>
                        <div class="image-box d-flex">
                            <div class="upload-img border" style="width:${property.width ?? '150px'};height:${property.height ?? '150px'}">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Upload Image
                                </button>
                            </div>
                        </div>
                        `;

            let gallery_form = `
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id='gallery_form' action="{{ route('ajax.store') }}" method="POST">
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label for="galleryphoto" class="col-form-label">Upload image<span
                                                    class="text-danger">*</span></label>
                                            <input name='${name}' id="galleryphoto" type="file" placeholder="Enter Product gallery""
                                                class="form-control" required>
                                            <div id="holder" style="margin-top:15px;max-height:100px;">
                                            </div>
                                        </div>
                                        @if (!serviceCheck('No Color & Size'))
                                            @if (serviceCheck('Color Specific'))
                                                <div class="form-group">
                                                    <label for="color_id" class="col-form-label">Product color<span
                                                            class="text-danger">*</span></label>
                                                    <select name="color_id" id="color_id" class="form-control" required>
                                                        <option value="">Select color</option>
                                                    @isset($colors)
                                                            @foreach ($colors as $color)
                                                                <option value="{{ $color->id }}">{{ $color->c_name }}</option>
                                                            @endforeach
                                                    @endisset
                                                    </select>
                                                    <div id="holder" style="margin-top:15px;max-height:100px;">
                                                    </div>
                                                </div>
                                            @endif

                                            @if (serviceCheck('Size Specific'))
                                                <div class="form-group">
                                                    <label for="size_id" class="col-form-label">Product size<span
                                                            class="text-danger">*</span></label>
                                                    <select name="size_id" id="size_id" class="form-control" required>
                                                        <option value="">Select size</option>
                                                        @isset($sizes)
                                                            @foreach ($sizes as $size)
                                                                <option value="{{ $size->id }}">{{ $size->size }}</option>
                                                            @endforeach
                                                    @endisset
                                                    </select>
                                                    <div id="holder" style="margin-top:15px;max-height:100px;">
                                                    </div>
                                                </div>
                                            @endif
                                        @endif

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button class="btn btn-primary upload-product-gallery">Save changes</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>`;
            $(gallery_form).insertAfter($("#form"));
            $(design).insertAfter(element);


            $(document).on('submit', '#gallery_form', function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let form_data = new FormData($('#gallery_form')[0]);
                $.ajax({
                    type: "POST",
                    url: "{{ route('ajax.store') }}",
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // let gallary_img_input =
                        //     `<input type='hidden' name="gallery_img_id[${response.insert.id}]" value='${response.insert.id}'>`;
                        let img =
                            `<div>
                                <img src="${response.img}" class="img-thumbnail" width="150px" alt="Empty Image">
                                 <span class="badge remove badge-danger  ml-1" onclick="remove(this,'ProductGallery')" style="position: relative;top: -37%;right: 19%;font-size: 20px;cursor: pointer;">x
                                    <input type='hidden' name="${name}[${response.insert.id}]" value='${response.insert.id}'>
                                </span>
                            </div>`;

                        // $('#ldr3fjf3shfd').append(gallary_img_input);
                        $('.image-box').prepend(img);
                        $('button[data-dismiss="modal"]').click();
                        $('#color_id').val('');
                        $('#size_id').val('');
                        $('#galleryphoto').val('');
                    }
                })
            });


        }



        function ajax(p, fallFunc) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // ajax insert
            if (p.action == 'store') {
                var url = "{{ route('ajax.singlestore') }}";
            }
            // ajax index
            if (p.action == 'index') {
                var url = "{{ route('ajax.index') }}";
            }
            // ajax edit
            if (p.action == 'edit') {
                var url = "{{ route('ajax.edit') }}";
            }
            // ajax delete
            if (p.action == 'delete') {
                var url = "{{ route('ajax.delete') }}";
            }

            var data_object = {
                'data_obj': p.data_obj
            };
            if (p.model) {
                data_object.model = p.model;
            }
            if (p.with_arr) {
                data_object.with_arr = p.with_arr;
            }
            if (p.condition) {
                data_object.condition = p.condition;
            }
            $.ajax({
                url: url,
                type: 'post',
                async: false,
                data: data_object,
                success: function(response) {
                    fallFunc(response);
                }
            });
        }

        function remove(This, model) {
            let id = $(This).find('input').val();
            console.log(id);
            if (id) {
                ajax({
                    'action': 'delete',
                    'data_obj': {
                        'id': id
                    },
                    'model': model,
                }, function(res) {
                    if (res) {
                        $(This).parent().remove();
                    } else {
                        console.log('Something error from this delete method');
                    }
                })
            }
        }

        // ============================================ End ========================
    </script>
    @stack('third_party_scripts')

    @stack('page_scripts')
</body>

</html>
