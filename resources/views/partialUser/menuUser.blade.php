<nav
	class="navbar navbar-expand-lg bg-body-tertiary fixed-top"
	data-bs-theme="dark"
>
	<div class="container-fluid">
		<a
			class="navbar-brand ms-3"
			href="/"
		>MODistribuzione</a>
		<div class="d-flex ms-auto">
			<a
				href="{{ route('cart.index') }}"
				class="d-lg-none me-3"
			>
				<i
					class="bi bi-cart"
					style="font-size: 1.5rem; color: white;"
				></i>
			</a>
			@auth
				<div class="dropdown d-lg-none me-3">
					<a
						href="#"
						class="d-flex align-items-center text-decoration-none dropdown-toggle text-white"
						id="dropdownUser2"
						data-bs-toggle="dropdown"
						aria-expanded="false"
					>
						<i
							class="bi bi-person-circle"
							style="font-size: 1.5rem;"
						></i>
					</a>
					<ul
						class="dropdown-menu dropdown-menu-end"
						aria-labelledby="dropdownUser2"
					>
						<li>
							<a
								class="dropdown-item"
								href="{{ route('user.profilo') }}"
							>Profilo</a>
						</li>
						<li>
							<form
								id="logout-form-mobile"
								action="{{ route('logoutUser') }}"
								method="POST"
								style="display: none;"
							>
								@csrf
							</form>
							<a
								class="dropdown-item"
								href="#"
								onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();"
							>Logout</a>
						</li>
					</ul>
				</div>
			@endauth
		</div>
		<button
			class="navbar-toggler"
			type="button"
			data-bs-toggle="collapse"
			data-bs-target="#navbarNav"
			aria-controls="navbarNav"
			aria-expanded="false"
			aria-label="Toggle navigation"
		>
			<span class="navbar-toggler-icon"></span>
		</button>
		<div
			class="navbar-collapse collapse"
			id="navbarNav"
		>
			<div class="row w-100">
				<div class="col-lg-3 d-flex align-items-center justify-content-start">
					<ul class="navbar-nav ms-3">
						<li class="nav-item">
							<a
								class="nav-link"
								href="/"
							>Home</a>
						</li>
						<li class="nav-item">
							<a
								class="nav-link"
								href="{{ route('user.listino') }}"
							>Prodotti</a>
						</li>
					</ul>
				</div>
				<div class="col-lg-6 d-flex justify-content-start search-container">
					<form
						class="d-flex w-100 ms-3"
						method="GET"
						action="{{ route('user.listino') }}"
					>
						<input
							class="form-control me-2"
							type="search"
							name="search"
							id="search"
							placeholder="Search"
							aria-label="Search"
							data-url="{{ route('autocomplete') }}"
						>
						<button
							class="btn btn-outline-success"
							type="submit"
						><i class="bi bi-search px-2"></i></button>
						<div
							id="search-results"
							class="dropdown-menu w-100"
						></div>
					</form>
				</div>
				<div class="col-lg-3 d-none d-lg-flex justify-content-end align-items-center">
					<a
						href="{{ route('cart.index') }}"
						class="me-3"
					>
						<i
							class="bi bi-cart"
							style="font-size: 1.5rem; color: white;"
						></i>
					</a>
					@auth
						<div class="dropdown">
							<a
								href="#"
								class="d-flex align-items-center text-decoration-none dropdown-toggle text-white"
								id="dropdownUser1"
								data-bs-toggle="dropdown"
								aria-expanded="false"
							>
								<i
									class="bi bi-person-circle"
									style="font-size: 1.5rem;"
								></i>
							</a>
							<ul
								class="dropdown-menu dropdown-menu-end"
								aria-labelledby="dropdownUser1"
							>
								<li>
									<a
										class="dropdown-item"
										href="{{ route('user.profilo') }}"
									>Profilo</a>
								</li>
								<li>
									<form
										id="logout-form-desktop"
										action="{{ route('logoutUser') }}"
										method="POST"
										style="display: none;"
									>
										@csrf
									</form>
									<a
										class="dropdown-item"
										href="#"
										onclick="event.preventDefault(); document.getElementById('logout-form-desktop').submit();"
									>Logout</a>
								</li>
							</ul>
						</div>
					@endauth
				</div>
			</div>
		</div>
	</div>
</nav>
