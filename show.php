<?php
$host = "sql.freedb.tech";
$user = "freedb_rahuk";
$pass = "Dcqg3NFxbM!pg3u";
$dbname = "freedb_database1";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT roll_number, image FROM images ORDER BY RIGHT(roll_number, 2)";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo json_encode(array("message" => "No images found."));
}

header('Content-Type: application/json');
echo json_encode($data);

$conn->close();
?>
