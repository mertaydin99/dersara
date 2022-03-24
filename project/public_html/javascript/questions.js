$(function() 
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

    $( "#accordion" ).accordion();
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
		
			$("#sidebar").html('<ul><li class="nav-item links"><a class="nav-link" href="profil.php">Profilim</a></li><li class="nav-item"><a class="nav-link" href="profil.php">Derslerim</a></li><li class="nav-item links"><a class="nav-link" id="main_page" href="index.html">Ana Sayfa</a></li><li class="nav-item"><a class="nav-link sign_out">Çıkış Yap</a></li></ul>');		
			$("#not_mobile").html('<ul class="d-flex justify-content-end" id="links"><li class="nav-item links"><a class="nav-link" href="profil.php">Profilim</a></li><li class="nav-item"><a class="nav-link" href="profil.php">Derslerim</a></li><li class="nav-item links"><a class="nav-link" id="main_page" href="index.html">Ana Sayfa</a></li><li class="nav-item"><a class="nav-link sign_out">Çıkış Yap</a></li></ul>');		
		
	}
	else if(getCookie("type") === "student")
	{
			$("#sidebar").html('<ul><li class="nav-item links"><a class="nav-link" id="main_page" href="index.html">Ana Sayfa</a></li><li class="nav-item"><a class="nav-link sign_out">Çıkış Yap</a></li></ul>');		
		
			$("#not_mobile").html('<ul class="d-flex justify-content-end" id="links"><li class="nav-item links"><a class="nav-link" id="main_page" href="index.html">Ana Sayfa</a></li><li class="nav-item"><a class="nav-link sign_out">Çıkış Yap</a></li></ul>');		
	}
	// When user clicks sign out delete the cookie and return the page to the initial state
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
		
		
			$("#sidebar").html('<ul><li class="nav-item links"><a class="nav-link" href="sorular.html">Nasıl İşler?</a></li><li class="nav-item links"><a class="nav-link"  href="index.html">Ana Sayfa</a></li></ul>');	
		
			$("#not_mobile").html('<ul id="links"><li class="nav-item links"><a class="nav-link" href="sorular.html">Nasıl İşler?</a></li><li class="nav-item links"><a class="nav-link"  href="index.html">Ana Sayfa</a></li></ul>');	
			
	});

	}

} );


