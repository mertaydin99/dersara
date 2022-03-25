<?php
$type = isset($_GET['type']) ? $_GET['type'] : '';
$fname = trim(isset($_GET['fname']) ? $_GET['fname'] : '');
$lname = trim(isset($_GET['lname']) ? $_GET['lname'] : '');
$email = trim(isset($_GET['email']) ? $_GET['email'] : '');

// Validate input
if (!preg_match("/^\S+\s?\@\S+\s?\.\S+\s?$/i", $email))
{
	exit();
}
// If first name, last name, email , or password is empty stop the script
if (empty($fname) || empty($lname) || empty($email)){
	exit();
  }
 
  
if (strlen($fname) > 60 || strlen($lname) > 60 || strlen($email) > 255){
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

// Create unique tokenid
$token = md5(uniqid(rand(), true));

$subject = "Dersara | Kayıt Ol";
$header  = "From: Dersara <info@dersara.com.tr>\n";
$header .= "X-Sender: Dersara <info@dersara.com.tr>\n";
$header .= 'X-Mailer: PHP/' . phpversion();
$header .= "X-Priority: 1\n"; // Urgent message!
$header .= "Return-Path: info@dersara.com.tr\n"; // Return path for errors
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: text/html; charset=utf-8\n";


// Change the token and send user the e-mail again.
$message = "Merhaba, " . $fname . " " . $lname;
if ($type === 'student'){
  // prepare and bind
  $stmt = $conn->prepare("UPDATE students SET  token = ? WHERE email = ? ");
  $stmt->bind_param("ss",$token, $email);
  if($stmt->execute())
  {
    $message .= "<br/><br/>Giriş yapabilmeniz için hesabınızın onaylanması gerekir. Onaylandıktan sonra web sitemizi ziyaret ederek veya aşağıdaki URL'den e-posta adresinizi ve şifrenizi kullanarak giriş yapabilirsiniz: https://www.dersara.com.tr/confirm.php?type=student&verify=register&token=" . $token;
    $message .= "<br/><br/>Sitemizi tercih ettiğiniz için teşekkürler,<br/>dersara.com.tr";
    mail($email, $subject, $message, $header);
    echo("1");
    exit();
  }
 
  else
  {
    echo("0");
    $stmt->close();
    $conn->close(); 
    exit();    
  }
  
}else if ($type === 'teacher'){
  // prepare and bind
  $stmt = $conn->prepare("UPDATE teachers SET token = ? WHERE email = ?");
  $stmt->bind_param("ss",$token, $email);
  if($stmt->execute())
  {
    $message .= "<br/><br/>Giriş yapabilmeniz için hesabınızın onaylanması gerekir. Onaylandıktan sonra web sitemizi ziyaret ederek veya aşağıdaki URL'den e-posta adresinizi ve şifrenizi kullanarak giriş yapabilirsiniz: https://www.dersara.com.tr/confirm.php?type=teacher&verify=register&token=" . $token;
      $message .= "<br/><br/>Sitemizi tercih ettiğiniz için teşekkürler,<br/>dersara.com.tr";
      mail ($email, $subject, $message, $header);
      echo("2");
      exit();
  }
  
  else
  {
    echo("0");
    $stmt->close(); 
    $conn->close();
    exit();    
  
} 

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