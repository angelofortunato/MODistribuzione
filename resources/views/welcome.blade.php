<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1.0"
	>
	<meta
		http-equiv="X-UA-Compatible"
		content="ie=edge"
	>
	<title>Hompage</title>
</head>

<body>
	<h1>MODistribuzione</h1>
	<h3>Sempre un passo avanti a voi</h3>
	@if (session('success'))
		<div>
			{{ session('success') }}
		</div>
	@endif

	@auth
		<form
			action="{{ route('logoutUser') }}"
			method="post"
		>
			@csrf
			<button type="submit">Logout</button>
		</form>
	@endauth
</body>

</html>
