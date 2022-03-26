<?php
$keyword = $_GET['keyword'];
$keyword = "%".$keyword."%";
$type = $_GET['type'];
if(isset($_GET['city']))
{	
	$city = intval($_GET['city']);
}
if(!empty($_GET['province']))
{
	$province = $_GET['province'];
	$province_set = 1;
}
else
{
	$province_set = 0;
}
$gender = $_GET['gender'];
$min = intval($_GET['min']);
$max = intval($_GET['max']);
$sort = $_GET['sort'];

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
if($sort === 'lowest')
{
	if($type === 'none' && $gender !== 'any')
	{
		$stmt = $conn->prepare("SELECT teachers.fname, LEFT(teachers.lname, 1) AS lname, teachers.email, profile.img_url, profile.title, profile.introduction, profile.preference, profile.price FROM profile INNER JOIN teachers ON profile.user_id = teachers.id WHERE (MATCH(profile.keyword) AGAINST(?) OR MATCH(profile.introduction) AGAINST(?))  AND profile.gender = ? AND profile.price > ? AND  profile.price <= ?   ORDER BY profile.price LIMIT 300");
		$stmt->bind_param("sssii", $keyword, $keyword, $gender,  $min, $max,);
	}
	else if($type === 'none' && $gender === 'any')
	{
		$stmt = $conn->prepare("SELECT teachers.fname, LEFT(teachers.lname, 1) AS lname, teachers.email, profile.img_url, profile.title, profile.introduction, profile.preference, profile.price FROM profile INNER JOIN teachers ON profile.user_id = teachers.id WHERE (MATCH(profile.keyword) AGAINST(?) OR MATCH(profile.introduction) AGAINST(?))  AND profile.price > ? AND  profile.price <= ?  ORDER BY profile.price LIMIT 300");
		$stmt->bind_param("ssii", $keyword, $keyword, $min, $max,);
	}
	else if( $type === 'online' && $gender !== 'any')
	{
		$stmt = $conn->prepare("SELECT teachers.fname, LEFT(teachers.lname, 1) AS lname, teachers.email, profile.img_url, profile.title, profile.introduction, profile.preference, profile.price FROM profile INNER JOIN teachers ON profile.user_id = teachers.id WHERE (MATCH(profile.keyword) AGAINST(?) OR MATCH(profile.introduction) AGAINST(?)) AND (profile.preference = ? OR profile.preference = 'both') AND profile.gender = ? AND profile.price > ? AND  profile.price <= ?  ORDER BY profile.price LIMIT 300");
		$stmt->bind_param("ssssii", $keyword, $keyword, $type, $gender, $min, $max );
	}
	
	else if( $type === 'online' && $gender === 'any')
	{
		$stmt = $conn->prepare("SELECT teachers.fname, LEFT(teachers.lname, 1) AS lname, teachers.email, profile.img_url, profile.title, profile.introduction, profile.preference, profile.price FROM profile INNER JOIN teachers ON profile.user_id = teachers.id WHERE (MATCH(profile.keyword) AGAINST(?) OR MATCH(profile.introduction) AGAINST(?)) AND (profile.preference = ? OR profile.preference = 'both') AND profile.price > ? AND  profile.price <= ?  ORDER BY profile.price LIMIT 300");
		$stmt->bind_param("sssii", $keyword, $keyword, $type, $min, $max );
	}
	else if($type === 'face2face' && $gender !== 'any' && !$province_set)
	{
		$stmt = $conn->prepare("SELECT teachers.fname, LEFT(teachers.lname, 1) AS lname, teachers.email, profile.img_url, profile.title, profile.introduction, profile.preference, profile.price FROM profile INNER JOIN teachers ON profile.user_id = teachers.id WHERE (MATCH(profile.keyword) AGAINST(?) OR MATCH(profile.introduction) AGAINST(?)) AND (profile.preference = ? OR profile.preference = 'both') AND profile.city = ? AND profile.gender = ? AND profile.price > ? AND  profile.price <= ?  ORDER BY profile.price LIMIT 300");
		$stmt->bind_param("sssisii", $keyword, $keyword, $type, $city, $gender, $min, $max );
	}
	else if($type === 'face2face' && $gender !== 'any' && $province_set)
	{
		$stmt = $conn->prepare("SELECT teachers.fname, LEFT(teachers.lname, 1) AS lname, teachers.email, profile.img_url, profile.title, profile.introduction, profile.preference, profile.price FROM profile INNER JOIN teachers ON profile.user_id = teachers.id WHERE (MATCH(profile.keyword) AGAINST(?) OR MATCH(profile.introduction) AGAINST(?)) AND  MATCH(profile.province) AGAINST(?) AND (profile.preference = ? OR profile.preference = 'both') AND profile.city = ? AND profile.gender = ? AND profile.price > ? AND  profile.price <= ?  ORDER BY profile.price LIMIT 300");
		$stmt->bind_param("ssssisii", $keyword, $keyword, $province, $type, $city, $gender, $min, $max );
	}
	else if($type === 'face2face' && $gender === 'any' && !$province_set)
	{
		$stmt = $conn->prepare("SELECT teachers.fname, LEFT(teachers.lname, 1) AS lname, teachers.email, profile.img_url, profile.title, profile.introduction, profile.preference, profile.price FROM profile INNER JOIN teachers ON profile.user_id = teachers.id WHERE (MATCH(profile.keyword)  AGAINST(?) OR MATCH(profile.introduction) AGAINST(?)) AND (profile.preference = ? OR profile.preference = 'both') AND profile.city = ? AND profile.price > ? AND  profile.price <= ?  ORDER BY profile.price LIMIT 300");
		$stmt->bind_param("sssiii", $keyword, $keyword, $type, $city, $min, $max );
	}
	else if($type === 'face2face' && $gender === 'any' && $province_set)
	{
		$stmt = $conn->prepare("SELECT teachers.fname, LEFT(teachers.lname, 1) AS lname, teachers.email, profile.img_url, profile.title, profile.introduction, profile.preference, profile.price FROM profile INNER JOIN teachers ON profile.user_id = teachers.id WHERE (MATCH(profile.keyword)  AGAINST(?) OR MATCH(profile.introduction) AGAINST(?)) AND MATCH(profile.province) AGAINST(?) AND (profile.preference = ? OR profile.preference = 'both') AND profile.city = ? AND profile.price > ? AND  profile.price <= ?  ORDER BY profile.price LIMIT 300");
		$stmt->bind_param("ssssiii", $keyword, $keyword, $province, $type, $city, $min, $max );
	}
}

