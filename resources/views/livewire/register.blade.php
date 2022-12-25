<div class="row">
    <div class="col-md-8 offset-2 register-bg rounded p-4 shadow">
        <form wire:submit.prevent="register">
            <h3 class="py-2 text-center text-primary">Sign Up To Get Started</h3>
            <div class="form-group mb-4">
                <input type="text" class="form-control" wire:model.lazy="form.name" placeholder="Name">
                @error('form.name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
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
            </div>
            <div class="form-group mb-4">
                <input type="password" class="form-control" wire:model.lazy="form.password_confirmation" placeholder="Confirm Password">
            </div>
            <div class="form-group mb-4 text-end">
                <button type="reset" class="btn btn-sm btn-danger" >Reset</button>
                <button type="submit" class="btn btn-sm btn-primary" >Submit</button>
            </div>
        </form>
    </div>
</div>
