<?php
require  __DIR__ .'/src/PHPMailer.php';
require __DIR__ .'/src/SMTP.php';
$email = trim(isset($_POST['email']) ? $_POST['email'] : '');

// Validate input
if (!preg_match("/^\S+\s?\@\S+\s?\.\S+\s?$/i", $email)){
    exit();
}

if (empty($email)){
  exit();
}

if (strlen($email) > 255){
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

$action = trim(isset($_GET['action']) ? $_GET['action'] : '');

$token = md5(uniqid(rand(), true));

$message = "Merhaba, ";
//  Check user's information

// prepare and bind
$stmt = $conn->prepare("SELECT email, password FROM students WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
// The variable for showing if the email present in the database
$email_exist = $result->num_rows;
while ($row = $result->fetch_assoc()) {
    if ($row['email']){
        echo ("1");
        if($action == 'forgotten'){
            $stmt = $conn->prepare("UPDATE students SET token = '" . $token . "' WHERE email = ?"); 
            $stmt->bind_param("s", $email);
            $stmt->execute();
    
            $message .= "<br/><br/>Lütfen bağlantıya tıklayın ve şifreyi değiştirin: <a href='https://www.dersara.com.tr/confirm.php?type=student&verify=forgotten&token=" . $token."'>Şifreyi Yenile</a>";
            $message .= "<br/><br/>Teşekkürler,<br/>dersara.com.tr";
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
            $mail->Subject = 'Şifreni yenile ve tekrar aramıza katıl.';
            $mail->Body = $message;
           
            $mail->send();
        }else if($action == 'reset'){
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE students SET token = '', password = '" . $password . "' WHERE email = ?"); 
            $stmt->bind_param("s", $email);
            $stmt->execute();
        }
    }else{
        echo("-1");
    }
}

// Delete the unnecessary data

$stmt->close();

$stmt = $conn->prepare("SELECT email, password FROM teachers WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result

$email_exist = $result->num_rows;
if (!$email_exist){
    echo("-1");
    $stmt->close();
    $conn->close();
    exit();
}

if( $result->num_rows ){
    while ($row = $result->fetch_assoc()) {
        if ($row['email']){
            echo("2");
            if($action == 'forgotten'){
                $stmt = $conn->prepare("UPDATE teachers SET token = '" . $token . "' WHERE email = ?"); 
                $stmt->bind_param("s", $email);
                $stmt->execute();
        
                $message .= "<br/><br/>Lütfen bağlantıya tıklayın ve şifreyi değiştirin: <a href='https://www.dersara.com.tr/confirm.php?type=teacher&verify=forgotten&token=" . $token."'>Şifreyi Yenile</a>";
                $message .= "<br/><br/>Teşekkürler,<br/>dersara.com.tr";
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
                $mail->Subject = 'Şifreni yenile ve tekrar aramıza katıl.';
                $mail->Body = $message;
               
                $mail->send();
            }else if($action == 'reset'){
                $password = isset($_POST['password']) ? $_POST['password'] : '';
                $password = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("UPDATE teachers SET token = '', password = '" . $password . "' WHERE email = ?"); 
                $stmt->bind_param("s", $email);
                $stmt->execute();
            }
        }else{
            echo("-1");
        }
    }
}else{
    echo("-1");
}
$stmt->close();
$conn->close();
exit();
?>