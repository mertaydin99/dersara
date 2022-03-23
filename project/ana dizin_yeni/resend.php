<?php
require __DIR__ .'/src/PHPMailer.php';
require __DIR__ .'/src/SMTP.php';
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



// Change the token and send user the e-mail again.
$message = "Merhaba, " . $fname . " " . $lname;
if ($type === 'student'){
  // prepare and bind
  $stmt = $conn->prepare("UPDATE students SET  token = ? WHERE email = ? ");
  $stmt->bind_param("ss",$token, $email);
  if($stmt->execute())
  {
    $message .= "<br/><br/>Giriş yapabilmeniz için hesabınızın onaylanması gerekir.Lütfen bağlantıya tıklayın ve hesabınızı onaylayın: <a href='https://www.dersara.com.tr/confirm.php?type=student&verify=register&token=" . $token."'>Hesabımı Onayla</a>";
    $message .= "<br/><br/>Sitemizi tercih ettiğiniz için teşekkürler,<br/>dersara.com.tr";
     //Server settings
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
     //Alıcılar
$mail->setfrom('info@dersara.com.tr', 'dersara.com.tr');
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
    $message .= "<br/><br/>Giriş yapabilmeniz için hesabınızın onaylanması gerekir.Lütfen bağlantıya tıklayın ve hesabınızı onaylayın: <a href='https://www.dersara.com.tr/confirm.php?type=teacher&verify=register&token=" . $token."'>Hesabımı Onayla</a>";
      $message .= "<br/><br/>Sitemizi tercih ettiğiniz için teşekkürler,<br/>dersara.com.tr";
        //Server settings
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