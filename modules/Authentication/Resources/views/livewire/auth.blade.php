<div class="login-box">
    <div class="login-logo">
        <a href="/"><b>Admin</b>LTE</a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">

            @if($login)
                <livewire:authentication::pages.login/>
            @elseif($register)
                <livewire:authentication::pages.register/>
            @elseif($forgot)
                <livewire:authentication::pages.forgot/>
            @endif

            @if(!$forgot)
                <p class="mb-1">
                    <a href="#" wire:click.prefetch="forgotContent">I forgot my password</a>
                </p>
            @endif
            @if(!$register)
                <p class="mb-0">
                    <a href="#" wire:click.prefetch="registerContent" class="text-center">Register a new membership</a>
                </p>
            @endif
            @if(!$login)
                <p class="mb-0">
                    <a href="#" class="text-center" wire:click.prefetch="loginContent">I already have a
                        membership</a>
                </p>
            @endif
        </div>
        <!-- /.login-card-body -->
    </div>

</div>
