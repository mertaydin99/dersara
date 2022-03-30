<?php
session_start();
$userEmail = $_SESSION['email'];
$name = $_GET['name'];
$intro = $_GET['introduction'];
$preference = $_GET['preference'];
$who = $_GET['who'];
$email = $_GET['email'];
$telephone = $_GET['telephone'];
$date = $_GET['date'];

// Create a database connection 
$servername = "127.0.0.1";
$username = "dersarac_poll";
$dbPassword = "V6[.8wVlw5BmG0";
$dbName = "dersarac_poll";


// Create connection
$conn = new mysqli($servername, $username, $dbPassword, $dbName);
// Check connection
if ($conn->connect_error) 
{	
	$conn->close();
	return;
}
$stmt = $conn->prepare("SELECT id FROM teachers WHERE email = ?");
$stmt->bind_param("s", $userEmail);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
if ($result->num_rows > 0) 
{

	while ($row = $result->fetch_assoc()) 
	{
  	if ($row['id'])
  	{
		$userId = $row['id'];
  	}
	}
}
else
{
	$stmt->close();	
	$conn->close();
	die("-1");
}
// Delete the relevant info
$stmt = $conn->prepare("DELETE FROM lesson_demands WHERE user_id = ? AND name = ? AND introduction = ? AND preference = ? AND who = ? AND email = ? AND telephone = ? AND date = ?");
$stmt->bind_param("isssssss", $userId, $name, $intro, $preference, $who, $email, $telephone, $date);
if($stmt->execute())
{
	echo("1");
}
else
{
	echo("-1");
}
$stmt->close();
$conn->close();

exit();
?>
