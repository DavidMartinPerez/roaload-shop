<?php

if(isset($_GET["usuario"])){ ?>
    <h1>¡Manual de uso para Usuario!</h1>
    <iframe src="http://docs.google.com/gview?url=https://roaload.000webhostapp.com/pdf/Documentaci%C3%B3n%20Usuario%20Registrado.pdf&embedded=true" style="width:100%; height:700px;" frameborder="0"> </iframe>
<?php }
if(isset($_GET["admin"])){ ?>
    <h1>¡Manual de uso para Administrar sistemas!</h1>
    <iframe src="http://docs.google.com/gview?url=https://roaload.000webhostapp.com/pdf/Documentaci%C3%B3n%20Usuario%20Administrador.pdf&embedded=true" style="width:100%; height:700px;" frameborder="0"> </iframe>
<?php }
if(isset($_GET["nousuario"])){ ?>
    <h1>¡Manual de Usuario no registrado!</h1>
    <iframe src="http://docs.google.com/gview?url=https://roaload.000webhostapp.com/pdf/Documentaci%C3%B3n%20Usuario%20no%20registrado.pdf&embedded=true" style="width:100%; height:700px;" frameborder="0"> </iframe>
<?php }


?>