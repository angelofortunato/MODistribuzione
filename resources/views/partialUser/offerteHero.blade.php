<!-- Hero section per i prodotti in offerta -->
<div class="hero mt-5">
	<h2 class="display-4">Prodotti in Offerta</h2>
	<div class="scrolling-wrapper">
		@foreach ($productsOnOffer as $product)
			<div class="col">
				<div class="card">
					<img
						src="{{ asset('storage/' . $product->image) }}"
						class="card-img-top img-fluid"
						alt="{{ $product->name }}"
						style="height: 200px; object-fit: contain;"
					>
					<div class="card-body">
						<h5 class="card-title">{{ $product->name }}</h5>
						<p class="card-text"><strong>Prezzo:</strong> {{ $product->price }}&euro;</p>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
<script src="{{ asset('js/welcome.js') }}"></script>
