<!DOCTYPE html>
<html>
<head>
    @include('admin.layouts.components.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <section class="content">
        <!-- Content Wrapper. Contains page content -->
        <div class="container" style="height: 100vh">
            <div class="row justify-content-center align-content-center h-100">
                <div class="col-md-6 col-12">
                    @include('admin.components.errors')
                    @include('admin.components.flash session')
                    <form class="form-horizontal my-3" action="{{ route('admin.submit') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 control-label">البريد الالكتروني</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="البريد الالكتروني">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 control-label">الرقم السري</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="الرقم السري">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="form-check">
                                        <input type="checkbox" name="remember" value="1" class="form-check-input" id="exampleCheck2">
                                        <label class="form-check-label"  for="exampleCheck2">تذكرني</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="">
                            <button type="submit" class="btn btn-info">تسجيل دخول</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
    </section>
</div>




@include('admin.layouts.components.scripts')
</body>
</html>
