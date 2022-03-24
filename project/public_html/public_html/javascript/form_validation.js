// If user submits the sign up form validate the input
$("#sign_up_form").submit(function(event) 
{
	var valid = 1;
	var $fname = $("#fname");
	var $lname = $("#lname");
	var $email = $("#sign_up_email");
	var $password = $("#sign_up_pass");
	var $passwordControl = $("#pass_control");
  
	// Get the values of the input forms.
	var fnameVal = $fname.val();
	var lnameVal = $lname.val();
	var emailVal = $email.val();
	var passwordVal = $password.val();
	var typeVal = $('input[name="type"]:checked').val();
	var passwordControlVal = $passwordControl.val();
  
	// Regular expressions for validating email and password
	const MAILREGEXP = /^\S+\s?\@\S+\s?\.\S+\s?$/gi;
  
	try
	{
	  fnameVal = fnameVal.trim();
	  lnameVal = lnameVal.trim();
	  emailVal= emailVal.trim();
	}
	catch
	{
	  fnameVal = fnameVal.replace(/^\s+|\s+$/g, '');
	  lnameVal = lnameVal.replace(/^\s+|\s+$/g, '');
	  emailVal = emailVal.replace(/^\s+|\s+$/g, '');
	} 
	// Check if the chekbox is checked
	if (!$('input[name="type"]:checked').val())
	{
		valid = 0;
		$("#teacher")[0].setCustomValidity("Seçeneklerden birini seçiniz.");
		$("#teacher")[0].reportValidity();
	}	
	if (fnameVal.length === 0)
	{
	  valid = 0;
	  $fname[0].setCustomValidity("Bu alanı doldurmanız gerekmektedir");
	  $fname[0].reportValidity();
	}
	else if (fnameVal.length > 60)
	{
	  valid = 0;
	  $fname[0].setCustomValidity("Adınızı daha kısa bir şekilde yazınız.")
	  $fname[0].reportValidity();
	}
  
	if (lnameVal.length === 0)
	{
	  valid = 0;
	  $lname[0].setCustomValidity("Bu alanı doldurmanız gerekmektedir");
	  $lname[0].reportValidity();
	}
	else if (lnameVal.length > 60)
	{
	  valid = 0;
	  $lname[0].setCustomValidity("Maksimum karakter sınırını aştınız")
	  $lname[0].reportValidity();
	}
  
	if (emailVal.length === 0)
	{
	  valid = 0;
	  $email[0].setCustomValidity("Bu alanı doldurmanız gerekmektedir");
	  $email[0].reportValidity();
	}
	else if (emailVal.match(MAILREGEXP) === null)
	{
	  valid = 0;
	  $email[0].setCustomValidity("Lütfen gerçek bir e-posta adresi yazınız");
	  $email[0].reportValidity();
	}
	else if (emailVal.length > 255)
	{
	  valid = 0;
	  $email[0].setCustomValidity("Lütfen daha kısa bir e-posta yazınız");
	  $email[0].reportValidity();
	}
	if (passwordVal.length === 0 )
	{
	  valid = 0;
	  $password[0].setCustomValidity("Bu alanı doldurmanız gerekmektedir");
	  $password[0].reportValidity();
	}
	else if (passwordVal.length < 8)
	{
	  valid = 0;
	  $password[0].setCustomValidity("Şifreniz en az 8 karakterden oluşmalıdır.");
	  $password[0].reportValidity();
	}
	else if (passwordVal.length > 255)
	{
		valid = 0;
		$password[0].setCustomValidity("Daha kısa bir şifre giriniz");
		$password[0].reportValidity();
	}
	if(!(passwordVal === passwordControlVal))
	{
		valid = 0;
		$password[0].setCustomValidity("Şifre alanları aynı olmalıdır")
		$password[0].reportValidity();
	}
  
	if (!valid)  
	{
	  event.preventDefault();
	}
	else
	{
	  event.preventDefault();
	  $.post("register.php", {type: typeVal, fname: fnameVal, lname: lnameVal, email: emailVal, password: passwordVal}, function(data) 
	  {
		  if (data == -1)
		  {
			$email[0].setCustomValidity("Bu e-posta adresi kullanılmaktadır, lütfen başka bir e-posta giriniz");
			$email[0].reportValidity();
		  }
		  else if (data == 0)
		  {
			$("#sign_up_form").addClass('hidden');
			$("#after_sign_up").removeClass("hidden");
		  }
		  else if (data == 1)
		  {
			$(".alert").remove();
			$("#verification_p").empty();
			$("#verification_p").append(emailVal + " adresine onaylama e-postası gönderilmiştir.\n Lütfen spam(gereksiz) klasörünü de kontrol ediniz.\n5 dakika içinde e-postayı almadıysanız tekrar gönder butonuna tıklayınız.");
			$("#verification_h1").empty();
			$("#verification_h1").append("E-Posta Onayı");
			if(!$("#resend_submit").val())
			{
				$("#verification_p").after('<button type="submit" id="resend_submit"  class="sign_submit" >Tekrar Gönder</button>')
			}	
			$("#verification_div").removeClass("hidden");
			$("#sign_up_form").addClass("hidden");
			$("#resend_submit").on("click", function(event)
			{
			  var $email = $("#sign_up_email");
			 var $fname = $("#fname");
			var $lname = $("#lname");
		  
		  
			  var emailVal = $email.val();
			  var fnameVal = $fname.val();
			  var lnameVal = $lname.val();
			  var typeVal = $('input[name="type"]:checked').val();
			  $("#resend_submit").remove();
			  $.get('resend.php', { type: typeVal, fname: fnameVal, lname: lnameVal, email: emailVal}, function (data, textStatus, jqXHR) 
			  {  // success callback   
				  if (data == 0)
					  {
						$("#verification_div").addClass('hidden');
						$("#after_sign_up").removeClass("hidden");
					  }
				  else if (data == 1)
				  {
					$(".alert").remove();
					$("#verification_p").empty();
					$("#verification_p").append(emailVal + " adresine onaylama e-postası tekrar gönderilmiştir.");
					$("#verification_h1").empty();
					$("#verification_h1").append("E-Posta Onayı");
					$("#verification_div").removeClass("hidden");
				  
				   function setCookie(cName, cValue, hours) 
					{
					  let date = new Date();
					  date.setTime(date.getTime() + ( 1 * 3600 * 1000));
					  const expires = "expires=" + date.toUTCString();
					 document.cookie = cName + "=" + cValue + "; " + expires + "; path=/;" + "domain=.dersara.com.tr;;";
			
				   }	
				  }
				  else if (data == 2)
				  {
					$(".alert").remove();
					$("#verification_p").empty();
					$("#verification_p").append(emailVal + " adresine onaylama e-postası tekrar gönderilmiştir.");
					$("#verification_h1").empty();
					$("#verification_h1").append("E-Posta Onayı");
					$("#verification_div").removeClass("hidden");
				  
				   function setCookie(cName, cValue, hours) 
					{
					  let date = new Date();
					  date.setTime(date.getTime() + ( 1 * 3600 * 1000));
					  const expires = "expires=" + date.toUTCString();
					 document.cookie = cName + "=" + cValue + "; " + expires + "; path=/;" + "domain=.dersara.com.tr;;";
				   }	
				  }
				}).fail(function(data) {
				  $("#verification_div").addClass('hidden');
						$("#after_sign_up").removeClass("hidden");
				});
			  
			})
			
			function setCookie(cName, cValue, hours) 
			{
				let date = new Date();
				date.setTime(date.getTime() + ( 1 * 3600 * 1000));
				const expires = "expires=" + date.toUTCString();
				document.cookie = cName + "=" + cValue + "; " + expires + "; path=/;" + "domain=.dersara.com.tr;;";

			}	
		  }
		  else if (data == 2)
		  {
			$(".alert").remove();
			$("#verification_p").empty();
			$("#verification_p").append(emailVal + " adresine onaylama e-postası gönderilmiştir.\n Lütfen spam(gereksiz) klasörünü de kontrol ediniz.\n5 dakika içinde e-postayı almadıysanız tekrar gönder butonuna tıklayınız.");
			$("#verification_h1").empty();
			$("#verification_h1").append("E-Posta Onayı");
			if(!$("#resend_submit").val())
			{
				$("#verification_p").after('<button type="submit" id="resend_submit"  class="sign_submit" >Tekrar Gönder</button>')
			}
			$("#sign_up_form").addClass("hidden");
			$("#verification_div").removeClass("hidden");
			$("#resend_submit").on("click", function(event)
			{
			  var $email = $("#sign_up_email");
			  var $fname = $("#fname");
				var $lname = $("#lname");
		  
		  
			  var emailVal = $email.val();
			  var fnameVal = $fname.val();
			  var lnameVal = $lname.val();
			  var typeVal = $('input[name="type"]:checked').val();
			  $("#resend_submit").remove();
			  $.get('resend.php', { type: typeVal, fname: fnameVal, lname: lnameVal, email: emailVal}, function (data, textStatus, jqXHR) 
			  {  // success callback   
				  if (data == 0)
					  {
						$("#verification_div").addClass('hidden');
						$("#after_sign_up").removeClass("hidden");
					  }
				  else if (data == 1)
				  {
					$(".alert").remove();
					$("#verification_p").empty();
					$("#verification_p").append(emailVal + " adresine onaylama e-postası tekrar gönderilmiştir.");
					$("#verification_h1").empty();
					$("#verification_h1").append("E-Posta Onayı");
					$("#verification_div").removeClass("hidden");
				  
				   function setCookie(cName, cValue, hours) 
					{
					  let date = new Date();
					  date.setTime(date.getTime() + ( 1 * 3600 * 1000));
					  const expires = "expires=" + date.toUTCString();
					 document.cookie = cName + "=" + cValue + "; " + expires + "; path=/;" + "domain=.dersara.com.tr;;";
			
				   }	
				  }
				  else if (data == 2)
				  {
					$(".alert").remove();
					$("#verification_p").empty();
					$("#verification_p").append(emailVal + " adresine onaylama e-postası tekrar gönderilmiştir.");
					$("#verification_h1").empty();
					$("#verification_h1").append("E-Posta Onayı");
					$("#verification_div").removeClass("hidden");
				  
				   function setCookie(cName, cValue, hours) 
					{
					  let date = new Date();
					  date.setTime(date.getTime() + ( 1 * 3600 * 1000));
					  const expires = "expires=" + date.toUTCString();
					 document.cookie = cName + "=" + cValue + "; " + expires + "; path=/;" + "domain=.dersara.com.tr;;";
				   }	
				  }
				}).fail(function(data) {
				  $("#verification_div").addClass('hidden');
						$("#after_sign_up").removeClass("hidden");
				});
			  
			})
			return false;
		  }
	  }).fail(function(data) {
		$("#sign_up_form").addClass('hidden');
		$("#after_sign_up").removeClass("hidden");
	  });
	}
});
  

