<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1.0"
	>
	<title>Registrazione</title>
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
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
	@include('partialUser.menuUser')
	<div class="container mt-5">
		<h2>Registrazione</h2>
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		@if (session('error'))
			<div class="alert alert-danger">
				{{ session('error') }}
			</div>
		@endif
		<form
			action="/register"
			method="POST"
			enctype="multipart/form-data"
		>
			@csrf
			<div class="form-floating mb-3">
				<input
					type="text"
					class="form-control"
					name="name"
					id="name"
					placeholder="Name"
					value="{{ old('name') }}"
					required
				>
				<label for="name">Name</label>
			</div>
			<div class="form-floating mb-3">
				<input
					type="email"
					class="form-control"
					name="email"
					id="email"
					placeholder="Email"
					value="{{ old('email') }}"
					required
				>
				<label for="email">Email</label>
			</div>
			<div class="form-floating mb-3">
				<input
					type="password"
					class="form-control"
					name="password"
					id="password"
					placeholder="Password"
					required
				>
				<label for="password">Password</label>
			</div>
			<div class="form-floating mb-3">
				<input
					type="password"
					class="form-control"
					name="password_confirmation"
					id="password_confirmation"
					placeholder="Confirm Password"
					required
				>
				<label for="password_confirmation">Confirm Password</label>
			</div>
			<div class="form-floating mb-3">
				<input
					type="text"
					class="form-control"
					name="city"
					id="city"
					placeholder="City"
					value="{{ old('city') }}"
					required
				>
				<label for="city">City</label>
			</div>
			<div class="form-floating mb-3">
				<input
					type="text"
					class="form-control"
					name="address"
					id="address"
					placeholder="Address"
					value="{{ old('address') }}"
					required
				>
				<label for="address">Address</label>
			</div>
			<div class="form-floating mb-3">
				<input
					type="text"
					class="form-control"
					name="civico"
					id="civico"
					placeholder="Civico"
					value="{{ old('civico') }}"
					required
				>
				<label for="civico">Civico</label>
			</div>
			<div class="form-floating mb-3">
				<input
					type="text"
					class="form-control"
					name="cap"
					id="cap"
					placeholder="CAP"
					value="{{ old('cap') }}"
					required
				>
				<label for="cap">CAP</label>
			</div>
			<div class="form-floating mb-3">
				<input
					type="text"
					class="form-control"
					name="ragione_sociale"
					id="ragione_sociale"
					placeholder="Ragione Sociale"
					value="{{ old('ragione_sociale') }}"
					required
				>
				<label for="ragione_sociale">Ragione Sociale</label>
			</div>
			<div class="form-floating mb-3">
				<input
					type="text"
					class="form-control"
					name="partita_iva"
					id="partita_iva"
					placeholder="Partita IVA"
					value="{{ old('partita_iva') }}"
					required
				>
				<label for="partita_iva">Partita IVA</label>
			</div>
			<div class="form-floating mb-3">
				<input
					type="tel"
					class="form-control"
					name="telefono"
					id="telefono"
					placeholder="Telefono"
					value="{{ old('telefono') }}"
					required
				>
				<label for="telefono">Telefono</label>
			</div>
			<div class="mb-3">
				<label
					for="visura_camerale"
					class="form-label"
				>Visura Camerale (PDF)</label>
				<input
					type="file"
					class="form-control"
					name="visura_camerale"
					id="visura_camerale"
					accept="application/pdf"
					required
				>
			</div>
			<button
				type="submit"
				class="btn btn-primary mb-3 mt-2"
			>Register</button>
		</form>
	</div>
</body>

</html>