else if($sort === 'highest')
{
	if($type === 'none' && $gender !== 'any')
	{
		$stmt = $conn->prepare("SELECT teachers.fname, LEFT(teachers.lname, 1) AS lname, teachers.email, profile.img_url, profile.title, profile.introduction, profile.preference, profile.price FROM profile INNER JOIN teachers ON profile.user_id = teachers.id WHERE (MATCH(profile.keyword) AGAINST(?) OR MATCH(profile.introduction) AGAINST(?)) AND profile.gender = ? AND profile.price > ? AND  profile.price <= ?  ORDER BY profile.price DESC LIMIT 300");
		$stmt->bind_param("sssii", $keyword, $keyword, $gender,  $min, $max,);
	}
	else if($type === 'none' && $gender === 'any')
	{
		$stmt = $conn->prepare("SELECT teachers.fname, LEFT(teachers.lname, 1) AS lname, teachers.email, profile.img_url, profile.title, profile.introduction, profile.preference, profile.price FROM profile INNER JOIN teachers ON profile.user_id = teachers.id WHERE (MATCH(profile.keyword) AGAINST(?) OR MATCH(profile.introduction) AGAINST(?))  AND profile.price > ? AND  profile.price <= ?  ORDER BY profile.price DESC LIMIT 300");
		$stmt->bind_param("ssii", $keyword, $keyword, $min, $max,);
	}
	else if( $type === 'online' && $gender !== 'any')
	{
		$stmt = $conn->prepare("SELECT teachers.fname, LEFT(teachers.lname, 1) AS lname, teachers.email, profile.img_url, profile.title, profile.introduction, profile.preference, profile.price FROM profile INNER JOIN teachers ON profile.user_id = teachers.id WHERE (MATCH(profile.keyword) AGAINST(?) OR MATCH(profile.introduction) AGAINST(?)) AND (profile.preference = ?  OR profile.preference = 'both') AND profile.gender = ? AND profile.price > ? AND  profile.price <= ?  ORDER BY profile.price DESC LIMIT 300");
		$stmt->bind_param("ssssii", $keyword, $keyword, $type, $gender, $min, $max );
	}
	
	else if( $type === 'online' && $gender === 'any')
	{
		$stmt = $conn->prepare("SELECT teachers.fname, LEFT(teachers.lname, 1) AS lname, teachers.email, profile.img_url, profile.title, profile.introduction, profile.preference, profile.price FROM profile INNER JOIN teachers ON profile.user_id = teachers.id WHERE (MATCH(profile.keyword) AGAINST(?) OR MATCH(profile.introduction) AGAINST(?)) AND (profile.preference = ? OR profile.preference = 'both') AND profile.price > ? AND  profile.price <= ?  ORDER BY profile.price DESC LIMIT 300");
		$stmt->bind_param("sssii", $keyword, $keyword, $type, $min, $max );
	}
	else if($type === 'face2face' && $gender !== 'any' && !$province_set)
	{
		$stmt = $conn->prepare("SELECT teachers.fname, LEFT(teachers.lname, 1) AS lname, teachers.email, profile.img_url, profile.title, profile.introduction, profile.preference, profile.price FROM profile INNER JOIN teachers ON profile.user_id = teachers.id WHERE (MATCH(profile.keyword) AGAINST(?) OR profile.introduction AGAINST(?)) AND (profile.preference = ? OR profile.preference = 'both') AND profile.city = ? AND profile.gender = ? AND profile.price > ? AND  profile.price <= ?  ORDER BY profile.price DESC LIMIT 300");
		$stmt->bind_param("sssisii", $keyword, $keyword, $type, $city, $gender, $min, $max );
	}
	else if($type === 'face2face' && $gender !== 'any' && $province_set)
	{
		$stmt = $conn->prepare("SELECT teachers.fname, LEFT(teachers.lname, 1) AS lname, teachers.email, profile.img_url, profile.title, profile.introduction, profile.preference, profile.price FROM profile INNER JOIN teachers ON profile.user_id = teachers.id WHERE (MATCH(profile.keyword) AGAINST(?) OR profile.introduction AGAINST(?)) AND MATCH(profile.province) AGAINST(?) AND (profile.preference = ? OR profile.preference = 'both') AND profile.city = ? AND profile.gender = ? AND profile.price > ? AND  profile.price <= ?  ORDER BY profile.price DESC LIMIT 300");
		$stmt->bind_param("ssssisii", $keyword, $keyword, $province, $type, $city, $gender, $min, $max );
	}
	else if($type === 'face2face' && $gender === 'any' && !$province_set)
	{
		$stmt = $conn->prepare("SELECT teachers.fname, LEFT(teachers.lname, 1) AS lname, teachers.email, profile.img_url, profile.title, profile.introduction, profile.preference, profile.price FROM profile INNER JOIN teachers ON profile.user_id = teachers.id WHERE (MATCH(profile.keyword) AGAINST(?) OR MATCH(profile.introduction) AGAINST(?)) AND (profile.preference = ?  OR profile.preference = 'both') AND profile.city = ? AND profile.price > ? AND  profile.price <= ?  ORDER BY profile.price DESC LIMIT 300");
		$stmt->bind_param("sssiii", $keyword, $keyword, $type, $city, $min, $max );
	}
	else if($type === 'face2face' && $gender === 'any' && $province_set)
	{
		$stmt = $conn->prepare("SELECT teachers.fname, LEFT(teachers.lname, 1) AS lname, teachers.email, profile.img_url, profile.title, profile.introduction, profile.preference, profile.price FROM profile INNER JOIN teachers ON profile.user_id = teachers.id WHERE (MATCH(profile.keyword) AGAINST(?) OR MATCH(profile.introduction) AGAINST(?)) AND MATCH(profile.province) AGAINST(?) AND (profile.preference = ? OR profile.preference = 'both') AND profile.city = ? AND profile.price > ? AND  profile.price <= ?  ORDER BY profile.price DESC LIMIT 300");
		$stmt->bind_param("ssssiii", $keyword, $keyword, $province, $type, $city, $min, $max );
	}
}

