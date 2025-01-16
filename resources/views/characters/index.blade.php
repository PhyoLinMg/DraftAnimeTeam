<!DOCTYPE html>
<html>
<head>
    <title>Character Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card mb-4">
            <div class="card-header">
                <h4>Add New Character</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('characters.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="anime_id" class="form-label">Anime Id</label>
                        <input type="text" class="form-control" id="anime_id" name="anime_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image URL</label>
                        <input type="text" class="form-control" id="image" name="image" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Character List</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image URL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($characters as $character)
                        <tr>
                            <td>{{ $character->id }}</td>
                            <td>{{ $character->name }}</td>
                            <td>{{ $character->image }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
