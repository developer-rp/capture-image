<?php
// Database configuration
$host = 'localhost'; // Your database host
$db = 'webcma'; // Your database name
$user = 'root'; // Your database username
$pass = ''; // Your database password

// Connect to the database
$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Fetch all photos from the database
$stmt = $pdo->query('SELECT * FROM photos ORDER BY upload_date DESC');
$photos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .gallery-item {
            border: 1px solid #ddd;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: calc(33.333% - 20px);
            box-sizing: border-box;
            text-align: center;
        }
        .gallery-item img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }
        .gallery-item p {
            margin: 5px 0 0;
            font-size: 0.9em;
            color: #555;
        }
    </style>
</head>
<body>
    <a href="index.html">index.html</a>
    <h1>Photo Gallery</h1>
    <div class="gallery">
        <?php if (count($photos) > 0): ?>
            <?php foreach ($photos as $photo): ?>
                <div class="gallery-item">
                    <img src="<?php echo htmlspecialchars($photo['file_path']); ?>" alt="<?php echo htmlspecialchars($photo['file_name']); ?>">
                    <p><?php echo htmlspecialchars($photo['file_name']); ?></p>
                    <p><?php echo number_format($photo['file_size'] / 1024, 2); ?> KB</p>
                    <p><?php echo htmlspecialchars($photo['file_type']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No photos available.</p>
        <?php endif; ?>
    </div>
</body>
</html>
