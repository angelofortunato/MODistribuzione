<!DOCTYPE html>
<html lang="en">

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
	<title>Homepage</title>
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
		.hero {
			background-color: #eeeeee;
			padding: 2rem;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
		}

		.container-fluid {
			padding-left: 0;
			padding-right: 0;
		}

		body {
			background-color: ##ced4da;
		}
	</style>
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
	<div class="container-fluid mt-5">

		@auth
			<h1 class="display-4">MODistribuzione</h1>
			<p class="lead">Welcome, {{ Auth::user()->name }}!</p>
		@else
			<div class="hero">
				<div class="row">
					<div class="col-md-6">
						<h1 class="display-4">Benvenuto su MODistribuzione!</h1>
						<p class="lead">Effettua il login per accedere ai nostri servizi.</p>
						<hr class="my-4">
						@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						<form
							action="{{ route('login') }}"
							method="POST"
						>
							@csrf
							<div class="form-floating mb-3">
								<input
									type="email"
									class="form-control"
									id="email"
									name="email"
									placeholder="name@example.com"
									required
								>
								<label for="email">Email</label>
							</div>
							<div class="form-floating mb-3">
								<input
									type="password"
									class="form-control"
									id="password"
									name="password"
									placeholder="Password"
									required
								>
								<label for="password">Password</label>
							</div>
							<button
								type="submit"
								class="btn btn-primary"
							>Login</button>
						</form>
					</div>
					<div class="col-md-6">
						<h2>Perché scegliere MODistribuzione?</h2>
						<p>MODistribuzione offre una vasta gamma di prodotti di alta qualità a prezzi competitivi. La nostra piattaforma è
							facile da usare e il nostro servizio clienti è sempre pronto ad aiutarti.</p>
						<p>Registrati oggi stesso e scopri tutti i vantaggi di essere un nostro cliente!</p>
					</div>
				</div>
			</div>
		@endauth

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

	</div>
</body>

</html>
