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
	<title>Login</title>
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

<body class="bg-light">
	@include('partialUser.menuUser')
	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
		crossorigin="anonymous"
	></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>

	<div class="col-12 col-lg-8 container mt-5">
		<div class="card">
			<div class="card-body">
				<h2 class="card-title text-center">Login</h2>

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
					action="{{ route('login') }}"
					method="POST"
				>
					@csrf
					<div class="form-group">
						<label for="email">Email</label>
						<input
							type="email"
							name="email"
							id="email"
							class="form-control"
							placeholder="Email"
							value="{{ old('email') }}"
							required
						>
					</div>
					<div class="form-group mt-2">
						<label for="password">Password</label>
						<input
							type="password"
							id="password"
							name="password"
							class="form-control"
							placeholder="Password"
							required
						>
					</div>
					<button
						type="submit"
						class="btn btn-primary btn-block mt-2"
					>Login</button>
				</form>
			</div>
		</div>
	</div>

</body>

</html>
