
// When the DOM is loaded load select2 on the selected jquery object
$(document).ready(function() 
{
  if (Modernizr.mq('(max-width: 1000px)')) 
  {
    $("#not_mobile").addClass("hidden");
    $(".sign_up").on("click", function()
    {
      $("#sidebar").css("width", "0px");
      $("#main").css("margin-left", "0px");
    })
    $(".sign_in").on("click", function()
    {
      $("#sidebar").css("width", "0px");
      $("#main").css("margin-left", "0px");
    })
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
  else 
  {
    $("#main").addClass("hidden");
    $("#sidebar").addClass("hidden");
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
    if (Modernizr.mq('(max-width: 1000px)')) 
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
  $("#reset_icon").click(function() 
{
  $("#reset_form").addClass("hidden");
});

  /* Add event listeners to sign up link and sign in link */
// When the sign in or sign up link clicked show up the form
// If the other show is already being showed, hide it.
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

  if(!$("#reset_form").hasClass("hidden"))
  {
    $("#reset_form").addClass("hidden");
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
  if(!$("#reset_form").hasClass("hidden"))
  {
    $("#reset_form").addClass("hidden");
  }   
  $(".explain_div").addClass("hidden");
  $("#sign_in_form").removeClass("hidden");
});

// When the x button is clicked hide the form
$("#sign_up_icon").click(function() 
{
  $("#sign_up_form").addClass("hidden");
});

$("#sign_in_icon").click(function() 
{
  $("#sign_in_form").addClass("hidden");
});
$("#verification_icon").click(function() 
{
  $("#verification_div").addClass("hidden");
});
$("#forgotten_icon").click(function()
{
  $("#forgotten_form").addClass("hidden");
})

// When the x button is clicked hide the error message
$("#after_sign_up_icon").click(function() 
{
  $("#after_sign_up").addClass("hidden");
});

// When the x button is clicked hide the error message
$("#after_sign_in_icon").click(function() 
{
  $("#after_sign_in").addClass("hidden");
});
$("#after_forgotten_icon").click(function()
{
  $("#after_forgotten").addClass("hidden");
})

// If user clicks on sign in link when he/she uses the sign up form, show sign in form
$("#change_sign_in").click(function() 
{
  $("#sign_up_form").addClass("hidden");
  $("#sign_in_form").removeClass("hidden");
});

// If user clicks on sign up link when he/she uses the sign in form, show sign up form
$("#change_sign_up").click(function() 
{
  $("#sign_in_form").addClass("hidden");
  $("#sign_up_form").removeClass("hidden");
});


// Show or hide password 
$("#sign_up_pass_show").on("click", function()
{
  $signUpPass = $("#sign_up_pass");
  if($signUpPass.attr("type") === "password")
  {
    $signUpPass.attr("type", "text");
  }
  else if($signUpPass.attr("type") === "text")
  {
    $signUpPass.attr("type", "password");
  }
})
$("#sign_up_control_show").on("click", function()
{
  $signUpPass = $("#pass_control");
  if($signUpPass.attr("type") === "password")
  {
    $signUpPass.attr("type", "text");
  }
  else if($signUpPass.attr("type") === "text")
  {
    $signUpPass.attr("type", "password");
  }
})

$("#sign_in_pass_show").on("click", function()
{
  $signUpPass = $("#sign_in_pass");
  if($signUpPass.attr("type") === "password")
  {
    $signUpPass.attr("type", "text");
  }
  else if($signUpPass.attr("type") === "text")
  {
    $signUpPass.attr("type", "password");
  }
})

$("#reset_pass_show").on("click", function()
{
  $signUpPass = $("#reset_password");
  if($signUpPass.attr("type") === "password")
  {
    $signUpPass.attr("type", "text");
  }
  else if($signUpPass.attr("type") === "text")
  {
    $signUpPass.attr("type", "password");
  }
})

$("#reset_confirm_show").on("click", function()
{
  $signUpPass = $("#reset_confirm");
  if($signUpPass.attr("type") === "password")
  {
    $signUpPass.attr("type", "text");
  }
  else if($signUpPass.attr("type") === "text")
  {
    $signUpPass.attr("type", "password");
  }
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
  
        $("#sidebar").html('<ul><li class="nav-item"><a class="nav-link" href="profil.php">Profilim</a></li><li class="nav-item"><a class="nav-link" href="profil.php">Derslerim</a></li><li class="nav-item links"><a class="nav-link" href="sorular.html">Nasıl İşler?</a></li><li class="nav-item"><a class="nav-link sign_out">Çıkış Yap</a></li></ul>');		
        $("#not_mobile").html('<ul class="d-flex justify-content-end"><li class="nav-item"><a class="nav-link" href="profil.php">Profilim</a></li><li class="nav-item"><a class="nav-link" href="profil.php">Derslerim</a></li><li class="nav-item links"><a class="nav-link" href="sorular.html">Nasıl İşler?</a></li><li class="nav-item"><a class="nav-link sign_out">Çıkış Yap</a></li></ul>');		
        
    }
    else if(getCookie("type") === "student")
    {
        $("#sidebar").html('<ul><li class="nav-item links"><a class="nav-link" href="sorular.html">Nasıl İşler?</a></li><li class="nav-item"><a class="nav-link sign_out">Çıkış Yap</a></li></ul>');		
        $("#not_mobile").html('<ul class="d-flex justify-content-end"><li class="nav-item links"><a class="nav-link" href="sorular.html">Nasıl İşler?</a></li><li class="nav-item"><a class="nav-link sign_out">Çıkış Yap</a></li></ul>');		
    }
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
})
