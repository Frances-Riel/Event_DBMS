<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>{{ $events->name }}</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: auto;
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href={{ route('events.index') }}>
                CRUD - Event
            </a>
        </div>
    </nav>
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <h1>{{ $events->name }}</h1>
            <h5>{{ $events->date }}</h5>
            <h5>{{ $events->location }}</h5>
        </div>
    </div>
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <form action="{{ route('events.storeParticipant', ['event' => $events->id]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" id="age" name="age" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                    <input type="number" class="form-control" id="Event_ID" name="Event_ID" value="{{ $events->id }}" hidden>
                </div>
                <button type="submit" class="btn btn-primary">Add Participant</button>
            </form>
            {{-- <pre>
                {{ print_r($parts) }}
            </pre> --}}
            <table>
                @if($parts)
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Address</th>
                    </tr>
                    @foreach($parts as $part)
                        <tr>
                            <td>{{ $part->name }}</td>
                            <td>{{ $part->age }}</td>
                            <td>{{ $part->email }}</td>
                            <td>{{ $part->address }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">No participants found</td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
</body>
</html>
