@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br>
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p class="mb-0">{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('warning'))
<div class="alert alert-warning">
    <p class="mb-0">{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('danger'))
<div class="alert alert-danger">
    <p class="mb-0">{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('info'))
<div class="alert alert-info">
    <p class="mb-0">{{ $message }}</p>
</div>
@endif