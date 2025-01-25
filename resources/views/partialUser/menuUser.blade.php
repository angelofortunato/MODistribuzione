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
				href="#"
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
				<div class="col-lg-3 d-flex align-items-center">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a
								class="nav-link"
								href="/"
							>Home</a>
						</li>
					</ul>
				</div>
				<div class="col-lg-6 d-flex justify-content-center">
					<form class="d-flex w-100">
						<input
							class="form-control me-2"
							type="search"
							placeholder="Search"
							aria-label="Search"
						>
						<button
							class="btn btn-outline-success"
							type="submit"
						><i class="bi bi-search px-2"></i></button><!--Tasto Cerca -->
					</form>
				</div>
				<div class="col-lg-3 d-none d-lg-flex justify-content-end align-items-center">
					<a
						href="#"
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
