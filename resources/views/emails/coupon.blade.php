@component('mail::message')

    مرحبا بك.
    لقد حصلت علي كوبون خصم {{ $details['name'] }} من جلوبل 4 اين
    اسم الكوبون : {{ $details['coupon'] }}
    صالح حتى : {{ $details['exp_date'] }}

    شكرا لك لإستخدامك,<br>
    Global4In System
@endcomponent
