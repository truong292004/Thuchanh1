<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f8fc;
            font-family: 'Arial', sans-serif;
            color: #343a40;
        }

        .navbar {
            background-color: #4CAF50 !important;
            padding: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            color: #fff !important;
            font-size: 1.6rem;
        }

        .table-container {
            background: linear-gradient(145deg, #ffffff, #e6e9ef);
            border-radius: 12px;
            padding: 30px;
            margin-top: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        h3 {
            color: #343a40;
            font-weight: 600;
            text-align: center;
            margin-bottom: 25px;
            text-transform: uppercase;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th {
            background-color: #4CAF50;
            color: black;
            text-align: center;
            padding: 10px;
        }

        td {
            text-align: center;
            padding: 10px;
        }

        .btn {
            transition: all 0.3s ease-in-out;
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            font-size: 1rem;
            padding: 8px 16px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            font-size: 1rem;
            padding: 8px 16px;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
            font-size: 1rem;
            padding: 8px 16px;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        @media (max-width: 768px) {
            .table-container {
                padding: 20px;
            }

            .btn {
                font-size: 0.9rem;
                padding: 8px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">CRUD ISSUE</a>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container mt-4">
        <div class="table-container">
            <h3>ISSUE LIST</h3>
            <a href="{{ route('issues.create') }}" class="btn btn-success mb-3">Add New Issue</a>
            @if(session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
			@endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID_Issue</th>
                        <th>Computer_Name</th>
                        <th>Model</th>
                        <th>Reported_By</th>
                        <th>Reported_Date</th>
                        <th>Urgency</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($issues as $issue)
                        <tr>
                            <td>{{ $issue->id }}</td>
                            <td>{{ $issue->computer ? $issue->computer->computer_name : 'N/A' }}</td>
                            <td>{{ $issue->computer ? $issue->computer->model : 'N/A' }}</td>
                            <td>{{ $issue->reported_by }}</td>
                            <td>{{ $issue->reported_date }}</td>
                            <td>{{ $issue->urgency }}</td>
                            <td>{{ $issue->status }}</td>
                            <td>
                                <a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('issues.destroy', $issue->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirmDelete();">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                {{ $issues->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this post? This action cannot be undone.');
        }
    </script>
</body>

</html>
