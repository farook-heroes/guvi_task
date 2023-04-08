<?php
// Database connection
require_once __DIR__ . './../assests/vendor/autoload.php';



use Predis\Client;

// Set Redis server connection options
$options = [
    'scheme' => 'tcp',
    'host' => '127.0.0.1',
    'port' => 6379,
];

// Create a new Redis client
$client = new Client($options);






$servername = "localhost";
$username = "root";
$pass = "1234";
$dbname = "sqldatabase";

$conn = new mysqli($servername, $username, $pass, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Form submission
// Retrieve email and password from local storage
$email = $_POST['email'];
$password = $_POST['password'];
// Store data in Redis
$client->set('e', $email);
$client->set('p',$password);

// Retrieve data from Redis

// Connect to MySQL database
$conn = mysqli_connect($servername, $username, $pass, $dbname);

// Prepare SQL statement to retrieve user with matching email and password
$sql = "SELECT * FROM user WHERE email = ? AND password = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $email, $password);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);



// Output the document as JSON

if (mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc();

    // access row data
    $name = $row["name"];
    $email = $row["email"];
    $date=$row["birthdate"];
  // If user exists, set local storage variable to verify user is logged in
// Set up the MongoDB client
$client = new MongoDB\Client('mongodb://localhost:27017');

// Get the database and collection
$collection = $client->Users->records;

// Find the document that matches the name and email
$filter = ['name' => $name, 'email' => $email];
$document = $collection->findOne($filter);
  echo json_encode(array('success' => true,'name'=>$name,'email'=>$email,"date" => $date,"data" => $document));
  // Set local storage variable to verify user is logged in
 
} else {
  echo json_encode(array('success' => false));

}

  // Close statement and connection
  $stmt->close();
  $conn->close();

?>

