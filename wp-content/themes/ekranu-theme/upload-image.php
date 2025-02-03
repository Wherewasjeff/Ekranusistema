<?php
header('Content-Type: application/json');

// Database configuration
$host = 'localhost';
$db = 'ekranusistema';
$user = 'root';
$pass = '';

// Connect to the database
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed.']);
    exit;
}

// Check if the required parameters exist
if (isset($_FILES['image']) && isset($_POST['chosen_date']) && !empty($_FILES['image']['name']) && !empty($_POST['chosen_date'])) {
    $chosenDate = $_POST['chosen_date'];
    $file = $_FILES['image'];

    // Read the file content
    $imageData = file_get_contents($file['tmp_name']); // Get the image data as binary

    // Check if the image data was successfully read
    if ($imageData === false) {
        echo json_encode(['success' => false, 'message' => 'Failed to read the image file.']);
        exit;
    }

    // Prepare the SQL statement to insert the image data into the database
    $stmt = $conn->prepare("INSERT INTO izmainas (upload_date, picture) VALUES (?, ?)");
    $stmt->bind_param('ss', $chosenDate, $imageData); // Date and image data as BLOB
    $stmt->send_long_data(1, $imageData); // Send the binary data for the image

    // Execute the query
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true, 'message' => 'File uploaded and saved successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to save record in the database.']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Missing required parameters.']);
}

$conn->close();
?>
