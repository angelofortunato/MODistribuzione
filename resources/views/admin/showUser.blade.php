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
		<h2>Dettaglio Utente</h2>

		<form
			action="{{ route('users.destroy', $user->id) }}"
			method="POST"
			class="d-inline"
		>
			@csrf
			@method('DELETE')
			<button
				type="submit"
				class="btn btn-danger mb-3"
				onclick="return confirm('Sei sicuro di voler eliminare questo Utente?')"
			>Elimina</button>
		</form>

		<a
			href="{{ route('admin.servePdf', $user->id) }}"
			target="_blank"
			class="btn btn-secondary mb-3"
		>Apri PDF</a>

		<table class="table-striped table">
			<tr>
				<th>ID</th>
				<td>{{ $user->id }}</td>
			</tr>
			<tr>
				<th>Nome</th>
				<td>{{ $user->name }}</td>
			</tr>
			<tr>
				<th>Email</th>
				<td>{{ $user->email }}</td>
			</tr>
			<tr>
				<th>P. IVA</th>
				<td>{{ $user->partita_iva }}</td>
			</tr>
			<tr>
				<th>Ragione Sociale</th>
				<td>{{ $user->ragione_sociale }}</td>
			</tr>
			<tr>
				<th>Città</th>
				<td>{{ $user->city }}</td>
			</tr>
			<tr>
				<th>Indirizzo</th>
				<td>{{ $user->address }}</td>
			</tr>
			<tr>
				<th>Civico</th>
				<td>{{ $user->civico }}</td>
			</tr>
		</table>
		<a
			href="{{ route('admin.utenti') }}"
			class="btn btn-primary"
		>Back to Users</a>
	</div>
</body>

</html>
