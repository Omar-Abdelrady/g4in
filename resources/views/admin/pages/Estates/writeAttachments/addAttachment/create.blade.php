@extends('admin.layouts.app')

@section('title', 'اضافة مرفق للاعلان')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if(\App\Models\AdWriteAttachment::query()->first())
                    <form class="form" action="{{ route('admin.estates.attachment.ad.store', $ad->slug) }}" method="post">
                        @csrf
                        @foreach($attachments as $key => $item)
                        <div class="form-group px-2">
                            <input {{ $ad->hasWAttach($item->id) ? 'checked': null }} value="{{ $item->id }}" id="att{{ $item->id }}" name="attachCh[]" type="checkbox" class="form-check-input">
                            <label for="att{{ $item->id }}">{{ $item->name }}</label>
                            <input type="text" value="{{ $ad->hasWAttach($item->id) ?  \App\Models\PivotAdWriteAttachment::query()->where('ad_id', $ad->id)->where('ad_write_attachment_id', $item->id)->first()->body : null }}" name="attach[]" class="form-control att{{ $item->id }} input-body {{ $ad->hasWAttach($item->id) ? null: 'd-none' }}" placeholder="وصف المرفق">
                        </div>
                        @endforeach
                            <button class="btn btn-success my-2">اضافة</button>
                    </form>
                    @else
                    <h3>يرجى اضافة بعض المرفقات الكتابية</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_code')
    <script>
        $('.form :checkbox').change(function() {
            if (this.checked) {
                $('.'+$(this).attr('id')).removeClass('d-none').prop('required', true)

            } else {
                $('.'+$(this).attr('id')).addClass('d-none').prop('required', false)
            }
        });
    </script>
@endsection
