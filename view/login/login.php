<html>
<head>
    <title>LOGIN</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- <link rel="stylesheet" href="assets/css/vaidroll.css" />	 -->
</head>
<style>
  *
{
	box-sizing: border-box;
	font-family: sans-serif;
	color:black;
	
}
body
{
	margin: 0;
    padding: 0;
	background: #d5ffff; 
}
.cajafuera
{
 width: 100%;
    height: 100%;
    display: grid;
background: #f2f2f2;

}
.formulariocaja
{
	background-color: #f3f3f3;
    width: 400px;
    height: auto;
    position: relative;
    margin: auto;
    padding: 1em;
	border-radius: 5px;
	color:white;
	/* border:0.1em solid black; */
}

input 
{
	display: block;
	text-align: left;
	box-sizing: border-box;
}

.cajaentradatexto{
    width: 80%;
    padding: 10px;
	font-size:1em;
	border-radius:5px;
	border:1px solid black;
	color:black;
	font-weight: bold;
}

.formtitulo
{
	font-size:2em;
	font-weight: bold;
	padding-bottom:0.8em;
	color:black;
}

a
{
	text-decoration: none;
	cursor:pointer;
	color:#1A3A83;
		font-weight: bold;
}

.afcheckbox1
{
	margin-top:5%;
	margin-left:10%;
}
.botonenviar
{
    width: 80%;
    padding: 10px 30px;
    cursor: pointer;
    display: block;
    margin-top: 10px;
    border: 0;
    outline: none;
    border-radius: 10px;
	border:1px solid black;
	font-size:16px;
	color:white;
	background-color: #5dc1b9;
	text-align:center;
	margin-top:15%;
	
	font-weight: bold;
}

img
{
	width: 150px;
}

.textoscajas
{
	margin-left:8%;
	font-weight: bold;
	margin-top:2%;
	margin-bottom:2%;
	color:black
}
.autor
{
	margin-top:5%;
	color:black;
}
</style>
<body>
  <div class="cajafuera" align="center">
 
<div class="formulariocaja">
<form method="post" action="    Entrar.php    " name="vaidrollteam">
<div class="formtitulo">Login</div>
<div align="left" class="textoscajas">&#128273; Ingresar usuario</div>
<input type="text" name="nombre" class="cajaentradatexto">
<div align="left" class="textoscajas">
&#128274; Ingresar contraseña
</div>
<input type="password" name="contraseña" id="password"
 class="cajaentradatexto">
 <div class="afcheckbox1" align="left">
 <div style="float:left;">
 <input type="checkbox" onclick="verpassword()" >
 </div>
 <div style="float:left;">
 Mostrar contraseña
 </div>
 </div>
 
<input type="submit" value="Iniciar sesión" class="botonenviar">

</form>
</div>
<div class="autor">
© 2022 Formulario Login. Todos los derechos reservados | Diseño de Isaac Saado 
<div>
</div>
</body>

<script>
  function verpassword(){
      var tipo = document.getElementById("password");
      if(tipo.type == "password")
	  {
          tipo.type = "text";
      }
	  else
	  {
          tipo.type = "password";
      }
  }
</script>

</html>