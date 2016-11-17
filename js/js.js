window.onload = function()
{
	if(localStorage.siteColor!=undefined)
	{
		var siteColor = localStorage.siteColor;
		document.getElementById("color").value=siteColor;
		changeColor(siteColor,0);
	}

	var a = document.getElementsByTagName("nav")[0].getElementsByTagName("a");
	for(var i=0; i<a.length; i++)
	{
		a[i].addEventListener("click",addActiveLink);
	}

	$("table").click(function()
	{
		$(this).effect("explode", "linear", 1500);
	});
}

function addActiveLink()
{
	var link = $(this).attr("href");
	sessionStorage.active_link=link;
}

function addCss(tab, property, value)
{
	for(var i=0; i<tab.length; i++)
	{
		var str = "tab[i].style."+property+"='"+value+"'";
		eval(str);
	}
}

function changeColor(color, transition_var)
{
	
	var active_link = sessionStorage.active_link;
	var ul = document.getElementsByTagName("nav")[0].getElementsByTagName("ul");
	var footer = document.getElementsByTagName("footer");
	var menu_2 = document.getElementsByClassName("menu-2");
	addCss(ul, "transition", transition_var+"s");
	addCss(footer, "transition", transition_var+"s");
	var a = document.getElementsByTagName("nav")[0].getElementsByTagName("a");
	for(var i=0; i<a.length; i++)
	{
		if(a[i].getAttribute("href")==active_link)
		{
			a[i].style.transition=transition_var+"s";
		}
	}

	addCss(ul, "backgroundColor", color)
	addCss(menu_2, "backgroundColor", color)
	addCss(footer, "backgroundColor", color)

	var color_hover = parseInt(color.substr(1),16);
	color_hover +=100;
	color_hover = '#'+color_hover.toString(16);

	for(var i=0; i<a.length; i++)
	{
		if(a[i].getAttribute("href")==active_link)
		{
			a[i].style.backgroundColor=color_hover;
		}
	}

	var li = document.getElementsByTagName("nav")[0].getElementsByTagName("li");
	for(var i=0; i<li.length; i++)
	{
		li[i].addEventListener("mouseenter",function()
			{
				this.style.backgroundColor = color_hover;
			});

		li[i].addEventListener("mouseleave",function()
			{
				this.style.backgroundColor = color;
			});
	}

	localStorage.siteColor = color;
}

function addNewP()
{
	var paragraphs = document.getElementsByClassName("akapity")[0];
	var p_number = paragraphs.getElementsByTagName("li").length;
	var article = document.getElementsByTagName("article")[0];

	var text = prompt("Podaj treść akapitu");
	var p = document.createElement("p");
	p.setAttribute("id","ak"+(p_number+1));
	text = document.createTextNode(text);
	p.appendChild(text);


	var a = document.createElement("a");
	a.setAttribute("href","#ak"+(p_number+1));
	text = document.createTextNode("akapit "+(p_number+1));
	a.appendChild(text);
	var li = document.createElement("li");
	li.appendChild(a);

	paragraphs.appendChild(li);
	article.appendChild(p);

	$("#ak"+(p_number+1)).effect("pulsate", "linear",1300);
	$("a[href='#ak"+(p_number+1)+"']").effect("pulsate", "linear",1300);

}