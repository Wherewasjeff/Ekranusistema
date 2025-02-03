<?php
try {
    if (isset($_GET['date']) && !empty($_GET['date'])) {
        // Database connection details
        $host = 'localhost';
        $db = 'ekranusistema';
        $user = 'root';
        $pass = '';

        // Establish database connection
        $conn = new mysqli($host, $user, $pass, $db);
        if ($conn->connect_error) {
            throw new Exception('Connection failed: ' . $conn->connect_error);
        }

        // Get the image based on the date
        $chosenDate = $_GET['date']; // The date parameter from the URL
        $stmt = $conn->prepare("SELECT picture FROM izmainas WHERE upload_date = ?");
        $stmt->bind_param('s', $chosenDate);
        $stmt->execute();
        $stmt->bind_result($imageData);
        $stmt->fetch();
        $stmt->close();
        $conn->close();

        // If image data is found, send it as the response
        if ($imageData) {
            // Detect image type using getimagesizefromstring
            $imageInfo = getimagesizefromstring($imageData);
            if ($imageInfo === false) {
                throw new Exception('Failed to detect image format.');
            }

            $mimeType = $imageInfo['mime']; // Get MIME type (image/jpeg, image/png, etc.)

            // Set the appropriate Content-Type header based on the MIME type
            header('Content-Type: ' . $mimeType);

            // Output the image data
            echo $imageData;
        } else {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'No image found for this date.']);
        }

    } else {
        throw new Exception('Date parameter is missing.');
    }
} catch (Exception $e) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>
