<?php
session_start();

$gender = $_POST['gender'];
$intro = $_POST['intro'];
$keyword = strtolower($_POST['keyword']);
$title = $_POST['title'];
$price = intval($_POST['price']);
$email = $_SESSION['email']; 

// If the user selected face2face option then create a variable
if(isset($_POST['face2face']))
{
	$face2face = $_POST['face2face'];

}

// If the user selected online option then create a variable

if(isset($_POST['online']))
{
	$online = $_POST['online'];

}
if(!empty($_POST['city']))
{
	$city = intval($_POST['city']);
}
else
{
	$city = NULL;
}
if(!empty($_POST['province']))
{
	$province = $_POST['province'];
}
else
{
	$province = NULL;
}
// Check teacher's preference about giving lessons. If something went wrong and none of the variables are set exit the script

if(isset($face2face) && isset($online))
{
	$preference = 'both';
}

else if(isset($face2face))
{
	$preference = 'face2face';
}

else if(isset($online))
{
	$preference = 'online';

}

else
{

	exit();
}

// Validate the input
if($gender !== "m" && $gender !== "f")
{
	exit();
}

if(strlen($intro) == 0 || strlen($intro) > 800 )
{
	exit();
}


if(empty($city))
{
	$city = NULL;
}


if(empty($title))
{
	exit();
}

if(strlen($keyword) == 0 || strlen($keyword) > 200)
{
	exit();
}



// Create a database connection 
$servername = "127.0.0.1";
$username = "poll";
$dbPassword = "Burak2008?";
$dbName = "poll";

