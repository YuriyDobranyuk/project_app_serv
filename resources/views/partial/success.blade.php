@if (Session::has('flash_message'))
    <div class="alert alert-success">
        <strong>{{ Session::get('flash_message') }}</strong>
    </div>
@endif