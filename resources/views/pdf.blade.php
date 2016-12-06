<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;" charset="UTF-8">

	<title>Comprobante</title>

	<style type="text/css">
		.Logo{
			width: 180px;
			height: 80px;
		}
		h2{
			color: #708090;
			margin-top: 100px;

		}
		table {     
			font-family: Sans-Serif;
    		font-size: 14px;    
    		margin: 45px;     
    		width: 650px; 
    		text-align: center;    
    		border-collapse: collapse; 
    	}

		th {     
			font-size: 14px;    
			padding: 8px;    
			background: #b9c9fe;
   			border-top: 4px solid #aabcfe;    
   			border-bottom: 1px solid #fff; 
   			color: #039; 
   		}

		td {    
			padding: 8px;     
			background: #e8edff;     
			border-bottom: 1px solid #fff;
    		color: #669;   
    		border-top: 1px solid transparent; 
    	}

		tr:hover td { background: #d0dafd; color: #339; }
		.contenido{
			text-align: center;
		}

		caption{
			font-size: 18px;
			font-family: serif;
			
		}
	</style>

</head>
<body>

	<div >
	  <img class="Logo" src="images/logoo.png" >
    </div>
    <hr >

    <h2>{{ $user->name }} {{ $user->lastname }}</h2>

    <h4>Fecha de compra: {{$sal->created_at}} </h4>

<table >
	<caption>Lista de articulos </caption>
	<tr>
		<th>#</th>
        <th>Nombre</th>
        <th>Descripción</th>
		<th>Cantidad</th>                                   
        <th>Precio (sin impuestos)</th>
        
	</tr>
	@foreach ( $prod as $p )
	<tr class="contenido">
		<td>{{$p->sales_id}}</td>
        <td>{{$p->name}}</td>
        <td>{{$p->description}}</td>                                           
        <td>{{$p->quantity}}</td>
        <td>$ {{number_format($p->price)}}</td>  
	</tr>
	 @endforeach
    <tr>
        <td>-</td>
        <td>-</td>
		<td>-</td>
        <td>Total (con impuestos)</td>
        <td>$ {{number_format($sal->total)}}</td>

    </tr>
             
</table>





</body>
</html>