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
    $stmt = $conn->prepare("SELECT email FROM teachers WHERE token = '" . $token . "'");
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
    $stmt = $conn->prepare("SELECT email FROM students WHERE token = '" . $token . "'");
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
		<title>TAMAMEN ÜCRETSİZ || Özel ders vermek ve özel ders almak için en doğru adres dersara.com.tr</title>
		<meta charset="UTF-8">
		<meta name="description" lang="tr-TR" content="TAMAMEN ÜCRETSİZ || Özel ders vermek ve özel ders almak için en doğru adres dersara.com.tr" />
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
        <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
		<link type="text/css" rel="stylesheet"
			  href="css/index.css" />
        <link type="text/css" rel="stylesheet"
			href="css/fix.css" />
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
                    document.cookie = cName + "=" + cValue + "; " + expires + "; path=/;" + "domain=.dersara.com.tr;";		
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
                    document.cookie = cName + "=" + cValue + "; " + expires + "; path=/;" + "domain=.dersara.com.tr;";		
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
					<ul>
						<li class="nav-item links">
							<a class="nav-link sign_up">Kayıt Ol</a>
						</li>
						<li class="nav-item links">
							<a class="nav-link sign_in">Giriş Yap</a>
						</li>
						<li class="nav-item links">
							<a class="nav-link" href="sorular.html">Nasıl İşler?</a>
						</li>
					</ul>
				</div>
				<div id="main">
				  <button class="openbtn">&#9776; Menü</button>
				</div>
				<div class="navbar-brand" id="nav_links"><img class="img-fluid" alt="dersara.com.tr Logo" src="images/logo.png" />
				</div>
				<div id="not_mobile">
				<ul class="d-flex justify-content-end">
					<li class="nav-item links">
						<a class="nav-link sign_up">Kayıt Ol</a>
					</li>
					<li class="nav-item links">
						<a class="nav-link sign_in">Giriş Yap</a>
					</li>
					<li class="nav-item links">
						<a class="nav-link" href="sorular.html">Nasıl İşler?</a>
					</li>
				</ul>
			</div>
			</nav>
			<div class="container-fluid" id="body">
            <form id="sign_up_form" class="hidden">
					<fieldset>
						<img src="images/close_icon.png" id="sign_up_icon" class="close_icon" />
						<legend>Kaydolun</legend>
						<p id="radio_p">Üyelik tipinizi seçin:</p>
						<div id="teacher_radio">
							<label for="teacher">Öğretmen</label>
							<input type="radio" id="teacher" name="type" value="teacher" class="sign_input" />
						</div>
						<div id="student_radio">
							<label for="student">Öğrenci</label>
							<input type="radio" id="student" name="type" value="student" /><br />
						</div>
						<input type="text" placeholder="Adınız" name="fname" id="fname" class="sign_input" title="" />
						<input type="text" placeholder="Soyadınız" name="lname" id="lname" class="sign_input" title="" ><br />
						<input type="text" placeholder="E-posta adresiniz" name="email" id="sign_up_email" class="sign_input"  title=""/><br />
						<div id="sign_up_pass_div">
							<input type="password" placeholder="Şifreniz" name="password" id="sign_up_pass" class="sign_input" title="" />
							<i class="far fa-eye toggle-password" id="sign_up_pass_show"></i>
							<p id="pass_control_p"><b>Şifrenizi Tekrar Girin</b></p>
							<input type="password" placeholder="Şifreniz" id="pass_control" class="sign_input" title="" />
							<i class="far fa-eye toggle-password" id="sign_up_control_show"></i>
						</div>
						<button type="submit"  id="register_submit" class="sign_submit">Kaydınızı Tamamlayın</button>
						<p id="sign_up_p" class="sign_p" >Zaten hesabınız var mı?
							<a id="change_sign_in" class="change">Giriş Yapın</a>
						</p>
					</fieldset>
				</form>
				<form id="sign_in_form" class="hidden">
					<fieldset>
						<img src="images/close_icon.png" id="sign_in_icon" class="close_icon" />
						<legend>Hesabınıza Giriş Yapın</legend>
						<input type="text" placeholder="E-posta adresiniz" name="email" id="sign_in_email" class="sign_input"
						       title="" /><br />
						<div id="sign_in_pass_div">
							<input type="password" placeholder="Şifreniz" name="password" id="sign_in_pass" class="sign_input"
						       title="" />
							<i class="far fa-eye toggle-password" id="sign_in_pass_show"></i>
						</div>
						<button type="submit" id="sign_in_submit"  class="sign_submit" >Giriş Yapın</button>
						<p id="forgot" class="sign_p">
							<a id="forgot_pass">Şifremi Unuttum</a>
						</p>
						<p id="sign_in_p" class="sign_p">Hesabınız yok mu?
							<a id="change_sign_up" class="change">Kayıt Olun</a>
						</p>
					</fieldset>
				</form>
				<div id="verification_div" class="hidden">
						<img src="images/close_icon.png" id="verification_icon" class="close_icon" />
						<h1 id="verification_h1"></h1>
						<p id="verification_p"><b></b></p>
				</div>
				<form id="forgotten_form" class="hidden">
					<fieldset>
						<img src="images/close_icon.png" id="forgotten_icon" class="close_icon" />
						<legend>Şifrenizi Değiştirin</legend>
						<input type="text" placeholder="E-posta adresiniz" name="email" id="forgotten_email" class="sign_input" title="" /><br />
						<button type="submit" id="forgotten_submit"  class="sign_submit" >Kurtarma E-postası Gönder</button>
					</fieldset>
				</form>
				<div id="after_sign_up" class="hidden explain_div">
					<img src="images/close_icon.png" id="after_sign_up_icon" class="close_icon" />
					<legend id="explain_legend">Kaydınız Tamamlanamadı</legend>
					<img src="images/warning.png" id="error_img" class="img-fluid" />
					<h1 id="explain_h1">Veritabanına erişilemedi. Lütfen kısa bir süre sonra tekrar deneyiniz</h1>
				</div>
				<div id="after_sign_in" class="hidden explain_div">
					<img src="images/close_icon.png" id="after_sign_in_icon" class="close_icon" />
					<legend id="explain_legend">Giriş Yapılamadı</legend>
					<img src="images/warning.png" id="error_img" class="img-fluid" />
					<h1 id="explain_h1">Veritabanına erişilemedi. Lütfen kısa bir süre sonra tekrar deneyiniz</h1>
				</div>
				<div id="after_forgotten" class="hidden explain_div">
					<img src="images/close_icon.png" id="after_sign_in_icon" class="close_icon" />
					<legend id="explain_legend">Giriş Yapılamadı</legend>
					<img src="images/warning.png" id="error_img" class="img-fluid" />
					<h1 id="explain_h1">Veritabanına erişilemedi. Lütfen kısa bir süre sonra tekrar deneyiniz</h1>
				</div>
                <form id="reset_form">
					<fieldset>
                        <img src="images/close_icon.png" id="reset_icon" class="close_icon" />
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
                <h1 id="h1">Bütçenize uygun, yüz yüze ya da online eğitim veren bir özel ders öğretmeni bulun. </h1>
				<div id="search">
					<form id="search_form" method="GET" action="search.php"><input type="text" name="keyword" placeholder="Ne Öğrenmek İstiyorsunuz?" id="search_input" />
						<button type="submit" id="search_submit">Aramaya Başlayın</button>
					</form>
				</div>
			</div>
		</div>
		<div id="info_div">
			<h1>Öğrenciyseniz</h1>
			<img src="images/info_search.jpg" alt="Arama Logosu"  class="img-fluid info_img" />
			<p class="info_p">
				Ana sayfada arama yapın ve özel ders almak istediğiniz alanı aratın: Tenis, matematik, biyoloji, fen, gitar, yüzme, keman,
				fizik, kimya, lise sınavı, üniversite sınavı ve aklınıza gelen her alanda arama yapın.				
			</p>
			<img src="images/info_filter.jpg" alt="Filtreleme Logosu"  class="img-fluid info_img" />
			<p class="info_p">
				Gelen sonuçları filtreleyin. Yüz yüze veya online, istediğiniz şehir ve semtte, istediğiniz ücret aralığında özel ders veren 
				erkek veya kadın özel ders öğretmenlerini filtreleyin ve bulun.
			</p>
			<img src="images/info_demand.jpg" alt="Talep Logosu"  class="img-fluid info_img" />
			<p class="info_p">
				Ders talebi oluştur butonuna tıklayın ve sizden istenilen bilgileri girin. Bu bilgiler yalnızca özel ders öğretmeniniz ile paylaşılacak
				ve sitede görüntülenemeyecektir. Ders talebini başarıyla oluşturduktan sonra başka talepler oluşturun ya da özel ders öğretmeninin sizinle
				iletişime geçmesini bekleyin.
			</p>
			<img src="images/info_contact.jpg" alt="İletişim Logosu"  class="img-fluid info_img" />
			<p class="info_p">
				Ders talebinde bulunduğunuz özel ders öğretmeni sizinle belirttiğiniz iletişim kanallarından iletişime geçecektir. Eğer yeterince beklediyseniz ve 
				geri dönüş alamadıysanız bu özel ders öğretmeninin programının dolu olduğu anlamına gelir. Başka ders talepleri oluşturmaya devam edebilirsiniz. 
			</p>
		<h1>Öğretmenseniz</h1>
		<img src="images/info_register.jpg" alt="Kayıt Logosu"  class="img-fluid info_img" />
		<p class="info_p">
			Ana sayfadaki kayıt ol butonuna tıklayınız. Bilgilerinizi girdikten ve öğretmen seçeneğini işaretledikten sonra onay e-postası alacaksınız.
			Spam(gereksiz) mailler kısmını da kontrol edin ve gelen e-postadaki linke tıklayın. Profile yönlendirileceksiniz.	
		</p>
		<img src="images/info_profil.jpg" alt="Profil Logosu"  class="img-fluid info_img" />
		<p class="info_p">
			Profil bilgilerinizi doldurun ve ders vermek istediğiniz alanları anahtar kelimeler bölümüne yazın. Profilinizi tamamladıktan sonra artık arama
			sonuçlarında görünür olacaksınız ve öğrenciler size ders talebi yollayabilecektir.
		</p>
		<img src="images/info_contact.jpg" alt="Filtreleme Logosu"  class="img-fluid info_img" />
		<p class="info_p">
			Profilim sayfasındaki derslerim bölümünden size gelen ders taleplerini inceleyin ve öğrencilerle iletişime geçin. 
		</p>
	</div>
		<script type="text/javascript" src="javascript/random_image.js"></script>
		<script type="text/javascript" src="javascript/event_listener.js"></script>
		<script type="text/javascript" src="javascript/form_validation.js?time=v1"></script>
	</body>
<?php }?>
</html>