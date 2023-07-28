<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = file_get_contents("php://input");
    $entry = json_decode($data, true);

    // Get existing entries (if any)
    $entries = [];
    if (file_exists("guestbook_entries.json")) {
        $entries = json_decode(file_get_contents("guestbook_entries.json"), true);
    }

    // Add the new entry
    $entries[] = $entry;

    // Save the updated entries back to the JSON file
    file_put_contents("guestbook_entries.json", json_encode($entries));

    // Send a response back to the client
    echo json_encode(['message' => 'Entry added to the guestbook successfully!']);
}
?>
