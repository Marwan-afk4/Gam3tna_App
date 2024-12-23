<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/admindashboard.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <a href="#" class="navbar-brand">
            <img src="{{ asset('images/prologo.jpeg') }}" alt="GAM3TNA Logo">
            <span>GAM3TNA</span>
        </a>
    </nav>

    <!-- Add University Button -->
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUniversityModal" style="font-size: 25px; padding: 10px 15px; border-radius: 40%; position: absolute; top: 25px; right: 30px; background-color: #5b84a5;">
        +
    </button>

    <!-- Add University Modal -->
    <div class="modal fade" id="addUniversityModal" tabindex="-1" aria-labelledby="addUniversityModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUniversityModalLabel">Add University</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.universities.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="universityName" class="form-label">University Name</label>
                            <input type="text" class="form-control" id="universityName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="universityEmail" class="form-label">University Email</label>
                            <input type="email" class="form-control" id="universityEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="universityImage" class="form-label">University Image</label>
                            <input type="text" class="form-control" id="universityImage" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="universityLocation" class="form-label">University Location</label>
                            <input type="text" class="form-control" id="universityLocation" name="location" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add University</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mt-5">
        <div class="row">
            @foreach($universties as $university)
                <div class="col-md-4">
                    <!-- Clickable University Container -->
                    <a href="{{ route('admin.university_dashboard', $university->id) }}" class="university-link">
                        <div class="university-container" style="position: relative;">
                            <!-- Delete Button -->
                            <button class="btn btn-danger delete-btn" onclick="deleteUniversity({{ $university->id }})" style="position: absolute; top: 10px; right: 10px;">&times;</button>
                            <!-- University Image -->
                            <img src="{{ $university->image }}" alt="{{ $university->name }}" class="university-image">
                            <!-- University Name -->
                            <div class="university-name">{{ $university->name }}</div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function deleteUniversity(id) {
            if (confirm("Are you sure you want to delete this university?")) {
                fetch(`/admin/universities/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                })
                .then(response => {
                    if (response.ok) {
                        location.reload(); // Reload the page to see the updated list
                    } else {
                        return response.json().then(data => {
                            alert(data.message || 'Failed to delete university.');
                        });
                    }
                })
                .catch(error => {
                    alert('Failed to delete university. Please try again later.');
                });
            }
        }
    </script>
</body>
</html>
