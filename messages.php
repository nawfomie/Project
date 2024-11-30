<?php
session_start();

// Example data for conversations. Replace this with dynamic data from your database.
$conversations = [
    [
        "id" => 1,
        "name" => "Jane Smith",
        "last_message" => "Hey, I found your paper interesting!",
        "time" => "2 hours ago",
        "link" => "chat.php?id=1"
    ],
    [
        "id" => 2,
        "name" => "Dr. Alan Turing",
        "last_message" => "Let’s discuss our next project.",
        "time" => "1 day ago",
        "link" => "chat.php?id=2"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
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
            <form class="search-bar" method="GET" action="messages.php">
                <input type="text" name="query" placeholder="Search conversations...">
                <button type="submit">Search</button>
                <a href="logout.php" class="last" style="text-decoration: none; display: inline-block; padding: 4px 20px; background-color: #007bff; color: #fff; border-radius: 5px;">Log out</a>
            </form>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="messages-container">
        <div class="container">
            <h2>Messages</h2>

            <!-- Conversations List -->
            <ul class="conversations-list">
                <?php foreach ($conversations as $conversation): ?>
                    <li class="conversation-card">
                        <a href="<?php echo $conversation['link']; ?>">
                            <h3><?php echo $conversation['name']; ?></h3>
                            <p><?php echo $conversation['last_message']; ?></p>
                            <small><?php echo $conversation['time']; ?></small>
                        </a>
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
