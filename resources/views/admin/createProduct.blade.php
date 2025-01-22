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
		href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
		rel="stylesheet"
	>
</head>

<body>
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
							<div class="form-group">
								<label for="name">Nome</label>
								<input
									type="text"
									name="name"
									id="name"
									class="form-control"
									value="{{ old('name') }}"
									required
								>
							</div>
							<div class="form-group">
								<label for="description">Descrizione</label>
								<textarea
								 name="description"
								 id="description"
								 class="form-control"
								 required
								>{{ old('description') }}</textarea>
							</div>
							<div class="form-group">
								<label for="price">Prezzo</label>
								<input
									type="number"
									step=".01"
									name="price"
									id="price"
									class="form-control"
									value="{{ old('price') }}"
									required
								>
							</div>
							<div class="form-group">
								<label for="image">Immagine</label>
								<input
									type="file"
									name="image"
									id="image"
									class="form-control-file"
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

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
