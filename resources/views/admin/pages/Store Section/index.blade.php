@extends('admin.layouts.app')

@section('title', 'مرحبا بك في المتجر')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ count(\App\Models\Product::all()) }}</h3>

                        <p>عدد المنتجات حتى الان</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ count(\App\Models\User::all()) }}</h3>

                        <p>عدد المستخدمين</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