// If user submits the sign in form validate the input
$("#sign_in_form").submit(function(event) {
	var valid = 1;
	var $email = $("#sign_in_email");
	var $password = $("#sign_in_pass");
  
	// Get the values of the input forms.
	var emailVal = $email.val();
	var passwordVal = $password.val();
	  
	// Regular expressions for validating email and password
	const MAILREGEXP = /^\S+\s?\@\S+\s?\.\S+\s?$/gi;
  
	if (emailVal.length === 0)
	{
	  valid = 0;
	  $email[0].setCustomValidity("Bu alanı doldurmanız gerekmektedir");
	  $email[0].reportValidity();
	}
	else if (emailVal.match(MAILREGEXP) === null)
	{
	  valid = 0;
	  $email[0].setCustomValidity("Lütfen gerçek bir e-posta adresi yazınız");
	  $email[0].reportValidity();
	}
	else if (emailVal.length > 255)
	{
	  valid = 0;
	  $email[0].setCustomValidity("Lütfen daha kısa bir e-posta yazınız");
	  $email[0].reportValidity();
	}
	if (passwordVal.length === 0 )
	{
	  valid = 0;
	  $password[0].setCustomValidity("Bu alanı doldurmanız gerekmektedir");
	  $password[0].reportValidity();
	}
	else if (passwordVal.length < 8)
	{
	  valid = 0;
	  $password[0].setCustomValidity("Şifreniz en az 8 karakterden oluşmalıdır.");
	  $password[0].reportValidity();
	}
	else if (passwordVal.length > 255)
	{
		valid = 0;
		$password[0].setCustomValidity("Daha kısa bir şifre giriniz.");
		$password[0].reportValidity();
	}  
	if (!valid) {
		event.preventDefault();
	}else{
		event.preventDefault();
		$.post("sign_in.php", {email: emailVal, password: passwordVal}, function(data) {
		if (data == -1){
			$email[0].setCustomValidity("Yanlış e-posta adresi ya da şifre girdiniz. Bu bilgileri hatırlamıyorsanız şifremi unuttuma tıklayın");
			$email[0].reportValidity();
		}else if (data == 0){
		  $("#sign_in_form").addClass('hidden');
		  $("#after_sign_in").removeClass("hidden");
		}else if (data == 1){
			$("#sign_in_form").addClass("hidden");
				$("#sidebar").html('<ul><li class="nav-item links"><a class="nav-link" href="sorular.html">Nasıl İşler?</a></li><li class="nav-item"><a class="nav-link sign_out">Çıkış Yap</a></li></ul>');		
				$("#not_mobile").html('<ul class="d-flex justify-content-end"><li class="nav-item links"><a class="nav-link" href="sorular.html">Nasıl İşler?</a></li><li class="nav-item"><a class="nav-link sign_out">Çıkış Yap</a></li></ul>');		
			

			// Set cookie as loggged in so when user refreshes the page he can stay logged in 
			function setCookie(cName, cValue, hours) {
				let date = new Date();
				date.setTime(date.getTime() + ( 2 * 3600 * 1000));
				const expires = "expires=" + date.toUTCString();
				document.cookie = cName + "=" + cValue + "; " + expires + "; path=/;" + "domain=.dersara.com.tr;";
			}
			// Apply setCookie
			setCookie('logged_in', 'true', 2);
			setCookie('type', 'student', 2);	
			// When user clicks sign out delete the cookie and return the page to the initial state
			$(".sign_out").click(function()
				{
				   var delete_cookie = function(name) 
				   {
						 document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;' + "; path=/;" + "domain=.dersara.com.tr;;";
				   };
				   delete_cookie("logged_in");
				   delete_cookie("type");
   
				   // To remove all sessions 
				   $.get('delete.php', function (data, textStatus, jqXHR) 
				   {  // success callback   
						 data = 1;
					   });	
					   $("#sidebar").html('<ul><li class="nav-item links"><a class="nav-link sign_up">Kayıt Ol</a></li><li class="nav-item links"><a class="nav-link sign_in">Giriş Yap</a></li><li class="nav-item links"><a class="nav-link" href="sorular.html">Nasıl İşler?</a></li></ul>');	
					   $("#not_mobile").html('<ul class="d-flex justify-content-end"><li class="nav-item links"><a class="nav-link sign_up">Kayıt Ol</a></li><li class="nav-item links"><a class="nav-link sign_in">Giriş Yap</a></li><li class="nav-item links"><a class="nav-link" href="sorular.html">Nasıl İşler?</a></li></ul>');	
		
				   
				   // Because new elements are appended the event listeners before don't work so add the same event listeners.
				   $(".sign_up").click(function() 
				   {
					 if(!$("#sign_in_form").hasClass("hidden"))
					 {
					   $("#sign_in_form").addClass("hidden");
					 }
					 if(!$("#verification_div").hasClass("hidden"))
					 {
					   $("#verification_div").addClass("hidden");
					 }
					 if(!$("#forgotten_form").hasClass("hidden"))
					 {
					   $("#forgotten_form").addClass("hidden");
					 }
					 $(".explain_div").addClass("hidden");
					 $("#sign_up_form").removeClass("hidden");
				   });
				   
				   $(".sign_in").click(function() 
				   {
					 if(!$("#sign_up_form").hasClass("hidden"))
					 {
					   $("#sign_up_form").addClass("hidden");
					 }
					 if(!$("#verification_div").hasClass("hidden"))
					 {
					   $("#verification_div").addClass("hidden");
					 }
					 if(!$("#forgotten_form").hasClass("hidden"))
					 {
					   $("#forgotten_form").addClass("hidden");
					 }
					 $(".explain_div").addClass("hidden");
					 $("#sign_in_form").removeClass("hidden");
				   });
				 });
		}else if (data == 2){
			function setCookie(cName, cValue, hours) 
			{
				let date = new Date();
				date.setTime(date.getTime() + ( 2 * 3600 * 1000));
				const expires = "expires=" + date.toUTCString();
				document.cookie = cName + "=" + cValue + "; " + expires + "; path=/;" + "domain=.dersara.com.tr;;";

			}
			// Apply setCookie
			setCookie('logged_in', 'true', 2);
			setCookie('type', 'teacher', 2);
				// When user clicks sign out delete the cookie and return the page to the initial state
				$(".sign_out").click(function()
				{
				   var delete_cookie = function(name) 
				   {
						 document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;' + "; path=/;" + "domain=.dersara.com.tr;;";
				   };
				   delete_cookie("logged_in");
				   delete_cookie("type");
   
				   // To remove all sessions 
				   $.get('delete.php', function (data, textStatus, jqXHR) 
				   {  // success callback   
						 data = 1;
					   });	
				  
					   $("#sidebar").html('<ul><li class="nav-item links"><a class="nav-link sign_up">Kayıt Ol</a></li><li class="nav-item links"><a class="nav-link sign_in">Giriş Yap</a></li><li class="nav-item links"><a class="nav-link" href="sorular.html">Nasıl İşler?</a></li></ul>');	
					   $("#not_mobile").html('<ul class="d-flex justify-content-end"><li class="nav-item links"><a class="nav-link sign_up">Kayıt Ol</a></li><li class="nav-item links"><a class="nav-link sign_in">Giriş Yap</a></li><li class="nav-item links"><a class="nav-link" href="sorular.html">Nasıl İşler?</a></li></ul>');	
		
				   
				   // Because new elements are appended the event listeners before don't work so add the same event listeners.
				   $(".sign_up").click(function() 
				   {
					 if(!$("#sign_in_form").hasClass("hidden"))
					 {
					   $("#sign_in_form").addClass("hidden");
					 }
					 if(!$("#verification_div").hasClass("hidden"))
					 {
					   $("#verification_div").addClass("hidden");
					 }
					 if(!$("#forgotten_form").hasClass("hidden"))
					 {
					   $("#forgotten_form").addClass("hidden");
					 }
					 $(".explain_div").addClass("hidden");
					 $("#sign_up_form").removeClass("hidden");
				   });
				   
				   $(".sign_in").click(function() 
				   {
					 if(!$("#sign_up_form").hasClass("hidden"))
					 {
					   $("#sign_up_form").addClass("hidden");
					 }
					 if(!$("#verification_div").hasClass("hidden"))
					 {
					   $("#verification_div").addClass("hidden");
					 }
					 if(!$("#forgotten_form").hasClass("hidden"))
					 {
					   $("#forgotten_form").addClass("hidden");
					 }
					 $(".explain_div").addClass("hidden");
					 $("#sign_in_form").removeClass("hidden");
				   });
				 });

			$.ajax({
				type: 'GET',
				url: 'profil.php',
				data: {},
				success: function(data) { 
					function setCookie(cName, cValue, hours) {
						let date = new Date();
						date.setTime(date.getTime() + ( 2 * 3600 * 1000));
						const expires = "expires=" + date.toUTCString();
						document.cookie = cName + "=" + cValue + "; " + expires + "; path=/;" +"domain=.dersara.com.tr;;";
					}
					window.location.href = 'profil.php'
				},
				error: function(xhr, ajaxOptions, thrownerror) { }
			});
		}
		}).fail(function(data) {
			$("#sign_in_form").addClass('hidden');
			$("#after_sign_in").removeClass("hidden");
		});
	}
});

