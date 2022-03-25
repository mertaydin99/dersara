// This script send an ajax request to filter.php
$(document).ready(function() 
{
	if (Modernizr.mq('(max-width: 1025px)')) 
	{
	  $("#not_mobile").addClass("hidden");
	  $(".openbtn").on("click", function()
	  {
		if($("#sidebar").css("width") != "200px")
		{
		  $("#sidebar").css("width", "200px");
		  $("#main").css("margin-left", "200px");
		}
		else
		{
		  $("#sidebar").css("width", "0px");
		  $("#main").css("margin-left", "0px");
		}
	  })
	  $(".nav-link").on("click", function()
	  {
		  $("#sidebar").css("width", "0px");
		  $("#main").css("margin-left", "0px");
	  })
	}
	 
	else 
	{
  
	  $("#sidebar").addClass("hidden");
	  $("#main").addClass("hidden");
	  $(".openbtn").on("click", function()
	  {
		if($("#sidebar").css("width") != "200px")
		{
		  $("#sidebar").css("width", "200px");
		  $("#main").css("margin-left", "200px");
		}
		else
		{
		  $("#sidebar").css("width", "0px");
		  $("#main").css("margin-left", "0px");
		}
	  })
	}

	$(window).on('resize', function()
	{
	  if (Modernizr.mq('(max-width: 1025px)')) 
	  {
		if(!$("#not_mobile").hasClass("hidden"))
		{
		  $("#not_mobile").addClass("hidden");
		}
		if($("#main").hasClass("hidden"))
		{
		  $("#main").removeClass("hidden");
		}
		if($("#sidebar").hasClass("hidden"))
		{
		  $("#sidebar").removeClass("hidden");
		}
	  }
	  else
	  {
		if(!$("#main").hasClass("hidden"))
		{
		  $("#main").addClass("hidden");
		} 
		if(!$("#sidebar").hasClass("hidden"))
		{
		  $("#sidebar").addClass("hidden");
		}
		if($("#not_mobile").hasClass("hidden"))
		{
		  $("#not_mobile").removeClass("hidden");
		}
	  }
	})
	$("#logo").on("click", function()
	{
		window.location.href = "index.html";
	})
	$("#body").on("click", function()
	{
		$("#sidebar").css("width", "0px");
		$("#main").css("margin-left", "0px");
	})
	$("#info_banner").on("click", function()
	{
		$("#sidebar").css("width", "0px");
		$("#main").css("margin-left", "0px");
	})
	$("#search").on("click", function()
	{
		$("#sidebar").css("width", "0px");
		$("#main").css("margin-left", "0px");
	})
	$("#database_error").on("click", function()
	{
		$("#sidebar").css("width", "0px");
		$("#main").css("margin-left", "0px");
	})
	$("#not_found").on("click", function()
	{
		$("#sidebar").css("width", "0px");
		$("#main").css("margin-left", "0px");
	})
	// Get cookie Function
	function getCookie(cname) 
	{
	  let name = cname + "=";
	  let decodedCookie = decodeURIComponent(document.cookie);
	  let ca = decodedCookie.split(';');
	  for(let i = 0; i <ca.length; i++) 
	  {
		let c = ca[i];
		while (c.charAt(0) == ' ') 
		{
		  c = c.substring(1);
		}
		if (c.indexOf(name) == 0) 
		{
		  return c.substring(name.length, c.length);
		}
	  }
	  return "";
	}
	// If user's logged in change the links
  if(getCookie("logged_in") === "true")
  {
	if(getCookie("type") === "teacher")
    {
		
			
			$("#sidebar").html('<ul><li class="nav-item links"><a class="nav-link"  href="profil.php">Profilim</a></li><li class="nav-item links"><a class="nav-link" href="profil.php">Derslerim</a></li><li class="nav-item links"><a class="nav-link" href="index.html">Ana Sayfa</a></li><li class="nav-item links"><a class="nav-link sign_out">Çıkış Yap</a></li></ul>');		
			$("#not_mobile").html('<ul class="d-flex justify-content-end" id="links"><li class="nav-item links"><a class="nav-link" href="profil.php">Profilim</a></li><li class="nav-item links"><a class="nav-link" href="profil.php">Derslerim</a></li><li class="nav-item links"><a class="nav-link" href="index.html">Ana Sayfa</a></li><li class="nav-item links"><a class="nav-link sign_out">Çıkış Yap</a></li></ul>');		
		
    }
    else if(getCookie("type") === "student")
    {
		
			$("#sidebar").html('<ul><li class="nav-item links"><a class="nav-link" href="index.html">Ana Sayfa</a></li><li class="nav-item links"><a class="nav-link sign_out">Çıkış Yap</a></li></ul>');		
			$("#not_mobile").html('<ul class="d-flex justify-content-end" id="links"><li class="nav-item links"><a class="nav-link" href="index.html">Ana Sayfa</a></li><li class="nav-item links"><a class="nav-link sign_out">Çıkış Yap</a></li></ul>');		
		
    }
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
		
			$("#sidebar").html('<ul><li class="nav-item links"><a class="nav-link" href="index.html">Ana Sayfa</a></li><li class="nav-item links"><a class="nav-link" href="sorular.html">Nasıl İşler?</a></li></ul>');		
			$("#not_mobile").html('<ul id="links"><li class="nav-item links"><a class="nav-link"  href="index.html">Ana Sayfa</a></li><li class="nav-item links"><a class="nav-link" href="sorular.html">Nasıl İşler?</a></li></ul>');		
		
		
	  });
    	
  }
	// If user clicked the online or face2face or both filter the profiles of teachers
	$(".filter").on("change", function() 
	{		
		var inputVal = $("#search_input").val();
		var genderVal = $("#gender_options").val();
		if($('#face2face').is(':checked'))
		{
			var typeVal = "face2face";
			var cityVal = $("#select2city").val();
			var provinceVal = $("#province").val();
		}	
		else if($('#online').is(':checked'))
		{
			var typeVal = "online";
			var cityVal = null;
		}
		else
		{
			var typeVal = "none";
		}

		var minVal = $("#slider_min").val();
		var maxVal = $("#slider_max").val();
		var sortVal = $("#sortby").val();
		
  		$.getJSON("filter.php", {keyword : inputVal, type: typeVal, city: cityVal, province: provinceVal, gender: genderVal, min: minVal, max: maxVal, sort: sortVal } ,function(result)
  		{
			// If there is no result show info_div
			if(result === "none")
			{
				if(!$("#not_found").length)
				{
					$("#info_banner").after('<div id="not_found">Arama Sonucunuz Bulunamamıştır.</div>');
					$("#not_found").focus();
				}
				if($("#database_error").length)
				{
					$("#database_error").remove();
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
			for(i = 0; i < $(".profile").length; i++)
			{
				$(".profile").remove();
			}
			if(result !== "none")
			{
				for(i= 0; i < result.length; i++)
				{
					fname = result[i]['fname'];
					lname = result[i]['lname'];
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
					$("#profile_container").append('<div class="profile"><div class="profile_div profile_img_div"><img src="/images/profil_img.png" alt="profil resmi" class="profil_img" width="200px" height="200px" /><br /><button type="submit"  name="submit" value="submit" class="profil_submit" >Ders Talebi Oluştur</button></div><div class="profile_div profile_info_div"><div class="info_div"><h1></h1><br /><h2></h2></br /><p></p></div><div class="span_div"><span class="profile_span"><i><b>Saatlik Ücret</b></i></span>	<span class="profile_span"><i><b>Eğitim Türü</b></i></span><br /><span class="profile_span2"><b></b></span><span class="profile_span2"><b></b></span></div></div></div>');
					if(imgUrl !== null)
					{
						$(".profil_img").eq(i).attr("src", "/uploads/" + imgUrl);
					}
					fullName = fname + " "+ lname.toUpperCase()+".";
					$(".info_div").eq(i).children('h1').text(fullName);
					$(".info_div").eq(i).children('h2').text(title);
					$(".info_div").eq(i).children('p').text(introduction);

					$(".span_div").eq(i).children('.profile_span2').eq(0).text(price);
					$(".span_div").eq(i).children('.profile_span2').eq(1).text(preference);

			}
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

		}).fail(function() 
		{	
			if(!$("#database_error").length)
			{
				$("#info_banner").after('<div id="database_error">Veritabanındaki Bir Hatadan Dolayı Arama Gerçekleştirilememiştir.</div>');
				$("#database_error_found").focus();
			}
			
		})
		
	})
	// If the close icon clicked hide the info div.
	$("#demand_icon").click(function()
	{
		$("#demand_div").addClass("hidden");
		$("#img_div").empty();
		if($("#success_div").length)
		{
			$("#success_div").remove();
		}
		else if($("#fail_div").length)
		{
			$("#fail_div").remove();
		}
		if(	$("#demand_submit").length)
		{
			$("#demand_submit").remove();
		}
	})

	$("#fail_icon").click(function()
	{
		$("#fail_info").addClass("hidden");
	})

	// Update the remaining character
	$("#introduction").on('input', function(event)
	{
		var input = $("#introduction").val();
		var remaining = 800 - input.length;
		$("#character").text(remaining.toString()+ " karakter kaldı");
	});

})