// Create connection
$conn = new mysqli($servername, $username, $dbPassword, $dbName);
// Check connection
if ($conn->connect_error) 
{
	echo('<!DOCTYPE html>
		<html lang="tr">
			<head>
				<title>Profilim</title>
				<meta charset="UTF-8">
				<meta name="description" content="profilim" />
				<meta name="viewport" content="width=device-width, initial-scale=1.0, 
						maximum-scale=1, user-scalable=no" />
				<link  rel="stylesheet"
					href="https://fonts.googleapis.com/css?family=Muli:300,400,600,700,800" />
				<link type="text/css" rel="stylesheet" 
					href="bootstrap-v5/css/bootstrap.min.css" />
				<link type="text/css" rel="stylesheet" 
					  href="bootstrap-v5/css/bootstrap-utilities.min.css" />
				<link type="text/css" rel="stylesheet"
					  href="css/profil.css" />
				<script type="text/javascript" src="bootstrap-v5/js/bootstrap.min.js"></script>
				<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
				<script>
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}
				gtag("js", new Date());
				gtag("config", "G-DFWPE6YZ43");
		  		</script>
				<script type="text/javascript" src="javascript/jquery-3.6.min.js"></script>
				<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
				<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
			</head>
			<body>
				<div class="container-fluid main_container">
					<nav class="navbar" id="navbar">
						<div class="navbar-brand" id="nav_links"><img class="img-fluid" id="logo" alt="Dersteyim.com Logo" src="images/black_logo.png" />
						</div>
						<ul id="links">
							<li class="nav-item links">
								<a class="nav-link" id="messages">Mesajlar</a>
							</li>
							<li class="nav-item links">
								<a class="nav-link" id="lessons">İşlerim</a>
							</li>
							<li class="nav-item links">
								<a class="nav-link active" id="profil">Profilim</a>
							</li>
							<li class="nav-item links">
								<a  href="index.html" class="nav-link" id="main_page" >Ana Sayfa</a>
							</li>
						</ul>
					</nav>
					<div class="container-fluid" id="body">
						<form id="profil_form" action="profil_validation.php" method="post" enctype="multipart/form-data">
						<div class="row"> 
							<div class="col-lg-6" id="profil_photo">
							<div class="alert alert-danger" id="error_div4" role="alert" tabindex="4">Veritabanına bağlanırken bir sorun yaşandı. Tekrar deneyiniz.</div>
								<h1 id="profil_h1" >Profil Resminiz</h1>
								<div id="img_div">
									<img src="/images/profil_img.png" alt="profil resmi"  class="img-fluid" id="profil_img" />
								</div>
								<span id="requirement_span"><b>Profil Fotoğrafı Gereklilikleri</b></span><br /> 
								<ul id="requirements">
									<li class="conditions">Fotoğraf türü JPG veya PNG olmalıdır</li>
									<li class="conditions">En az 300x300 piksel olmalıdır</li>
									<li class="conditions">Fotoğraf 2MB boyutundan fazla olmamalıdır</li>
									<li class="conditions">Fotoğrafta yalnızca yüzünüz gözükmelidir</li>
									<li class="conditions">Fotoğrafta yalnızca siz olmalısınız</li>
								</ul><br />
								<input accept="image/*" type="file" name="fileToUpload" id="upload" />
								<label for="upload" id="upload_label">Profil Fotoğrafı Yükle</label>
							</div>	
						</div>
						<div class="row">
							<div class="col-lg-6" id="personal_info">
								<h1>Kişisel Bilgiler</h1>
								<div id="gender">
									<p><b>Cinsiyetiniz:</b></p>
									<input type="radio" id="male" class="profil_input" name="gender" value="m" />
									<label for="male">Erkek</label>
									<input type="radio" id="female" name="gender" value="f" />
									<label for="female">Kadın</label><br />
								</div>
								<p id="intro_title"><b>Tanıtım Metni</b></p><br />
								<p>Kendinizden, eğitiminizden, öğretmenlik ve özel ders alanındaki tecrübelerinizden bahsediniz. Özel ders alacak olan öğrencilerin 
									niçin sizi tercih etmesi gerektiğinden, eğitim verirken kullandığınız yöntemlerden, öğrencilerle olan ilişkinizden 
									bahsetmeyi unutmayınız. Eğer belirli bir yaş grubuna ya da belirli bir sınava hazırlanan öğrenci grubuna ders verecekseniz
									bu tür tercihlerinizi de ekleyiniz. Grup dersi vermek istiyorsanız belirtiniz. Başarılarınız ve sertifikalarınız sizin
									için iyi bir referans olacaktır. Öğrencilerin  bu alanı okuyarak sizi tercih edip etmeyeceğini göz önünde bulundurarak yazınız.
								</p>								  
								<textarea id="introduction" class="profil_input" name="intro" rows="8" cols="100"></textarea>
								<p id="character">800 karakter kaldı</p>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6" id="preferences">
								<h1>Eğitim Tercihleri</h1>
								<div id="style">
									<p><b>Lütfen öğrencilere ne şekilde eğitim vermek istediğinizi seçiniz. 
										Eğer yüz yüze ve internet üzerinden eğitim vermek istiyorsanız iki seçeneği de seçiniz.</b>
									</p>
									<input type="checkbox" id="face2face" class="profil_input" name="face2face" value="face2face" />
									<label for="face2face">Yüz yüze eğitim vermek istiyorum</label><br />
									<input type="checkbox" id="online" name="online" value="online" /> 
									<label for="online">İnternet üzerinden eğitim vermek istiyorum</label>
								</div>
								<div id="city" class="hidden">
									<p><b>Yüz yüze eğitim vermek istediğiniz şehri seçiniz.</b></p>
									<select class="js-example-basic-single" name="select2city">
										<option value="34">İstanbul</option>
										<option value="6">Ankara</option>
										<option value="35">İzmir</option>
										<option value="1">Adana</option>
										<option value="2">Adıyaman</option>
										<option value="3">Afyonkarahisar</option>
										<option value="4">Ağrı</option>
										<option value="68">Aksaray</option>
										<option value="5">Amasya</option>
										<option value="7">Antalya</option>
										<option value="75">Ardahan</option>
										<option value="8">Artvin</option>
										<option value="9">Aydın</option>
										<option value="10">Balıkesir</option>
										<option value="74">Bartın</option>
										<option value="72">Batman</option>
										<option value="69">Bayburt</option>
										<option value="11">Bilecik</option>
										<option value="12">Bingöl</option>
										<option value="13">Bitlis</option>
										<option value="14">Bolu</option>
										<option value="15">Burdur</option>
										<option value="16">Bursa</option>
										<option value="17">Çanakkale</option>
										<option value="18">Çankırı</option>
										<option value="19">Çorum</option>
										<option value="20">Denizli</option>
										<option value="21">Diyarbakır</option>
										<option value="81">Düzce</option>
										<option value="22">Edirne</option>
										<option value="23">Elazığ</option>
										<option value="24">Erzincan</option>
										<option value="25">Erzurum</option>
										<option value="26">Eskişehir</option>
										<option value="27">Gaziantep</option>
										<option value="28">Giresun</option>
										<option value="29">Gümüşhane</option>
										<option value="30">Hakkâri</option>
										<option value="31">Hatay</option>
										<option value="76">Iğdır</option>
										<option value="32">Isparta</option>
										<option value="46">Kahramanmaraş</option>
										<option value="78">Karabük</option>
										<option value="70">Karaman</option>
										<option value="36">Kars</option>
										<option value="37">Kastamonu</option>
										<option value="38">Kayseri</option>
										<option value="71">Kırıkkale</option>
										<option value="39">Kırklareli</option>
										<option value="40">Kırşehir</option>
										<option value="79">Kilis</option>
										<option value="41">Kocaeli</option>
										<option value="42">Konya</option>
										<option value="43">Kütahya</option>
										<option value="44">Malatya</option>
										<option value="45">Manisa</option>
										<option value="47">Mardin</option>
										<option value="33">Mersin</option>
										<option value="48">Muğla</option>
										<option value="49">Muş</option>
										<option value="50">Nevşehir</option>
										<option value="51">Niğde</option>
										<option value="52">Ordu</option>
										<option value="80">Osmaniye</option>
										<option value="53">Rize</option>
										<option value="54">Sakarya</option>
										<option value="55">Samsun</option>
										<option value="56">Siirt</option>
										<option value="57">Sinop</option>
										<option value="58">Sivas</option>
										<option value="73">Şırnak</option>
										<option value="59">Tekirdağ</option>
										<option value="60">Tokat</option>
										<option value="61">Trabzon</option>
										<option value="62">Tunceli</option>
										<option value="63">Şanlıurfa</option>
										<option value="64">Uşak</option>
										<option value="65">Van</option>
										<option value="77">Yalova</option>
										<option value="66">Yozgat</option>
										<option value="67">Zonguldak</option>
								</select>
							</div>
							<div id="topic">
								<p><b>Hangi alanla ya da alanlarla ilgili eğitim vermek istediğinizi seçiniz</b></p>
								<ul>
									<li>Öğrencilerin arama sonuçlarında çıkmanız için alanınız ile ilgili anahtar kelimeleri her kelime
										arasında boşluk olacak şekilde yazınız. Büyük küçük harf kullanımı önemli değildir.</li>
									<li>Örnek 1- matematik </li>
									<li>Örnek 2- matematik ortaokul lise</li>
									<li>Örnek 3- ingilizce TOEFL YDS IELTS</li>
									<li>Örnek 4- tenis yetişkin yoga</li>
								</ul>
								<textarea id="keyword" class="profil_input" name="keyword" rows="4" cols="50"></textarea>
								<p id="char">200 karakter kaldı</p>
								<button type="submit"  name="submit" value="submit" id="profil_submit" >Kaydınızı Tamamlayın</button>							

							</div>
						</div>
					</div>
					</form>
				</div>
				<script type="text/javascript" src="javascript/profil_complete.js"></script>
				<script type="text/javascript" src="javascript/profil_event_listener.js"></script>
				<script type="text/javascript" src="javascript/profil_validation.js"></script>
			</body>
		</html>');
	exit();
}

