// Add event listener for upload button
// When the upload button is clicked open folder browser in computer.

// When the DOM is loaded load select2 on the selected jquery object
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
		  $("#main").css("margin-left", "200px");$(window).on('resize', function()
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
    $(".js-example-basic-single").select2();
	  // When user clicks sign out delete the cookie and return to the home page
	  $(".sign_out").click(function()
	  {
		 var delete_cookie = function(name) 
		 {
			 document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;' + "; path=/;" + "domain=.dersara.com.tr;";
		 };
		 delete_cookie("logged_in");
		 delete_cookie("type");
	
		 // To remove all sessions 
		 $.get('delete.php', function (data, textStatus, jqXHR) 
		 {  // success callback   
			 data = 1;
		   });	
		window.location.href="index.html"
	   });

	$("#upload").change(function(event) 
	{
		var src = URL.createObjectURL(this.files[0]);
		$("#profil_img").attr('src', src);
	});

	$("#introduction").on('input', function(event)
	{
		var input = $("#introduction").val();
		var remaining = 800 - input.length;
		$("#character").text(remaining.toString()+ " karakter kaldı");
	});
	$("#province").on('input', function(event)
	{
		var input = $("#province").val();
		var remaining = 300 - input.length;
		$("#province_character").text(remaining.toString()+ " karakter kaldı");
	});

	$("#title").on('input', function(event)
	{
		var input = $("#title").val();
		var remaining = 100 - input.length;
		$("#title_character").text(remaining.toString()+ " karakter kaldı");

	});

	$("#keyword").on('input', function(event)
	{
		var input = $("#keyword").val();
		var remaining = 200 - input.length;
		$("#char").text(remaining.toString()+ " karakter kaldı");
	});


	$("#face2face").change(function() 
	{
		if($("#city").hasClass("hidden"))
		{
			$("#city").removeClass("hidden");
		}
		else
		{
			$("#city").addClass("hidden");
		}
	});

	// When user clicks to profile link remove the content of profille
	$(".profil").on("click", function()
	{
		$("#lessons_div").addClass("hidden");
		$("#body").removeClass("hidden");
		$(".lessons").removeClass("active");
		$(this).addClass("active");
	})
	// When user clicks to messages remove the content of profile and get messages
	$(".lessons").on("click", function()
	{
		$("#body").addClass("hidden");
		$("#lessons_div").removeClass("hidden");
		$(".profil").removeClass("active");
		$(this).addClass("active");
		// If there is already warning from before remove the info boxes so that new ones can be appended
		if($("#error_div8").length)
		{
			$("#error_div8").remove();
		}
		if($("#error_div10").length)
		{
			$("#error_div10").remove();
		}
		if($("#success_div2").length)
		{
			$("#success_div2").remove();
		}
		$.getJSON("get_demands.php", function(result)
		{
			for(i= 0; i < result.length; i++)
			{
				fullName = result[i]['name'];
				introduction = result[i]['introduction'];
				preference = result[i]['preference'];
				who = result[i]['who'];
				email = result[i]['email'];
				telephone = result[i]['telephone'];
				date = result[i]['date'];
				if(who === "myself")
				{
					who = "Kendim İçin";
				}
				else if(who === "other")
				{
					who = "Başkası Adına";
				}
				if(preference === "face2face")
				{
					preference = "Yüz Yüze";
				}
				else if(preference === "online")
				{
					preference = "Online";
				}
				// Add a generic div
				$("#lessons_div").append('<div class="demands_div"><div class="demands_img_div"><img class="demands_img" alt="Öğrenci Logo" src="/images/students.jpeg" /></div><div><b>Öğrencinin İsmi: </b><span class="name"></span></div><div><b>Öğrencinin Tanıtımı:</b><span class="introduction"></span> </div><div><b>Öğrencinin Tercihi:</b><span class="preference"></span></div><div><b>Ders Talebi Kimin Adına:</b><span class="who"></span> </div><div><b>E-posta:</b><span class="email"></span> </div><div><b>Telefon Numarası:</b><span class="telephone"></span></div><div><b>Tarih:</b><span class="date"></span></div><button type="submit"  name="demand_submit" value="delete" class="demand_submit" >Bu Kaydı Silin</button></div>');
				$(".name").eq(i).append(fullName);
				$(".introduction").eq(i).append(introduction);
				$(".preference").eq(i).append(preference);
				$(".who").eq(i).append(who);
				$(".email").eq(i).append(email);
				$(".telephone").eq(i).append(telephone);
				$(".date").eq(i).append(date);			
				
			}
			$(".demand_submit").on("click", function()
			{			
				$parent = $(this).parent();
				fullName = $parent.find(".name").text();
				introduction = $parent.find(".introduction").text();
				preference = $parent.find(".preference").text();
				who = $parent.find(".who").text();
				email = $parent.find(".email").text();
				telephone = $parent.find(".telephone").text();
				date = $parent.find(".date").text();
				if(preference === "Yüz Yüze")
				{
					preference = "face2face";
				}
				else if(preference === "Online")
				{
					preference = "online";
				}
				if(who === "Başkası Adına")
				{
					who = "other";
				}
				else if(who === "Kendim İçin")
				{
					who = "myself";
				}
				$.get("delete_demand.php", { name: fullName, introduction: introduction, preference: preference, who: who, email: email, telephone: telephone, date: date}, function(data)
				{
					if(data == 1)
					{
						if(!$("#success_div2").length)
						{
							$("#demand_h1").after("<div class='alert alert-success'  id='success_div2' role='alert' tabindex='12'>Kayıt Başarıyla Silinmiştir</div>");
							$("#success_div2").focus();
						}
						else
						{
							$("#success_div2").focus();
						}
						$parent.remove();
					}
					else if(data == -1)
					{
						if(!$("#error_div10").length)
						{
							$("#demand_h1").after("<div class='alert alert-danger'  id='error_div10' role='alert' tabindex='8'>Veritabanında yaşanan bir problemden dolayı kayıt silinememiştir. Sık sık bu hatayla karşılaşıyorsanız iletişim kanallarımız şunlardır: E-posta: mertaydin991@hotmail.com Telefon: 05340783343")
							$("#error_div10").focus();
						}
						else
						{
							$("#error_div10").focus();
						}

					}
				})

			})	
			}).fail(function(textStatus) {
				if(!$("#error_div8").length)
				{
					$("#demand_h1").after("<div class='alert alert-danger'  id='error_div8' role='alert' tabindex='7'>Henüz Ders Talebiniz Bulunmamaktadır");
					$("#error_div8").focus();
				}
				else
				{
					$("#error_div8").focus();
				}
		
		})
	}
	)
	

});


// Price Slider Update the spans when the price changes
document.getElementById("slider_min").addEventListener("input", function(e) {
	var sliderMin = document.getElementById("slider_min").value
	document.getElementById("min").innerHTML = sliderMin.concat("", "TL");

})



