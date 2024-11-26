<?php
session_start();
include('db_connection.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT flipbook_name, flipbook_path, created_at FROM flipbooks WHERE user_id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<h3>" . htmlspecialchars($row['flipbook_name']) . "</h3>";
    echo "<p>Created on: " . htmlspecialchars($row['created_at']) . "</p>";
    echo "<a href='" . htmlspecialchars($row['flipbook_path']) . "' target='_blank'>View Flipbook</a>";
    echo "</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flipbook Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./dashboard.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm ">
<div class="container">
    <a class="navbar-brand" href="./index.html">
        <img src="./assets/images/download.png" alt="Logo" height="40" >
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="features.html">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Explore</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./template.html">Templates</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="aboutus.html">About us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contactUs.html">Contact us</a>
            </li>
        </ul>
    </div>
    <div class="d-flex align-items-center">
        <div class="dropdown">
            <a href="#" class="d-block link-dark text-decoration-none" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="./assets/images/usericon.png" alt="User" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                <li><a class="dropdown-item" href="login.html">Login</a></li>
                <li><a class="dropdown-item" href="register.html">Register</a></li>
            </ul>
        </div>
        <a class="btn btn-primary ms-3" href="./dashboard.html">Dashboard</a>
    </div>
</div>
</nav>

    <main>
        <aside>
            <ul class="sidebar">
                <li><a href="#">Home</a></li>
                <li><a href="#">Library</a></li>
                <ul>
                    <li><a href="#">Publications</a></li>
                    <li><a href="#">Bookcases</a></li>
                    <li><a href="#">Book Chatbots</a></li>
                    <li><a href="#">My Templates</a></li>
                </ul>
                <li><a href="#">Digital Sales</a></li>
                <li><a href="#">Branding</a></li>
                <li><a href="#">Statistics</a></li>
            </ul>
        </aside>

        <section class="main-content">
            <!-- Add the main content here, currently blank -->
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <footer>
    <div class="footer-container">
        <div class="footer-section">
            <h4>Company</h4>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Learning Center</a></li>
                <li><a href="#">Office Tools</a></li>
                <li><a href="#">Mango AI</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Cooperation</h4>
            <ul>
                <li><a href="#">Elite Program</a></li>
                <li><a href="#">Partnership</a></li>
                <li><a href="#">Community</a></li>
                <li><a href="#">DMCA Policy</a></li>
                <li><a href="#">Country Distributor</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Support</h4>
            <ul>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Help Center</a></li>
                <li><a href="#">Updates</a></li>
                <li><a href="#">Gift Card Exchange</a></li>
                <li><a href="#">Blog Archive</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Follow Us</h4>
            <ul>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Facebook</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Policies</h4>
            <ul>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">Cookie Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>Explore Our Other Products: AI Video Generator, AI Video Maker, Animation Software, Whiteboard Animation Software, Character Animation Maker, Video Maker, Presentation Maker, Flipbook Software</p>
        <p>© 2024 WONDER IDEA TECHNOLOGY LIMITED. All rights reserved</p>
    </div>
</footer>
</body>
</html>