// For sign up and sign in forms' input elements  on input delete the error message
$(".sign_input").on("input", function(event) {
	$(this)[0].setCustomValidity("");
});

$("#pass_control").on("input", function(event){
	$("#sign_up_pass")[0].setCustomValidity("");
});

$("#sign_in_pass").on("input", function(event) {
	$("#sign_in_email")[0].setCustomValidity("");
});
  
$("#student").on("click", function(event){
	$("#teacher")[0].setCustomValidity("");
});

// If user submits the sign in form validate the input
$("#forgotten_form").submit(function(event) {
	var valid = 1;
	var $email = $("#forgotten_email");
  
	// Get the values of the input forms.
	var emailVal = $email.val();
	  
	// Regular expressions for validating email and password
	const MAILREGEXP = /^\S+\s?\@\S+\s?\.\S+\s?$/gi;
  
	if (emailVal.length === 0){
		valid = 0;
		$email[0].setCustomValidity("Bu alanı doldurmanız gerekmektedir");
		$email[0].reportValidity();
	}else if (emailVal.match(MAILREGEXP) === null){
		valid = 0;
		$email[0].setCustomValidity("Lütfen gerçek bir e-posta adresi yazınız");
		$email[0].reportValidity();
	}else if (emailVal.length > 255){
		valid = 0;
		$email[0].setCustomValidity("Lütfen daha kısa bir e-posta yazınız");
		$email[0].reportValidity();
	}
	
	if (!valid) {
		event.preventDefault();
	}else{
		$("#forgotten_form").addClass("hidden");
  		$("#verification_h1").empty();
  		$("#verification_p").empty();
  		$("#verification_h1").append("E-posta Hesabınıza Gönderildi")
  		$("#verification_p").append("Eğer sitemize kayıtlı " + emailVal + " adlı e-posta hesabınız varsa şifrenizi yenilemek için bir bağlantı gönderildi. Lüften spam(gereksiz) klasörünü de kontrol edin.");
		if($("#resend_submit").val())
		{
			$("#resend_submit").remove();
		}
		$("#verification_div").removeClass("hidden");
		event.preventDefault();
		$.post("forgotten.php?action=forgotten", {email: emailVal}, function(data) {
			if (data == -1){
				$email[0].setCustomValidity("Yanlış e-posta adresi ya da şifre girdiniz. Bu bilgileri hatırlamıyorsanız şifremi unuttuma tıklayın");
				$email[0].reportValidity();
			}else if (data == 0){
			$("#forgotten_form").addClass('hidden');
			$("#after_forgotten").removeClass("hidden");
			}
		}).fail(function(data) {
			$("#forgotten_form").addClass('hidden');
			$("#after_forgotten").removeClass("hidden");
		});
	}
});

