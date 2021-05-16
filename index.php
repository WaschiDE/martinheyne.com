<!DOCTYPE html>
<html>
	<head>
		<title>Martin's Webpage</title>
		<link rel="icon" href="images/Logo.png" />
		<link rel="stylesheet" href="style.css" />
		<meta charset="UTF-8">
	</head>
	<body  id="top" class="body">	
		<div  class= "header">
				<h1><img src="images/Logo.png" alt="Waschbaer"  width="50px" height="50px">&nbsp;Willkommen auf Martin's Webpage</h1>
		</div>			
			<div class="topbar">			
			<table width="75%"  >
				<tr>
					<a href="index.php">Main</a>&nbsp;
					<a href="about.html">AboutMe</a>&nbsp;
					<a href="index.php#info">Informationen</a>&nbsp;					
					<a href="index.php#foto">Bilder</a>&nbsp;
					<a href="index.php#pinn">Pinnwand</a>&nbsp;
					<a href="rechner.html">Rechner</a>&nbsp;
					<a href="gallery.html">Gallery</a>					
				</tr>
			</table>								
		</div>			
		<div id="info" class= "roundbox" align="center">
			<br>
			<h2 ><u>Willkommen auf meiner Website</u></h2>
			<h3>Viel Spaß bei deinem ziemlich nutzlosen Aufenthalt;)</h3>
			<iframe width="640" height="360"
			src="https://www.youtube.com/embed/5qap5aO4i9A">
			</iframe>			
		</div>			
			<div  id="foto" class= "roundbox">
			<br>
			<h2 ><u>Waschbär-Bilder</u></h2>
			
		    
				
			
			<a href="gallery.html"><img class="mySlides" src="images/waschbaer1.jpg" ></a>
			<a href="gallery.html"><img class="mySlides" src="images/waschbaer2.jpg" ></a>
			<a href="gallery.html"><img class="mySlides" src="images/waschbaer3.jpg" ></a>
			<a href="gallery.html"><img class="mySlides" src="images/waschbaer4.jpg" ></a>
			<a href="gallery.html"><img class="mySlides" src="images/waschbaer5.jpg" ></a>
			<a href="gallery.html"><img class="mySlides" src="images/waschbaer6.jpg" ></a>
			<a href="gallery.html"><img class="mySlides" src="images/waschbaer7.jpg" ></a>
			<a href="gallery.html"><img class="mySlides" src="images/waschbaer8.jpg" ></a>
			<a href="gallery.html"><img class="mySlides" src="images/waschbaer9.jpg" ></a>
			
			<h5> - klick Images for whole Gallery</h5>
		
			<script>		
				var slideIndex = 0;
				carousel();

				function carousel() {
				  var i;
				  var x = document.getElementsByClassName("mySlides");
				  for (i = 0; i < x.length; i++) {
					x[i].style.display = "none";
				  }
				  slideIndex++;
				  if (slideIndex > x.length) {slideIndex = 1}
				  x[slideIndex-1].style.display = "block";
				  setTimeout(carousel, 5000); 
				}
			</script>
		</div>

			
			<div id="pinn" class= "roundboxbot">
				<h2><u>Pinnwand</u></h2>
				
				<div class="innerroundbox">
				<h3>Die neusten 10 Einträge</h3>
				<?php
				
				include 'timestamp.php';

					$content = file_get_contents('pinn.txt');					
					
					$lines = explode("\n", $content);
					for($i = 1; $i < 11 ; $i++) {  //count($lines)
						$lines[$i] = explode('|', $lines[$i]);
						
						echo '<p>'.utcToLocalTime($lines[$i][3]).' || "<b>'.$lines[$i][0].'</b>" hat "<b>'.$lines[$i][2].'</b>" geschrieben</p>';
					}
				?>
				
				<a href="archiv.php">Alle Einträge</a>
				</div>
				
				
				
				<h3>Hinterlass mir hier einen neuen Kommentar</h3>				
				<form id="pinnform" method="get" action="pinnform.php">
					<table class="innerroundbox" >
						<tr>
							<td>Nickname: </td>
							<td><input type="text" id="pinnnickname" name="pinnnickname" style="height:20px; width:100%;"></td>
						</tr>
						<tr>
							<td>E-Mail: </td>
							<td><input type="email" id="pinnemail" name="pinnemail" style="height:20px; width:100%;"><p id="pinnemailval"></p></td>
						</tr>
						<tr>
							<td>Nachricht: </td>
							<td><input type="text" id="pinnnachricht" name="pinnnachricht"style="height:120px; width:100%;"</td>
						<tr>
						<tr>
							<td id="pinncheckboxtext">Ich habe die <a href="agb.html">AGB's</a> gelesen & akzeptiere diese:</td>
							<td><input type="checkbox" id="pinncheckbox" name="pinncheckbox"></input></td>
						</tr>
						<tr>
							<td></td>
							<td><button type="button" id="pinnabsenden">Absenden</button></td>
						</tr>					
					</table>
				</form>
			</div>			
			<script>
			  let pinnabsenden = document.getElementById("pinnabsenden");			  
			  pinnabsenden.onclick = function(evtpinnabsenden){	
					let pinnnickname = document.getElementById("pinnnickname").value;
					let pinnemail = document.getElementById("pinnemail").value;
					let pinnnachricht = document.getElementById("pinnnachricht").value;
					let pinncheckbox = document.getElementById("pinncheckbox").checked;					
					//nickname
					if(pinnnickname == ""){
						var p1 =1;
						console.log("kein nickname");
						document.getElementById("pinnnickname").placeholder = "Bitte einen Nickname eingeben!";
						document.getElementById("pinnnickname").style.background = "red";
					}else{var p1=0;}					
					//E-Mail
					if(pinnemail == ""){
						var p2 =1;
						console.log("keine mail")	
						document.getElementById("pinnemail").placeholder = "Bitte einen E-Mail eingeben!";
						document.getElementById("pinnemail").style.background = "red";
					}else{
						var p2=2;
						var inpObj = document.getElementById("pinnemail");
						if (!inpObj.checkValidity()) {
								document.getElementById("pinnemailval").innerHTML = inpObj.validationMessage;
								console.log("Email-format falsch");
						}else { 
								var p2=0;
						}
					}										
					//nachricht
					if(pinnnachricht == ""){
						var p3 =1;
						console.log("kein nachricht")
						document.getElementById("pinnnachricht").placeholder = "Bitte einen Nachricht eingeben!";		
						document.getElementById("pinnnachricht").style.background = "red";					
					}else{var p3=0;}					
					//Checkbox
					if (pinncheckbox == false){
						var p4 =1;
						console.log("checkbox false")
						document.getElementById("pinncheckboxtext").style.background = "red";							
					}else{var p4=0;}					
					//Kontrollausgabe-fehler
					console.log("Fehlercode: "+p1+p2+p3+p4)					
					//submit bei korrekten Eingaben
					var pe = p1+p2+p3+p4
					console.log(pe)					
					if(pe==0){
						console.log("Eingabe Submittet");
						//SUBMIT
						let pinnform = document.getElementById("pinnform");
						pinnform.submit();					
						//clear Boxes //farbe rücksetzten
						document.getElementById("pinnnachricht").placeholder = "";		
						document.getElementById("pinnnachricht").style.background = "";
						document.getElementById("pinncheckboxtext").style.background = "";
						document.getElementById("pinnemail").placeholder = "";
						document.getElementById("pinnemail").style.background = "";
						document.getElementById("pinnnickname").placeholder = "";
						document.getElementById("pinnnickname").style.background = "";
					}	
				};
			</script>			
			<div  class= "footer">
				<footer>								
					<a href="#top">Back-to-Top</a>&nbsp;
					<a href="impressum.html">Impressum</a>&nbsp;
					<a href="kontakt.html">Kontakt</a>&nbsp;					
			</footer>
			</div>		
	</body>
</html>