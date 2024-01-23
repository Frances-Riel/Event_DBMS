<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>{{ $events->name }}</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #ffc107;
        }

        .container {
            margin-top: 50px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dee2e6;
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .modal-body form {
            max-width: 400px;
            margin: 0 auto;
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
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-md-8">
                <h1 class="display-4">{{ $events->name }}</h1>
                <p class="lead">{{ $events->date }}</p>
                <p class="lead">{{ $events->location }}</p>
            </div>
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
                    <input type="text" class="form-control" id="Event_ID" name="Event_ID" value="{{ $events->id }}" hidden>
                </div>
                <button type="submit" class="btn btn-primary">Add Participant</button>
            </form>
            <table>
                @if($parts)
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                    @foreach($parts as $part)
                        <tr>
                            <td>{{ $part->name }}</td>
                            <td>{{ $part->age }}</td>
                            <td>{{ $part->email }}</td>
                            <td>{{ $part->address }}</td>
                            <td>
                                <button data-id="{{ $part->id }}" data-bs-toggle="modal" data-bs-target="#updateModal{{ $part->id }}">Update</button>
                                <form action="{{ route('events.destroyParticipant', ['id' => $part->id]) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-link">Delete</button>
                                </form>
                            </td>
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
    @foreach($parts as $part)
        <div class="modal fade" id="updateModal{{ $part->id }}" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel{{ $part->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel{{ $part->id }}">Update Participant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('events.updateParticipant', ['id' => $part->id]) }}">
                            @csrf
                            @method('PUT')
                            <label for="name">Name:</label>
                            <input type="text" name="name" value="{{ $part->name }}" class="form-control">

                            <label for="age">Age:</label>
                            <input type="number" name="age" value="{{ $part->age }}" class="form-control">

                            <label for="email">Email:</label>
                            <input type="email" name="email" value="{{ $part->email }}" class="form-control">

                            <label for="address">Address:</label>
                            <input type="text" name="address" value="{{ $part->address }}" class="form-control">

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- Add your update button here -->
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <script>
        $(document).ready(function() {
            $('button[data-bs-toggle="modal"]').on('click', function() {
                console.log('Update button clicked!');
            });
        });
    </script>
</body>
</html>
