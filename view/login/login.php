<html>
<head>
    <title>LOGIN</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="assets/css/vaidroll.css" />	
</head>
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