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
	<link
		rel="stylesheet"
		href="{{ asset('css/welcome.css') }}"
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

		@include('partialUser.loginHero')

		@include('partialUser.offerteHero')


		<div class="hero mt-5 bg-white py-5 text-center">
			<div class="container">
				<h1 class="display-4">Scopri i nostri prodotti!</h1>
				<p class="lead">Esplora la nostra vasta gamma di prodotti di alta qualità a prezzi competitivi.</p>
				<a
					href="{{ route('user.listino') }}"
					class="btn btn-primary"
				>Vai alla sezione prodotti</a>
			</div>
		</div>




	</div>
	@include('partialUser.footer')
</body>

</html>
