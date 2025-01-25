<!DOCTYPE html>
<html lang="it">

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
	<title>Inserisci Prodotto</title>
	<link
		href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
		rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
		crossorigin="anonymous"
	>
	<link
		rel="stylesheet"
		href="{{ asset('css/styles.css') }}"
	> <!-- Importa il file CSS -->
</head>

<body>
	@include('admin.partials.menu')
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Inserisci Prodotto</div>
					<div class="card-body">
						@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif

						@if (session('success'))
							<div class="alert alert-success">{{ session('success') }}</div>
						@endif

						<form
							action="{{ route('products.store') }}"
							method="POST"
							enctype="multipart/form-data"
						>
							@csrf
							<div class="form-floating mb-3">
								<input
									type="text"
									name="name"
									id="name"
									class="form-control"
									placeholder="Nome"
									value="{{ old('name') }}"
									required
								>
								<label for="name">Nome</label>
							</div>
							<div class="form-floating mb-3">
								<textarea
								 name="description"
								 id="description"
								 class="form-control"
								 placeholder="Descrizione"
								 required
								>{{ old('description') }}</textarea>
								<label for="description">Descrizione</label>
							</div>
							<div class="form-floating mb-3">
								<input
									type="number"
									step=".01"
									name="price"
									id="price"
									class="form-control"
									placeholder="Prezzo"
									value="{{ old('price') }}"
									required
								>
								<label for="price">Prezzo</label>
							</div>
							<div class="form-floating mb-3">
								<select
									name="categoria"
									id="categoria"
									class="form-select"
									required
								>
									<option value="bevande">Bevande</option>
								</select>
								<label for="categoria">Categoria</label>
							</div>
							<div class="mb-3">
								<label
									for="image"
									class="form-label"
								>Immagine</label>
								<input
									type="file"
									name="image"
									id="image"
									class="form-control"
									required
								>
							</div>
							<button
								type="submit"
								class="btn btn-primary"
							>Salva</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
		crossorigin="anonymous"
	></script>
</body>
