<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
</head>

<body>
    <div class="signup-background">
        <div class="container mt-5">
            <h2 class="text-center text-white">Sign Up</h2>
            <form class="row g-3 needs-validation" action="{{ route('signup') }}" method="POST" novalidate>
                @csrf
                <!-- First Name -->
                <div class="col-md-6">
                    <label for="name" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="name" id="name"
                        placeholder="Enter your first name" required>
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email"
                        placeholder="Enter your email" required>
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Phone -->
                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone"
                        placeholder="Enter your phone number" required>
                    @error('phone')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="Enter your password" required>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>


                <!-- University Dropdown -->
                <div class="col-md-6">
                    <label for="university" class="form-label">University</label>
                    <select id="university" class="form-control" name="universty_id"
                        onchange="loadColleges(this.value)">
                        <option value="" disabled selected>Select University</option>
                        @foreach ($universties as $university)
                            <option value="{{ $university->id }}">{{ $university->name }}</option>
                        @endforeach
                    </select>
                    @error('universty_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- College Dropdown -->
                <div class="col-md-6">
                    <label for="college" class="form-label">College</label>
                    <select id="college" class="form-control" name="collage_id">
                        <option value="" disabled selected>Select College</option>
                        @foreach ($colleges as $college)
                            <option value="{{ $college->id }}"
                                {{ old('collage_id') == $college->id ? 'selected' : '' }}>{{ $college->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('collage_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Year -->
                <div class="col-md-6">
                    <label for="year" class="form-label">Year</label>
                    <input type="number" class="form-control" name="year" id="year"
                        placeholder="Enter your year" required>
                    @error('year')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="col-12 text-center">
                    <button class="btn btn-primary" type="submit">Sign Up</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function loadColleges(universityId) {
            const collegeSelect = document.getElementById('college');
            collegeSelect.innerHTML = ''; // Clear previous options

            // Add a default "Select College" option
            const defaultOption = document.createElement('option');
            defaultOption.selected = true;
            defaultOption.disabled = true;
            defaultOption.value = '';
            defaultOption.textContent = 'Select College';
            collegeSelect.appendChild(defaultOption);

            if (universityId) {
                // Updated URL to include universityId as a route parameter
                fetch(`/api/colleges/${universityId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(college => {
                            const option = document.createElement('option');
                            option.value = college.id;
                            option.textContent = college.name;
                            collegeSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching colleges:', error));
            }
        }
    </script>
</body>

</html>
