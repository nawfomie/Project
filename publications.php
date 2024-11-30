<?php
session_start();
// Example data for publications. Replace this with dynamic data from a database.
$publications = [
    [
        "title" => "Deep Learning Basics",
        "author" => "John Doe",
        "date" => "2023-10-01",
        "abstract" => "An introductory guide to the principles of deep learning and neural networks.",
        "link" => "#"
    ],
    [
        "title" => "Quantum Computing Explained",
        "author" => "Jane Smith",
        "date" => "2023-09-15",
        "abstract" => "A beginner's overview of quantum computing concepts and applications.",
        "link" => "#"
    ],
    [
        "title" => "AI in Healthcare",
        "author" => "John Doe",
        "date" => "2023-08-10",
        "abstract" => "Exploring the applications of artificial intelligence in modern healthcare.",
        "link" => "#"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publications</title>
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
            <form class="search-bar" method="GET" action="publications.php">
                <input type="text" name="query" placeholder="Search publications...">
                <button type="submit">Search</button>
                <a href="logout.php" class="last" style="text-decoration: none; display: inline-block; padding: 4px 20px; background-color: #007bff; color: #fff; border-radius: 5px;">Log out</a>
            </form>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="publications-container">
        <div class="container">
            <h2>All Publications</h2>
            
            <!-- Publications List -->
            <ul class="publications-list">
                <?php foreach ($publications as $publication): ?>
                    <li class="publication-card">
                        <h3><a href="<?php echo $publication['link']; ?>"><?php echo $publication['title']; ?></a></h3>
                        <p><strong>Author:</strong> <?php echo $publication['author']; ?></p>
                        <p><strong>Date:</strong> <?php echo $publication['date']; ?></p>
                        <p><strong>Abstract:</strong> <?php echo $publication['abstract']; ?></p>
                        <a href="<?php echo $publication['link']; ?>" class="read-more">Read More</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Your Research Site. All Rights Reserved.</p>
    </footer>
</body>
</html>
