<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Your Password</h1>
    <form action="{{ route('password.reset.process') }}" method="POST">
        @csrf
        <input type="hidden" name="email" value="{{ $email }}">
        <input type="hidden" name="token" value="{{ $token }}">

        <div>
            <label for="password">New Password:</label>
            <input type="password" name="password" required minlength="8">
        </div>

        <div>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" required minlength="8">
        </div>

        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
