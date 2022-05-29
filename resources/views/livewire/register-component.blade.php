

    <div class="col-md-6">
        <div class="authincation-content">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form">
                        <div class="text-center mb-3">
                            <h3>PassMan</h3>
                        </div>
                        <h4 class="text-center mb-4">Sign up your account</h4>

                            <div class="form-group">
                                <label class="mb-1"><strong>Name</strong></label>
                                <input type="text" class="form-control" placeholder="name" wire:model.defer="name">
                                @error('name')
                                <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="mb-1"><strong>Username</strong></label>
                                <input type="text" class="form-control" placeholder="username" wire:model.defer="username">
                                @error('name')
                                <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="mb-1"><strong>Email</strong></label>
                                <input type="email" class="form-control" wire:model.defer="email">
                                @error('email')
                                <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="mb-1"><strong>Password</strong></label>
                                <input type="password" class="form-control" wire:model.defer="password">
                                @error('password')
                                <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="mb-1"><strong>Confirm Password</strong></label>
                                <input type="password" class="form-control"  wire:model.defer="password_confirmation">
                            </div>
                            <div class="text-center mt-4">
                                <button  class="btn btn-primary btn-block" wire:click.prevent="register">Sign me up</button>
                            </div>
                        </form>
                        <div class="new-account mt-3">
                            <p>Already have an account? <a class="text-primary" href="{{ route('login') }}">Sign in</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


