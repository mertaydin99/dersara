$("#profil_form").submit(function(event) {
	var valid = 1;
	var $introduction = $("#introduction");
	var $topic = $("#keyword");
	var $title = $("#title");
	var $price = $("#slider_min");
	
  
	// Get the values of the input forms.
	var introductionVal = $introduction.val();
	var genderVal = $('input[name="gender"]:checked').val();
	console.log(genderVal);
	var topicVal = $topic.val();
	var titleVal =  $title.val();
	var priceVal = $price.val();

	// If the teacher's selected face to face education get the city value
	if(!$("#city").hasClass("hidden"))
	{
		var cityVal = $("#city option:selected").text();
		var provinceVal = $("#province").val();
		if(provinceVal === 0)
		{
			valid = 0;
			$("#province")[0].setCustomValidity("Bu alanı doldurmanız gereklidir");
			$("#province")[0].reportValidity();
		}
		if(provinceVal > 300)
		{
			valid = 0;
			$("#province")[0].setCustomValidity("300 karakteri aştınız");
			$("#province")[0].reportValidity();
		}
	}
	else
	{
		$("#select2city").val("");
		$("#province").val("");
	}

	// Check if the chekbox is checked
	if (!genderVal)
	{
		valid = 0;
		$("#male")[0].setCustomValidity("Seçeneklerden birini seçiniz.");
		$("#male")[0].reportValidity();
	}	
	
	if (introductionVal.length === 0)
	{
	  valid = 0;
	  $introduction[0].setCustomValidity("Bu alanı doldurmanız gerekmektedir");
	  $introduction[0].reportValidity();
	}
	else if (introductionVal.length > 800)
	{
	  valid = 0;
	  $introduction[0].setCustomValidity("800 karakteri aştınız.");
	  $introduction[0].reportValidity();
	}

	if(titleVal.length === 0)
	{
		valid = 0;
		$title[0].setCustomValidity("Bu alanı doldurmanız gereklidir");
		$title[0].reportValidity();
	}
	else if(titleVal.length > 100)
	{
		valid = 0; 
		$title[0].setCustomValidity("100 karakteri aştınız");
		$title[0].reportValidity();
	}
	
	// If none of the checkbox have been checked display a warning message
	if( !($('input[name="face2face"]').is(':checked') || $('input[name="online"]').is(':checked')))
	{
		valid = 0;
		$("#face2face")[0].setCustomValidity("Seçeneklerden birini seçiniz");
		$("#face2face")[0].reportValidity();
	}
	
	if(priceVal < 0 || priceVal > 2000 )
	{
		valid = 0;
	}
	if (topicVal.length === 0)
	{
	  valid = 0;
	  $topic[0].setCustomValidity("Bu alanı doldurmanız gerekmektedir");
	  $topic[0].reportValidity();
	}
	else if (topicVal.length > 200)
	{
	  valid = 0;
	  $topic[0].setCustomValidity("200 karakteri aştınız.");
	  $topic[0].reportValidity();
	}

	// Image size and type validation   
	// Check if the image's size is bigger than 2mb if so display an error message above the image
	// If there is an error div already and the user tries to resent the form remove the error divs
	if($("#error_div1").length)
	{
		$("#error_div1").remove();
	}
	if($("#error_div2").length)
	{
		$("#error_div2").remove();
	}
	if($("#error_div3").length)
	{
		$("#error_div3").remove();
	}
	if($("#error_div4").length)
	{
		$("#error_div4").remove();
	}
	if($("#error_div5").length)
	{
		$("#error_div5").remove();
	}
	if($("#success_div1").length)
	{
		$("#success_div1").remove();
	}

	if($("#profil_submit").val() !== "editbutimage" && $("#profil_submit").val() !== "profil_img")
	{

		var fileSize = $('#upload')[0].files[0].size;
		if(fileSize > 2097152) 
		{
			valid = 0;
			$("<div class='alert alert-danger' id='error_div1' role='alert' tabindex='1'>Fotoğraf 2mb boyutundan büyük olmamalıdır.</div>").insertBefore("#profil_h1");
			$("#error_div1").focus();
		}
		// Check if the image's type is appropriate if not display an error message above the image
		var imgType = $('#upload').val().split('.').pop().toLowerCase();
		if($.inArray(imgType, ['png','jpg','jpeg']) == -1) 
		{
			valid = 0;
			$("<div class='alert alert-danger' id='error_div2' role='alert' tabindex='2'>Fotoğrafın türü png, jpg veya jpeg olmalıdır.</div>").insertBefore("#profil_h1");
			$("#error_div2").focus();
		}
		
		// Validate image resolution
		var width = $("#profil_img").width();
		var height = $("#profil_img").height();	

		if(width < 300 || height < 300)
		{
			valid = 0;
			$("<div class='alert alert-danger' id='error_div3' role='alert' tabindex='3'>Fotoğraf en az 300x300 piksel boyutunda olmalıdır.</div>").insertBefore("#profil_h1");
			$("#error_div3").focus();
		}
	}

	if (!valid)  
	{
	  event.stopImmediatePropagation();
	  event.preventDefault();
	}
	
});

 // For  input elements  on input delete the error message
 $(".profil_input").on("input", function(event) 
 {
   $(this)[0].setCustomValidity("");
 });
 $("input[name='gender']").on("click", function(event)
 {
	$("#male")[0].setCustomValidity("");
 })

 $("#online").on("input", function(event)
 {
	$("#face2face")[0].setCustomValidity("");
 })