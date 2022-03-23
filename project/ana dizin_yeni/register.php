<?php
require __DIR__ .'/src/PHPMailer.php';
require __DIR__ .'/src/SMTP.php';
session_start();

$type = isset($_POST['type']) ? $_POST['type'] : '';
$fname = trim(isset($_POST['fname']) ? $_POST['fname'] : '');
$lname = trim(isset($_POST['lname']) ? $_POST['lname'] : '');
$email = trim(isset($_POST['email']) ? $_POST['email'] : '');
$password = isset($_POST['password']) ? $_POST['password'] : '';


// Validate input
if (!preg_match("/^\S+\s?\@\S+\s?\.\S+\s?$/i", $email)){
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
// Add salt and hash the password
$password = password_hash($password, PASSWORD_DEFAULT);

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
$message = "Merhaba, " . $fname . " " . $lname;
if ($type === 'student'){
  // prepare and bind
  $stmt = $conn->prepare("INSERT INTO students(fname, lname, email, password, token, status, last_sign_in) VALUES (?, ?, ?, ?, ?, ?, NOW())");
  $stmt->bind_param("ssssss", $fname, $lname, $email, $password, $token, $status);
  $stmt->execute();

  $mail = new PHPMailer\PHPMailer\PHPMailer();
 //Server settings
 $mail->CharSet = 'UTF-8';
 $mail->SMTPDebug = 0; // debug on - off
 $mail->isSMTP(); 
 $mail->Host = 'mail.dersara.com.tr'; // SMTP sunucusu örnek : mail.alanadi.com
 $mail->SMTPAuth = true; // SMTP Doğrulama
 $mail->Username =  'info@dersara.com.tr'; // Mail kullanıcı adı
 $mail->Password = 'V6[.8wVlw5BmG0'; // Mail şifresi
 $mail->SMTPSecure = 'tls'; // Şifreleme
 $mail->Port = 587; // SMTP Port
$mail->SMTPOptions = array(
 'ssl' => array(
 'verify_peer' => false,
 'verify_peer_name' => false,
 'allow_self_signed' => true
 )
);
$message .= "<br/><br/>Giriş yapabilmeniz için hesabınızın onaylanması gerekir. Lütfen bağlantıya tıklayın ve hesabınızı onaylayın: <a href='https://www.dersara.com.tr/confirm.php?type=student&verify=register&token=" . $token."'>Hesabımı Onayla</a>";
$message .= "<br/><br/>Sitemizi tercih ettiğiniz için teşekkürler,<br/>dersara.com.tr";
 //Alıcılar
 $mail->setfrom('info@dersara.com.tr', 'dersara.com.tr' );
 $mail->addAddress($email);
 $mail->addReplyTo('info@dersara.com.tr');
 //İçerik
 $mail->isHTML(true);
 $mail->Subject = "dersara.com.tr'ye üye ol ve hemen kullanmaya başla!";
 $mail->Body = $message;

 $mail->send();

  echo("1");
  $stmt->close();
  $conn->close();
  exit();
}else if ($type === 'teacher'){
  // prepare and bind
  $stmt = $conn->prepare("INSERT INTO teachers(fname, lname, email, password, token, status, last_sign_in) VALUES (?, ?, ?, ?, ?, ?, NOW())");
  $stmt->bind_param("ssssss", $fname, $lname, $email, $password, $token, $status);
  $stmt->execute();
  $mail = new PHPMailer\PHPMailer\PHPMailer();
 //Server settings
 $mail->CharSet = 'UTF-8';
 $mail->SMTPDebug = 0; // debug on - off
 $mail->isSMTP(); 
 $mail->Host = 'mail.dersara.com.tr'; // SMTP sunucusu örnek : mail.alanadi.com
 $mail->SMTPAuth = true; // SMTP Doğrulama
 $mail->Username = 'info@dersara.com.tr'; // Mail kullanıcı adı
 $mail->Password = 'V6[.8wVlw5BmG0'; // Mail şifresi
 $mail->SMTPSecure = 'tls'; // Şifreleme
 $mail->Port = 587; // SMTP Port
$mail->SMTPOptions = array(
 'ssl' => array(
 'verify_peer' => false,
 'verify_peer_name' => false,
 'allow_self_signed' => true
 )
);
  $message .= "<br/><br/>Giriş yapabilmeniz için hesabınızın onaylanması gerekir.Lütfen bağlantıya tıklayın ve hesabınızı onaylayın: <a href='https://www.dersara.com.tr/confirm.php?type=teacher&verify=register&token=" . $token."'>Hesabımı Onayla</a>";
  $message .= "<br/><br/>Sitemizi tercih ettiğiniz için teşekkürler,<br/>dersara.com.tr";
  //Alıcılar
  $mail->setfrom('info@dersara.com.tr', 'dersara.com.tr');
  $mail->addAddress($email);
  $mail->addReplyTo('info@dersara.com.tr');
  //İçerik
  $mail->isHTML(true);
  $mail->Subject = "dersara.com.tr'ye üye ol ve hemen kullanmaya başla!";
  $mail->Body = $message;
    
  $mail->send();
    
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