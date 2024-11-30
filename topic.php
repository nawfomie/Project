<?php
session_start();
// Example data for topics. Replace this with dynamic data from a database.
$topics = [
    [
        "name" => "Machine Learning",
        "description" => "Explore algorithms and techniques that allow machines to learn and improve.",
        "link" => "#"
    ],
    [
        "name" => "Quantum Computing",
        "description" => "Dive into the world of quantum algorithms and computing systems.",
        "link" => "#"
    ],
    [
        "name" => "Data Science",
        "description" => "Understand data analysis, visualization, and statistical models.",
        "link" => "#"
    ],
    [
        "name" => "Artificial Intelligence",
        "description" => "Discover the foundations and advancements in AI technologies.",
        "link" => "#"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topics</title>
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
            <form class="search-bar" method="GET" action="topics.php">
                <input type="text" name="query" placeholder="Search topics...">
                <button type="submit">Search</button>
                <a href="logout.php" class="last" style="text-decoration: none; display: inline-block; padding: 4px 20px; background-color: #007bff; color: #fff; border-radius: 5px;">Log out</a>
            </form>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="topics-container">
        <div class="container">
            <h2>All Topics</h2>

            <!-- Topics List -->
            <ul class="topics-list">
                <?php foreach ($topics as $topic): ?>
                    <li class="topic-card">
                        <h3><a href="<?php echo $topic['link']; ?>"><?php echo $topic['name']; ?></a></h3>
                        <p><?php echo $topic['description']; ?></p>
                        <a href="<?php echo $topic['link']; ?>" class="explore-topic">Explore Topic</a>
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
