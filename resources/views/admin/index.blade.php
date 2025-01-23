<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1.0"
	>
	<title>Admin Dashboard</title>
	<link
		href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
		rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
		crossorigin="anonymous"
	>
	<link
		rel="stylesheet"
		href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
	>
	<link
		rel="stylesheet"
		href="{{ asset('css/styles.css') }}"
	> <!-- Importa il file CSS -->
</head>

<body>
	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
		crossorigin="anonymous"
	></script>
	@include('admin.partials.menu')

	<div class="container mt-5">
		<h2>Admin Dashboard</h2>
		<p class="lead">Welcome, {{ Auth::user()->name }}!</p>

		<div class="row">
			<div class="col-md-4">
				<div class="card text-center">
					<div class="card-body">
						<i
							class="bi bi-box-seam"
							style="font-size: 2rem;"
						></i>
						<h5 class="card-title mt-2">Prodotti</h5>
						<p class="card-text">{{ $productCount }} prodotti disponibili</p>
						<a
							href="{{ route('admin.prodotti') }}"
							class="btn btn-primary"
						>Vai ai Prodotti</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card text-center">
					<div class="card-body">
						<i
							class="bi bi-people"
							style="font-size: 2rem;"
						></i>
						<h5 class="card-title mt-2">Utenti</h5>
						<p class="card-text">{{ $userCount }} utenti registrati</p>
						<a
							href="{{ route('admin.utenti') }}"
							class="btn btn-primary"
						>Vai agli Utenti</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card text-center">
					<div class="card-body">
						<i
							class="bi bi-cart"
							style="font-size: 2rem;"
						></i>
						<h5 class="card-title mt-2">Ordini</h5>
						<p class="card-text">{{ $orderCount }} ordini nuovi</p>
						<a
							href="{{ route('admin.product_user') }}"
							class="btn btn-primary"
						>Vai agli Ordini</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
