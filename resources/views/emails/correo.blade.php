<!DOCTYPE html>
<html>
<head>
	<title>Correo</title>
	<img src="http://imageshack.com/a/img924/3825/0o6Dxd.png" width="300" height="100">

</head>
<body>

	<br><label style="color: #ff0000; font-family: century; font-size: 30px;"><b>Pago realizado con éxito</b></label>

<div style="text-align: justify; font-size: 24px; ">
	<p >Tu pago por el pedido ha sido aceptado.</p>
	<p>En estos momentos, tu pago está siendo verificado. Por lo general, las verificaciones tardan menos de 24 horas. Tras la verificación, el vendedor comenzará a preparar tu pedido. Durante este tiempo no podrás hacer cambios en tu pedido.</p>
	<label >Ingrese al siguiente LINK para ver su Compra</label>
	<a href="{{url('/Compras')}}/{{'user_id'}}" style="color: blue;">127.0.0.1/CrazyRoach/public/Compras/{{ $user['id'] }} </a>

</div>


 
<div>
	<label>Un saludo,<br></label>
	<label>CrazyRoach.com</label><br>
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