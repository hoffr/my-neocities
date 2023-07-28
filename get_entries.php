<?php
header('Access-Control-Allow-Origin: *');
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Check if the JSON file exists
    if (file_exists("guestbook_entries.json")) {
        // Get existing entries
        $entries = json_decode(file_get_contents("guestbook_entries.json"), true);
        echo json_encode($entries);
    } else {
        echo json_encode([]);
    }
}
?>
