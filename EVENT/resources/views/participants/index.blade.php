<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Participants</title>

    <style>
        .card {
            margin-bottom: 20px;
        }

        .card-footer {
            background-color: #f8f9fa;
        }

        .btn-sm {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href={{ route('participants.index') }}>CRUD - PARTICIPANT</a>
            <div class="justify-end ">
                <div class="col ">
                    <a class="btn btn-sm btn-success" href={{ route('participants.create') }}>Add Participant</a>
                </div>
            </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            @if(isset($parts) && count($parts) > 0)
                @foreach ($parts as $part)
                    <div class="col-sm-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $part->name }}</h5>
                                <p class="card-text"><strong>Age:</strong> {{ $part->age }}</p>
                                <p class="card-text"><strong>Email:</strong> {{ $part->email }}</p>
                                <p class="card-text"><strong>Address:</strong> {{ $part->address }}</p>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm">
                                        <a href="{{ route('participants.edit', $part->id) }}"
                                           class="btn btn-primary btn-sm">Edit</a>
                                    </div>
                                    <div class="col-sm">
                                        <form action="{{ route('participants.destroy', $part->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No participants found.</p>
            @endif
        </div>
    </div>

</body>

</html>
