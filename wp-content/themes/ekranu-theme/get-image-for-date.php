<?php
// Assume you have a database connection set up
$chosen_date = $_GET['date'];  // The date passed via query parameters
// Example of querying the database for the image URL for the given date
$query = "SELECT image_url FROM uploaded_images WHERE upload_date = '$chosen_date' LIMIT 1";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($row && isset($row['image_url'])) {
        echo json_encode(['imageUrl' => $row['image_url']]);
    } else {
        echo json_encode(['imageUrl' => null]);
    }
} else {
    echo json_encode(['imageUrl' => null]);
}
?>