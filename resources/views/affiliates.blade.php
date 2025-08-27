<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Nearby Affiliates Invitations</title>
</head>
<body class="container p-5">
    <h1 class="mb-4">Invite Affiliates</h1>
    <div class="container p-3 my-2 border border-2 rounded " style="background-color: #ececee;">
        <div class="row ">
            <div class="col">
                <form action="{{ route('process') }}" method="POST" enctype="multipart/form-data">
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
    @if (isset($results))
    <div class="my-5">
        <h2>Affiliates List within 100 km</h2>
        <ul class="list-group">
            @foreach ($results as $affiliate)
               <li class="list-group-item">#{{ $affiliate['id'] . ' ' . $affiliate['name'] }}</li>
            @endforeach

        </ul>
    </div>
    @endif
</body>
</html>
