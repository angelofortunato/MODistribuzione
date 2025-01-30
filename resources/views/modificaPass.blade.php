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
	<title>Modifica Password</title>
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

	<div class="container-fluid mt-5">
		<div
			class="row"
			style="margin-top: 50px; margin-bottom: 350px;"
		>
			<!-- Sidebar -->
			<div class="col-md-4 d-none d-md-block bg-white p-3">
				<div class="list-group">
					<a
						href="{{ route('user.profilo') }}"
						class="list-group-item list-group-item-action"
					>Visualizza Profilo</a>
					<a
						href="{{ route('user.modifyPass') }}"
						class="list-group-item list-group-item-action"
					>Modifica Password</a>
				</div>
			</div>
			<!-- Dropdown for small screens -->
			<div class="col-12 d-md-none mb-2 mt-5">
				<div class="dropdown">
					<button
						class="btn btn-secondary dropdown-toggle w-100"
						type="button"
						id="dropdownMenuButton"
						data-bs-toggle="dropdown"
						aria-expanded="false"
					>
						Opzioni
					</button>
					<ul
						class="dropdown-menu w-100"
						aria-labelledby="dropdownMenuButton"
					>
						<li><a
								class="dropdown-item"
								href="{{ route('user.profilo') }}"
							>Visualizza Profilo</a></li>
						<li><a
								class="dropdown-item"
								href="{{ route('user.modifyPass') }}"
							>Modifica Password</a></li>
					</ul>
				</div>
			</div>
			<!-- User Information -->
			<div class="col-md-8 bg-white p-3">
				<h2>Modifica Password</h2>

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
					action="{{ route('user.updatePassword') }}"
					method="POST"
				>
					@csrf
					<div class="form-floating mb-3">
						<input
							type="password"
							class="form-control"
							id="current_password"
							name="current_password"
							placeholder="Vecchia Password"
							required
						>
						<label for="current_password">Vecchia Password</label>
					</div>
					<div class="form-floating mb-3">
						<input
							type="password"
							class="form-control"
							id="new_password"
							name="new_password"
							placeholder="Nuova Password"
							required
						>
						<label for="new_password">Nuova Password</label>
					</div>
					<div class="form-floating mb-3">
						<input
							type="password"
							class="form-control"
							id="new_password_confirmation"
							name="new_password_confirmation"
							placeholder="Conferma Nuova Password"
							required
						>
						<label for="new_password_confirmation">Conferma Nuova Password</label>
					</div>
					<button
						type="submit"
						class="btn btn-primary"
					>Modifica Password</button>
				</form>
			</div>
		</div>
	</div>

	@include('partialUser.footer')
	<script src="{{ asset('js/search.js') }}"></script>
</body>

</html>
