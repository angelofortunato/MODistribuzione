<!DOCTYPE html>
<html lang="it">

<head>
	<meta charset="UTF-8">
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1.0"
	>
	<title>Listino</title>
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
		href="{{ asset('css/search.css') }}"
	> <!-- Importa il file CSS -->
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
			style="margin-top: 80px;"
		>
			<h1 class="display-4">Prodotti disponibili sul nostro sito</h1>
			<p class="lead">Numero di prodotti attivi: {{ $products->total() }}</p>
			@if (isset($query) && $query)
				<p class="text-muted">Risultati per la ricerca: "{{ $query }}"</p>
			@endif
			<div class="col-md-12 mt-4">
				<div class="row">
					@foreach ($products as $product)
						@if ($product->is_active)
							<div class="col-md-6 col-lg-4 mb-4">
								<div class="card">
									<img
										src="{{ asset('storage/' . $product->image) }}"
										class="card-img-top img-fluid"
										alt="{{ $product->name }}"
										style="height: 200px; object-fit: contain;"
									>
									<div class="card-body">
										<h5 class="card-title d-flex justify-content-between align-items-center">
											{{ $product->name }}
											@if ($product->is_offerta)
												<span class="badge bg-danger">In Offerta</span>
											@endif
										</h5>
										<p class="card-text"><strong>Prezzo:</strong> {{ $product->price }}&euro;</p>
										<a
											href="{{ route('listino.showProduct', $product->id) }}"
											class="btn btn-primary"
										>Acquista ora</a>
									</div>
								</div>
							</div>
						@endif
					@endforeach
				</div>
				<div class="d-flex justify-content-center mt-4">
					{{ $products->appends(request()->input())->links('pagination::bootstrap-4') }}
				</div>
			</div>
		</div>
	</div>
	@include('partialUser.footer')
	<script src="{{ asset('js/search.js') }}"></script>
</body>

</html>
