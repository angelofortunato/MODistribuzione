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
			<h2>Pannello prodotti</h2>
			<p class="lead">Prodotti disponibili su MODistribuzione</p>
		</div>

		<div class="d-flex justify-content-between mb-3">
			<a
				href="{{ route('products.create') }}"
				class="btn btn-primary"
			>Add</a>
			<form
				action="{{ route('admin.prodotti') }}"
				method="GET"
				class="d-flex"
			>
				<input
					type="text"
					name="search"
					class="form-control me-2"
					placeholder="Cerca per nome"
					value="{{ request('search') }}"
				>
				<button
					type="submit"
					class="btn btn-outline-secondary"
				>Cerca</button>
			</form>
		</div>

		<table class="table-striped table-hover table">
			<thead class="table-dark">
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Nome</th>
					<th scope="col">Descrizione</th>
					<th scope="col">Prezzo</th>
				</tr>
			</thead>
			<tbody class="table-group-divider">
				@foreach ($products as $product)
					<tr
						class="clickable-row"
						data-href="{{ route('products.show', $product->id) }}"
					>
						<td>{{ $product->id }}</td>
						<td>{{ $product->name }}</td>
						<td>{{ $product->description }}</td>
						<td>{{ $product->price }}&euro;</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var rows = document.querySelectorAll('.clickable-row');
			rows.forEach(function(row) {
				row.addEventListener('click', function() {
					window.location.href = row.getAttribute('data-href');
				});
			});
		});
	</script>
</body>

</html>
