<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $universty->name }} - Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/university_dashboard.css') }}">
</head>
<body>

    <div class="navbar">
            <img src="{{ asset('images/prologo.jpeg') }}" alt="GAM3TNA Logo">
            <span>GAM3TNA</span>
        </a>
    </div>

    <div class="university-dashboard">
        <h2>{{ $universty->name }} Dashboard</h2>
        <div class="university-info">
            <img src="{{ $universty->image }}" alt="{{ $universty->name }}" class="university-image">
            <div class="university-details">
                <p>Email: {{ $universty->email }}</p>
                <p>Location: {{ $universty->location }}</p>
            </div>
        </div>

        <!-- Add College Button -->
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCollegeModal">Add College</button>

        <!-- Add College Modal -->
        <div class="modal fade" id="addCollegeModal" tabindex="-1" aria-labelledby="addCollegeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCollegeModalLabel">Add College</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('admin.colleges.add', $universty->id) }}">
                            @csrf
                            <div class="mb-3">
                                <label for="collegeName" class="form-label">College Name</label>
                                <input type="text" class="form-control" id="collegeName" name="name" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add College</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- List of Colleges -->
        <div class="colleges-list">
            <h3>Colleges</h3>
            @foreach($collages as $college)
                <div class="college-container">
                    <div class="college-name">{{ $college->name }}</div>
                    <form method="POST" action="{{ route('admin.colleges.destroy', [$universty->id, $college->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete College</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
