<form method="POST" action="{{ route('api.password.email') }}">
    @csrf
    <input type="email" name="email" placeholder="Enter your email" required>
    <button type="submit">Send Reset Link</button>
</form>