$("#reset_form").submit(function(event) {
	var valid = 1;
	var $email = $("#reset_email");
	var emailVal = $email.val();

	var $password = $("#reset_password");
	var $passwordControl = $("#reset_confirm");
  
	// Get the values of the input forms.
	var passwordVal = $password.val();
	var passwordControlVal = $passwordControl.val();
   
	if (passwordVal.length === 0 ){
		valid = 0;
		$password[0].setCustomValidity("Bu alanı doldurmanız gerekmektedir");
		$password[0].reportValidity();
	}else if (passwordVal.length < 8){
		valid = 0;
		$password[0].setCustomValidity("Şifreniz en az 8 karakterden oluşmalıdır.");
		$password[0].reportValidity();
	}else if (passwordVal.length > 255){
		valid = 0;
		$password[0].setCustomValidity("Daha kısa bir şifre giriniz");
		$password[0].reportValidity();
	}

	if(!(passwordVal === passwordControlVal)){
		valid = 0;
		$password[0].setCustomValidity("Şifre alanları aynı olmalıdır")
		$password[0].reportValidity();
	}
	
	if (!valid) {
		event.preventDefault();
	}else{
		event.preventDefault();
		$.post("forgotten.php?action=reset", {email: emailVal, password: passwordVal}, function(data) {
			$(".alert").remove();
			if (data == -1){
				$("#verification_p").empty();
				$("#verification_h1").empty();
				$("#verification_h1").append("Veritabanında Sorun Yaşandı");
				$("#verification_p").append("Veritabanında yaşanan bir sorundan dolayı şifrenizi sıfırlayamadık. Lüften tekrar deneyiniz.");
				if($("#resend_submit").val())
				{
					$("#resend_submit").remove();
				}
				$("#verification_div").removeClass("hidden");
				setTimeout(function(){
					window.location.href = "index.html";
				},5000);
				return false;
			}else {
				$("#reset_form").hide();
				$("#verification_p").empty();
				$("#verification_h1").empty();
				$("#verification_h1").append("Şifreniz başarıyla sıfırlandı");
				$("#verification_p").append("Lütfen giriş yap butonuna tıklayarak giriş yapınız");
				if($("#resend_submit").val())
				{
					$("#resend_submit").remove();
				}
				$("#verification_div").removeClass("hidden");
				setTimeout(function(){
					window.location.href = "index.html";
				},5000);
				return false;
			}
		}).fail(function(data) {
			$("#reset_form").addClass('hidden');
			$("#verification_p").empty();
			$("#verification_h1").empty();
			$("#verification_h1").append("Veritabanında Sorun Yaşandı");
			$("#verification_p").append("Veritabanında yaşanan bir sorundan dolayı şifrenizi sıfırlayamadık. Lüften tekrar deneyiniz.");
			if($("#resend_submit"))
			{
				$("#resend_submit").remove();
			}
			$("#verification_div").removeClass("hidden");
			setTimeout(function(){
				window.location.href = "index.html";
			},5000);
			return false;
		});
	}
});

$("#forgot_pass").on('click', function (){
	$("#sign_in_form").addClass('hidden');
	if($("#resend_submit").val())
	{
		$("#resend_submit").remove();
	}
	$("#forgotten_form").removeClass('hidden');
});