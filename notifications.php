<?php
session_start();

// Example data for notifications. Replace this with dynamic data from your database.
$notifications = [
    [
        "type" => "message",
        "content" => "Jane Smith sent you a message: 'Hey, I found your paper interesting!'",
        "time" => "2 hours ago",
        "link" => "chat.php?id=1"
    ],
    [
        "type" => "comment",
        "content" => "Dr. Alan Turing commented on your publication: 'Great insights on AI applications!'",
        "time" => "1 day ago",
        "link" => "publication.php?id=42"
    ],
    [
        "type" => "follow",
        "content" => "Maria Johnson started following you.",
        "time" => "3 days ago",
        "link" => "profile.php?id=3"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
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
    <main class="notifications-container">
        <div class="container">
            <h2>Notifications</h2>

            <?php if (count($notifications) > 0): ?>
                <ul class="notifications-list">
                    <?php foreach ($notifications as $notification): ?>
                        <li class="notification-card">
                            <a href="<?php echo $notification['link']; ?>">
                                <p><?php echo $notification['content']; ?></p>
                                <small><?php echo $notification['time']; ?></small>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No new notifications.</p>
            <?php endif; ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Your Research Site. All Rights Reserved.</p>
    </footer>
</body>
</html>
