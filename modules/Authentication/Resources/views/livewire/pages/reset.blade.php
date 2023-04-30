<div>
    <p class="login-box-msg">Reset Password</p>
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

    @if(!$isReset)
        <form>
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
                <input type="password" class="form-control" placeholder="New Password" wire:model="password">
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
                <div class="col-8"></div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block" wire:click.prevent="doReset">Reset</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    @else
        <p class="mb-1">
            <a href="{{route('auth')}}" >Login</a>
        </p>
    @endif

</div>
