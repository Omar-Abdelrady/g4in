@component('mail::message')
# Hi Mr.Ryiad

يوجد رسالة جديدة لديك من {{ $details['full_name'] }}

@component('mail::button', ['url' => route('admin.contact.show', $details['id']), 'color' => 'success'])
عرض الرسالة
@endcomponent

Thanks,<br>
Global4In System
@endcomponent
