<div class="ltn__product-item ltn__product-item-4 text-center---">
    <div class="product-img">
        <a href="{{ route('ads.show', $item->slug) }}"><img
                src="{{ asset('storage/'. $item->photos[0]->image_medium) }}"
                alt="{{ $item->title }}" class="w-100"></a>
        <div class="product-badge">
            <ul>
                <li class="sale-badge bg-green---">{{ $item->sale_or_rent == 0 ? 'للبيع': 'للإيجار' }}</li>
            </ul>
        </div>
        <div class="product-img-location-gallery">
            <div class="product-img-location">
                <ul>
                    <li>
                        <a><i
                                class="flaticon-pin"></i> {{ $item->city->country->name .' ,'.$item->city->name }}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="product-img-gallery">
                <ul>
                    <li>
                        <a href="{{ route('ads.show', $item->slug) }}"><i
                                class="fas fa-camera"></i> {{ count($item->photos) }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="product-info">
        <div class="product-price">
            <span>ريال {{ $item->price }}</span>
        </div>
        <h2 class="product-title"><a
                href="{{ route('ads.show', $item->slug) }}">
                {{ $item->title }}
            </a></h2>
        <div class="product-description">
            <p>
                {{ \Illuminate\Support\Str::limit($item->short_description, '80') }}
            </p>
        </div>
        <ul class="ltn__list-item-2 ltn__list-item-2-before">
            @foreach($item->attachments()->where('icon', '!=', null)->take(4)->get() as $att)
                <li><span class="text-center"><i><img src="{{ asset('storage/'. $att->icon) }}" width="25" class="img-fluid m-auto" alt=""></i></span>
                    {{ $att->attached }}
                </li>
            @endforeach
        </ul>
    </div>

</div>
