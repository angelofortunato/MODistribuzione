<nav
	class="navbar navbar-expand-lg bg-body-tertiary"
	data-bs-theme="dark"
>
	<div class="container-fluid">
		<a
			class="navbar-brand"
			href="{{ route('admin.index') }}"
		>MODistribuzione</a>
		<button
			class="navbar-toggler"
			type="button"
			data-bs-toggle="collapse"
			data-bs-target="#navbarNavAltMarkup"
			aria-controls="navbarNavAltMarkup"
			aria-expanded="false"
			aria-label="Toggle navigation"
		>
			<span class="navbar-toggler-icon"></span>
		</button>
		<div
			class="navbar-collapse collapse"
			id="navbarNavAltMarkup"
		>
			<div class="navbar-nav">
				<a
					class="nav-link"
					aria-current="page"
					href="{{ route('admin.index') }}"
				>Home</a>
				<a
					class="nav-link"
					href="{{ route('admin.prodotti') }}"
				>Prodotti</a>
				<a
					class="nav-link"
					href="{{ route('admin.utenti') }}"
				>Utenti</a>
			</div>

			<div class="ms-5">
				@auth
					<form
						action="{{ route('logoutUser') }}"
						method="post"
						class="text-center"
					>
						@csrf
						<button
							type="submit"
							class="btn btn-danger"
						>Logout</button>
					</form>
				@endauth
			</div>

		</div>
	</div>
</nav>
