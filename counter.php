<?php
// counter.php - A simple text-file based counter

header('Content-Type: application/json');

// The file where the actual count is stored
$file = 'count.txt';
$base_number = 30; 

// Create file if it doesn't exist
if (!file_exists($file)) {
    file_put_contents($file, '0');
}

// Handle increment request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'increment') {
    // Read the current count
    $count = (int)file_get_contents($file);
    
    // Increment
    $count++;
    
    // Save back to the file
    file_put_contents($file, (string)$count);
    
    echo json_encode(['success' => true, 'count' => $count + $base_number]);
    exit;
}

// Handle read request (GET)
$count = (int)file_get_contents($file);
echo json_encode(['success' => true, 'count' => $count + $base_number]);
?>
