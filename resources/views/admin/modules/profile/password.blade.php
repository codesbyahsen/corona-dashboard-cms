<div class="tab-pane fade" id="change-password" aria-labelledby="change-password-tab">
    <form method="POST" action="{{ route('password.update') }}" class="forms-sample">
        @csrf @method('PUT')

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="currentPassword">Current Password</label>
                    <input type="password" name="current_password" class="form-control" id="currentPassword"
                        placeholder="Enter current password" autocomplete="current-password" />
                    @error('current_password')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" class="form-control" id="password"
                        placeholder="Enter new password" autocomplete="new-password" />
                    @error('password')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="passwordConfirmation">Retype New Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="passwordConfirmation"
                        placeholder="Confirm you new password" autocomplete="new-password" />
                    @error('password_confirmation')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row pt-3">
            <div class="col-12">
                <p>Password requirements:</p>

                <ul class="pl-1 ml-3">
                    <li>
                        <small>Minimum 8 characters long - the more, the better.</small>
                    </li>
                    <li>
                        <small>At least one lowercase &amp; one uppercase character.</small>
                    </li>
                    <li>
                        <small>At least one number, symbol, or whitespace character.</small>
                    </li>
                </ul>
            </div>
        </div>


        <div class="row pt-3 pr-3">
            <button type="submit" class="btn btn-primary btn-fw">Change Password</button>
            <button type="button" class="btn btn-outline-secondary btn-md ml-2">Discard</button>
        </div>
    </form>
</div>
