<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/cantact.css') }}">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        GAM3TNA
    </div>

    <!-- Contact Page Content -->
    <div class="container">
        <div class="contact-page">
            <h2>Contact Us</h2>
            <p>If you have any questions or need assistance, feel free to reach out to us!</p>

            <!-- Contact Info Section -->
            <div class="contact-info">
                <p><strong>Email:</strong> MaroGaber@gmail.com</p>
                <p><strong>Phone:</strong> 01111679168</p>
                <p><strong>Address:</strong> El Syoof Shamaa</p>
            </div>

            <!-- Contact Form -->
            <div class="contact-form">
                <h3>Send Us a Message:</h3>
                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Your Name:</label>
                        <input type="text" id="name" name="name" required placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email:</label>
                        <input type="email" id="email" name="email" required placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="message">Your Message:</label>
                        <textarea id="message" name="message" rows="4" required placeholder="Enter your message"></textarea>
                    </div>
                    <button type="submit">Send Message</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
