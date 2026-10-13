<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | eBarangay</title>
</head>
<body>
    <main>
        <h1>eBarangay Dashboard</h1>

        <p>Welcome, {{ auth()->user()->name }}!</p>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Log out</button>
        </form>
    </main>
</body>
</html>