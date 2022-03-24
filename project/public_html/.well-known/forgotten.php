<?php
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
$subject = "Dersara | Kayıt Ol";

$header  = "From: Dersara <info1@dersara.com.tr>\n";
$header .= "X-Sender: Dersara <info1@dersara.com.tr>\n";
$header .= 'X-Mailer: PHP/' . phpversion();
$header .= "X-Priority: 1\n"; // Urgent message!
$header .= "Return-Path: info1@dersara.com.tr\n"; // Return path for errors
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: text/html; charset=utf-8\n";

$message = "Selam, ";
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
        $result->free_result();
        if($action == 'forgotten'){
            $stmt = $conn->prepare("UPDATE students SET token = '" . $token . "' WHERE email = ?"); 
            $stmt->bind_param("s", $email);
    
            $message .= "<br/><br/>Lütfen bağlantıyı tıklayın ve şifreyi değiştirin: http://localhost/confirm.php?type=student&verify=forgotten&token=" . $token;
            $message .= "<br/><br/>Teşekkürler,<br/>dersara.com.tr";
            mail ($email, $subject, $message, $header);
        }else if($action == 'reset'){
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE students SET token = '', password = '" . $password . "' WHERE email = ?"); 
            $stmt->bind_param("s", $email);
        }
    }else{
        echo("-1");
        $result->free_result();
    }
}

// Delete the unnecessary data
$result->free_result();
$stmt->close();

$stmt = $conn->prepare("SELECT email, password FROM teachers WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result

$email_exist = $result->num_rows;
if (!$email_exist){
    echo("-1");
    $result->free_result();
    $stmt->close();
    $conn->close();
    exit();
}

if( $result->num_rows ){
    while ($row = $result->fetch_assoc()) {
        if ($row['email']){
            echo("2");
            if($action == 'forgotten'){
                $result->free_result();
                $stmt = $conn->prepare("UPDATE teachers SET token = '" . $token . "' WHERE email = ?"); 
                $stmt->bind_param("s", $email);
                $stmt->execute();
        
                $message .= "<br/><br/>Lütfen bağlantıya tıklayın ve şifreyi değiştirin: http://localhost/confirm.php?type=teacher&verify=forgotten&token=" . $token;
                $message .= "<br/><br/>Teşekkürler,<br/>dersara.com.tr";
                mail ($email, $subject, $message, $header);
            }else if($action == 'reset'){
                $password = isset($_POST['password']) ? $_POST['password'] : '';
                $password = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("UPDATE teachers SET token = '', password = '" . $password . "' WHERE email = ?"); 
                $stmt->bind_param("s", $email);
                $stmt->execute();
            }
        }else{
            echo("-1");
            $result->free_result();
        }
    }
}else{
    echo("-1");
    $result->free_result();
}
$stmt->close();
$conn->close();
exit();
?>