<!DOCTYPE>
<html xml:lang="pt" lang="pt">
<head>
	<!-- CONEXÃO AO BANCO DE DADOS -->
	<?php
		function CriaConexãoBd() : PDO
		{
			$bd = new PDO('mysql:host=localhost;dbname= [nome do banco de dados];
	    charset=utf8', '[nome]', '[senha]');

			$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $bd;
		}
	  ?>

	<meta charset="UTF-8">
	<title>Calendário</title>
	<link rel="stylesheet" href="stylesMenu.css">



	<script type="text/javascript">

	function maxDays(mm, yyyy){

	var mDay;
	if((mm == 3) || (mm == 5) || (mm == 8) || (mm == 10)){
		mDay = 30;

	 	}
	 	else{
	 		mDay = 31
	 		if(mm == 1){
	  			if (yyyy/4 - parseInt(yyyy/4) != 0){
	  				mDay = 28
	  			}
		   	else{
	  				mDay = 29
	 			}
		}
	 }
	return mDay;

	}
	function changeBg(id){
	if (eval(id).style.backgroundColor != "#FF5C8F"){
		eval(id).style.backgroundColor = "#c6eff1"
	}
	else{
		eval(id).style.backgroundColor = "red"
	}
	}
	function writeCalendar(){

	var now = new Date
	var dd = now.getDate()
	var mm = now.getMonth()
	var dow = now.getDay()
	var yyyy = now.getFullYear()
	var arrM = new Array("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro")
	var arrY = new Array()
	for (ii=0;ii<=4;ii++){
		arrY[ii] = yyyy - 2 + ii

	}
	var arrD = new Array("Dom","Seg","Ter","Qua","Qui","Sex","Sab")

	var text = ""
	text = "<form class=form name=calForm>"
	text += "<table class=tudo >"
	text += "<tr><td>"
	text += "<table width=100%><tr>"
	text += "<td align=left>"
	text += "<select class=setinhames name=selMonth onChange='changeCal()'>"
	for (ii=0;ii<=11;ii++){
		if (ii==mm){
			text += "<option value= " + ii + " Selected>" + arrM[ii] + "</option>"
		}
		else{
			text += "<option value= " + ii + ">" + arrM[ii] + "</option>"
		}
	}
	text += "</select>"
	text += "</td>"
	text += "<td align=right>"
	text += "<select name=selYear onChange='changeCal()'>"
	for (ii=0;ii<=4;ii++){
		if (ii==2){
			text += "<option value= " + arrY[ii] + " Selected>" + arrY[ii] + "</option>"
		}
		else{
			text += "<option value= " + arrY[ii] + ">" + arrY[ii] + "</option>"
		}
	}
	text += "</select>"
	text += "</td>"
	text += "</tr></table>"
	text += "</td></tr>"
	text += "<tr><td>"
	text += "<table class=tabeladentro border=1>"
	text += "<tr>"
	for (ii=0;ii<=6;ii++){
		text += "<td class=mes align=center><span class=label>" + arrD[ii] + "</span></td>"
	}
	text += "</tr>"
	aa = 0
	for (kk=0;kk<=5;kk++){
		text += "<tr>"
		for (ii=0;ii<=6;ii++){
			text += "<td class=cadaquadrado align=center><a class=link href='eventos.html?'dia="+ aa +"' id=sp" + aa + " onClick='changeBg(this.id)'></a></td>"
			aa += 1

		}
		text += "</tr>"
	}
	text += "</table>"
	text += "</td></tr>"
	text += "</table>"
	text += "</form>"
	document.write(text)
	changeCal()
	}
	function changeCal(){
	var now = new Date
	var dd = now.getDate()
	var mm = now.getMonth()
	var dow = now.getDay()
	var yyyy = now.getFullYear()
	var currM = parseInt(document.calForm.selMonth.value)
	var prevM
	if (currM!=0){
		prevM = currM - 1
	}
	else{
		prevM = 11
			eval("sp"+ii).style.backgroundColor="#90EE90"
	}
	var currY = parseInt(document.calForm.selYear.value)
	var mmyyyy = new Date()
	mmyyyy.setFullYear(currY)
	mmyyyy.setMonth(currM)
	mmyyyy.setDate(1)
	var day1 = mmyyyy.getDay()
	if (day1 == 0){
		day1 = 7
	}
	var arrN = new Array(41)
	var aa
	for (ii=0;ii<day1;ii++){
		arrN[ii] = maxDays((prevM),currY) - day1 + ii + 1
	}
	aa = 1
	for (ii=day1;ii<=day1+maxDays(currM,currY)-1;ii++){
		arrN[ii] = aa
		aa += 1
	}
	aa = 1
	for (ii=day1+maxDays(currM,currY);ii<=41;ii++){
		arrN[ii] = aa
		aa += 1

	}
	for (ii=0;ii<=41;ii++){
		eval("sp"+ii).style.backgroundColor = "#c6eff1"
	}
	var dCount = 0
	for (ii=0;ii<=41;ii++){
		if (((ii<7)&&(arrN[ii]>20))||((ii>27)&&(arrN[ii]<20))){
			eval("sp"+ii).innerHTML = arrN[ii]
			eval("sp"+ii).className = "c3"
		}
		else{
			eval("sp"+ii).innerHTML = arrN[ii]
			if ((dCount==0)||(dCount==6)){
				eval("sp"+ii).className = "c2"
			}
			else{
				eval("sp"+ii).className = "c1"
			}
			if ((arrN[ii]==dd)&&(mm==currM)&&(yyyy==currY)){
				eval("sp"+ii).style.backgroundColor="#90EE90"
			}
		}
	dCount += 1
		if (dCount>6){
			dCount=0
		}
	}
	}


	</script>



</head>




<body	style="overflow:hidden;">



<!-- menu ladinho -->
<div id="menu">
		<ul>
		<a href="inicio.php">
		<div id="fotologo">
		<img src="menulogo.jpg" width=250px>
		</div>
		</a>

    	<li></li>
			<li><a href="">Perfil</a></li>
      <br>
			<li><a href="">Calendário</a></li>
      <br>
			<li><a href="">Notas</a> </li>
			<br>
			<li><a href="inicio.php">Sair</a></li>
			<li><img src="fotodomenu.png" width=250px height= 540px> </li>
		</ul>
</div>
 <!-- PEGAR OS DADOS COM O PHP (calendário1.php) -->

	<?php foreach ($calendario [nome inventado agora] as $cdario) { ?>
	<script type="text/javascript">writeCalendar()</script>
	<div id=nota>
	<form class=notaf>
		<h1 id=titulo> Dias com eventos: <?php $cadrio['dia'] ?> < </h1>
		<input type = "">

	<?php } ?>
</div>
</body>

<!-- O BANCO DE DADOS:
CREATE TABLE calendario (
id INT NOT NULL AUTO INCREMENT PRIMARY KEY
nome VARCHAR (50) NOT NULL,
dia DATE NOT NULL;
);
 -->