// Get the user id
$stmt = $conn->prepare("SELECT id FROM teachers  WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
while ($row = $result->fetch_assoc()) 
{
	$userId = $row['id'];
}
$stmt->close();

// All of the image validation is done in upload.php
require("upload.php");

if($_POST["submit"] === "edit")
{
	// prepare and bind
	$stmt = $conn->prepare("UPDATE profile  SET img_url = ?, gender = ?, title = ?, introduction = ?, city = ?, province = ?, preference = ?, price = ?, keyword = ? WHERE user_id = ?");
	$stmt->bind_param("ssssissisi", $imgName, $gender, $title, $intro, $city, $province, $preference, $price, $keyword, $userId);
	$stmt->execute();
	// Close the connection and delete the unnecesary data
	$stmt->close();
	$conn->close();
}

else if($_POST["submit"] === "editbutimage")
{
	// prepare and bind
	$stmt = $conn->prepare("UPDATE profile  SET  gender = ?, title = ?,introduction = ?, city = ?, province = ?, preference = ?, price = ?, keyword = ? WHERE user_id = ?");
	$stmt->bind_param("sssissisi", $gender, $title, $intro, $city, $province, $preference, $price, $keyword, $userId);
	$stmt->execute();
	// Close the connection and delete the unnecesary data
	$stmt->close();
	$conn->close();
}

else
{
// prepare and bind
$stmt = $conn->prepare("INSERT INTO profile (img_url, gender, title, introduction, city, province, preference, price, keyword, user_id) VALUES (?, ?, ?, ?, ?, ?, ?,  ?, ?, ?)");
$stmt->bind_param("ssssissisi", $imgName, $gender, $title, $intro, $city, $province, $preference, $price, $keyword, $userId);
$stmt->execute();
// Close the connection and delete the unnecesary data
$stmt->close();
$conn->close();
}
header("Location: profil.php");
exit();

?>