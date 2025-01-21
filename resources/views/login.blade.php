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
	<style>
		body {
			font-family: Arial, sans-serif;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			background-color: #f0f0f0;
		}

		.login-container {
			background-color: #fff;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		.login-container h2 {
			margin-bottom: 20px;
		}

		.login-container input {
			width: 100%;
			padding: 10px;
			margin: 10px 0;
			border: 1px solid #ccc;
			border-radius: 4px;
		}

		.login-container button {
			width: 100%;
			padding: 10px;
			background-color: #007BFF;
			color: #fff;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		.login-container button:hover {
			background-color: #0056b3;
		}
	</style>
</head>

<body>
	<div class="login-container">
		<h2>Login</h2>

		@if ($errors->any())
			<div>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		@if (@session('success'))
			<div>{{ session('success') }}</div>
		@endif




		<form
			action="{{ route('login') }}"
			method="POST"
		>
			@csrf
			<input
				type="email"
				name="email"
				id="email"
				placeholder="Email"
				value = "{{ old('email') }}"
				required
			>
			<input
				type="password"
				id="password"
				name="password"
				placeholder="Password"
				required
			>
			<button type="submit">Login</button>
		</form>
	</div>
</body>

</html>
