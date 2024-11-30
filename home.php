<?php
session_start();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="container">
           
            <ul class="nav-links">
                <li><a href="home.php">Home</a></li>
                <li><a href="profile.php">My Profile</a></li>
                <li><a href="publications.php">Publications</a></li>
                <li><a href="topic.php">Topics</a></li>
                <li><a href="messages.php">Messages</a></li>
                <li><a href="notifications.php">Notifications</a></li>
            </ul>
            <form class="search-bar" method="GET" action="#">
                <input type="text" name="query" placeholder="Search...">
                <button class="last1" type="submit">Search</button>
                <a href="logout.php" class="last" style="text-decoration: none; display: inline-block; padding: 4px 20px; background-color: #007bff; color: #fff; border-radius: 5px;">Log out</a>
            </form>
            
        </div>
        
    </nav>

    <!-- Main Content -->
    <main class="dashboard">
        <div class="container">
            <!-- Sidebar -->
            <aside class="sidebar">
                <h3>Popular Topics</h3>
                <ul>
                    <li><a href="#">Machine Learning</a></li>
                    <li><a href="#">Quantum Physics</a></li>
                    <li><a href="#">Data Science</a></li>
                </ul>
            </aside>

            <!-- Main Dashboard -->
            <section class="main-content">
                <h2>Welcome to Your Dashboard</h2>
                <div class="card">
                    <h3>Recent Publications</h3>
                    <p><a href="#">Paper 1: Deep Learning Explained</a></p>
                    <p><a href="#">Paper 2: Quantum Mechanics for Beginners</a></p>
                </div>
                <div class="card">
                    <h3>Recent Questions</h3>
                    <p><a href="#">What is the future of AI in medicine?</a></p>
                    <p><a href="#">How to model complex systems?</a></p>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Your Research Site. All Rights Reserved.</p>
    </footer>
</body>
</html>
