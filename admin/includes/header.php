<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light background for contrast */
        }
        .header {
            background-color: #2A3E5E; /* Header color */
            color: white; /* Text color */
            padding: 10px 0; /* Reduced padding for a smaller header */
        }
        .header h1 {
            margin: 0; /* Remove default margin */
            font-size: 1.5rem; /* Adjust font size for the header title */
        }
        .header img {
            max-width: 100px; /* Set a maximum width for the logo */
            height: auto; /* Maintain aspect ratio */
        }
    </style>
</head>
<body>
<header class="header text-center">
    <img src="../img/srclogo.png" alt="Logo">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <button class="btn btn-danger" onclick="confirmLogout()">Logout</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<script>
    function confirmLogout() {
        // Show confirmation dialog
        var confirmation = confirm("Are you sure you want to logout?");
        if (confirmation) {
            // Redirect to logout.php if confirmed
            window.location.href = 'logout.php'; // Change to your logout page
        }
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
