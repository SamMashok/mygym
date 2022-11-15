<x-auth>
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
    </div>
    <form action="{{ route('api.login') }}" method="POST" class="user x-submit" data-then="reload">
        <div class="form-group">
            <input type="email" name="email" class="form-control form-control-user"
                   id="email" placeholder="Enter Email Address..." required>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control form-control-user"
                   id="password" placeholder="Password" required>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox small">
                <input type="checkbox" name="remember" class="custom-control-input"
                       id="remember">
                <label class="custom-control-label" for="remember">
                    Remember Me
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block">
            Login
        </button>
    </form>
    <hr>
    <div class="text-center">
        <a class="small" href="">Forgot Password?</a>
    </div>
    <div class="text-center">
        <a class="small" href="{{ route('register.create') }}">Create an Account!</a>
    </div>
</x-auth>
