@extends('admin.layouts.app')

@section('title', 'اعلانات العقارات')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="col-12">
                        <a href="{{ route('admin.estates.ads.create') }}" class="btn btn-success my-2">اضافة عقار</a>
                    </div>
                    <table class="table m-auto table-striped table-responsive-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم الاعلان</th>
                            <th>الحالة</th>
                            <th>عمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ads as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    @if($item->ad_status == 0)
                                        <span class="text-danger">معلق</span>
                                    @elseif($item->ad_status == 1)
                                        <span class="text-success">مفعل</span>
                                    @elseif($item->ad_status == 2)
                                        <span class="text-info">غير مفعل</span>
                                    @endif

                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.estates.ads.show', $item->id) }}"
                                       class="btn btn-info">عرض</a>
                                    <a href="{{ route('admin.estates.ads.edit', $item->id) }}"
                                       class="btn btn-secondary mx-2">تعديل</a>
                                    <form action="{{ route('admin.estates.ads.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">حذف</button>
                                    </form>
                                    <a href="{{ route('admin.estates.ads.status', $item->id) }}" class="btn btn-dark mx-2">
                                        @if($item->ad_status == 0)
                                            تفعيل
                                        @elseif($item->ad_status == 1)
                                            الغاء التفعيل
                                        @endif
                                    </a>
                                    <a class="btn btn-light" href="{{ route('admin.estates.attachment.ad.add', $item->slug) }}">اضافة مرفق كتابي</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
