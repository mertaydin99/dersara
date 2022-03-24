<?php
// This script gets profiles of teachers
$keyword = $_GET['keyword'];
$keyword = $keyword;

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
$stmt = $conn->prepare("SELECT teachers.fname, LEFT(teachers.lname, 1) AS lname, profile.img_url, profile.gender, profile.title, profile.introduction, profile.preference, profile.price FROM profile INNER JOIN teachers ON profile.user_id = teachers.id WHERE (MATCH(profile.keyword) AGAINST(?) OR MATCH(profile.introduction) AGAINST(?)) LIMIT 1000");
$stmt->bind_param("ss", $keyword, $keyword);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
if ($result->num_rows > 0) 
{
	while ($row = $result->fetch_assoc()) 
	{		
		$row['fname'] = htmlspecialchars($row['fname']);
		$row['lname'] = htmlspecialchars($row['lname']);
		$row['title'] = htmlspecialchars($row['title']);
		$row['introduction'] = htmlspecialchars($row['introduction']);
		$row['preference'] = htmlspecialchars($row['preference']);
		$row['price'] = htmlspecialchars($row['price']);
		$resultArray[] = $row;
	}
	$result = json_encode($resultArray);
	echo $result;
}
else
{
	$result = json_encode("none");
	echo $result;
}
$stmt->close();
$conn->close();

exit();
