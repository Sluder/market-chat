
@if (session()->has('message'))
    {{ session()->get('message') }}
@else
    There was an error with your request
@endif