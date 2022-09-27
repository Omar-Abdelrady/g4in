@extends('website.layouts.app')

@section('title', $service->name)

@section('description',  $service->short_description)

@section('keywords', $service->keywords)

@section('bread', $service->name)

@section('image', asset('storage/'. $service->logo))

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="title-2">
                    {{ $service->name }}
                </h1>
            </div>
            <div class="col-12">
                <div class="slick responsive">
                    @foreach($service->getMedia('service_images') as $media)
                        <div>
                            <img src="{{ $media->getFullUrl() }}" alt="">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12">
                {!! $service->description !!}
            </div>
        </div>
    </div>

@endsection

@section('js-code')
    <script>
        $('.responsive').slick({
            dots: true,
            infinite: true,
            rtl: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    </script>
@endsection
