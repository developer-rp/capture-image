<?php
// Database configuration
$host = 'localhost'; // Your database host
$db = 'webcma'; // Your database name
$user = 'root'; // Your database username
$pass = ''; // Your database password

// Connect to the database
$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        // Get file details
        $fileTmpPath = $_FILES['photo']['tmp_name'];
        $fileName = $_FILES['photo']['name'];
        $fileSize = $_FILES['photo']['size'];
        $fileType = $_FILES['photo']['type'];

        // Define upload directory
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Generate a unique file name to avoid collisions
        $filePath = $uploadDir . uniqid() . '-' . basename($fileName);

        // Move the uploaded file to the designated directory
        if (move_uploaded_file($fileTmpPath, $filePath)) {
            // Insert file information into the database
            $stmt = $pdo->prepare('INSERT INTO photos (file_path, file_name, file_size, file_type) VALUES (?, ?, ?, ?)');
            $stmt->execute([$filePath, $fileName, $fileSize, $fileType]);

            // Return a success response
            echo json_encode(['success' => true, 'path' => $filePath]);
            header("Location:index.html");
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to move uploaded file.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'No file uploaded or upload error.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
