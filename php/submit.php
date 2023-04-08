<?php
// Check if the form was submitted
require_once __DIR__ . './../assests/vendor/autoload.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Retrieve the form data
  $name = $_POST["name"];
  
  $email = $_POST["email"];
  $password = $_POST["password"];
  $birthdate = $_POST["dob"];
  $interest = $_POST["interests"];
  $gender=$_POST['gender'];
  $jobinfo = $_POST["job"];

  // Validate the form data
  // ...

  // Create a MySQL connection
  $servername = "localhost";
  $username = "root";
  $pass = "1234";
  $dbname = "sqldatabase";
  $conn = new mysqli($servername, $username, $pass, $dbname);

  // Check if the connection was successful
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare the SQL statement
  $stmt = $conn->prepare("INSERT INTO user (name, email, password, birthdate) VALUES (?,  ?, ?, ?)");
  $stmt->bind_param("ssss", $name,$email, $password,$birthdate);
  
    // Execute the SQL statement
    if ($stmt->execute()) {
      $response = array('status' => 'success', 'message' => 'Form submitted successfully.');
      echo json_encode($response);
    } else {
      $response = array('status' => 'failure', 'message' => 'Form not submitted.');
      echo json_encode($response);
    }

  // Create a MongoDB client
  $client = new MongoDB\Client("mongodb://localhost:27017");
  
  // Select database and collection
  $collection = $client->Users->records;
  
  // Define document to be inserted
  $user = [
      'email' => $email,
      'dob' => new MongoDB\BSON\UTCDateTime(strtotime($birthdate) * 1000),
      'name' => $name,
      'job' => $jobinfo,
      'interests' => $interest,
      'gender'=>$gender
  ];
  
  // Insert document into collection
  $result = $collection->insertOne($user);
  
    // Path to autoload.php

 
  // Close the prepared statement and the database connection
  $stmt->close();
  $conn->close();
}
?>
