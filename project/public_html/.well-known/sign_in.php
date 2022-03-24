<?php
$email = trim(isset($_POST['email']) ? $_POST['email'] : '');
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Validate input
if (!preg_match("/^\S+\s?\@\S+\s?\.\S+\s?$/i", $email) || !preg_match("/^(?=.*[A-Z])(?=.*[0-9])(?=.*[!\?@#\$%\^\&\*\(\)\+=\._-]).*$/", $password)){
  exit();
}

if (empty($email) || empty($password)){
  exit();
}
if (strlen($email) > 255 || strlen($password) > 255){
  exit();
}

// Create a database connection 
$servername = "127.0.0.1";
$username = "dersarac_poll";
$dbPassword = "V6[.8wVlw5BmG0";
$dbName = "dersarac_poll";

// Create connection
$conn = new mysqli($servername, $username, $dbPassword, $dbName);
// Check connection
if ($conn->connect_error) {
  echo("0");
  exit();
}

//  Check user's information

// prepare and bind
$stmt = $conn->prepare("SELECT email, password FROM students WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
// The variable for showing if the email present in the database
$email_exist = $result->num_rows;
while ($row = $result->fetch_assoc()) 
{
  if ($row['email'])
  {
	  $salt = $row['password'];
    if (password_verify($password, $salt))
	  {
      echo ("1");
      // Close the connection and delete unnecessary data
      $result->free_result();
      $stmt = $conn->prepare("UPDATE students SET last_sign_in = NOW() WHERE email = ?"); 
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $stmt->close();
      $conn->close();
      session_start();
      $_SESSION['logged_in'] = true;
      $_SESSION['type'] = 'student';
      $_SESSION['email'] = $email;
      exit();
	  }
    else
    {
      echo("-1");
      // Close the connection and delete unnecessary data
      $result->free_result();
      $stmt->close();
      $conn->close();
      exit();
    }
  }
}

// Delete the unnecessary data
$result->free_result();
$stmt->close();

$stmt = $conn->prepare("SELECT email, password FROM teachers WHERE status = 1 AND  email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result

$email_exist = $result->num_rows;
if (!$email_exist)
{
  echo("-1");
  $result->free_result();
  $stmt->close();
  $conn->close();
  exit();
}
while ($row = $result->fetch_assoc()) 
{
  if ($row['email'])
  {
	  $salt = $row['password'];
    if (password_verify($password, $salt))
	  {
      echo("2");
      // Close the connection and delete unnecessary data
      $result->free_result();
      $stmt = $conn->prepare("UPDATE teachers SET last_sign_in = NOW() WHERE email = ?"); 
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $stmt->close();
      $conn->close();
      session_start();
      $_SESSION['logged_in'] = true;
      $_SESSION['type'] = 'teacher';
      $_SESSION['email'] = $email;
      exit();
	  }
    else
    {
      echo("-1");
      // Close the connection and delete unnecessary data
      $result->free_result();
      $stmt->close();
      $conn->close();
      exit();
    }
  }
}
?>