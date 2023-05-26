@if (session('error'))
    <div class="alert alert-danger text-center msg" id="error">
        <strong>{{ session('error') }}</strong>
    </div>
@endif
@if (session('message'))
    <div class="alert alert-info text-center msg" id="error">
        <strong>{{ session('message') }}</strong>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success text-center msg" id="error">
        <strong>{{ session('success') }}</strong>
    </div>
@endif
