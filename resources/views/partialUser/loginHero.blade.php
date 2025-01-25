@auth
	<!-- Hero  per accesso utente -->
	<div class="hero">
		<div class="row">
			<div class="col-md-6">
				<h1 class="display-4">MODistribuzione</h1>
				<p class="lead">Welcome, {{ Auth::user()->name }}!</p>
			</div>
			<div class="col-md-6">
				<h2>Descrizione del sito</h2>
				<p>MODistribuzione è la tua piattaforma di fiducia per una vasta gamma di prodotti di alta qualità a prezzi
					competitivi. La nostra piattaforma è facile da usare e il nostro servizio clienti è sempre pronto ad aiutarti.</p>
				<a
					href="#"
					class="btn btn-secondary mb-3"
				>Vedi il profilo</a>
				@if (Auth::user()->is_admin)
					<a
						href="{{ route('admin.index') }}"
						class="btn btn-primary mb-3"
					>Vai in admin</a>
				@endif
			</div>
		</div>
	</div>
@else
	<!-- Hero  per il login dell'utente -->
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
						class="btn btn-primary mb-3"
					>Accedi</button>
				</form>
			</div>
			<div class="col-md-6">
				<h2>Perché scegliere MODistribuzione?</h2>
				<p>MODistribuzione offre una vasta gamma di prodotti di alta qualità a prezzi competitivi. La nostra piattaforma è
					facile da usare e il nostro servizio clienti è sempre pronto ad aiutarti.</p>
				<p>Registrati oggi stesso e scopri tutti i vantaggi di essere un nostro cliente!</p>
				<!-- Aggiungi il pulsante di registrazione qui -->
				<a
					href="{{ route('user.register') }}"
					class="btn btn-secondary mb-3"
				>Registrati</a>
			</div>
		</div>
	</div>
@endauth
