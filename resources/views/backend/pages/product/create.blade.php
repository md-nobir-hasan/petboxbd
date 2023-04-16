@extends('backend.layouts.app')

@section('title', 'Product Management')

@push('third_party_stylesheets')
    <link rel="stylesheet" href="{{ asset('assets/backend/library/summernote/summernote.min.css') }}">
@endpush

@push('page_css')
<style>
    .custom-border{
        border: 2px solid #80808033;
        padding: 10px;
    }
</style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>Add Product</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('product.index') }}" class="btn btn-info">Back</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form method="post" id="form" action="{{ route('product.store') }}"
                                    enctype="multipart/form-data" id="uploadForm">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="inputTitle" class="col-form-label">Title <span
                                                class="text-danger">*</span></label>
                                        <input id="inputTitle" type="text" name="title" placeholder="Enter title"
                                            value="{{ old('title') }}" class="form-control" required>
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    @if (check('SKU Number'))
                                        <div class="form-group">
                                            <label for="sku" class="col-form-label">SKU Number <span
                                                    class="text-danger">*</span></label>
                                            <input id="sku" type="text" name="sku" placeholder="Enter sku number"
                                                value="{{ old('sku') }}" class="form-control" required>
                                            @error('sku')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="summary" class="col-form-label">Short Description <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" id="summary" name="summary">{{ old('summary') }}</textarea>
                                        @error('summary')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="description" class="col-form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    @if (check('Category'))
                                        <div class="form-group">
                                            <label for="cat_id1">Category <span class="text-danger">*</span></label>
                                            <select name="cat_id" id="cat_id1" class="form-control" required>
                                                <option value="">--Select any category--</option>
                                                @foreach ($category as $key => $cat_data)
                                                    <option value='{{ $cat_data->id }}'>{{ $cat_data->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                    @if (check('Sub-category'))
                                        <div class="form-group">
                                            <label for="sub_cat_id">Sub-category <span class="text-danger">*</span></label>
                                            <select name="sub_cat_id" id="sub_cat_id" class="form-control" required>
                                                <option value="">--Select any sub-category--</option>

                                            </select>
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="price" class="col-form-label">Price(TK) <span
                                                class="text-danger">*</span></label>
                                        <input id="price" type="number" name="price" placeholder="Enter price"
                                            value="{{ old('price') }}" class="form-control" required>
                                        @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="discouns" class="col-form-label">Discount(amount)</label>
                                        <input id="discounts" type="number" name="discount" min="0"
                                            placeholder="Enter discount" value="{{ old('discount') }}"
                                            class="form-control">
                                        @error('discount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    @if (check('Brand'))
                                        <div class="form-group">
                                            <label for="brand_id">Brand</label>
                                            <select name="brand_id" class="form-control">
                                                <option value="">--Select Brand--</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    {{-- @dd(check('Timer Product')) --}}
                                    @if (serviceCheck('Timer Product'))
                                        <div class="form-group">
                                            <label for="is_timer">Timer Product</label>
                                            <select name="is_timer" id="is_timer" class="form-control">
                                               <option value="no">No</option>
                                               <option value="yes">Yes</option>
                                            </select>
                                        </div>
                                        <div id="time_to_div" class="form-group" style="display: none">
                                            <label for="time_to" class="col-form-label">Set Time<span
                                                    class="text-danger">*</span></label>
                                            <input id="time_to" type="date" name="time_to" placeholder="Set a date date"
                                                value="{{ old('time_to') }}" class="form-control">
                                            @error('time_to')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    @endif
                                    <div class="form-group">
                                        <label for="stock">In stock</label>
                                        <input id="quantity" type="number" name="stock" min="0"
                                            placeholder="Enter quantity" value="{{ old('stock') }}"
                                            class="form-control">
                                        @error('stock')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    @if (!serviceCheck('No Color & Size'))
                                        @if (!serviceCheck('Color Specific'))
                                            <div class="mb-4 custom-border">
                                                <label>Product Colors: <span class="ml-2" id="add_product_color"></span></label>
                                                <button type="button" class="btn btn-primary ml-5 btn-sm"
                                                    data-toggle="modal" data-target="#colorModal">
                                                    Add Color
                                                </button>

                                                <div class="modal fade" id="colorModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="colorModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="colorModalLabel">Add Product Color
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="color">Product's color</label>
                                                                    <select id="color" class="form-control">
                                                                        <option value="">--Select color--</option>
                                                                        @foreach ($colors as $color)
                                                                            <option value="{{ $color->id }}">
                                                                                {{ $color->c_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="color_price_increase">Price Increase: </label>
                                                                    <input type="number" id="color_price_increase"
                                                                        class="form-control" value="0">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="des">Description: </label>
                                                                    <textarea class="form-control" id="color_des" cols="10" rows="3" placeholder=""></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button class="btn btn-primary upload-product-gallery"
                                                                    id="add_color" type="button">Add Color</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @endif

                                        @if (!serviceCheck('Size Specific'))
                                            <div class="mb-3 custom-border">

                                                <label>Product Sizes: <span  class="ml-2" id="add_product_size"></span></label>
                                                <button type="button" class="btn btn-primary ml-5 btn-sm"
                                                    data-toggle="modal" data-target="#sizeModal">
                                                    Add size
                                                </button>

                                                <div class="modal fade" id="sizeModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="sizeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="sizeModalLabel">Add Color Size
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="size">Product's size</label>
                                                                    <select class="form-control"  id="size">
                                                                        <option value="">--Select size--</option>
                                                                        @foreach ($sizes as $size)
                                                                            <option value="{{ $size->id }}">
                                                                                {{ $size->size }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="price_increase">Price Increase: </label>
                                                                    <input type="number" id="size_price_increase"
                                                                        class="form-control" value="0">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="size_des">Description: </label>
                                                                    <textarea class="form-control" id="size_des" cols="10" rows="3" placeholder=""></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button class="btn btn-primary upload-product-gallery"
                                                                    id="add_size">Add Size</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif

                                    <!-- Add product gallery modal -->
                                    <input type="file" name="galleryphoto" class="multiple-img">

                                    <div class="form-group">
                                        <label for="status" class="col-form-label">Status <span
                                                class="text-danger">*</span></label>
                                        <select name="status" class="form-control" required>
                                            <option selected value="active">In stock</option>
                                            <option value="inactive">Out of stock</option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <button class="btn btn-success" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('third_party_scripts')
    <script src="{{ asset('assets/js/DataTable/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/library/summernote/summernote.min.js') }}"></script>
@endpush

@push('page_scripts')
    <script>
        $(document).ready(function() {

            $('#summary').summernote({
                placeholder: "Write short description.....",
                tabsize: 2,
                height: 100
            });

            $('#description').summernote({
                placeholder: "Write detail description.....",
                tabsize: 2,
                height: 150
            });

            multiImage('.multiple-img', {
                width: '150px',
                height: '150px'
            });

            $('#is_timer').on('change',function () {
                console.log($(this).val() + ' value i am');
                if($(this).val() == 'yes'){
                    $('#time_to_div').css({
                        display:'block'
                    });
                }else{
                    $('#time_to_div').css({
                        display:'none'
                    });
                }

             });
            $('#cat_id1').on('change',function () {
                let val = $(this).val();
                $.ajax({
                    url:"{{route('ajax.subcat')}}",
                    method: 'get',
                    data: {id:val},
                    success:function(res){
                        let option = '<option>Select sub-category</option>';
                       res.forEach(element => {
                        option += `<option value='${element.id}'>${element.title}</option>`;
                       });
                       $('#sub_cat_id').html(option);
                    }
                })
             })

            $('#add_color').on('click',function(e){
                var element = $(this);
                e.preventDefault();
                let price_increase =  $('#color_price_increase').val();
                let color_des =  $('#color_des').val();
                let color =  $('#color').val();
                let color_name =  $('#color option:selected').html();
                ajax({
                    'action': 'store',
                    'data_obj':{
                                'color_id':color,
                                'price_increase':price_increase,
                                'des':color_des
                                },
                    'model':'PaColor',
                    },function(res){
                        element.prev('button').click();
                        $('#add_product_color').append(`<span class='bg-warning p-2 rounded-pill'>${color_name}<span class="badge remove badge-light ml-1" onclick="remove(this,'PaColor')">x<input type="hidden" name="pa_color_id[${res.id}]" value="${res.id}"></span></span>`);
                        $('#color').val('');
                        $('#color_price_increase').val(0);
                        $('#color_des').val('');
                    }
                );
            });

            $('#add_size').on('click',function(e){
                var element = $(this);
                e.preventDefault();
                let size_id =  $('#size').val();
                let price_increase =  $('#size_price_increase').val();
                let des =  $('#size_des').val();
                let name =  $('#size option:selected').html();
                ajax({
                    'action': 'store',
                    'data_obj':{
                                'size_id':size_id,
                                'price_increase':price_increase,
                                'des':des
                                },
                    'model':'PaSize',
                    },function(res){
                            element.prev('button').click();
                            $('#add_product_size').append(`<span class='bg-warning p-2 rounded-pill'>${name}<span class="badge remove badge-light ml-1" onclick="remove(this,'PaSize')">x<input type="hidden"  name="pa_size_id[${res.id}]" value="${res.id}"></span></span>`);
                            $('#size').val('');
                            $('#size_price_increase').val(0);
                            $('#size_des').val('');
                        }
                );
            });

        });


    </script>
@endpush
