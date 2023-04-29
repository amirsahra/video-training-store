<div>
    <p class="login-box-msg">Sign in to start your session</p>

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username or email" wire:model="username">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            @error('username') <span class="error invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" wire:model="password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            @error('password') <span class="error invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" id="remember" wire:model="rememberMe">
                    <label for="remember">
                        Remember Me
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block" wire:click.prevent="doLogin">Login</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
    </div>
</div>
