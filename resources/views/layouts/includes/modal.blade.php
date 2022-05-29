
<div class="modal fade" id="addAcct" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Account</h5>
                <a href="#" class="close" wire:click.prevent="closeModal"><span>&times;</span></a>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Account Name</label>
                        <input type="text" class="form-control" wire:model.defer="name">
                        @error('name')
                        <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label>Email</label>
                        <input type="email" class="form-control" wire:model.defer="email">
                        @error('email')
                        <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label>Username</label>
                        <input type="text" class="form-control" wire:model.defer="username">
                        @error('username')
                        <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label>Website</label>
                        <input type="text" class="form-control" wire:model.defer="website">
                        @error('website')
                        <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <div class="input-group transparent-append">
                            <input type="text" class="form-control" id="copy_{{ $password }}"   wire:model.defer="password" placeholder="click to show password">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <a href="#"  value="copy" onclick="copyToClipboard('copy_{{ $password }}')">
                                        <i class="fa fa-copy"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                        @error('password')
                        <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <a href="#" class="btn btn-info btn-xs mr-3" wire:click.prevent="generate">Generate Password</a>
                            <label class="radio-inline mr-2"><input type="radio" value="8" name="optradio" wire:model.defer="value"> 8</label>
                            <label class="radio-inline mr-2"><input type="radio" value="16" name="optradio" wire:model.defer="value"> 16</label>
                            <label class="radio-inline mr-2"><input type="radio" value="24" name="optradio" wire:model.defer="value"> 24</label>
                            @error('value')
                            <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" wire:model.defer="require_password" type="checkbox">
                            <label class="form-check-label">
                                Require Password
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Notes</label>
                       <textarea class="form-control" wire:model.defer="notes"></textarea>
                        @error('notes')
                        <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary" wire:click.prevent="submit">Submit</a>
                <a href="#" class="btn btn-danger light" wire:click.prevent="closeModal">Close</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editAcct" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Account Info</h5>
                <a href="#" class="close" wire:click.prevent="closeModal"><span>&times;</span></a>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Account Name</label>
                        <input type="text" class="form-control" wire:model.defer="name" >
                        @error('name')
                        <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label>Email</label>
                        <input type="email" class="form-control" wire:model.defer="email" >
                        @error('email')
                        <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label>Username</label>
                        <input type="text" class="form-control" wire:model.defer="username" >
                        @error('username')
                        <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label>Website</label>
                        <input type="text" class="form-control" wire:model.defer="website">
                        @error('website')
                        <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <div class="input-group transparent-append">
                            <input type="text" class="form-control" id="edit_{{ $password }}"   wire:model.defer="password" >
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <a href="#"  value="edit" onclick="copyToClipboard('edit_{{ $password }}')">
                                        <i class="fa fa-copy"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                        @error('password')
                        <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <a href="#" class="btn btn-info btn-xs mr-3" wire:click.prevent="generate">Generate Password</a>
                            <label class="radio-inline mr-2"><input type="radio" value="8" name="optradio" wire:model.defer="value"> 8</label>
                            <label class="radio-inline mr-2"><input type="radio" value="16" name="optradio" wire:model.defer="value"> 16</label>
                            <label class="radio-inline mr-2"><input type="radio" value="24" name="optradio" wire:model.defer="value"> 24</label>
                            @error('value')
                            <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" wire:model.defer="require_password" value="{{ $require_password }}" type="checkbox" checked>
                            <label class="form-check-label">
                                Require Password
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Notes</label>
                       <textarea class="form-control" wire:model.defer="notes"></textarea>
                        @error('notes')
                        <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary" wire:click.prevent="update('{{ $acctId }}')">Submit</a>
                <a href="#" class="btn btn-danger light" wire:click.prevent="closeModal">Close</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewAcct" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Account Info</h5>
                <a href="#" class="close" wire:click.prevent="closeModal"><span>&times;</span></a>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Account Name</label>
                        <input type="text" class="form-control" wire:model.defer="name" readonly>
                        @error('name')
                        <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label>Email</label>
                        <input type="email" class="form-control" wire:model.defer="email" readonly>
                        @error('email')
                        <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label>Username</label>
                        <input type="text" class="form-control" wire:model.defer="username" readonly>
                        @error('username')
                        <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label>Website</label>
                        <input type="text" class="form-control" wire:model.defer="website" readonly>
                        @error('website')
                        <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <div class="input-group transparent-append">
                            <input type="text" class="form-control" id="view_{{ $password }}" wire:model.defer="password" placeholder="click to show password" readonly>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    @if ($showPass == false)
                                    <a href="#" wire:click.prevent="showPass('{{ $acctId }}')">
                                        <i class="fa fa-eye{{ $showPass ? '-slash' : '' }}"></i>
                                    </a>
                                    @else
                                    <a href="#"  value="view" onclick="copyToClipboard('view_{{ $password }}')">
                                        <i class="fa fa-copy"></i>
                                    </a>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Notes</label>
                        <input type="text" class="form-control" wire:model.defer="notes" readonly>
                        @error('notes')
                        <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-danger light" wire:click.prevent="closeModal">Close</a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="viewPass" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Please enter your password</h5>
                <a href="#" class="close" wire:click.prevent="closeModal"><span>&times;</span></a>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="enterpass('{{ $acctId }}')">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <input type="password" class="form-control" wire:model.defer="my_password" placeholder="enter password">
                        @error('my_password')
                        <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Submit</button>
                <a href="#" class="btn btn-danger light" wire:click.prevent="closeModal">Close</a>
            </div>
        </form>
        </div>
    </div>
</div>
<div class="modal fade" id="viewEditPass" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Please enter your password</h5>
                <a href="#" class="close" wire:click.prevent="closeModal"><span>&times;</span></a>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="enterEditPass('{{ $acctId }}')">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <input type="password" class="form-control" wire:model.defer="my_password" placeholder="enter password">
                        @error('my_password')
                        <div  class="invalid-feedback animated fadeInUp" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Submit</button>
                <a href="#" class="btn btn-danger light" wire:click.prevent="closeModal">Close</a>
            </div>
        </form>
        </div>
    </div>
</div>
