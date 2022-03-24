<?php
session_start();

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

$token = isset($_GET['token']) ? $_GET['token'] : '';
$type = isset($_GET['type']) ? $_GET['type'] : '';
$verify = isset($_GET['verify']) ? $_GET['verify'] : '';
$is_valid = false;
$is_redirect = false;
$is_confirm = false;
$newEmail = '';
if(empty($token)){
    echo 'Doğrulama bağlantınızın süresi doldu veya geçersiz';
    $conn->close();
    exit;
}else if($type == 'teacher' && $verify == 'register'){
    $stmt = $conn->prepare("SELECT email FROM teachers WHERE token = '". $token."' AND status = 0");
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    if($result->num_rows){
        while ($row = $result->fetch_assoc()) {
            $stmt = $conn->prepare("UPDATE teachers SET token = '', status=1 WHERE token = '".$token."'");
            $stmt->execute();
            $is_valid = true;
            $_SESSION['logged_in'] = true;
            $_SESSION['type'] = 'teacher';
            $_SESSION['email'] = $row['email'];
        }
    }else{
        $is_redirect = true;
        echo 'Doğrulama bağlantınızın süresi doldu veya geçersiz';
    }
    
    $stmt->close();
    $conn->close();
}else if($type == 'student' && $verify == 'register'){
    $stmt = $conn->prepare("SELECT email FROM students WHERE token = '" . $token . "' AND status = 0");
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    //echo "<pre>"; print_r($result);exit;
    if($result->num_rows){
        while ($row = $result->fetch_assoc()) {
            //echo "<pre>"; print_r($row);exit;
            $stmt = $conn->prepare("UPDATE students SET token = '', status=1 WHERE token = '".$token."'");
            $stmt->execute();
            $is_valid = true;
            $_SESSION['logged_in'] = true;
            $_SESSION['type'] = 'student';
            $_SESSION['email'] = $row['email'];
        }
    }else{
        $is_redirect = true;
        echo 'Doğrulama bağlantınızın süresi doldu veya geçersiz';
    }
    $stmt->close();
    $conn->close();
}else if($type == 'teacher' && $verify == 'forgotten'){
    $stmt = $conn->prepare("SELECT email FROM teachers WHERE token = '" . $token . "' AND status = 0");
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    //echo "<pre>"; print_r($result);exit;
    if($result->num_rows){
        while ($row = $result->fetch_assoc()) {
            $newEmail = $row['email'];
        }
        $is_confirm = true;
    }else{
        $is_redirect = true;
        echo 'Doğrulama bağlantınızın süresi doldu veya geçersiz';
    }
    $stmt->close();
    $conn->close();
}else if($type == 'student' && $verify == 'forgotten'){
    $stmt = $conn->prepare("SELECT email FROM students WHERE token = '" . $token . "' AND status = 0");
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    //echo "<pre>"; print_r($result);exit;
    if($result->num_rows){
        while ($row = $result->fetch_assoc()) {
            $newEmail = $row['email'];
        }
        $is_confirm = true;
    }else{
        $is_redirect = true;
        echo 'Doğrulama bağlantınızın süresi doldu veya geçersiz';
    }
    $stmt->close();
    $conn->close();
}?>
<!DOCTYPE html>
<html lang="tr">
	<head>
		<title>TAMAMEN ÜCRETSİZ || dersara.com.tr'de özel dersler veren özel ders öğretmenleri içinden size uygun bir öğretmen bulun veya özel ders verin.</title>
		<meta charset="UTF-8">
		<meta name="description" lang="tr-TR" content="dersara.com.tr ile binlerce özel ders ilanı içinden özel ders veren yüzlerce özel ders öğretmeni bulabilir ya da özel ders verebilirsiniz." />
		<meta name="keywords" content="dersara, ders ara , dersara.com,
					dersara.com.tr, dersara.net ozelders.com, superprof,
					özel ders, ozel ders, ders bul, özelders, özel ders,
                    özel ders hocası, özel ders hoca, ozel ders hocası, 
                    ozel ders, superprof.com, dersara.net, YDS, TOEFL,
                    ingilizce özel ders, ingilizce öğren, yabancı dil ders,
					online ders, online ozel ders, online özel ders,
					online kurs, kurslar, öğretmen, özel hoca, ozel hoca,
					hoca, kurs, online kurs, grup dersi, matematik dersi, 
					fen dersi, tarih dersi, türkçe dersi, edebiyat dersi,
					istanbul özel ders, ankara özel ders, izmir özel ders,
					istanbul ozel ders, ankara ozel ders, izmir ozel ders,
					piyano dersi, gitar dersi, müzik dersi, bateri dersi,
					ucuz özel ders, ücretsiz ders, özel ders vermek,
					ozel ders vermek, özel ders öğretmeni, ozel ders ogretmeni,
					türkçe öğretmeni, matematik öğretmeni, fen öğretmeni,
					tarih öğretmeni, fizik öğretmeni, kimya öğretmeni,
					üniversite sınavı, lise sınavı, yerleştirme sınavı,
					gitar öğretmeni, piyano öğretmeni" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, 
					maximum-scale=1, user-scalable=no" />
		<link  rel="stylesheet"
			   href="https://fonts.googleapis.com/css?family=Muli:300,400,600,700,800" />
		<link type="text/css" rel="stylesheet" 
			  href="bootstrap-v5/css/bootstrap.min.css" />
		<link type="text/css" rel="stylesheet" 
			  href="bootstrap-v5/css/bootstrap-utilities.min.css" />
		<link type="text/css" rel="stylesheet"
			  href="css/index.css" />
		<script type="text/javascript" src="bootstrap-v5/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-DFWPE6YZ43"></script>
		<script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-DFWPE6YZ43');
		</script>
 		<script type="text/javascript" src="javascript/jquery-3.6.min.js"></script>
	</head>
