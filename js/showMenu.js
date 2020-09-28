var Btn = function(element){
	var btn = this;
	btn.element = element;
	btnToClick = document.getElementById("hidden");
	btndiv = document.getElementById("acc");
	theTarget = document.getElementsByTagName("img")[1];
	isLgoingS = true;

	btnToClick.addEventListener("click", function(){
		if(isLgoingS == true)
		{
			menu.minimiz();
		}else{
			menu.showBig();
		}

	})
}

var Menu = function(){
	var menu = this;
	menu.element = document.getElementById("nav");
	menutext = document.getElementsByClassName("navbarblock");
	menuLogo = document.getElementById("cmslogo");


	menu.showBig = function(){
		for(var i=0; i<menutext.length;i++)
		{
			eachdiv = menutext[i];
			divtext = eachdiv.getElementsByTagName("span")[0];
		
			divtext.style.display = "block";
			menu.element.style.width = "250px";
			menuLogo.style.display = "block";
			menu.element.style.paddingLeft = "46px";
			btnToClick.src = "imgs/hiddenicon.png";
			isLgoingS = true;

		}
	}

	menu.minimiz = function(){
		for(var i=0; i<menutext.length;i++)
		{
			eachdiv = menutext[i];
			divtext = eachdiv.getElementsByTagName("span")[0];

			divtext.style.display = "none";
			menu.element.style.width = "100px";
			menu.element.style.paddingLeft = "30px";
			menuLogo.style.display = "none";
			btnToClick.src = "imgs/burgericon.png";

			isLgoingS = false;
			
		}
	}
}
var menu = new Menu();
new Btn(menu);