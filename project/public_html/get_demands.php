<?php
session_start();
$email = $_SESSION['email'];
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

// Get the profile info
$stmt = $conn->prepare("SELECT lesson_demands.name, lesson_demands.introduction, lesson_demands.preference, lesson_demands.who, lesson_demands.email, lesson_demands.telephone, lesson_demands.date FROM lesson_demands INNER JOIN teachers ON teachers.id = lesson_demands.user_id WHERE teachers.email  = ? ORDER BY lesson_demands.date DESC");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
if ($result->num_rows > 0) 
{
	while ($row = $result->fetch_assoc()) 
	{	
		$row['name'] = htmlspecialchars($row['name']);
		$row['introduction'] = htmlspecialchars($row['introduction']);
		$row['preference'] = htmlspecialchars($row['preference']);
		$row['who'] = htmlspecialchars($row['who']);
		$row['email'] = htmlspecialchars($row['email']);
		$row['telephone'] = htmlspecialchars($row['telephone']);
		$row['date'] = htmlspecialchars($row['date']);		
		$resultArray[] = $row;
	}
	$result = json_encode($resultArray);
	echo $result;
}
else
{
	echo "Not Complete";
}

$stmt->close();
$conn->close();

exit();
?>
