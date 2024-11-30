<?php
session_start();

// Example chat data. Replace with dynamic data from your database.
$chat_id = $_GET['id']; // Chat ID from query parameter
$chat_messages = [
    ["sender" => "Jane Smith", "message" => "Hey, I found your paper interesting!", "time" => "2 hours ago"],
    ["sender" => "You", "message" => "Thanks, Jane! Let’s discuss further.", "time" => "1 hour ago"]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="container">
            <img src="img/logo.png" alt="Logo" class="logo">
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="profile.php">My Profile</a></li>
                <li><a href="publications.php">Publications</a></li>
                <li><a href="topics.php">Topics</a></li>
                <li><a href="messages.php" class="active">Messages</a></li>
                <li><a href="notifications.php">Notifications</a></li>
            </ul>
        </div>
    </nav>

    <!-- Chat Section -->
    <main class="chat-container">
        <div class="container">
            <h2>Chat with Jane Smith</h2>
            <div class="chat-box">
                <?php foreach ($chat_messages as $message): ?>
                    <div class="chat-message <?php echo $message['sender'] === "You" ? 'sent' : 'received'; ?>">
                        <p><strong><?php echo $message['sender']; ?>:</strong> <?php echo $message['message']; ?></p>
                        <small><?php echo $message['time']; ?></small>
                    </div>
                <?php endforeach; ?>
            </div>
            <form method="POST" action="send_message.php">
                <textarea name="message" placeholder="Type your message..." required></textarea>
                <button type="submit">Send</button>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Your Research Site. All Rights Reserved.</p>
    </footer>
</body>
</html>
