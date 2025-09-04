@extends('master')

@section('content')

<div class="my-4">
    <a href="{{ route('index') }}" class="btn btn-primary">< Back</a>
</div>

<div>
    The uploaded file is too large. Maximum allowed size is 10MB
</div>

@endsection
