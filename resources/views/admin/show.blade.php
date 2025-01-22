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
</head>

<body>
	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
		crossorigin="anonymous"
	></script>
	@include('admin.partials.menu')

	<div class="container mt-5">
		<h2>Dettaglio Prodotto</h2>
		<div class="mb-3">
			<img
				src="{{ asset('storage/' . $product->image) }}"
				alt="Immagine di {{ $product->name }}"
				class="img-fluid"
				style="height: 200px"
			>
		</div>
		<table class="table-striped table">
			<tr>
				<th>ID</th>
				<td>{{ $product->id }}</td>
			</tr>
			<tr>
				<th>Nome</th>
				<td>{{ $product->name }}</td>
			</tr>
			<tr>
				<th>Descrizione</th>
				<td>{{ $product->description }}</td>
			</tr>
			<tr>
				<th>Prezzo</th>
				<td>{{ $product->price }}&euro;</td>
			</tr>
		</table>
		<a
			href="{{ route('admin.prodotti') }}"
			class="btn btn-primary"
		>Back to Products</a>
	</div>
</body>

</html>
