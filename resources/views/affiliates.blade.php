@extends('master')

@section('content')

<div class="mb-4">
    <a href="{{ route('index') }}" class="btn btn-primary">< Back</a>
</div>

<h2>Affiliates List within 100 km</h2>

@if (!empty($results))
<div class="my-5">
    <ul class="list-group">
        @foreach ($results as $id => $affiliate)
            <li class="list-group-item">#{{ $id  }} {{ $affiliate }}</li>
        @endforeach

    </ul>
</div>
@elseif (isset($results))
    <div class="my-5">
        <p> No affiliates found</p>
    </div>
@endif

@endsection
