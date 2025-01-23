<!DOCTYPE html>
<html lang="it">

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
		<div class="row">
			<h2>Prodotti Acquistati dagli Utenti</h2>
			<p class="lead">Elenco dei prodotti acquistati dagli utenti su MODistribuzione</p>
		</div>

		@foreach ($users as $user)
			@php
				$products = $user->products->filter(function ($product) {
				    return $product->pivot->status == 0;
				});
				$totalSum = $products->sum(function ($product) {
				    return $product->price * $product->pivot->quantity;
				});
			@endphp

			@if ($products->isNotEmpty())
				<div class="table-responsive mb-5">
					<h3>{{ $user->name }}</h3>
					<table class="table-striped table-hover table">
						<thead class="table-dark">
							<tr>
								<th scope="col">Nome Prodotto</th>
								<th scope="col">Quantità</th>
								<th scope="col">Prezzo Unitario</th>
								<th scope="col">Totale</th>
							</tr>
						</thead>
						<tbody class="table-group-divider">
							@foreach ($products as $product)
								<tr>
									<td>{{ $product->name }}</td>
									<td>{{ $product->pivot->quantity }}</td>
									<td>{{ $product->price }}&euro;</td>
									<td>{{ $product->price * $product->pivot->quantity }}&euro;</td>
								</tr>
							@endforeach
							<tr>
								<td
									colspan="3"
									class="text-end"
								><strong>Totale:</strong></td>
								<td><strong>{{ $totalSum }}&euro;</strong></td>
							</tr>
						</tbody>
					</table>
				</div>
			@endif
		@endforeach
	</div>
</body>

</html>
