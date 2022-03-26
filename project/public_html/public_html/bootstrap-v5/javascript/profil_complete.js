// Check if user uploaded a new image instead of displayed image coming from database
function isImageUpdated  (imgUrl) 
{
  if($("#profil_img").attr("src") === "/uploads/" + imgUrl)
      {
        $("#profil_submit").val("editbutimage");
      }
}

// This script send an ajax request to php script below and fills the information of user's profile
$(document).ready(function() 
{
  $.getJSON("profil_complete.php", function(result)
  {
     var imgUrl = result.img_url;
    // If getJSON is successfull add an info box to inform the user
    $("<div class='alert alert-success'  id='success_div1' role='alert' tabindex='5'>Profiliniz tamamlanmıştır.Değiştirmek istediğiniz bilgi varsa düzenleyip profilimi düzenle butonuna basınız</div>").insertBefore("#profil_h1");
		$("#success_div1").focus();
    // Fill in all of the profile information coming from database

    // If it is not standard profil_img.png
    if(imgUrl !== null)
    {
      $("#profil_img").attr("src", "/uploads/" + result.img_url);
    }
    if(result.gender === "m")
    {
      $("#male").prop("checked", true);
    }
    else if(result.gender === "f")
    {
      $("#female").prop("checked", true);
    }

    $("#introduction").val(result.introduction);
    $("#title").val(result.title);
    $("#slider_min").val(result.price);
    $("#min").text(result.price.toString() + "TL");
    
  
    switch (result.preference)
    {
      case "face2face":
        $("#face2face").prop("checked", true);
        $("#city").removeClass("hidden");
        $("#select2city").val(result.city).trigger('change');
        $("#province").val(result.province).trigger('change');
        break;
      case "online":
        $("#online").prop("checked", true);
        break;
      case "both":
        $("#face2face").prop("checked", true);
        $("#online").prop("checked", true);
        $("#city").removeClass("hidden");
        $("#select2city").val(result.city).trigger('change');
        $("#province").val(result.province).trigger('change');
        break;     
    }

    $("#keyword").val(result.keyword);

    // Change the text and value of the submit button
    $("#profil_submit").text("Profilimi Düzenle");
    $("#profil_submit").val("edit");

    // If the user did not update the image coming from database let the php script know so that it updates everyting but image
    // If it is not standard profil_img.png
      $("#profil_submit").click(function() 
      {
        isImageUpdated(imgUrl);
        $("#upload").change(function()
        {
          $("#profil_submit").val("edit");
        });
      });
   


    // Update the remaining char counter
    var input = $("#keyword").val();
	  var remaining = 200 - input.length;
	  $("#char").text(remaining.toString()+ " karakter kaldı");

    input = $("#introduction").val();
	  remaining = 800 - input.length;
	  $("#character").text(remaining.toString()+ " karakter kaldı");

    input = $("#title").val();
	  remaining = 100 - input.length;
	  $("#title_character").text(remaining.toString()+ " karakter kaldı");

    // Set cookie for the type of the user
    function setCookie(cName, cValue, hours) 
		{
			let date = new Date();
			date.setTime(date.getTime() + ( 1 * 3600 * 1000));
			const expires = "expires=" + date.toUTCString();
			document.cookie = cName + "=" + cValue + "; " + expires + "; path=/;";		
		}
		// Apply setCookie
		setCookie('type', 'teacher', 2);
  })
  .fail(function(textStatus) 
  {
    // If profile is not complete show a warning box
    if(textStatus.responseText === "Not Complete")
    {
      $("<div class='alert alert-danger'  id='error_div5' role='alert' tabindex='6'>Profiliniz tamamlanmamıştır. Öğrencilerin aramalarında gözükmek istiyorsanız lütfen profilinizi tamamlayınız.</div>").insertBefore("#profil_h1");
			$("#error_div5").focus();
      $("#profil_submit").click(function()
      {
        if($("#profil_img").attr("src") === "/images/profil_img.png")
        {
          $("#profil_submit").val("profil_img");
          $("#upload").change(function()
          {
            $("#profil_submit").val("submit");
          });
        }
      });
    }
    // If there is any error inform the user about the error
    else
    {
    $("<div class='alert alert-danger'  id='error_div4' role='alert' tabindex='4'>Veritabanına bağlanırken bir sorun yaşandı. Sayfayı yenileyiniz.</div>").insertBefore("#profil_h1");
			$("#error_div4").focus();
    }
  })
});