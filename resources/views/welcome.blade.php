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
	<title>Homepage</title>
	<link
		rel="stylesheet"
		href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
	>
</head>

<body>
	<div class="container mt-5">
		<h1 class="text-center">MODistribuzione</h1>
		<h3 class="text-center">Sempre un passo avanti a voi</h3>

		@if (session('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		@endif

		@if (session('error'))
			<div class="alert alert-danger">
				{{ session('error') }}
			</div>
		@endif

		@auth
			<form
				action="{{ route('logoutUser') }}"
				method="post"
				class="text-center"
			>
				@csrf
				<button
					type="submit"
					class="btn btn-primary"
				>Logout</button>
			</form>
		@endauth
	</div>
</body>

</html>
