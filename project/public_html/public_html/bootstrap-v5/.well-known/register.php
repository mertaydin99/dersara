<?php
session_start();

$type = isset($_POST['type']) ? $_POST['type'] : '';
$fname = trim(isset($_POST['fname']) ? $_POST['fname'] : '');
$lname = trim(isset($_POST['lname']) ? $_POST['lname'] : '');
$email = trim(isset($_POST['email']) ? $_POST['email'] : '');
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Add salt and hash the password
$password = password_hash($password, PASSWORD_DEFAULT);

// Validate input
if (!preg_match("/^\S+\s?\@\S+\s?\.\S+\s?$/i", $email) || !preg_match("/^(?=.*[A-Z])(?=.*[0-9])(?=.*[!\?@#\$%\^\&\*\(\)\+=\._-]).*$/", $password)){
  exit();
}

// If first name, last name, email , or password is empty stop the script
if (empty($fname) || empty($lname) || empty($email) || empty($password)){
  exit();
}

if (strlen($password) < 8){
  exit();
}

if (strlen($fname) > 60 || strlen($lname) > 60 || strlen($email) > 255 || strlen($password) > 255){
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

$token = md5(uniqid(rand(), true));
$status = 0;
$subject = "Dersara | Kayıt Ol";

$header  = "From: Dersara <info@dersara.com.tr>\n";
$header .= "X-Sender: Dersara <info@dersara.com.tr>\n";
$header .= 'X-Mailer: PHP/' . phpversion();
$header .= "X-Priority: 1\n"; // Urgent message!
$header .= "Return-Path: info@dersara.com.tr\n"; // Return path for errors
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: text/html; charset=utf-8\n";

// Check if email is already registered
$stmt = $conn->prepare("SELECT email FROM students  WHERE email = ? UNION SELECT email FROM teachers WHERE email = ?");
$stmt->bind_param("ss", $email, $email);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result

while ($row = $result->fetch_assoc()) {
  if ($row['email']){
    echo("-1");
    $result -> free_result();
    $stmt->close();
    $conn->close();
    exit();
  }
}
$stmt->close();

// Add user's information to database
$message = "Selam, " . $fname . " " . $lname;
if ($type === 'student'){
  // prepare and bind
  $stmt = $conn->prepare("INSERT INTO students(fname, lname, email, password, token, status, last_sign_in) VALUES (?, ?, ?, ?, ?, ?, NOW())");
  $stmt->bind_param("ssssss", $fname, $lname, $email, $password, $token, $status);
  $stmt->execute();
  
  $message .= "<br/><br/>Giriş yapabilmeniz için hesabınızın onaylanması gerekir. Onaylandıktan sonra web sitemizi ziyaret ederek veya aşağıdaki URL'den e-posta adresinizi ve şifrenizi kullanarak giriş yapabilirsiniz: https://www.dersara.com.tr/confirm.php?type=student&verify=register&token=" . $token;
  $message .= "<br/><br/>Teşekkürler,<br/>dersara.com.tr";
  mail($email, $subject, $message, $header);
  echo("1");
  $stmt->close();
  $conn->close();
  exit();
}else if ($type === 'teacher'){
  // prepare and bind
  $stmt = $conn->prepare("INSERT INTO teachers(fname, lname, email, password, token, status, last_sign_in) VALUES (?, ?, ?, ?, ?, ?, NOW())");
  $stmt->bind_param("ssssss", $fname, $lname, $email, $password, $token, $status);
  $stmt->execute();
  
  $message .= "<br/><br/>Giriş yapabilmeniz için hesabınızın onaylanması gerekir. Onaylandıktan sonra web sitemizi ziyaret ederek veya aşağıdaki URL'den e-posta adresinizi ve şifrenizi kullanarak giriş yapabilirsiniz: https://www.dersara.com.tr/confirm.php?type=teacher&verify=register&token=" . $token;
  $message .= "<br/><br/>Teşekkürler,<br/>dersara.com.tr";
  mail ($email, $subject, $message, $header);
  echo("2");
  $stmt->close();
  $conn->close();
  exit();
}else {
  $stmt->close();
  $conn->close();
  echo("0");
  exit();
}
// Close the connection and delete the unnecesary data
$stmt->close();
$conn->close();
exit();
?>