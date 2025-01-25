<form
	action="/register"
	method="POST"
	enctype="multipart/form-data"
	style="margin-top: 100px; margin-bottom: 100px;"
>
	<h2 class="display-4 my-3">Registrazione</h2>
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
	@csrf
	<div class="row g-2">
		<div class="col-md-6">
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
		</div>
		<div class="col-md-6">
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
		</div>
	</div>
	<div class="row g-2">
		<div class="col-md-6">
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
		</div>
		<div class="col-md-6">
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
		</div>
	</div>
	<div class="row g-2">
		<div class="col-md-6">
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
		</div>
		<div class="col-md-6">
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
		</div>
	</div>
	<div class="row g-2">
		<div class="col-md-6">
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
		</div>
		<div class="col-md-6">
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
		</div>
	</div>
	<div class="row g-2">
		<div class="col-md-6">
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
		</div>
		<div class="col-md-6">
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
		</div>
	</div>
	<div class="row g-2">
		<div class="col-md-6">
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
		</div>
		<div class="col-md-6">
			<div class="mb-3">
				<input
					type="file"
					class="form-control"
					name="visura_camerale"
					id="visura_camerale"
					accept="application/pdf"
					required
				>
				<label
					for="visura_camerale"
					class="form-label lead"
				>Visura Camerale (PDF)</label>
			</div>
		</div>
	</div>
	<button
		type="submit"
		class="btn btn-primary mb-3 mt-2"
	>Registra</button>
</form>
