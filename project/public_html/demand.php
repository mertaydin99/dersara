<?php
$name = $_GET['name'];
$intro = $_GET['introduction'];
$type = $_GET['type'];
$who = $_GET['who'];
$email = trim($_GET['email']);
$telephone = $_GET['telephone'];
$imgUrl = $_GET['img'];

// Validate input
if (empty($intro) || empty($type) || empty($who) || empty($email) || empty($telephone) || empty($imgUrl) || empty($name))
{
  exit();
}
if (strlen($email) > 255 || strlen($intro) > 800 || strlen($name) > 200 || strlen($telephone) > 100)
{
  exit();
}

if (!preg_match("/^\S+\s?\@\S+\s?\.\S+\s?$/i", $email))
{
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
if ($conn->connect_error) 
{
	$conn->close();
	return;
}

// Get the profile info
$stmt = $conn->prepare("SELECT user_id FROM profile WHERE img_url = ?");
$stmt->bind_param("s", $imgUrl);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
if ($result->num_rows > 0) 
{
	while ($row = $result->fetch_assoc()) 
	{
	  if ($row['user_id'])
		{
			$userId = $row['user_id'];
			// prepare and bind
			$stmt = $conn->prepare("INSERT INTO lesson_demands(name, introduction, preference, who, email, telephone, user_id, date) VALUES (?, ?, ?, ?, ?, ?, ?, NOW() )");
			$stmt->bind_param("ssssssi", $name, $intro, $type, $who, $email, $telephone,  $userId  );
			$stmt->execute();
			echo "1";

  		}
	}
}
else
{
	echo "Error";
}
$stmt->close();
$conn->close();

exit();
?>
