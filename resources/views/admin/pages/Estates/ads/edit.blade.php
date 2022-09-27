@extends('admin.layouts.app')

@section('title', $ad->title)

@section('meta')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>

    {{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">--}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
@endsection

<style type="text/css">
    .select2-selection__choice {
        padding-left: 20px !important;
    }
</style>

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card p-4">
                <div class="row">
                    <div class="col-12">
                        <h2>
                            ﻣﻌﻠﻮﻣﺎﺕ اﻟﻤﺴﺘﺨﺪﻡ
                        </h2>
                    </div>
                    <div class="col-12 col-md-6">
                        <h4>ﺃﺳﻢ اﻟﻤﻌﻠﻦ</h4>
                        <p>{{ $ad->user->first_name?? $ad->admin->name . ' '. ($ad->user->last_name?? null) }}</p>
                    </div>
                    <div class="col-12 col-md-6">
                        <h4>اﻟﺒﺮﻳﺪ اﻻﻟﻜﺘﺮﻭﻧﻲ ﻟﻠﻤﻌﻠﻦ</h4>
                        <p>{{ $ad->user->email?? $ad->admin->email }}</p>
                    </div>
                    <div class="col-12 col-md-6">
                        <h4>ﺭﻗﻢ ﻫﺎﺗﻒ اﻟﻤﻠﻌﻦ</h4>
                        <p>{{ $ad->user->phone?? 'اﻻﺩﻣﻦ' }}</p>
                    </div>
                </div>
            </div>
            <br>
            <form action="{{ route('admin.estates.ads.update', $ad->id) }}" enctype="multipart/form-data" method="post">
                @method('PUT')
                @csrf
                <div class="card p-4">
                    <div class="row">
                        <div class="col-12">
                            <h2>
                                ﻣﻌﻠﻮﻣﺎﺕ اﻻﻋﻼﻥ ﻭﺗﻔﺎﺻﻴﻠﻪ
                            </h2>
                        </div>
                        <div class="col-12">
                            <h4>ﻣﻌﻠﻮﻣﺎﺕ ﻋﺎﻣﺔ</h4>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group d-flex">
                                        <div class="col-6 align-items-center d-flex">
                                            <label class="mb-0" for="">ﺭﻗﻢ اﻻﻋﻼﻥ</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" name="ad_code" class="form-control" placeholder="ﺭﻗﻢ اﻻﻋﻼﻥ"
                                               value="{{ $ad->ad_code }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group d-flex">
                                        <div class="col-6 align-items-center d-flex">
                                            <label class="mb-0" for="">اﻟﺴﻌﺮ</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" name="price" class="form-control" placeholder="اﻟﺴﻌﺮ"
                                               value="{{ $ad->price }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group d-flex">
                                        <div class="col-6 align-items-center d-flex">
                                            <label class="mb-0" for="">اﻟﻤﺴﺎﺣﺔ</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" name="space" class="form-control" placeholder="اﻟﻤﺴﺎﺣﺔ"
                                               value="{{ $ad->space }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group d-flex">
                                        <div class="col-6 align-items-center d-flex">
                                            <label class="mb-0" for="">ﻋﺪﺩ اﻟﻐﺮﻑ</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="number" name="num_of_rooms" class="form-control" placeholder="ﻋﺪﺩ اﻟﻐﺮﻑ"
                                               value="{{ $ad->num_of_rooms }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group d-flex">
                                        <div class="col-6 align-items-center d-flex">
                                            <label class="mb-0" for="">ﻋﺪﺩ اﻟﻤﻄﺎﺑﺦ</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="number" name="num_of_kitchens" class="form-control" placeholder="ﻋﺪﺩ اﻟﻤﻄﺎﺑﺦ"
                                               value="{{ $ad->num_of_kitchens }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group d-flex">
                                        <div class="col-6 align-items-center d-flex">
                                            <label class="mb-0" for="">ﻋﺪﺩ ﺩﻭﺭاﺕ اﻟﻤﻴﺎﻩ</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="number" name="num_of_toilets" class="form-control" placeholder="ﻋﺪﺩ ﺩﻭﺭاﺕ اﻟﻤﻴﺎﻩ"
                                               value="{{ $ad->num_of_toilets }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group d-flex">
                                        <div class="col-6 align-items-center d-flex">
                                            <label class="mb-0" for="">ﻋﺪﺩ اﻟﻄﻮاﺑﻖ</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="number" name="num_of_floors" class="form-control" placeholder="ﻋﺪﺩ اﻟﻄﻮاﺑﻖ"
                                               value="{{ $ad->num_of_floors }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group d-flex">
                                        <div class="col-6 align-items-center d-flex">
                                            <label class="mb-0" for="">ﻋﺪﺩ اﻟﺸﻘﻖ</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="number" name="num_of_apartments" class="form-control" placeholder="ﻋﺪﺩ اﻟﺸﻘﻖ"
                                               value="{{ $ad->num_of_apartments }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group d-flex">
                                        <div class="col-6 align-items-center d-flex">
                                            <label class="mb-0" for="">ﻋﺪﺩ اﻟﻤﺤﻼﺕ</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="number" name="num_of_shops" class="form-control" placeholder="ﻋﺪﺩ اﻟﻤﺤﻼﺕ"
                                               value="{{ $ad->num_of_shops }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group d-flex">
                                        <div class="col-6 align-items-center d-flex">
                                            <label class="mb-0" for="">ﺭﻗﻢ اﻟﺒﻠﻮﻙ</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="number" name="block_num" class="form-control" placeholder="ﺭﻗﻢ اﻟﺒﻠﻮﻙ"
                                               value="{{ $ad->block_num }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group d-flex">
                                        <div class="col-6 align-items-center d-flex">
                                            <label class="mb-0" for="">ﺭﻗﻢ اﻟﻘﻄﻌﺔ</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="number" name="place_num" class="form-control" placeholder="ﺭﻗﻢ اﻟﻘﻄﻌﺔ"
                                               value="{{ $ad->place_num }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <hr>
                        </div>
                        
                        <div class="col-12">
                            <h4>ﺻﻮﺭ اﻻﻋﻼﻥ</h4>
                            @foreach($ad->photos as $key => $photo)
                                <img src="{{ asset('storage/'. $photo->image_avatar) }}" alt="">
                            @endforeach
                            <div class="form-group my-2">
                                <label for="">ﺗﻐﻴﺮ ﺻﻮﺭ اﻻﻋﻼﻥ</label>
                                <input type="file" name="images[]" id="images" class="form-control-file" multiple>
                                <div class="form-group images-content">

                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">اﺳﻢ اﻻﻋﻼﻥ</label>
                                <input type="text" name="title" class="form-control" placeholder="اﺳﻢ اﻻﻋﻼﻥ"
                                       value="{{ $ad->title }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">ﺗﻔﺎﺻﻴﻞ اﻻﻋﻼﻥ</label>
                                <textarea name="description" placeholder="ﺗﻔﺎﺻﻴﻞ اﻻﻋﻼﻥ"
                                          class="form-control description">{{ $ad->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">ﻭﺻﻒ ﻗﺼﻴﺮ ﻟﻻﻋﻼﻥ</label>
                                <textarea name="short_description" placeholder="ﻭﺻﻒ ﻗﺼﻴﺮ ﻟﻹﻋﻼﻥ"
                                          class="form-control short_description">{{ $ad->short_description }}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">اﻟﻘﺴﻢ اﻟﺨﺎﺹ ﺑﺎﻻﻋﻼﻥ</label>
                                <select id="category_id" name="category_id" class="form-control">
                                    @if($ad->category_id == null)
                                        <option selected value>اﺧﺘﺮ ﻗﺴﻢ ﻟﻹﻋﻼﻥ</option>
                                    @endif
                                    @foreach($categories as $category)
                                        <option
                                            {{ $category->id === $ad->category_id ? 'selected': null }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">اﻟﻘﺴﻢ اﻟﻔﺮﻋﻲ</label>
                                <select id="sub_category_id" name="sub_category_id" class="form-control">
                                    <option selected value=''>اﺧﺘﺮ اﻟﻘﺴﻢ اﻟﺨﺎﺹ ﺑﺎﻹﻋﻼﻥ</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">اﺧﺘﺮ اﻟﻤﺮﻓﻘﺎﺕ</label>
                                <select class="form-control select2-selection" name="attachments[]" multiple>
                                    @foreach($attachments as $item)
                                        <option {{ $ad->hasAttach($item->id) ? 'selected' : null }} value="{{ $item->id }}">{{ $item->attached }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <hr>
                        </div>

                        <div class="col-12">
                            <h4>ﻣﺨﻄﻂ ﺑﻴﺎﻧﻲ</h4>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="mb-0" for="">ﺻﻮﺭﺓ اﻟﻤﺨﻄﻂ</label>
                                        <input type="file" name="chart_photo" class="form-control-file">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="mb-0" for="">ﻣﻠﻒ pdf</label>
                                        <input type="file" name="chart_pdf" class="form-control-file">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="mb-0" for="">ﻓﻴﺪﻳﻮ ﺇﻥ ﻭﺟﺪ</label>
                                        <input type="file" name="chart_video" class="form-control-file">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($ad->chart)
                            @if($ad->chart->photo || $ad->chart->pdf || $ad->chart->video)
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="delete_chart_media" class="custom-control-input" id="customSwitch1">
                                            <label class="custom-control-label" for="customSwitch1">ﺣﺬﻑ ﻣﻠﻔﺎﺕ اﻟﻤﺨﻄﻂ اﻟﺤﺎﻟﻲ</label>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">ﻭﺻﻒ ﻋﺎﻡ ﻟﻠﻤﺨﻄﻂ</label>
                                <textarea name="chart_description" class="form-control">{{ $ad->chart ? $ad->chart->description : '' }}</textarea>
                            </div>
                        </div><div class="col-12">
                            <div class="btn btn-info btn-add" data-type="chart">اﺿﺎﻓﺔ ﻣﺮﻓﻘﺎﺕ اﺿﺎﻓﻴﺔ ﻟﻠﻤﺨﻄﻂ</div>
                            <div class="content-specification">
                                @foreach($chart_specifications as $i => $item)
                                    <div class="form-group my-3 row position-relative">
                                        <i class="fas fa-times specification-clear text-danger"></i>
                                        <div class="col-6">
                                            <label for="">اﻟﻌﻨﻮاﻥ</label>
                                            <input value="{{ $item['key'] }}" type="text" name="chart_specifications[{{$i}}][key]" class="form-control">
                                        </div>
                                        <div class="col-6">
                                            <label for="">اﻟﻮﺻﻒ</label>
                                            <input value="{{ $item['value'] }}" type="text" name="chart_specifications[{{$i}}][value]" class="form-control">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-12">
                            <hr>
                        </div>

                        <div class="col-12">
                            <h4>ﻣﻌﻠﻮﻣﺎﺕ ﺻﺎﺣﺐ اﻻﻋﻼﻥ</h4>
                            <div class="form-group">
                                <label for="">اﺳﻢ ﺻﺎﺣﺐ اﻻﻋﻼﻥ</label>
                                <input type="text" name="advertiser_name" class="form-control"
                                       placeholder="اﺳﻢ ﺻﺎﺣﺐ اﻻﻋﻼﻥ" value="{{ $ad->advertiser_name }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">اﻣﻴﻞ ﺻﺎﺣﺐ اﻻﻋﻼﻥ</label>
                                <input type="email" name="advertiser_email" class="form-control"
                                       placeholder="اﻣﻴﻞ ﺻﺎﺣﺐ اﻻﻋﻼﻥ" value="{{ $ad->advertiser_email }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">ﻫﺎﺗﻒ اﻭﻝ ﺻﺎﺣﺐ اﻻﻋﻼﻥ</label>
                                <input type="text" name="phone" class="form-control" placeholder="ﻫﺎﺗﻒ اﻭﻝ ﺻﺎﺣﺐ اﻻﻋﻼﻥ"
                                       value="{{ $ad->phone }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">ﻫﺎﺗﻒ ﺛﺎﻧﻲ ﺻﺎﺣﺐ اﻻﻋﻼﻥ</label>
                                <input type="text" name="second_phone" class="form-control"
                                       placeholder="ﻫﺎﺗﻒ ﺛﺎﻧﻲ ﺻﺎﺣﺐ اﻻﻋﻼﻥ" value="{{ $ad->second_phone }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <hr>
                        </div>

                        <div class="col-12">
                            <h4>اﻟﻌﻨﻮاﻥ</h4>
                            <div class="form-group">
                                <label for="">اﻟﺪﻭﻟﺔ</label>
                                <select class="form-control" id="countries">
                                    @foreach($countries as $country)
                                        <option {{ $ad->city->country->id == $country->id ? 'selected': null }} value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">اﻟﻤﺪﻳﻨﺔ</label>
                                <select name="city_id" class="form-control" id="cities">

                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">اﻟﺤﻰ</label>
                                <input type="text" name="address" class="form-control" placeholder="اﻟﺤﻰ" value="{{ $ad->address }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <hr>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <h5>ﻟﻹﻳﺠﺎﺭ اﻡ ﻟﻠﺒﻴﻊ</h5>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input {{ $ad->sale_or_rent == 0 ? 'checked' : null }}  id="sale" type="radio"
                                           value="0" name="sale_or_rent" class="custom-control-input">
                                    <label class="custom-control-label" for="sale">ﻟﻠﺒﻴﻊ</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input {{ $ad->sale_or_rent == 1 ? 'checked' : null }} id="rant" type="radio"
                                           value="1" name="sale_or_rent" class="custom-control-input">
                                    <label class="custom-control-label" for="rant">ﻟﻹﻳﺠﺎﺭ</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <h5>ﻭﻛﻴﻞ اﻻﻋﻼﻥ</h5>
                            <select class="form-control" name="ad_agent_id">
                                <option selected value>اﺧﺘﻴﺎﺭ ﻭﻛﻴﻞ اﻻﻋﻼﻥ</option>
                                @foreach(\App\Models\AdAgent::all() as $item)
                                    <option
                                        {{ $item->id === $ad->ad_agent_id ? 'selected' : null }} value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-12">
                            <div class="btn btn-info btn-add">اﺿﺎﻓﺔ ﻣﺮﻓﻘﺎﺕ اﺿﺎﻓﻴﺔ</div>
                            <div class="content-specification">
                                @foreach($general_specifications as $i => $item)
                                    <div class="form-group my-3 row position-relative">
                                        <i class="fas fa-times specification-clear text-danger"></i>
                                        <div class="col-6">
                                            <label for="">اﻟﻌﻨﻮاﻥ</label>
                                            <input value="{{ $item['key'] }}" type="text" name="specifications[{{$i}}][key]" class="form-control">
                                        </div>
                                        <div class="col-6">
                                            <label for="">اﻟﻮﺻﻒ</label>
                                            <input value="{{ $item['value'] }}" type="text" name="specifications[{{$i}}][value]" class="form-control">
                                        </div>
                                        <div class="col-12">
                                            <hr>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12 my-3">
                            <button class="btn btn-success">ﺗﻌﺪﻳﻞ</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js_code')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        $(".select2-selection").select2({
            allowClear: true
        });


        function addCities(cities) {
            var mySelect = {{ $ad->city_id }}
            $('#cities').find('option').remove().end().append(`<option value>اﺧﺘﺮ اﻟﻤﺪﻳﻨﺔ</option>`);
            $.each(cities, function (i, item) {
                $('#cities').append(`<option ${ item.id == mySelect ? 'selected': null } value='${item.id}'>${item.name}</option>`)
            })
        }
        $(document).ready(function () {
            $('.description').summernote()

            Axios();
            // getAttachedFirst()
            
            var chart_spec_i = {{ !empty($chart_specifications) ? count($chart_specifications)-1 : -1}};
            var general_spec_i = {{ !empty($general_specifications) ? count($general_specifications)-1 : -1}};
            $(document).on('click', '.btn-add', function () {
                var name = '';
                var i = 0;
                if ($(this).data('type') == 'chart') {
                    name = 'chart_specifications';
                    chart_spec_i++;
                    i = chart_spec_i;
                } else {
                    name = 'specifications';
                    general_spec_i++
                    i = general_spec_i;
                }
                var UiInput =
                    `
                       <div class="form-group my-3 row position-relative">
                            <i class="fas fa-times specification-clear text-danger"></i>
                            <div class="col-6">
                                <label for="">اﻟﻌﻨﻮاﻥ</label>
                                <input type="text" name="${name}[${i}][key]" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="">اﻟﻮﺻﻒ</label>
                                <input type="text" name="${name}[${i}][value]" class="form-control">
                            </div>
                            <div class="col-12"><hr></div>
                        </div>
                    `;

                $(this).siblings('.content-specification').hide().append(UiInput).show('slow');
            })

            $(document).on('click', '.specification-clear', function () {
                console.log('ok')
                $(this).parent('div').hide('slow');
                $(this).parent('div').remove();
            })
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
                    text: 'ﻳﺠﺐ اﺧﺘﻴﺎﺭ 4 ﺻﻮﺭ ﻙ اﻗﺼﻰ ﺣﺪ!',
                })
                this.value = '';
                return false;
            } else if (countFiles < 2) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'ﻳﺠﺐ اﻥ اﺧﺘﻴﺎﺭ ﺻﻮﺭﺗﻴﻦ ﻋﻠﻲ اﻻﻗﻞ',
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

        function Axios() {
            var ID = $('#countries').val();
            if (ID == 0){
                $('#cities').find('option').remove().end().append(`<option selected value>اﺧﺘﺮ اﻟﺪﻭﻟﺔ ﻟﻈﻬﻮﺭ اﻟﻤﺪﻥ</option>`);
                return false;
            }
            axios({
                method: 'get',
                url: '/cities/'+ID,
                date: ID
            }).then(function (res) {
                if (res.status == 200)
                {
                    addCities(res.data)
                    return true
                }
            })
        }

        $(document).on('change', '#countries', Axios);


        function axiosSubCategories(id) {
            let categoryId = id;
            let _token = $("input[name=_token]").val();
            let data = {
                category_id: categoryId,
                _token
            }
            if (categoryId == 'اﺧﺘﺮ اﻟﻘﺴﻢ اﻟﺨﺎﺹ ﺑﺎﻹﻋﻼﻥ'){
                $('#sub_category_id').find('option').remove().end().append(`<option selected value='null'>اﺧﺘﺮ اﻟﻘﺴﻢ اﻟﺨﺎﺹ ﺑﺎﻹﻋﻼﻥ</option>`);
                return false;
            }
            axios({
                method: 'get',
                url: `/admin/estate/get/sub-category/`+categoryId,
                date:data
            }).then(function (res) {
                if (res.status == 200)
                {
                    addSubCategory(res.data)
                    return true
                }
            })
        }
        $(document).on('change', '#category_id', function () {
            let id = $(this).val();
            axiosSubCategories(id)
        });

        function addSubCategory(cities) {
            var mySelect = {{ $ad->sub_category_id }}
            $('#sub_category_id').find('option').remove().end().append(`<option value>اﺧﺘﺮ اﻟﻘﺴﻢ</option>`);
            $.each(cities, function (i, item) {
                $('#sub_category_id').append(`<option ${ item.id == mySelect ? 'selected': null } value='${item.id}'>${item.name}</option>`)
            })
        }
            axiosSubCategories({{$ad->category_id}})
    </script>
@endsection
