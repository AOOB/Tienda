<!DOCTYPE html>
<html>
<head>
	<title>Cambiar Imagen</title>
	<script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
	
	<form action="{{url('/calando')}}" method="get">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="form-group">
			<label for="image">Imagen (url)</label>
			<input type="url" class="form-control" name="image" style=" width: 300px; border: groove;" required>
			<input type="hidden" name="id" value="{{ Auth::user()->id }}">
		</div>



	
			<input type="submit" style=" background: #ff1493;">
	
</body>
</html>