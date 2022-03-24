
// This script send an ajax request to php script below 
$(document).ready(function() 
{	  
	var inputVal = $("#search_input").val();
  $.getJSON("get_info.php", {keyword : inputVal } ,function(result)
  {
	for(i= 0; i < result.length; i++)
	{
		// If there is not any result show info div
		if(result === "none")
		{
			if(!$("#not_found").length)
			{
				$("#info_banner").after('<div id="not_found">Arama Sonucunuz Bulunamamıştır.</div>');
				$("#not_found").focus();
				if($("#database_error").length)
				{
					$("#database_error").remove();
				}
				break;
			}
		}
		else
		{
			if($("#not_found").length)
			{
				$("#not_found").remove();
			}
			if($("#database_error").length)
			{
				$("#database_error").remove();
			}
		}
		fname = result[i]['fname'];
		lname = result[i]['lname'];
		gender = result[i]['gender'];
		title = result[i]['title'];
		imgUrl = result[i]['img_url'];
		introduction = result[i]['introduction'];
		preference = result[i]['preference'];
		price = result[i]['price'];

		if(preference === "face2face")
		{
			preference = "Yüzyüze";
		}
		else if(preference === "online")
		{
			preference = "Online";
		}
		else if(preference === "both")
		{
			preference = "Yüzyüze ve Online";
		}

		// Add a profile div.
		$("#profile_container").append('<div class="profile"><div class="profile_div profile_img_div"><img src="/images/profil_img.png" alt="profil resmi" class="profil_img" width="300px" height="300px" /><br /><button type="submit"  name="submit" value="submit" class="profil_submit">Ders Talebi Oluştur</button></div><div class="profile_div profile_info_div"><div class="info_div"><h1></h1><br /><h2></h2></br /><p></p></div><div class="span_div"><span class="profile_span"><i><b>Saatlik Ücret</b></i></span>	<span class="profile_span"><i><b>Eğitim Türü</b></i></span><br /><span class="profile_span2"><b></b></span><span class="profile_span2"><b></b></span></div></div></div>');
		
		$(".profil_img").eq(i).attr("src", "/uploads/" + imgUrl);
		fullName = fname + " " + lname.toUpperCase() + ".";
		$(".info_div").eq(i).children('h1').text(fullName);
		$(".info_div").eq(i).children('h2').text(title);
		$(".info_div").eq(i).children('p').text(introduction);

		$(".span_div").eq(i).children('.profile_span2').eq(0).text(price);
		$(".span_div").eq(i).children('.profile_span2').eq(1).text(preference);
	}
		$(".profil_submit").click(function() 
		{
			$demandForm = $("#demand_div");
			$demandForm.removeClass("hidden");
			$profil_img =  $(this).prev().prev().clone();
			$profil_img.attr("id", "demand_profile_img");
			$demandForm.find("#img_div").append($profil_img);
			$name = $(this).parent().next().find(".info_div").find("h1").clone();
			$demandForm.find("#img_div").append($name);
			// Add a demand_submit with each click of the profil submit button.
			if(!$("#demand_submit").length)
			{
				$("#demand_form").append('<button type="submit" id="demand_submit">Talebinizi Oluşturun</button>');
			}
			$("#introduction").focus();
		})
	}).fail(function() {
		if(!$("#database_error").length)
		{
			$("#info_banner").after('<div id="database_error">Veritabanındaki Bir Hata Yüzünden Aramanız Gerçekleştirilememiştir. Bir Daha Deneyiniz.</div>');
			$("#database_error_found").focus();
		}
	})
	
	
})



// Price Slider Update the spans when the price changes
document.getElementById("slider_min").addEventListener("input", function(e) {
	var sliderMin = document.getElementById("slider_min").value
	document.getElementById("min").innerHTML = sliderMin.concat("", "TL");

})

document.getElementById("slider_max").addEventListener("input", function(e) {
	var sliderMax = document.getElementById("slider_max").value
	document.getElementById("max").innerHTML = sliderMax.concat("", "TL");

})


$("#face2face").on("click", function()
{
	
	$("#city").removeClass("hidden");		

})
$("#online").on("click", function()
{
	
	$("#city").addClass("hidden");		
})