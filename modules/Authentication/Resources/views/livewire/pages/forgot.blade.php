<div class="card-body login-card-body">
    <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

    <form>
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
        @if(!$isSend)
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" wire:model="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email') <span class="error invalid-feedback">{{ $message }}</span>@enderror
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block" wire:click.prevent="sendEmailResetPassword">
                            Request new password
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
        @endif
    </form>
</div>
