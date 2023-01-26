<x-auth>
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
    </div>
    <form action="{{ route('api.register.store') }}" method="POST" class="user x-submit" data-then="reload">
        <div class="form-group">
            <input type="text" name="name" class="form-control form-control-user" id="name" placeholder="Full name" required>
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control form-control-user" id="email"
                   placeholder="Email Address" required>
        </div>
        <div class="form-group">
            <input type="text" name="username" class="form-control form-control-user" id="username"
                   placeholder="Username" required>
        </div>
        <div class="form-group">
            <select class="form-select form-select-md rounded-pill form-control" name="gender" id="gender" required>
                <option value="M">male</option>
                <option value="F">female</option>
            </select>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control form-control-user"
                   id="password" placeholder="Password" required>
        </div>
        <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control form-control-user"
                   id="password_confirmation" placeholder="Repeat Password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block">
            Register Account
        </button>
        <hr>
        <a href="" class="btn btn-google btn-user btn-block">
            <i class="fab fa-google fa-fw"></i> Register with Google
        </a>
        <a href="" class="btn btn-facebook btn-user btn-block">
            <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
        </a>
    </form>
    <hr>
    <div class="text-center">
        <a class="small" href="">Forgot Password?</a>
    </div>
    <div class="text-center">
        <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
    </div>
</x-auth>
