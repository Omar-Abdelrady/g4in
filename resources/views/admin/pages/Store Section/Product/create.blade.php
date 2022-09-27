@extends('admin.layouts.app')

@section('title', 'اضافة منتج')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.store.products.store') }}" enctype="multipart/form-data"
                          method="post">
                        @csrf
                        <div class="form-group">
                            <label for="images">اختر مجموعة من الصور</label>
                            <input type="file" class="form-control-file" name="images[]" id="images" multiple>
                        </div>
                        <div class="form-group images-content">

                        </div>
                        <div class="form-group">
                            <label for="name">اسم المنتج</label>
                            <input type="text" value="{{ old('name') }}" class="form-control" name="name"
                                   placeholder="اسم المنتج">
                        </div>
                        <div class="form-group">
                            <label for="price">سعر المنتج</label>
                            <input type="number" value="{{ old('price') }}" class="form-control" name="price"
                                   placeholder="سعر المنتج">
                        </div>
                        <div class="form-group">
                            <label for="discount">الخصم</label>
                            <input type="number" value="{{ old('discount') }}" class="form-control discount" name="discount"
                                   placeholder="الخصم">
                        </div>
                        <div class="form-group">
                            <label for="category">القسم</label>
                            <select class="form-control select2-selection" name="category">
                                <option value="">أختر قسم المنتج</option>
                                @foreach($categories as $category)
                                    <option
                                        value="{{$category->id}}" {{ old('category') == $category->id ? 'selected' : null }}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sub_description">الوصف القصير</label>
                            <textarea class="form-control" name="sub_description" id="sub_description" rows="5"
                                      placeholder="الوصف القصير">{{old('sub_description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">وصف المنتج</label>
                            <textarea class="form-control" name="description" id="description"
                                      rows="5">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="keywords">الكلمات الدلاليه</label>
                            <textarea class="form-control" name="keywords" id="keywords" rows="5"
                                      placeholder="الكلمات الدلاليه">{{ old('keywords') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="colors">الوان المنتج</label>
                            <select class="form-control select2-selection" name="colors[]" multiple>
                                @foreach($colors as $key => $color)
                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sizes">حجم المنتج</label>
                            <select class="form-control select2-selection" name="sizes[]" multiple>
                                @foreach($sizes as $key => $size)
                                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{--                        @dd(old())--}}
                        <div class="form-group">
                            <div class="btn btn-info add-specification">اضف معلومة للمنتج</div>
                            <div class="specification-content">
                                @if(!empty(old('specification_key')))
                                    @foreach(old('specification_key') as $key => $item)
                                        <div>
                                            <label for="">العنوان</label>
                                            <input type="text" name="specification_key[]"
                                                   value="{{ old('specification_key')[$key] }}" class="form-control">

                                            <label for="">القيمة</label>
                                            <input type="text" class="form-control" name="specification_value[]"
                                                   value="{{ old('specification_value')[$key] }}">
                                            <i class="fa fa-inverse specification-clear">clear</i>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <button class="btn btn-success my-2">اضافة</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_code')
    <script>
        $(".select2-selection").select2({
            allowClear: true
        });
        $(function () {
            $(document).on('click', '.add-specification', function () {
                let uiInputs =
                    `
                        <div class="position-relative my-2">
                            <label for="">العنوان</label>
                            <input type="text" name="specification_key[]" class="form-control">

                            <label for="">القيمة</label>
<input type="text" class="form-control" name="specification_value[]">
<i class="fas fa-times specification-clear text-danger"></i>
                        </div>
<hr>
                    `;
                let content = $('.specification-content')

                content.append(uiInputs).hide().show('slow');
            })

            $(document).on('click', '.specification-clear', function () {
                $(this).parent('div').hide('slow');
                $(this).parent('div').remove();
            })

            $("#images").on('change', function () {
                //Get count of selected files
                var countFiles = $(this)[0].files.length;
                var imgPath = $(this)[0].value;
                var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                var image_holder = $(".images-content");
                image_holder.empty();
                if (countFiles > 4) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'يجب اختيار 4 صور ك اقصى حد!',
                    })
                    this.value = '';
                    return false;
                } else if (countFiles < 2) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'يجب ان اختيار صورتين علي الاقل',
                    })
                    this.value = '';
                    return false;
                }
                if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                    if (typeof (FileReader) != "undefined") {
                        //loop for each file selected for uploaded.
                        for (var i = 0; i < countFiles; i++) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                $("<img />", {
                                    "src": e.target.result,
                                    "class": "thumb-image img-fluid m-2 rounded",
                                    'width': '200'
                                }).appendTo(image_holder);
                            }
                            image_holder.show();
                            reader.readAsDataURL($(this)[0].files[i]);
                        }
                    } else {
                        alert("This browser does not support FileReader.");
                    }
                } else {
                    alert("Pls select only images");
                }
            });

            $('.discount').on('input', function () {
                if (this.value > 100)
                {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'لا يجب ان يكون الخصم اكثر من 100%',
                    })
                    this.value = '';
                }
            })
        })

    </script>
@endsection
