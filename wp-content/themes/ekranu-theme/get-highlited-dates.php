<?php
header('Content-Type: application/json');

try {
    $host = 'localhost';
    $db = 'ekranusistema';
    $user = 'root';
    $pass = '';

    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        throw new Exception('Connection failed: ' . $conn->connect_error);
    }

    $result = $conn->query("SELECT DISTINCT DATE_FORMAT(upload_date, '%Y-%m-%d') AS formatted_date FROM izmainas");
    if (!$result) {
        throw new Exception('Database query failed.');
    }

    $dates = [];
    while ($row = $result->fetch_assoc()) {
        $dates[] = $row['formatted_date'];
    }

    echo json_encode(['dates' => $dates]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
