<!DOCTYPE html>
<html>
<head>
	<title>Correo</title>
	<img src="http://imageshack.com/a/img924/3825/0o6Dxd.png" width="300" height="100">

</head>
<body>

	<br><label style="color: #ff0000; font-family: century; font-size: 30px;"><b>Pago realizado con éxito</b></label>

<div style="text-align: justify; font-size: 24px; ">
	<p >¡FELICIDADES!Tu pago por el pedido ha sido aceptado.</p>
	<p>En estos momentos, tu pago ha sido verificado. Por lo general, las entregas son realizadas dentro del periodo de 7 días hábiles. Si se desea el recivo de su compra puede ingresar alsiguiente link e imprimirlo fácilmente.</p>
	<label >Ingrese al siguiente LINK para ver su Compra</label>
	<a href="{{url('/Compras')}}/{{$user['id']}}" style="color: blue;">Ingrese aquí para ver su compra.! </a>

</div>


 
<div>
	<label>Un saludo,<br></label>
	<label>CrazyRoach.tk</label><br>
	<?php 
echo date("d-m-Y");
;
?>
</div>

</body>
<footer>
	<hr>
	<label style="color: #A9A9A9">Este email fue generado de manera automática. Por favor no lo respondas.</label>
</footer>
</html>