else if( $sort === 'best')
{
	if($type === 'none' && $gender !== 'any')
	{
		$stmt = $conn->prepare("SELECT teachers.fname, LEFT(teachers.lname, 1) AS lname, teachers.email, profile.img_url, profile.title, profile.introduction, profile.preference, profile.price FROM profile INNER JOIN teachers ON profile.user_id = teachers.id WHERE (MATCH(profile.keyword) AGAINST(?) OR MATCH(profile.introduction) AGAINST(?)) AND profile.gender = ? AND profile.price > ? AND  profile.price <= ?   ORDER BY RAND() LIMIT 300");
		$stmt->bind_param("sssii", $keyword, $keyword, $gender,  $min, $max,);
	}
	else if($type === 'none' && $gender === 'any')
	{
		$stmt = $conn->prepare("SELECT teachers.fname, LEFT(teachers.lname, 1) AS lname, teachers.email, profile.img_url, profile.title, profile.introduction, profile.preference, profile.price FROM profile INNER JOIN teachers ON profile.user_id = teachers.id WHERE (MATCH(profile.keyword) AGAINST(?) OR MATCH(profile.introduction) AGAINST(?))  AND profile.price > ? AND  profile.price <= ?  ORDER BY RAND() LIMIT 300");
		$stmt->bind_param("ssii", $keyword, $keyword, $min, $max,);
	}
	else if( $type === 'online' && $gender !== 'any')
	{
		$stmt = $conn->prepare("SELECT teachers.fname, LEFT(teachers.lname, 1) AS lname, teachers.email, profile.img_url, profile.title, profile.introduction, profile.preference, profile.price FROM profile INNER JOIN teachers ON profile.user_id = teachers.id WHERE (MATCH(profile.keyword) AGAINST(?) OR MATCH(profile.introduction) AGAINST(?)) AND (profile.preference = ? OR profile.preference = 'both') AND profile.gender = ? AND profile.price > ? AND  profile.price <= ?  ORDER BY RAND() LIMIT 300");
		$stmt->bind_param("ssssii", $keyword, $keyword, $type, $gender, $min, $max );
	}
	
	else if( $type === 'online' && $gender === 'any')
	{
		$stmt = $conn->prepare("SELECT teachers.fname, LEFT(teachers.lname, 1) AS lname, teachers.email, profile.img_url, profile.title, profile.introduction, profile.preference, profile.price FROM profile INNER JOIN teachers ON profile.user_id = teachers.id WHERE (MATCH(profile.keyword) AGAINST(?) OR MATCH(profile.introduction) AGAINST(?)) AND (profile.preference = ? OR profile.preference = 'both') AND profile.price > ? AND  profile.price <= ?  ORDER BY RAND() LIMIT 300");
		$stmt->bind_param("sssii", $keyword, $keyword, $type, $min, $max );
	}
	else if($type === 'face2face' && $gender !== 'any' && !$province_set)
	{
		$stmt = $conn->prepare("SELECT teachers.fname, LEFT(teachers.lname, 1) AS lname, teachers.email, profile.img_url, profile.title, profile.introduction, profile.preference, profile.price FROM profile INNER JOIN teachers ON profile.user_id = teachers.id WHERE (MATCH(profile.keyword) AGAINST(?) OR MATCH(profile.introduction) AGAINST(?)) AND (profile.preference = ? OR profile.preference = 'both') AND profile.city = ? AND profile.gender = ? AND profile.price > ? AND  profile.price <= ?  ORDER BY RAND() LIMIT 300");
		$stmt->bind_param("sssisii", $keyword, $keyword, $type, $city, $gender, $min, $max );
	}
	else if($type === 'face2face' && $gender !== 'any' && $province_set)
	{
		$stmt = $conn->prepare("SELECT teachers.fname, LEFT(teachers.lname, 1) AS lname, teachers.email, profile.img_url, profile.title, profile.introduction, profile.preference, profile.price FROM profile INNER JOIN teachers ON profile.user_id = teachers.id WHERE (MATCH(profile.keyword) AGAINST(?) OR MATCH(profile.introduction) AGAINST(?)) AND MATCH(profile.province) AGAINST(?) AND (profile.preference = ? OR profile.preference = 'both') AND profile.city = ? AND profile.gender = ? AND profile.price > ? AND  profile.price <= ?  ORDER BY RAND() LIMIT 300");
		$stmt->bind_param("ssssisii", $keyword, $keyword, $province, $type, $city, $gender, $min, $max );
	}
	else if($type === 'face2face' && $gender === 'any' && !$province_set)
	{
		$stmt = $conn->prepare("SELECT teachers.fname, LEFT(teachers.lname, 1) AS lname, teachers.email, profile.img_url, profile.title, profile.introduction, profile.preference, profile.price FROM profile INNER JOIN teachers ON profile.user_id = teachers.id WHERE (MATCH(profile.keyword) AGAINST(?) OR MATCH(profile.introduction) AGAINST(?)) AND (profile.preference = ? OR profile.preference = 'both') AND profile.city = ? AND profile.price > ? AND  profile.price <= ?  ORDER BY RAND() LIMIT 300");
		$stmt->bind_param("sssiii", $keyword,  $keyword, $type, $city, $min, $max );
	}
	else if($type === 'face2face' && $gender === 'any' && $province_set)
	{
		$stmt = $conn->prepare("SELECT teachers.fname, LEFT(teachers.lname, 1) AS lname, teachers.email, profile.img_url, profile.title, profile.introduction, profile.preference, profile.price FROM profile INNER JOIN teachers ON profile.user_id = teachers.id WHERE (MATCH(profile.keyword) AGAINST(?) OR MATCH(profile.introduction) AGAINST(?)) AND MATCH(profile.province) AGAINST(?) AND (profile.preference = ? OR profile.preference = 'both') AND profile.city = ? AND profile.price > ? AND  profile.price <= ?  ORDER BY RAND() LIMIT 300");
		$stmt->bind_param("ssssiii", $keyword,  $keyword, $province, $type, $city, $min, $max );
	}
}


$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
if ($result->num_rows > 0) 
{
	while ($row = $result->fetch_assoc()) 
	{		
		if ((preg_match("/@[a-zA-Z0-9.+-]+\.edu.tr/i", $row['email'])))
		{
			$row['verified'] = "true";
			$arr = explode('@', $row['email']);
			$university = $arr[1];
			$row['university'] = $university;
		}		  
		else
		{
			$row['verified'] = "false";
		}
		foreach ($row as $key => $value)
		{
			$row[$key] = htmlspecialchars($row[$key]);

		}
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

?>