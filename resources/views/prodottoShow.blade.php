<!DOCTYPE html>
<html lang="it">

<head>
	<meta charset="UTF-8">
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1.0"
	>
	<title>Dettaglio Prodotto</title>
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
	<style>
		.quantity-input {
			display: flex;
			align-items: center;
		}

		.quantity-input input {
			width: 60px;
			text-align: center;
		}

		.quantity-input button {
			width: 30px;
			height: 30px;
			display: flex;
			align-items: center;
			justify-content: center;
		}

		/* Aggiungi queste righe */
		.content {
			display: flex;
			flex-direction: column;
			min-height: 100vh;
		}

		.main-content {
			flex: 1;
		}
	</style>
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
	<div class="content">
		<div class="main-content container mt-5">
			<div
				class="row"
				style="margin-top: 80px;"
			>
				<div class="col-md-4">
					<img
						src="{{ asset('storage/' . $product->image) }}"
						class="img-fluid"
						alt="{{ $product->name }}"
						style="height: 400px; object-fit: contain;"
					>
				</div>
				<div class="col-md-8">
					<h1 class="display-4">
						{{ $product->name }}
						@if ($product->is_offerta)
							<span
								class="badge bg-danger ms-2"
								style="font-size: 1rem;"
							>In Offerta</span>
						@endif
					</h1>
					<div class="quantity-input mb-3">
						<button
							type="button"
							class="btn btn-outline-secondary"
							onclick="decrementQuantity()"
						>-</button>
						<input
							type="number"
							class="form-control mx-2"
							id="quantity"
							name="quantity"
							value="1"
							min="1"
							onchange="updatePrice()"
						>
						<button
							type="button"
							class="btn btn-outline-secondary"
							onclick="incrementQuantity()"
						>+</button>
					</div>
					<p class="lead"><strong>Prezzo:</strong> <span id="total-price">{{ $product->price }}</span>&euro;</p>
					<p>{{ $product->description }}</p>
					<a
						href="#"
						class="btn btn-primary mb-5"
						id="add-to-cart"
					>Aggiungi al carrello</a>
				</div>
			</div>
		</div>
		@include('partialUser.footer')
	</div>

	<script>
		var basePrice = {{ $product->price }};

		function decrementQuantity() {
			var quantityInput = document.getElementById('quantity');
			var currentValue = parseInt(quantityInput.value);
			if (currentValue > 1) {
				quantityInput.value = currentValue - 1;
				updatePrice();
			}
		}

		function incrementQuantity() {
			var quantityInput = document.getElementById('quantity');
			var currentValue = parseInt(quantityInput.value);
			quantityInput.value = currentValue + 1;
			updatePrice();
		}

		function updatePrice() {
			var quantityInput = document.getElementById('quantity');
			var totalPriceElement = document.getElementById('total-price');
			var quantity = parseInt(quantityInput.value);
			var totalPrice = basePrice * quantity;
			totalPriceElement.textContent = totalPrice.toFixed(2);
		}

		document.getElementById('add-to-cart').addEventListener('click', function(event) {
			event.preventDefault();
			var quantity = document.getElementById('quantity').value;
			var productId = {{ $product->id }};

			$.ajax({
				url: '{{ route('cart.add') }}',
				method: 'POST',
				data: {
					_token: '{{ csrf_token() }}',
					product_id: productId,
					quantity: quantity
				},
				success: function(response) {
					alert('Prodotto aggiunto al carrello!');
				},
				error: function(error) {
					alert('Errore durante l\'aggiunta al carrello.');
				}
			});
		});
	</script>
</body>

</html>
