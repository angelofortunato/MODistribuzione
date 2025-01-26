<!DOCTYPE html>
<html lang="it">

<head>
	<meta charset="UTF-8">
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1.0"
	>
	<title>Carrello</title>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
	@include('partialUser.menuUser')

	<div class="container mt-5">
		<div
			class="row"
			style="margin-top: 100px; margin-bottom: 100px;"
		>
			<h1 class="display-4">Carrello</h1>
			@if (session('cart'))
				<table class="table">
					<thead>
						<tr>
							<th>Prodotto</th>
							<th>Quantità</th>
							<th>Prezzo</th>
							<th>Totale</th>
						</tr>
					</thead>
					<tbody>
						@foreach (session('cart') as $id => $details)
							<tr>
								<td>{{ $details['name'] }}</td>
								<td>{{ $details['quantity'] }}</td>
								<td>{{ $details['price'] }}&euro;</td>
								<td>{{ $details['price'] * $details['quantity'] }}&euro;</td>
							</tr>
						@endforeach
						<tr>
							<td
								colspan="3"
								class="text-end"
							><strong>Totale Complessivo:</strong></td>
							<td><strong>{{ $total }}&euro;</strong></td>
						</tr>
					</tbody>
				</table>
				<div class="text-end">
					<form
						action="{{ route('cart.simulatePurchase') }}"
						method="POST"
					>
						@csrf
						<button
							type="submit"
							class="btn btn-success"
						>Simula Acquisto</button>
					</form>
				</div>
			@else
				<p>Il carrello è vuoto.</p>
			@endif
		</div>
	</div>

	@include('partialUser.footer')
</body>

</html>
