<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | eBarangay</title>
</head>
<body>
    <main>
        <h1>eBarangay Login</h1>
        <p>Sign in to access your account.</p>

        @if ($errors->any())
            <div role="alert">
                <p>Unable to log in. Check your credentials and try again.</p>
            </div>
        @endif

        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <div>
                <label for="email">Email</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    autocomplete="username"
                    maxlength="255"
                    required
                >
            </div>

            <div>
                <label for="password">Password</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    autocomplete="current-password"
                    required
                >
            </div>

            <div>
                <label>
                    <input type="checkbox" name="remember" value="1">
                    Remember me
                </label>
            </div>

            <button type="submit">Log in</button>
        </form>
    </main>
</body>
</html>