// If user submits the demand form validate the input
$("#demand_form").submit(function(event) 
{
	var valid = 1;
	var $fullname = $("#demand_name");
	var $introduction = $("#introduction");
	var $who = $("#who");
	var $type = $("#type");
	var $email = $("#demand_email");
	var $telephone = $("#demand_tel");

	var fullnameVal = $fullname.val();
	var introductionVal = $introduction.val();
	var whoVal = $who.val();
	var typeVal = $type.val();
	var emailVal = $email.val();
	var telephoneVal = $telephone.val();

	var profilImg =  $(this).parent().find("#img_div").find("img").attr("src");
	profilImg = profilImg.split("/uploads/")[1];
	// Regular expressions for validating email 
	const MAILREGEXP = /^\S+\s?\@\S+\s?\.\S+\s?$/gi;

	try
	{
	  emailVal= emailVal.trim();
	}
	catch
	{
	  emailVal = emailVal.replace(/^\s+|\s+$/g, '');
	} 
	if(fullnameVal.length === 0)
	{
		valid = 0; 
		$fullname[0].setCustomValidity("Bu alanı doldurmanız gerekmektedir");
		$fullname[0].reportValidity();
	}
	else if(fullnameVal.length > 200)
	{
		valid = 0; 
		$fullname[0].setCustomValidity("Lütfen daha kısa bir isim yazınız.");
		$fullname[0].reportValidity();
	}
	if(introductionVal.length === 0)
	{
		valid = 0;
		$introduction[0].setCustomValidity("Bu alanı doldurmanız gerekmektedir");
		$introduction[0].reportValidity();
	}
	else if(introductionVal.length > 800)
	{
		valid = 0;
		$introduction[0].setCustomValidity("800 karakteri aştınız");
		$introduction[0].reportValidity();
	}

	if(emailVal.length === 0 && telephoneVal.length === 0 )
	{
		valid = 0;
		$email[0].setCustomValidity("E-posta ya da telefon alanlarından birini doldurmanız gerekmektedir");
		$email[0].reportValidity();
	}

	if(emailVal.length > 0)
	{
		if (emailVal.match(MAILREGEXP) === null)
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
	}

	if (!valid)  
	{
		event.preventDefault();
	}
	else
	{
		event.preventDefault();
	  	$.get("demand.php", {name: fullnameVal, introduction: introductionVal, who: whoVal, type: typeVal, who: whoVal, email: emailVal, telephone: telephoneVal, img: profilImg}, function(result) 
	  	{
			  if(result === "1")
			  {	
				  $("#demand_submit").remove();
				  $("#demand_form").prepend('<div id="success_div">Ders talebiniz başarıyla alınmıştır. Ders talebinde bulunduğunuz hocanın programı müsaitse sizinle belirttiğiniz iletişim yollarıyla irtibat kuracaktır.</div>')
				  $("#success_div").focus();
			  }
			  else if(data === "Error")
			  {	
				$("demand_submit").remove();
				$("#demand_form").prepend('<div id="fail_div">Veritabanındaki aksaklıktan ötürü talebiniz alınamamıştır. Bu durumu sık sık yaşıyorsanız bizimle iletişime geçebilirsiniz: Telefon: 05340783343 E-posta: mertaydin991@hotmail.com</div>')
				$("#fail_div").focus();
			  }

		})
	}


})

 // For  input elements  on input delete the error message
 $(".demand_input").on("input", function(event) 
 {
   $(this)[0].setCustomValidity("");
 });

 $(".demand_input2").on("input", function(event)
 {
	$("#demand_email")[0].setCustomValidity("");
 })