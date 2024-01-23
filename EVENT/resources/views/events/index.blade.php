<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Event</title>

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
            <a class="navbar-brand h1" href={{ route('events.index') }}>CRUD - Event</a>
            <div class="justify-end ">
                <div class="col ">
                    <a class="btn btn-sm btn-success" href={{ route('events.create') }}>Add Event</a>
                </div>
            </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            @if(isset($events) && count($events) > 0)
                @foreach ($events as $event)
                    <div class="col-sm-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->name }}</h5>
                                <p class="card-text"><strong>Date:</strong> {{ $event->date }}</p>
                                <p class="card-text"><strong>Location:</strong> {{ $event->location }}</p>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm">
                                        <a href="{{ route('events.edit', $event->id) }}"
                                           class="btn btn-primary btn-sm">Edit</a>
                                    </div>
                                    <div class="col-sm">
                                        <a href="{{ route('events.show', $event->id) }}"
                                           class="btn btn-primary btn-sm">Select</a>
                                    </div>
                                    <div class="col-sm">
                                        <form action="{{ route('events.destroy', $event->id) }}" method="post">
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
                <p>No Events Found.</p>
            @endif
        </div>
    </div>

</body>

</html>
