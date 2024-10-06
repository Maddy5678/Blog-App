<?php
include 'db.php';

$stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>Stellar Blog</title>
</head>
<body>
    <div class="container mt-5">
        <h1>STELLAR INNOVATIONS</h1>
        <br/>
        <a href="create.php" class="btn btn-primary mb-3">Create New Post</a>
        <div class="list-group">
            <?php foreach ($posts as $post): ?>
                <a href="edit.php?id=<?= $post['id'] ?>" class="list-group-item list-group-item-action">
                    <h5 class="mb-1"><?= htmlspecialchars($post['title']) ?></h5>
                    <p class="mb-1"><?= htmlspecialchars(substr($post['content'], 0, 100)) ?>...</p>
                    <small><?= $post['created_at'] ?></small>
                </a>
                <br/>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
