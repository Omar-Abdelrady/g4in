@component('mail::message')
    # Hi Mr.Ryiad

    تم طلب اوردر من {{ $details['username'] }}
    يرجي توصيل الطلب له
@component('mail::button', ['url' => route('admin.store.orders.show', $details['order_id']) , 'color' => 'success'])
عرض الطلب
@endcomponent

Thanks,<br>
Global4In System
@endcomponent
