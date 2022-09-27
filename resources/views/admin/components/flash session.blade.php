@if(session()->has('success'))
    <div class="alert alert-success">
        <h2>{{ session()->get('success') }}</h2>
    </div>
@elseif(session()->has('error'))
    <div class="alert alert-danger">
        <h2>{{ session()->get('error') }}</h2>
    </div>
@endif
