<div class="row">
    <div class="col-md-8 offset-2 login-bg rounded p-4 shadow">
        <form wire:submit.prevent="login">
            <h3 class="py-2 text-center text-primary">Sign In Your Account</h3>
            <div class="form-group mb-4">
                <input type="text" class="form-control" wire:model.lazy="form.email" placeholder="E-mail">
                @error('form.email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <input type="password" class="form-control" wire:model.lazy="form.password" placeholder="Password">
                @error('form.password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                @if($loginmsg)
                    <span class="text-danger">{{ $loginmsg }}</span>
                @endif
            </div>
            <div class="form-group mb-4 text-end">
                <button type="submit" class="btn btn-sm btn-primary" >Sign In</button>
            </div>
        </form>
    </div>
</div>
