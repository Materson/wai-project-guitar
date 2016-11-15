$(document).ready(function()
{
	if(localStorage.siteColor!=undefined)
	{
		var siteColor = localStorage.siteColor;
		document.getElementById("color").value=siteColor;
		zmienKolor(siteColor,0);
	}

	$("nav li a").click(function()
	{
		var link = $(this).attr("href");
		sessionStorage.active_link=link;
	});

});

function zmienKolor(color, transition)
	{
		

		var active_link = sessionStorage.active_link;
		$("nav ul").css("transition", transition+'s');
		$("nav ul").children().css("transition", transition+'s');
		$("footer").css("transition", transition+'s');
		$(".active").css("transition", transition+'s');
		$("nav [href="+active_link+"]").css("transition", transition+'s');

		$("nav ul").css("background", color);
		$("nav ul").children().css("background", color);
		$(".menu-2").css("background", color);
		$("footer").css("background", color);

		var color_hover = parseInt(color.substr(1),16);
		color_hover +=100;
		color_hover = '#'+color_hover.toString(16);

		$(".active").css("background", color_hover);
		$("nav [href="+active_link+"]").css("background",color_hover);

		$("nav li").mouseenter(function()
		{
			$(this).css("background", color_hover);
		});
		$("nav li").mouseleave(function()
		{
			$(this).css("background", color);
		});

		localStorage.siteColor = color;
	}