<script>
<?php
if( $is_redirect ){ ?>
setTimeout(function(){
    window.location.href = "index.html";
    return false;
},5000);
<?php }?>
$(document).ready(function(){
    var t1 = true;
    <?php if( $is_valid && $type == 'student'){?>
        $.ajax({
            type: 'GET',
            url: 'index.html',
            data: {},
            success: function(data) { 
                function setCookie(cName, cValue, hours) {
                    let date = new Date();
                    date.setTime(date.getTime() + ( 2 * 3600 * 1000));
                    const expires = "expires=" + date.toUTCString();
                    document.cookie = cName + "=" + cValue + "; " + expires + "; path=/;" + "domain:.dersara.com.tr;";		
                }
                // Apply setCookie
                setCookie('logged_in', 'true', 2);
                setCookie('type', 'student', 2);
                window.location.href = 'index.html'
            },
            error: function(xhr, ajaxOptions, thrownerror) { }
        });
    <?php }else if( $is_valid && $type == 'teacher' ){ ?>
        $.ajax({
            type: 'GET',
            url: 'profil.php',
            data: {},
            success: function(data) { 
                function setCookie(cName, cValue, hours) {
                    let date = new Date();
                    date.setTime(date.getTime() + ( 2 * 3600 * 1000));
                    const expires = "expires=" + date.toUTCString();
                    document.cookie = cName + "=" + cValue + "; " + expires + "; path=/;" + "domain:.dersara.com.tr;";		
                }
                // Apply setCookie
                setCookie('logged_in', 'true', 2);
                setCookie('type', 'teacher', 2);
                window.location.href = 'profil.php'
            },
            error: function(xhr, ajaxOptions, thrownerror) { }
        });
    <?php } else if($is_valid) {?>
        setTimeout(function(){
            window.location.href = "index.html";
        },5000);
    <?php } ?>
});
</script>
<?php if($is_confirm){?>
	<body>
		<noscript>
			<div class="container-fluid noscript_container" >
				<div class="container-fluid" id="warning_body">
					<div class="container-fluid" id="noscript_img_container">
						<img src="images/warning.png" alt="Uyarı İkonu"  class="img-fluid" id="warning_img" />
						<h1 id="noscript_h1">Sitemizi kullanabilmeniz için tarayıcı ayarlarından Javascript desteğini etkinleştirmeniz gerekmektedir. </h1>
					</div>
				</div>
			</div>		
		</noscript>
		<div class="container-fluid main_container">
			<img src="images/viyolin.jpeg" alt="Viyolin Dersi Alan Bir Öğrenci" class="img-fluid" id="background-img" />
			<nav class="navbar navbar-light bg-light bg-transparent" id="navbar">
				<div id="sidebar" class="sidebar">
					<ul  id="links">
						<li class="nav-item links">
							<a class="nav-link" id="sign_up">Kayıt Ol</a>
						</li>
						<li class="nav-item links">
							<a class="nav-link" id="sign_in">Giriş Yap</a>
						</li>
						<li class="nav-item links">
							<a class="nav-link" href="sorular.html">Nasıl İşler?</a>
						</li>
					</ul>
				</div>
				<div id="main">
				    <button class="openbtn">&#9776; Menü</button>
				</div>
				<div class="navbar-brand" id="nav_links"><img class="img-fluid" alt="Dersteyim.com Logo" src="images/logo.png" /></div>
				<ul class="d-flex justify-content-end not_mobile" id="links">
					<li class="nav-item links">
						<a class="nav-link" id="sign_up">Kayıt Ol</a>
					</li>
					<li class="nav-item links">
						<a class="nav-link" id="sign_in">Giriş Yap</a>
					</li>
					<li class="nav-item links">
						<a class="nav-link" href="sorular.html">Nasıl İşler?</a>
					</li>
				</ul>
			</nav>
			<div class="container-fluid" id="body">
                <form id="reset_form">
					<fieldset>
						<legend>Şifreyi yenile</legend>
                        <input type="hidden" name="email" id="reset_email" value="<?php echo $newEmail;?>"/>
                        <div id="reset_pass_div">
						    <input type="password" placeholder="Yeni Şifre" name="password" id="reset_password" class="sign_input" title="" />
                            <i class="far fa-eye toggle-password" id="reset_pass_show"></i>
                            <p id="pass_control_p"><b>&nbsp;</b></p>
						    <input type="password" placeholder="Şifreyi Onayla" id="reset_confirm" class="sign_input" title="" />
                            <i class="far fa-eye toggle-password" id="reset_confirm_show"></i> 
                        </div>                           
						<button type="submit" id="reset_submit" class="sign_submit" >Şifrenizi Yenileyin</button>
					</fieldset>
				</form>
                <div id="verification_div" class="hidden">
						<img src="images/close_icon.png" id="verification_icon" class="close_icon" />
						<h1 id="verification_h1"></h1>
						<p id="verification_p"><b></b></p>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="javascript/random_image.js"></script>
		<script type="text/javascript" src="javascript/event_listener.js"></script>
		<script type="text/javascript" src="javascript/form_validation.js?time=v1"></script>
	</body>
<?php }?>
</html>