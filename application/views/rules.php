<html> 

<head> 
<title>CryptZilla</title> 
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
<style type="text/css"> 
	body {
		background-color: #000
	}
	pre{
		color: limegreen;
	}
	#console {
		font-family: courier, monospace;
		color: #fff;
		width:750px;
		font-size:13px;
	}
	a {
		color: #0bc;
		text-decoration: none;
	}
	#a {
		color: #0f0;
	}
	#c {
		color: #0bc;
	}
	#b {
		color: #ff0096;
	}
</style> 
</head> 
<body onkeypress="window.location.href='<?php echo base_url(''); ?>index.php/welcome/level';"> 
<script type="text/javascript"> 
	var Typer={
	text: null,
	accessCountimer:null,
	index:0, // current cursor position
	speed:2, // speed of the Typer
	file:"", //file, must be setted
	accessCount:0, //times alt is pressed for Access Granted
	deniedCount:0, //times caps is pressed for Access Denied
	init: function(){// inizialize Hacker Typer
		accessCountimer=setInterval(function(){Typer.updLstChr();},500); // inizialize timer for blinking cursor
		$.get(Typer.file,function(data){// get the text file
			Typer.text=data;// save the textfile in Typer.text
			Typer.text = Typer.text.slice(0, Typer.text.length-1);
		});
	},
 
	content:function(){
		return $("#console").html();// get console content
	},
 
	write:function(str){// append to console content
		$("#console").append(str);
		return false;
	},
 
	addText:function(key){//Main function to add the code
		if(key.keyCode==18){// key 18 = alt key
			Typer.accessCount++; //increase counter 
			if(Typer.accessCount>=3){// if it's presed 3 times
				Typer.makeAccess(); // make access popup
			}
		}else if(key.keyCode==20){// key 20 = caps lock
			Typer.deniedCount++; // increase counter
			if(Typer.deniedCount>=3){ // if it's pressed 3 times
				Typer.makeDenied(); // make denied popup
			}
		}else if(key.keyCode==27){ // key 27 = esc key
			Typer.hidepop(); // hide all popups
		}else if(Typer.text){ // otherway if text is loaded
			var cont=Typer.content(); // get the console content
			if(cont.substring(cont.length-1,cont.length)=="|") // if the last char is the blinking cursor
				$("#console").html($("#console").html().substring(0,cont.length-1)); // remove it before adding the text
			if(key.keyCode!=8){ // if key is not backspace
				Typer.index+=Typer.speed;	// add to the index the speed
			}else{
				if(Typer.index>0) // else if index is not less than 0 
					Typer.index-=Typer.speed;//	remove speed for deleting text
			}
			var text=Typer.text.substring(0,Typer.index)// parse the text for stripping html enities
			var rtn= new RegExp("\n", "g"); // newline regex
	
			$("#console").html(text.replace(rtn,"<br/>"));// replace newline chars with br, tabs with 4 space and blanks with an html blank
			window.scrollBy(0,50); // scroll to make sure bottom is always visible
		}
		if ( key.preventDefault && key.keyCode != 122 ) { // prevent F11(fullscreen) from being blocked
			key.preventDefault()
		};  
		if(key.keyCode != 122){ // otherway prevent keys default behavior
			key.returnValue = false;
		}
	},
 
	updLstChr:function(){ // blinking cursor
		var cont=this.content(); // get console 
		if(cont.substring(cont.length-1,cont.length)=="|") // if last char is the cursor
			$("#console").html($("#console").html().substring(0,cont.length-1)); // remove it
		else
			this.write("|"); // else write it
	}
}
 
function replaceUrls(text) {
	var http = text.indexOf("http://");
	var space = text.indexOf(".me ", http);
	if (space != -1) { 
		var url = text.slice(http, space-1);
		return text.replace(url, "<a href=\""  + url + "\">" + url + "</a>");
	} else {
	return text
}
}
Typer.speed=5;
Typer.file="<?php echo base_url('rules.txt'); ?>";
Typer.init();
 
var timer = setInterval("t();", 30);

// function changeToHome(){
// 	window.location="<?php echo base_url(''); ?>index.php/welcome/home";
// }

function t() {
	Typer.addText({"keyCode": 123748});
	if (Typer.index > Typer.text.length) {
		clearInterval(timer);
	}
}
</script> 
<div id="console" ></div> 
</body> 

</html> 