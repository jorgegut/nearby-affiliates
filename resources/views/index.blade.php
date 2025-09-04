@extends('master')

@section('content')

<h1 class="mb-4">Invite nearby Affiliates</h1>
<div class="container p-3 my-2 border border-2 rounded " style="background-color: #ececee;">
    <div class="row ">
        <div class="col">
            <form action="{{ route('results') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="affiliates_file" class="form-label">File Input</label>
                    <input type="file" id="affiliates_file" name="affiliates_file">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Upload File</button>
                </div>
                @error('affiliates_file')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </form>
        </div>
    </div>
</div>

@endsection
