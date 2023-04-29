<div>
    <p class="login-box-msg">Register a new membership</p>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="username" wire:model="username">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
            @error('username') <span class="error invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" wire:model="email">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            @error('email') <span class="error invalid-feedback">{{ $message }}</span>@enderror
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
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Retype password" wire:model="password_confirmation">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            @error('password_confirmation') <span class="error invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <div class="row">
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block" wire:click.prevent="doRegister">Register</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i>
            Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i>
            Sign up using Google+
        </a>
    </div>
</div>
