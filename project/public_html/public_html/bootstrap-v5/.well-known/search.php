<?php
$keyword = $_GET['keyword'];
?>

<!-- Add favicon to your server root -->
<!-- Search icon will be added to the left side of input-->
<!DOCTYPE html>
<html lang="tr">
	<head>
		<title>Yüz yüze ya da online bir özel ders bulun || dersara.com.tr</title>
		<meta charset="UTF-8">
		<meta name="description" lang="tr-TR" content="dersara.com.tr ile binlerce özel ders ilanı içinden özel ders veren yüzlerce özel ders öğretmeni bulabilir ya da özel ders verebilirsiniz." />
		<meta name="keywords" content="dersara, ders ara , dersara.com,
					dersara.com.tr, dersara.net ozelders.com, superprof,
					özel ders, ozel ders, ders bul, özelders, YDS, TOEFL,
					özel ders hocası, özel ders hoca, ozel ders hocası,
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
			  href="css/search.css" />
	  	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		  <!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-DFWPE6YZ43"></script>
		<script>
  			window.dataLayer = window.dataLayer || [];
  			function gtag(){dataLayer.push(arguments);}
  			gtag('js', new Date());
  			gtag('config', 'G-DFWPE6YZ43');
		</script> 
		<script type="text/javascript" src="javascript/jquery-3.6.min.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>	
	</head>
	<body>
		<div id="main_container">
			<div id="demand_div" class="hidden">
				<img src="images/close_icon.png" id="demand_icon" class="close_icon" />
				<div id="img_div"></div>
				<form id="demand_form">
						<h1>Ders Talebinizi Oluşturun</h1>
						<p><b>Adınız</b></p>
						<input type="text" placeholder="Adınız" name="name" id="demand_name" title="" class="demand_input" /><br />
						<p><b>Hocanıza  kendinizi tanıtın ve beklentilerinizi anlatın</b></p>
						<textarea id="introduction" class="demand_input" name="intro" rows="16" cols="50" placeholder="Uygun olduğunuz tarihlerden ve neler öğrenmek istediğinizden bahsedin."></textarea>
						<p id="character">800 karakter kaldı</p>
						<p><b>Dersi kim için alıyorsunuz?</b></p>
						<select name="who" id="who" class="demand_input">
  							<option value="myself">Kendim İçin</option>
  							<option value="other">Başkası İçin</option>
						</select>
						<p><b>Ders Türü</b></p>
						<select name="type" id="type">
  							<option value="online">Online</option>
  							<option value="face2face">Yüzyüze</option>
						</select>
						<p><b>Hocanızın Sizinle İletişim Kurabilmesi İçin İletişim Bilgileriniz</b></p>
						<p>İletişim bilgileriniz hocanız dışında kimseyle paylaşılmayacak ve site üzerinde görüntülenemeyecektir.</p>
						<p><b>E-posta Adresiniz</b></p>
						<input type="text" placeholder="E-posta adresiniz" name="email" id="demand_email"
							title="" class="demand_input2" /><br />
						<p><b>Telefon Numaranız</b></p>
						<input type="text" placeholder="Telefon Numaranız" name="telephone" id="demand_tel"
							title=""  class="demand_input2" /><br />
						<button type="submit" id="demand_submit">Talebinizi Oluşturun</button>
				</form>
			</div>
			<nav class="navbar flex-container" id="navbar">
				<div id="sidebar" class="sidebar">
						<ul>
							<li class="nav-item links">
								<a class="nav-link" id="messages" href="index.html">Ana Sayfa</a>
							</li>
							<li class="nav-item links">
								<a class="nav-link" id="main_page" href="sorular.html">Nasıl İşler?</a>
							</li>
						</ul>
				</div>
				<div id="main">
					<button class="openbtn">&#9776; Menü</button>	
				</div>
				<div class="navbar-brand" id="nav_links"><img class="img-fluid" id="logo" alt="Dersteyim.com Logo" src="images/black_logo.png" />
				</div>
				<div id="not_mobile">
				<ul  class="not_mobile" id="links">
					<li class="nav-item links">
						<a class="nav-link" id="messages" href="index.html">Ana Sayfa</a>
					</li>
					<li class="nav-item links">
						<a class="nav-link" id="main_page" href="sorular.html">Nasıl İşler?</a>
					</li>
				</ul>
				</div>
			</nav>
			<div id="info_banner">Koronavirüsle ilgili çekinceleriniz varsa online özel ders veren öğretmenleri tercih edebilirsiniz.</div>
			<div id="search">
					<form id="search_form" method="GET" action="search.php"><input type="text" name="keyword" id="search_input" value="<?php echo $keyword?>" />
						<button type="submit" id="search_submit">Aramaya Devam Edin</button>
					</form>
			</div>
			<div id="body" class="flex-container2">
				<div id="filter">
					<div id="sort">
						<label for="sortby" id="sortbylabel">Sırala:</label>
						<select name="options" class="filter" id="sortby">
  							<option value="best">En iyi Eşleşme</option>
  							<option value="lowest">En Ucuz</option>
  							<option value="highest">En Pahalı</option>
						</select>
					</div>
					<div>
						<h1>Filtrele</h1><hr>
					</div>
					<p><b>Ders Yeri</b></p>
					<label for="online" class="type_label">Online</label>
					<input type="radio" id="online" class="type filter" name="type" value="online"><br />
					<label for="face2face" class="type_label">Yüzyüze</label>
					<input type="radio" id="face2face" class="type filter" name="type"  value="face2face"><br />
					<div id="city" class="hidden">
						<p><b>Yüz yüze eğitim almak istediğiniz şehri seçiniz</b></p>
						<select class="js-example-basic-single filter" name="city" id="select2city">
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
						<p><b>(Tercihen) Eğitim Almak İstediğiniz Semti veya Semtleri Arasında Boşluk Bırakarak Yazınız</b></p>
						<input id="province" class="filter" name="province"></input>
					</div>
					<p id="gender"><b>Öğretmenin Cinsiyeti</b></p>
					<select id="gender_options" class="filter" >
  						<option value="any">Fark Etmez</option>
  						<option value="m">Erkek</option>
  						<option value="f">Kadın</option>
					</select>
					<p id="price"><b>Saatlik Ücret</b></p>
					<div class="price-slider">
  						<input value="5" min="5" max="600" step="5" type="range" id="slider_min" class="filter"/>
  						<input value="600" min="5" max="600" step="5" type="range" id="slider_max" class="filter" />
					</div>
					<div id="price_div">
						<span id="min">5TL</span>
						<span id="max">600TL</span>
					</div>
				</div>
				<div id="profile_container">
					
				</div>
			</div>
		</div>

 			<script src="javascript/search.js"></script>	
			<script src="javascript/search_event_listener.js"></script>
			<script src="javascript/demand_validation.js"></script>
	</body>
</html>


