<?php
session_start();

if (empty($_SESSION['logged_in']))
{
	header("Location: index.html");
	exit();
}
?>

<!DOCTYPE html>
<html lang="tr">
	<head>
		<title>Profilim</title>
		<meta charset="UTF-8">
		<meta name="description" content="profilim" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, 
					maximum-scale=1, user-scalable=no" />
		<style> 
		/* vietnamese */
@font-face {
  font-family: 'Muli';
  font-style: normal;
  font-weight: 300;
  src: url(https://fonts.gstatic.com/s/muli/v26/7Auwp_0qiz-afT3GLRrX.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Muli';
  font-style: normal;
  font-weight: 300;
  src: url(https://fonts.gstatic.com/s/muli/v26/7Auwp_0qiz-afTzGLRrX.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Muli';
  font-style: normal;
  font-weight: 300;
  src: url(https://fonts.gstatic.com/s/muli/v26/7Auwp_0qiz-afTLGLQ.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* vietnamese */
@font-face {
  font-family: 'Muli';
  font-style: normal;
  font-weight: 400;
  src: url(https://fonts.gstatic.com/s/muli/v26/7Auwp_0qiz-afT3GLRrX.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Muli';
  font-style: normal;
  font-weight: 400;
  src: url(https://fonts.gstatic.com/s/muli/v26/7Auwp_0qiz-afTzGLRrX.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Muli';
  font-style: normal;
  font-weight: 400;
  src: url(https://fonts.gstatic.com/s/muli/v26/7Auwp_0qiz-afTLGLQ.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* vietnamese */
@font-face {
  font-family: 'Muli';
  font-style: normal;
  font-weight: 600;
  src: url(https://fonts.gstatic.com/s/muli/v26/7Auwp_0qiz-afT3GLRrX.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Muli';
  font-style: normal;
  font-weight: 600;
  src: url(https://fonts.gstatic.com/s/muli/v26/7Auwp_0qiz-afTzGLRrX.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Muli';
  font-style: normal;
  font-weight: 600;
  src: url(https://fonts.gstatic.com/s/muli/v26/7Auwp_0qiz-afTLGLQ.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* vietnamese */
@font-face {
  font-family: 'Muli';
  font-style: normal;
  font-weight: 700;
  src: url(https://fonts.gstatic.com/s/muli/v26/7Auwp_0qiz-afT3GLRrX.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Muli';
  font-style: normal;
  font-weight: 700;
  src: url(https://fonts.gstatic.com/s/muli/v26/7Auwp_0qiz-afTzGLRrX.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Muli';
  font-style: normal;
  font-weight: 700;
  src: url(https://fonts.gstatic.com/s/muli/v26/7Auwp_0qiz-afTLGLQ.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* vietnamese */
@font-face {
  font-family: 'Muli';
  font-style: normal;
  font-weight: 800;
  src: url(https://fonts.gstatic.com/s/muli/v26/7Auwp_0qiz-afT3GLRrX.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Muli';
  font-style: normal;
  font-weight: 800;
  src: url(https://fonts.gstatic.com/s/muli/v26/7Auwp_0qiz-afTzGLRrX.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Muli';
  font-style: normal;
  font-weight: 800;
  src: url(https://fonts.gstatic.com/s/muli/v26/7Auwp_0qiz-afTLGLQ.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}

		</style>
		<style> 
		html, body
{
	height: 100%;
}
.row
{
	padding: 0px;
}
.column
{
	padding: 0px;
}
.main_container
{
	height: 100%;
	max-width: 100%;
	padding: 0px;
}
#body
{
	display: flex;
	flex-direction: column;
	background-color: rgb(249, 249, 252);
}
#not_mobile
{
	width: 100%;
}
ul{
	margin: 0px;
	padding:  0px;
}
#navbar
{
	position: static;
	display: flex;
	justify-content: left;
	height: 10%;
	max-width: 100%;
}
.alert
{
	position: static;
}
.navbar-brand
{
	margin-left: 15px;
}
#logo
{
	width: 70%;
	display: block;

}

#links
{
	display: flex;
	flex-direction: row;
	justify-content: left;
	list-style-type: none;
	width: 100%;
	padding: 0px;
	margin: 0px;
	max-width: 100%;
	height: 100%;
}
.links
{
	margin-top: 1%;
}
.nav-item
{	
	display: block;
	width: 20%;
	margin-right: 3%;
	max-width: 100%;
}
li a
{
	display: inline-block;
	width: 100%;
	height: 50%;
	color: black;
	text-decoration: none;
	font-family: 'Muli', 'Arial', 'Verdana', 'sans-serif';
	font-style: normal;
	font-weight: 600;
	font-size: 103%;
	text-align: center;
	line-height: 100%;
}
li a:hover
{	border-bottom: 2px solid black;
}
.active
{
	border-bottom: 2px solid blue;
}
#profil_photo
{

	display: flex;
	flex-direction: column;
	margin: auto;
	margin-top: 3%;	
	border-top-left-radius: 6px;
	border-top-right-radius: 6px;
	border-bottom-left-radius: 6px;
	border-bottom-right-radius: 6px;
	font-family: 'Muli', 'Arial', 'Verdana', 'sans-serif';
	color: #4D4D4D;
	background-color: white;
	border: 1px solid white;
	max-width: 100%;
	width: 70%;
	text-align: center;
}
.select2-container--default .select2-selection--single
{
	width: 200px !important;
}
#profil_h1
{
	padding-bottom: 10px;
}
#img_div
{
	margin: auto;
	max-width: 100%;
}
#profil_img
{
	max-width: 100%;
	height: 300px;
	width: 300px;
}
#requirement_span
{
	margin-top: 5%;
	margin: auto;
	text-align: center;
	width: 70%;
	
}
#requirements
{
	display: inline-block;
	margin-top: 2%;

}

#upload
{
	display: none;
}
#upload_label
{
	width: 50%;
	margin: auto;
	padding: 10px;
	font-family: 'Muli', 'Arial', 'Verdana', 'sans-serif';
	border-top-left-radius: 4px;
	border-top-right-radius: 4px;
	border-bottom-left-radius: 4px;
	border-bottom-right-radius: 4px;
	background-color: white;
	border: 1px solid red;
	color: red;
	outline: none;
	cursor: pointer;
}
#personal_info
{
	margin: auto;
	margin-top: 3%;
	padding-top: 2%;
	border-top-left-radius: 6px;
	border-top-right-radius: 6px;
	border-bottom-left-radius: 6px;
	border-bottom-right-radius: 6px;
	font-family: 'Muli', 'Arial', 'Verdana', 'sans-serif';
	color: #4D4D4D;
	background-color: white;
	border: 1px solid white;
	text-align: center;
	max-width: 100%;
	width: 70%;
}
#fname, #lname
{
	width: 45%;
	padding-left: 10px;
}
#fname
{
	margin-right: 3%;
}
.name_label
{
	width: 45%;
	margin-right: 3%;
}

#intro_title
{
	display: inline-block;
	font-family: 'Muli', 'Arial', 'Verdana', 'sans-serif';
	font-size: 18px;
	font-weight: bold;
	line-height: normal;
	padding-top: 2%;
}
 .profile_ul
 {
	 margin: auto;
 }
 #preference_div
 {
	 width: 70%;
	 margin: auto;
 }

 #keyword_ul
 {
	 width: 70%;
	 text-align: left;
 }
#introduction
{
	width: 70%;
	padding-left: 10px;
	margin-top: 1%;
}
#province
{
	width: 70%;
	padding-left: 10px;
	margin-top: 1%;
}
#preferences
{
	margin: auto;
	margin-top: 3%;
	padding-top: 2%;
	border-top-left-radius: 6px;
	border-top-right-radius: 6px;
	border-bottom-left-radius: 6px;
	border-bottom-right-radius: 6px;
	font-family: 'Muli', 'Arial', 'Verdana', 'sans-serif';
	color: #4D4D4D;
	background-color: white;
	border: 1px solid white;
	text-align: center;
	max-width: 100%;
	width: 70%;
}
#style
{
	margin-bottom: 3%;
}

.hidden
{
	display: none !important;
}

#name
{
	margin-bottom: 3%;
}

#city
{
	margin-bottom: 3%;
}
#keyword
{
	width: 70%;
	padding-left: 10px;
	margin-top: 1%;
}
#title
{
	width: 70%;
}
#profil_submit
{
	display: block;
	width: 50%;
	height: 40%;
	color: white;
	background-color: rgb(41, 125, 221);
	margin: auto;
	margin-top: 5%;
	padding: 30px;
}
input[type="range"]
{
	width: 300px;
}
.alert-success
{
	background-color: #D1E7DD;
	padding: 16px;
	box-sizing: border-box;
	border-radius: 4px;
}
.alert-danger
{
	background-color: #F8D7DA;
	padding: 16px;
	box-sizing: border-box;
	border-radius: 4px;
}

/* Price Slider */

input[type=number] {
	border: 1px solid #ddd;
	text-align: center;
	font-size: 1.6em;
	-moz-appearance: textfield;
  }
  input[type=number]::-webkit-outer-spin-button,
  input[type=number]::-webkit-inner-spin-button {
	-webkit-appearance: none;
  }
  input[type=number]:invalid,
  input[type=number]:out-of-range {
	border: 2px solid #e60023;
  }
  input[type=range] {
	-webkit-appearance: none;
	width: 70%;
  }
  input[type=range]:focus {
	outline: none;
  }
  input[type=range]:focus::-webkit-slider-runnable-track {
	background: #1da1f2;
  }
  input[type=range]:focus::-ms-fill-lower {
	background: #1da1f2;
  }
  input[type=range]:focus::-ms-fill-upper {
	background: #1da1f2;
  }
  input[type=range]::-webkit-slider-runnable-track {
	width: 100%;
	height: 5px;
	cursor: pointer;
	background: #1da1f2;
	border-radius: 1px;
	box-shadow: none;
	border: 0;
  }
  input[type=range]::-webkit-slider-thumb {
	z-index: 2;
	position: relative;
	box-shadow: 0px 0px 0px #000;
	border: 1px solid #1da1f2;
	height: 18px;
	width: 18px;
	border-radius: 25px;
	background: #a1d0ff;
	cursor: pointer;
	-webkit-appearance: none;
	margin-top: -7px;
  }
  input[type=range]::-moz-range-track {
	width: 100%;
	height: 5px;
	cursor: pointer;
	background: #1da1f2;
	border-radius: 1px;
	box-shadow: none;
	border: 0;
  }
  input[type=range]::-moz-range-thumb {
	z-index: 2;
	position: relative;
	box-shadow: 0px 0px 0px #000;
	border: 1px solid #1da1f2;
	height: 18px;
	width: 18px;
	border-radius: 25px;
	background: #a1d0ff;
	cursor: pointer;
  }
  input[type=range]::-ms-track {
	width: 100%;
	height: 5px;
	cursor: pointer;
	background: transparent;
	border-color: transparent;
	color: transparent;
  }
  input[type=range]::-ms-fill-lower,
  input[type=range]::-ms-fill-upper {
	background: #1da1f2;
	border-radius: 1px;
	box-shadow: none;
	border: 0;
  }
  input[type=range]::-ms-thumb {
	z-index: 2;
	position: relative;
	box-shadow: 0px 0px 0px #000;
	border: 1px solid #1da1f2;
	height: 18px;
	width: 18px;
	border-radius: 25px;
	background: #a1d0ff;
	cursor: pointer;
  }
  /* Price Slider */


  /* Breakpoint */
/* Medium devices (Tablets and small laptops, less than 999px) */
@media only screen and (max-width: 1025px) 
{	

	#profil_photo
	{
		width: 100%;
	}
	#personal_info
	{
		width: 100%;
	}
	#preferences
	{
		width: 100%;
	}

	#links
	{
		display: flex;
		flex-direction: column;
		width: 100%;
	}
	.nav-item
	{
		width: initial;
		height: initial;
		width: 100%;
		margin-bottom: 20%;
		border: 1px solid wheat;
	}
	.nav-item a
	{
		text-decoration: none !important;
		color: white;
	}
	.active
	{
		border-bottom: none;
	}

	/* The sidebar menu */
.sidebar {
	height: 100%; /* 100% Full-height */
	width: 0; /* 0 width - change this with JavaScript */
	position: fixed; /* Stay in place */
	z-index: 1; /* Stay on top */
	top: 0;
	left: 0;
	background-color: #111; /* Black*/
	overflow-x: hidden; /* Disable horizontal scroll */
	padding-top: 60px; /* Place content 60px from the top */
	transition: 0.5s; /* 0.5 second transition effect to slide in the sidebar */
  }
  
  /* The sidebar links */
  .sidebar a {
	padding: 8px 8px 8px 0px;
	text-decoration: none;
	font-size: 25px;
	display: block;
	transition: 0.3s;
  }
  
  /* When you mouse over the navigation links, change their color */
  .sidebar a:hover {
	color: #f1f1f1;
  }
  
  /* Position and style the close button (top right corner) */
  .sidebar .closebtn {
	position: absolute;
	top: 0;
	right: 25px;
	font-size: 36px;
	margin-left: 50px;
  }
  
  /* The button used to open the sidebar */
  .openbtn {
	font-size: 20px;
	cursor: pointer;
	background-color: #111;
	color: white;
	padding: 10px 15px;
	border: none;
  }
  
  .openbtn:hover {
	background-color: #444;
  }
  
  /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
  #main {
	transition: margin-left .5s; /* If you want a transition effect */
	margin: auto;
  }
  li a
  {
	  line-height: normal;
  }
	.navbar-brand
  {
	overflow: hidden;
	margin: auto;
  }
  #logo
  {
	  margin: auto;
  }
}


/* Breakpoint */
/* Small devices (landscape phones, less than 768px) */
@media only screen and (max-width: 767.98px) 
{

	.alert
	{
		margin-top: 3%;
	}
	#profil_photo
	{
		width: 100%;
	}
	#personal_info
	{
		width: 100%;
	}
	#preferences
	{
		width: 100%;
	}
}

/* Breakpoint */
/* XS devices (landscape phones, less than 450px) */
@media only screen and (max-width: 450.98px) and (max-height: 999.98px)
{
	.alert
	{
		margin-top: 5%;
	}
	#profil_photo
	{
		width: 100%;
	}
	#personal_info
	{
		width: 100%;
	}
	#preferences
	{
		width: 100%;
	}
	.sidebar {padding-top: 15px;}
	.sidebar a {font-size: 18px;}
}
		</style>
		<style>
			#lessons_div
{
	background-color: #F9F9FC;
}
#demand_h1
{
	width: 70%;
	padding-top: 5%;
	text-align: center;
	margin: auto;
}
.demands_div
{
	width: 70%;
	margin: auto;
	text-align: center;
	margin-bottom: 5%;
	margin-top: 3%;
	background-color: white;
}
.demand_submit
{
	background-color: #297DDD;
	width: 40%;
	height: 50px;
}
.alert
{
	width: 70%;
	text-align: center;
	margin: auto;
	margin-top: 3%;
}


/* Breakpoint */
/* Medium devices (Tablets and small laptops, less than 768px) */
@media only screen and (max-width: 767.99px) 
{	

	.demand_submit
	{
		width: 200px;
		height: 100px;
	}
}
			</style>
		<script type="text/javascript">
			window.Modernizr=function(e,t,n){function r(e){b.cssText=e}function o(e,t){return r(S.join(e+";")+(t||""))}function a(e,t){return typeof e===t}function i(e,t){return!!~(""+e).indexOf(t)}function c(e,t){for(var r in e){var o=e[r];if(!i(o,"-")&&b[o]!==n)return"pfx"==t?o:!0}return!1}function s(e,t,r){for(var o in e){var i=t[e[o]];if(i!==n)return r===!1?e[o]:a(i,"function")?i.bind(r||t):i}return!1}function u(e,t,n){var r=e.charAt(0).toUpperCase()+e.slice(1),o=(e+" "+k.join(r+" ")+r).split(" ");return a(t,"string")||a(t,"undefined")?c(o,t):(o=(e+" "+T.join(r+" ")+r).split(" "),s(o,t,n))}function l(){p.input=function(n){for(var r=0,o=n.length;o>r;r++)j[n[r]]=!!(n[r]in E);return j.list&&(j.list=!(!t.createElement("datalist")||!e.HTMLDataListElement)),j}("autocomplete autofocus list placeholder max min multiple pattern required step".split(" ")),p.inputtypes=function(e){for(var r,o,a,i=0,c=e.length;c>i;i++)E.setAttribute("type",o=e[i]),r="text"!==E.type,r&&(E.value=x,E.style.cssText="position:absolute;visibility:hidden;",/^range$/.test(o)&&E.style.WebkitAppearance!==n?(g.appendChild(E),a=t.defaultView,r=a.getComputedStyle&&"textfield"!==a.getComputedStyle(E,null).WebkitAppearance&&0!==E.offsetHeight,g.removeChild(E)):/^(search|tel)$/.test(o)||(r=/^(url|email)$/.test(o)?E.checkValidity&&E.checkValidity()===!1:E.value!=x)),P[e[i]]=!!r;return P}("search tel url email datetime date month week time datetime-local number range color".split(" "))}var d,f,m="2.8.3",p={},h=!0,g=t.documentElement,v="modernizr",y=t.createElement(v),b=y.style,E=t.createElement("input"),x=":)",w={}.toString,S=" -webkit- -moz- -o- -ms- ".split(" "),C="Webkit Moz O ms",k=C.split(" "),T=C.toLowerCase().split(" "),N={svg:"http://www.w3.org/2000/svg"},M={},P={},j={},$=[],D=$.slice,F=function(e,n,r,o){var a,i,c,s,u=t.createElement("div"),l=t.body,d=l||t.createElement("body");if(parseInt(r,10))for(;r--;)c=t.createElement("div"),c.id=o?o[r]:v+(r+1),u.appendChild(c);return a=["&#173;",'<style id="s',v,'">',e,"</style>"].join(""),u.id=v,(l?u:d).innerHTML+=a,d.appendChild(u),l||(d.style.background="",d.style.overflow="hidden",s=g.style.overflow,g.style.overflow="hidden",g.appendChild(d)),i=n(u,e),l?u.parentNode.removeChild(u):(d.parentNode.removeChild(d),g.style.overflow=s),!!i},z=function(t){var n=e.matchMedia||e.msMatchMedia;if(n)return n(t)&&n(t).matches||!1;var r;return F("@media "+t+" { #"+v+" { position: absolute; } }",function(t){r="absolute"==(e.getComputedStyle?getComputedStyle(t,null):t.currentStyle).position}),r},A=function(){function e(e,o){o=o||t.createElement(r[e]||"div"),e="on"+e;var i=e in o;return i||(o.setAttribute||(o=t.createElement("div")),o.setAttribute&&o.removeAttribute&&(o.setAttribute(e,""),i=a(o[e],"function"),a(o[e],"undefined")||(o[e]=n),o.removeAttribute(e))),o=null,i}var r={select:"input",change:"input",submit:"form",reset:"form",error:"img",load:"img",abort:"img"};return e}(),L={}.hasOwnProperty;f=a(L,"undefined")||a(L.call,"undefined")?function(e,t){return t in e&&a(e.constructor.prototype[t],"undefined")}:function(e,t){return L.call(e,t)},Function.prototype.bind||(Function.prototype.bind=function(e){var t=this;if("function"!=typeof t)throw new TypeError;var n=D.call(arguments,1),r=function(){if(this instanceof r){var o=function(){};o.prototype=t.prototype;var a=new o,i=t.apply(a,n.concat(D.call(arguments)));return Object(i)===i?i:a}return t.apply(e,n.concat(D.call(arguments)))};return r}),M.flexbox=function(){return u("flexWrap")},M.flexboxlegacy=function(){return u("boxDirection")},M.canvas=function(){var e=t.createElement("canvas");return!(!e.getContext||!e.getContext("2d"))},M.canvastext=function(){return!(!p.canvas||!a(t.createElement("canvas").getContext("2d").fillText,"function"))},M.webgl=function(){return!!e.WebGLRenderingContext},M.touch=function(){var n;return"ontouchstart"in e||e.DocumentTouch&&t instanceof DocumentTouch?n=!0:F(["@media (",S.join("touch-enabled),("),v,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(e){n=9===e.offsetTop}),n},M.geolocation=function(){return"geolocation"in navigator},M.postmessage=function(){return!!e.postMessage},M.websqldatabase=function(){return!!e.openDatabase},M.indexedDB=function(){return!!u("indexedDB",e)},M.hashchange=function(){return A("hashchange",e)&&(t.documentMode===n||t.documentMode>7)},M.history=function(){return!(!e.history||!history.pushState)},M.draganddrop=function(){var e=t.createElement("div");return"draggable"in e||"ondragstart"in e&&"ondrop"in e},M.websockets=function(){return"WebSocket"in e||"MozWebSocket"in e},M.rgba=function(){return r("background-color:rgba(150,255,150,.5)"),i(b.backgroundColor,"rgba")},M.hsla=function(){return r("background-color:hsla(120,40%,100%,.5)"),i(b.backgroundColor,"rgba")||i(b.backgroundColor,"hsla")},M.multiplebgs=function(){return r("background:url(https://),url(https://),red url(https://)"),/(url\s*\(.*?){3}/.test(b.background)},M.backgroundsize=function(){return u("backgroundSize")},M.borderimage=function(){return u("borderImage")},M.borderradius=function(){return u("borderRadius")},M.boxshadow=function(){return u("boxShadow")},M.textshadow=function(){return""===t.createElement("div").style.textShadow},M.opacity=function(){return o("opacity:.55"),/^0.55$/.test(b.opacity)},M.cssanimations=function(){return u("animationName")},M.csscolumns=function(){return u("columnCount")},M.cssgradients=function(){var e="background-image:",t="gradient(linear,left top,right bottom,from(#9f9),to(white));",n="linear-gradient(left top,#9f9, white);";return r((e+"-webkit- ".split(" ").join(t+e)+S.join(n+e)).slice(0,-e.length)),i(b.backgroundImage,"gradient")},M.cssreflections=function(){return u("boxReflect")},M.csstransforms=function(){return!!u("transform")},M.csstransforms3d=function(){var e=!!u("perspective");return e&&"webkitPerspective"in g.style&&F("@media (transform-3d),(-webkit-transform-3d){#modernizr{left:9px;position:absolute;height:3px;}}",function(t){e=9===t.offsetLeft&&3===t.offsetHeight}),e},M.csstransitions=function(){return u("transition")},M.fontface=function(){var e;return F('@font-face {font-family:"font";src:url("https://")}',function(n,r){var o=t.getElementById("smodernizr"),a=o.sheet||o.styleSheet,i=a?a.cssRules&&a.cssRules[0]?a.cssRules[0].cssText:a.cssText||"":"";e=/src/i.test(i)&&0===i.indexOf(r.split(" ")[0])}),e},M.generatedcontent=function(){var e;return F(["#",v,"{font:0/0 a}#",v,':after{content:"',x,'";visibility:hidden;font:3px/1 a}'].join(""),function(t){e=t.offsetHeight>=3}),e},M.video=function(){var e=t.createElement("video"),n=!1;try{(n=!!e.canPlayType)&&(n=new Boolean(n),n.ogg=e.canPlayType('video/ogg; codecs="theora"').replace(/^no$/,""),n.h264=e.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/,""),n.webm=e.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/,""))}catch(r){}return n},M.audio=function(){var e=t.createElement("audio"),n=!1;try{(n=!!e.canPlayType)&&(n=new Boolean(n),n.ogg=e.canPlayType('audio/ogg; codecs="vorbis"').replace(/^no$/,""),n.mp3=e.canPlayType("audio/mpeg;").replace(/^no$/,""),n.wav=e.canPlayType('audio/wav; codecs="1"').replace(/^no$/,""),n.m4a=(e.canPlayType("audio/x-m4a;")||e.canPlayType("audio/aac;")).replace(/^no$/,""))}catch(r){}return n},M.localstorage=function(){try{return localStorage.setItem(v,v),localStorage.removeItem(v),!0}catch(e){return!1}},M.sessionstorage=function(){try{return sessionStorage.setItem(v,v),sessionStorage.removeItem(v),!0}catch(e){return!1}},M.webworkers=function(){return!!e.Worker},M.applicationcache=function(){return!!e.applicationCache},M.svg=function(){return!!t.createElementNS&&!!t.createElementNS(N.svg,"svg").createSVGRect},M.inlinesvg=function(){var e=t.createElement("div");return e.innerHTML="<svg/>",(e.firstChild&&e.firstChild.namespaceURI)==N.svg},M.smil=function(){return!!t.createElementNS&&/SVGAnimate/.test(w.call(t.createElementNS(N.svg,"animate")))},M.svgclippaths=function(){return!!t.createElementNS&&/SVGClipPath/.test(w.call(t.createElementNS(N.svg,"clipPath")))};for(var H in M)f(M,H)&&(d=H.toLowerCase(),p[d]=M[H](),$.push((p[d]?"":"no-")+d));return p.input||l(),p.addTest=function(e,t){if("object"==typeof e)for(var r in e)f(e,r)&&p.addTest(r,e[r]);else{if(e=e.toLowerCase(),p[e]!==n)return p;t="function"==typeof t?t():t,"undefined"!=typeof h&&h&&(g.className+=" "+(t?"":"no-")+e),p[e]=t}return p},r(""),y=E=null,function(e,t){function n(e,t){var n=e.createElement("p"),r=e.getElementsByTagName("head")[0]||e.documentElement;return n.innerHTML="x<style>"+t+"</style>",r.insertBefore(n.lastChild,r.firstChild)}function r(){var e=y.elements;return"string"==typeof e?e.split(" "):e}function o(e){var t=v[e[h]];return t||(t={},g++,e[h]=g,v[g]=t),t}function a(e,n,r){if(n||(n=t),l)return n.createElement(e);r||(r=o(n));var a;return a=r.cache[e]?r.cache[e].cloneNode():p.test(e)?(r.cache[e]=r.createElem(e)).cloneNode():r.createElem(e),!a.canHaveChildren||m.test(e)||a.tagUrn?a:r.frag.appendChild(a)}function i(e,n){if(e||(e=t),l)return e.createDocumentFragment();n=n||o(e);for(var a=n.frag.cloneNode(),i=0,c=r(),s=c.length;s>i;i++)a.createElement(c[i]);return a}function c(e,t){t.cache||(t.cache={},t.createElem=e.createElement,t.createFrag=e.createDocumentFragment,t.frag=t.createFrag()),e.createElement=function(n){return y.shivMethods?a(n,e,t):t.createElem(n)},e.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+r().join().replace(/[\w\-]+/g,function(e){return t.createElem(e),t.frag.createElement(e),'c("'+e+'")'})+");return n}")(y,t.frag)}function s(e){e||(e=t);var r=o(e);return!y.shivCSS||u||r.hasCSS||(r.hasCSS=!!n(e,"article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")),l||c(e,r),e}var u,l,d="3.7.0",f=e.html5||{},m=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,p=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,h="_html5shiv",g=0,v={};!function(){try{var e=t.createElement("a");e.innerHTML="<xyz></xyz>",u="hidden"in e,l=1==e.childNodes.length||function(){t.createElement("a");var e=t.createDocumentFragment();return"undefined"==typeof e.cloneNode||"undefined"==typeof e.createDocumentFragment||"undefined"==typeof e.createElement}()}catch(n){u=!0,l=!0}}();var y={elements:f.elements||"abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output progress section summary template time video",version:d,shivCSS:f.shivCSS!==!1,supportsUnknownElements:l,shivMethods:f.shivMethods!==!1,type:"default",shivDocument:s,createElement:a,createDocumentFragment:i};e.html5=y,s(t)}(this,t),p._version=m,p._prefixes=S,p._domPrefixes=T,p._cssomPrefixes=k,p.mq=z,p.hasEvent=A,p.testProp=function(e){return c([e])},p.testAllProps=u,p.testStyles=F,p.prefixed=function(e,t,n){return t?u(e,t,n):u(e,"pfx")},g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(h?" js "+$.join(" "):""),p}(this,this.document);
		</script>
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
<?php 
	 if($_SESSION['type'] == 'teacher')
	{
		echo('<body>
				<div class="container-fluid main_container">
					<nav class="navbar" id="navbar">						
						<div id="sidebar" class="sidebar">
							<ul>
								<li class="nav-item links">
									<a class="nav-link lessons">Derslerim</a>
								</li>
								<li class="nav-item links">
									<a class="nav-link active profil">Profilim</a>
								</li>
								<li class="nav-item links">
									<a  href="index.html" class="nav-link">Ana Sayfa</a>
								</li>
								<li class="nav-item">
									<a class="nav-link sign_out">Çıkış Yap</a>
								</li>
							</ul>
						</div>

						<div id="main">
							<button class="openbtn">&#9776; Menü</button>	
						</div>	
						<div class="navbar-brand" id="nav_links"><img class="img-fluid" id="logo" alt="dersara.com.tr Logo" src="images/black_logo.png" />
						</div>
						<div id="not_mobile">
						<ul  class="not_mobile" id="links">
							<li class="nav-item links">
								<a class="nav-link lessons">Derslerim</a>
							</li>
							<li class="nav-item links">
								<a class="nav-link active profil"">Profilim</a>
							</li>
							<li class="nav-item links">
								<a  href="index.html" class="nav-link">Ana Sayfa</a>
							</li>
							<li class="nav-item links">
							<a class="nav-link sign_out">Çıkış Yap</a>
							</li>
						</ul>
						</div>
					</nav>
					<div id="lessons_div" class="hidden"><h1 id="demand_h1">Öğrencilerden Gelen Ders Taleplerini Burada Görüntüleyebilirsiniz. Düzenli Olarak Kontrol Etmeniz Tavsiye Edilir.</h1></div>
					<div class="container-fluid" id="body">
						<form id="profil_form" action="profil_validation.php" method="post" enctype="multipart/form-data">
						<div class="row"> 
							<div class="col-lg-6" id="profil_photo">
								<h1 id="profil_h1" >Profil Resminiz</h1>
								<div id="img_div">
									<img src="/images/profil_img.png" alt="profil resmi" id="profil_img" />
								</div>
								<span id="requirement_span"><b>Profil Fotoğrafı Gereklilikleri</b></span><br /> 
								<ul id="requirements" class="profile_ul">
									<li class="conditions">Fotoğraf türü JPG veya PNG olmalıdır</li>
									<li class="conditions">En az 300x300 piksel olmalıdır</li>
									<li class="conditions">Fotoğraf 2MB boyutundan fazla olmamalıdır</li>
									<li class="conditions">Fotoğrafta yalnızca yüzünüz gözükmelidir</li>
									<li class="conditions">Fotoğrafta yalnızca siz olmalısınız</li>
								</ul><br />
								<input accept="image/*" type="file" name="fileToUpload" id="upload" />
								<label for="upload" id="upload_label">Profil Fotoğrafı Yükle</label>
							</div>	
						</div>
						<div class="row">
							<div class="col-lg-6" id="personal_info">
								<h1>Kişisel Bilgiler</h1>
								<div id="gender">
									<p><b>Cinsiyetiniz:</b></p>
									<input type="radio" id="male" name="gender" value="m" />
									<label for="male">Erkek</label>
									<input type="radio" id="female" name="gender" value="f" />
									<label for="female">Kadın</label><br />
								</div><br />
								<p id><b>Başlık</b></p>
								<p>Bu alan başlık olarak profilinizde kullanılacaktır.</p>
								<textarea id="title" class="profil_input" name="title" rows="1" cols="100"></textarea>
								<p id="title_character">100 karakter kaldı</p>
								<p id="intro_title"><b>Tanıtım Metni</b></p><br />
								<p>Kendinizden, eğitiminizden, öğretmenlik ve özel ders alanındaki tecrübelerinizden bahsediniz. Özel ders alacak olan öğrencilerin 
									niçin sizi tercih etmesi gerektiğinden, eğitim verirken kullandığınız yöntemlerden, öğrencilerle olan ilişkinizden 
									bahsetmeyi unutmayınız. Eğer belirli bir yaş grubuna ya da belirli bir sınava hazırlanan öğrenci grubuna ders verecekseniz
									bu tür tercihlerinizi de ekleyiniz. Grup dersi vermek istiyorsanız belirtiniz. Başarılarınız ve sertifikalarınız sizin
									için iyi bir referans olacaktır. Öğrencilerin  bu alanı okuyarak sizi tercih edip etmeyeceğini göz önünde bulundurarak yazınız.
								</p>								  
								<textarea id="introduction" class="profil_input" name="intro" rows="8" cols="100"></textarea>
								<p id="character">800 karakter kaldı</p>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6" id="preferences">
								<h1>Eğitim Tercihleri</h1>
								<div id="style">
									<p><b>Lütfen öğrencilere ne şekilde eğitim vermek istediğinizi seçiniz. 
										Eğer yüz yüze ve internet üzerinden eğitim vermek istiyorsanız iki seçeneği de seçiniz.</b>
									</p>
									<div id="preference_div">
										<input type="checkbox" id="face2face" class="profil_input" name="face2face" value="face2face" />
										<label class="preference_label" for="face2face">Yüz yüze eğitim vermek istiyorum</label><br />
										<input type="checkbox" id="online" name="online" value="online" /> 
										<label class="preference_label" for="online">İnternet üzerinden eğitim vermek istiyorum</label>
									</div>
								</div>
								<div id="city" class="hidden">
									<p><b>Yüz yüze eğitim vermek istediğiniz şehri seçiniz.</b></p>
									<select class="js-example-basic-single" name="city" id="select2city">
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
								<p><b>Ders Verebileceğiniz Semt Adlarını Boşluk Bırakarak Yazınız</b></p>
								<textarea id="province" class="profil_input" name="province" rows="3" cols="100"></textarea>
								<p id="province_character">300 karakter kaldı</p>
							</div>
							<p id="price"><b>Saatlik Ücret</b></p>
							<div class="price-slider"><span>
  								<input value="50" min="5" max="600" step="5" type="range" name="price" id="slider_min"/>
							</div>
							<div id="price_div">
								<span id="min">50TL</span>
							</div>
							<div id="topic">
								<p><b>Hangi alanla ya da alanlarla ilgili eğitim vermek istediğinizi seçiniz</b></p>
								<ul class="profile_ul" id="keyword_ul">
									<li>Öğrencilerin arama sonuçlarında çıkmanız için alanınız ile ilgili anahtar kelimeleri her kelime
										arasında boşluk olacak şekilde yazınız. Büyük küçük harf kullanımı önemli değildir.</li>
									<li>Örnek 1- matematik </li>
									<li>Örnek 2- matematik ortaokul lise</li>
									<li>Örnek 3- ingilizce TOEFL YDS IELTS</li>
									<li>Örnek 4- tenis yetişkin yoga</li>
								</ul>
								<textarea id="keyword" class="profil_input" name="keyword" rows="4" cols="50"></textarea>
								<p id="char">200 karakter kaldı</p>
								<button type="submit"  name="submit" value="submit" id="profil_submit" >Kaydınızı Tamamlayın</button>							

							</div>
						</div>
					</div>
					</form>
				</div>
				<script type="text/javascript" src="javascript/profil_complete.js"></script>
				<script type="text/javascript" src="javascript/profil_event_listener.js"></script>
				<script type="text/javascript" src="javascript/profil_validation.js"></script>
			</body>');
	}
	else	
	{
		header('location: http://localhost/index.html', true, 307);
		exit();
	}
?>
</html>