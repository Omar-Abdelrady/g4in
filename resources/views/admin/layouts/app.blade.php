<!DOCTYPE html>
<html>
<head>
    @include('admin.layouts.components.head')
    @yield('meta')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

@include('admin.layouts.components.navbar')

@include('admin.layouts.components.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">@yield('title')</h1>
                    </div><!-- /.col -->
                    <div class="col-12">
                        @include('admin.components.errors')
                        @include('admin.components.flash session')
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        @yield('content')
    </div>
    @include('admin.layouts.components.footer')
</div>

@include('admin.layouts.components.scripts')
@yield('js_code')
</body>
</html>
