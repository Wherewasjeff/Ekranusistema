<?php
header('Content-Type: application/json');

// Decode the JSON data sent in the request
$data = json_decode(file_get_contents('php://input'), true);

// Check if the 'date' parameter is provided
if (isset($data['date'])) {
    $date = $data['date'];

    // Connect to your MySQL database
    $mysqli = new mysqli("localhost", "root", "", "ekranusistema"); // Update username/password if needed

    // Check for database connection errors
    if ($mysqli->connect_error) {
        echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $mysqli->connect_error]);
        exit;
    }

    // Prepare the SQL to delete the row matching the provided date
    $stmt = $mysqli->prepare("DELETE FROM izmainas WHERE upload_date = ?");
    $stmt->bind_param("s", $date);

    // Execute the query and handle the result
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo json_encode(['success' => true, 'message' => 'Image deleted successfully.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'No matching date found in the database.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete record: ' . $stmt->error]);
    }

    // Close the statement and connection
    $stmt->close();
    $mysqli->close();
} else {
    echo json_encode(['success' => false, 'message' => 'No date provided.']);
}
?>
