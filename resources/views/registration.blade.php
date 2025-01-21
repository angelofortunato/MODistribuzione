<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1.0"
	>
	<title>Registration Form</title>
	<link
		rel="stylesheet"
		href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
	>
</head>

<body>
	<div class="container mt-5">
		<h2>Registration Form</h2>
		@if (session('success'))
			<div class="alert alert-success">
				{{ session('success') }}
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
			<div class="form-group">
				<label for="name">Name</label>
				<input
					type="text"
					class="form-control"
					name="name"
					id="name"
					required
				>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input
					type="email"
					class="form-control"
					name="email"
					id="email"
					required
				>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input
					type="password"
					class="form-control"
					name="password"
					id="password"
					required
				>
			</div>
			<div class="form-group">
				<label for="password_confirmation">Confirm Password</label>
				<input
					type="password"
					class="form-control"
					name="password_confirmation"
					id="password_confirmation"
					required
				>
			</div>
			<div class="form-group">
				<label for="city">City</label>
				<input
					type="text"
					class="form-control"
					name="city"
					id="city"
					required
				>
			</div>
			<div class="form-group">
				<label for="address">Address</label>
				<input
					type="text"
					class="form-control"
					name="address"
					id="address"
					required
				>
			</div>
			<div class="form-group">
				<label for="civico">Civico</label>
				<input
					type="text"
					class="form-control"
					name="civico"
					id="civico"
					required
				>
			</div>
			<div class="form-group">
				<label for="cap">CAP</label>
				<input
					type="text"
					class="form-control"
					name="cap"
					id="cap"
					required
				>
			</div>
			<div class="form-group">
				<label for="ragione_sociale">Ragione Sociale</label>
				<input
					type="text"
					class="form-control"
					name="ragione_sociale"
					id="ragione_sociale"
					required
				>
			</div>
			<div class="form-group">
				<label for="partita_iva">Partita IVA</label>
				<input
					type="text"
					class="form-control"
					name="partita_iva"
					id="partita_iva"
					required
				>
			</div>
			<div class="form-group">
				<label for="visura_camerale">Visura Camerale (PDF)</label>
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
				class="btn btn-primary"
			>Register</button>
		</form>
	</div>
</body>

</html>
