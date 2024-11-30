
<?php
session_start();
include("connection.php");
$connection = new Connection();
$connection->selectDatabase('Fancy');
include("client.php");
$sql = "SELECT firstname, lastname FROM Clients WHERE email = '" . $_SESSION['emailS'] . "'";
$result = mysqli_query($connection->conn, $sql);

if (mysqli_num_rows($result) > 0) {



while($row = mysqli_fetch_assoc($result)) {
$firstname=$row["firstname"];
$lastname=$row["lastname"];


}

} 
// Replace with dynamic data from your database

$user_bio = "A passionate researcher in Machine Learning and Data Science."; // Replace with dynamic data
$publications = [
    "Deep Learning Basics",
    "An Introduction to Neural Networks",
    "AI and Healthcare: Challenges and Opportunities"
]; // Replace with dynamic data
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $user_name; ?>'s Profile</title>
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
            <form class="search-bar" method="GET" action="#">
                <input type="text" name="query" placeholder="Search...">
                <button type="submit">Search</button>
                <a href="logout.php" class="last" style="text-decoration: none; display: inline-block; padding: 4px 20px; background-color: #007bff; color: #fff; border-radius: 5px;">Log out</a>
            </form>
        </div>
    </nav>

    <!-- Profile Section -->
    <main class="profile-container">
        <div class="container">
            <!-- Sidebar -->
            <aside class="sidebar">
                <div class="profile-photo">
                    <img src="image/im7.png">
                </div>
                <h3><?php echo $firstname ." ". $lastname  ?></h3>
                
                <p><?php echo $user_bio; ?></p>
                <ul class="profile-stats">
                    <li><strong>Followers:</strong> 120</li>
                    <li><strong>Following:</strong> 80</li>
                    <li><strong>Interests:</strong> AI, Machine Learning, Quantum Computing</li>
                </ul>
            </aside>

            <!-- Main Content -->
            <section class="main-content">
                <h2>Publications</h2>
                <ul class="publications-list">
                    <?php foreach ($publications as $publication): ?>
                        <li><a href="#"><?php echo $publication; ?></a></li>
                    <?php endforeach; ?>
                </ul>

                <h2>Activity</h2>
                <div class="card">
                    <p>Recently answered a question: <a href="#">"What is the future of AI?"</a></p>
                </div>
                <div class="card">
                    <p>Uploaded a new paper: <a href="#">"Deep Learning Basics"</a></p>
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
