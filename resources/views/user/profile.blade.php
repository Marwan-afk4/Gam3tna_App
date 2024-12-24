<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }} - Profile</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
</head>
<body>
    <div class="navbar">
        <img src="{{ asset('images/prologo.jpeg') }}" alt="GAM3TNA Logo">
        <span>GAM3TNA</span>
    </div>

    <div class="user-profile">
        <h2>User Profile</h2>
        <div class="profile-info">
            <h3>Name: {{ $user->name }}</h3>
            <p>Email: {{ $user->email }}</p>
            <p>Phone: {{ $user->phone }}</p>

            <h3>University:</h3>
            <div class="university-info">
                <img src="{{ $universty->image }}" alt="{{ $universty->name }}" class="university-image">
                <p>{{ $universty ? $universty->name : 'Not Assigned' }}</p>
            </div>

            <h3>College:</h3>
            <p>{{ $collage ? $collage->name : 'Not Assigned' }}</p>
        </div>

        <!-- Button to forward to Contact Us page -->
        <div class="contact-button">
            <a href="{{ route('contact') }}" class="btn-contact">Go to Contact Us</a>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
