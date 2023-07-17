<div class="tab-pane fade show active" id="edit-profile" aria-labelledby="edit-profile-tab">
    <form method="POST" action="{{ route('admin.profile.update') }}" class="forms-sample">
        @csrf @method('PATCH')

        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="form-group">
                    <label for="firstName">First Name <span title="Required" class="text-danger">*</span></label>
                    <input type="text" name="first_name" id="firstName" class="form-control" placeholder="First name"
                        value="{{ old('first_name', $user?->first_name) }}" />
                    @error('first_name')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="form-group">
                    <label for="middleName">Middle Name <span class="text-muted small">&#40;optional&#41;</span></label>
                    <input type="text" name="middle_name" id="middleName" class="form-control"
                        placeholder="Middle name" value="{{ old('middle_name', $user?->middle_name) }}" />
                    @error('middle_name')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="form-group">
                    <label for="lastName">Last Name <span title="Required" class="text-danger">*</span></label>
                    <input type="text" name="last_name" id="lastName" class="form-control" placeholder="Last name"
                        value="{{ old('last_name', $user?->last_name) }}" />
                    @error('last_name')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row pt-2">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="email">Email <span title="Required" class="text-danger">*</span></label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email"
                        value="{{ old('email', $user?->email) }}" />
                    @error('email')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone"
                        value="{{ old('phone', $user?->phone) }}" />
                    @error('phone')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row pt-2">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="gender">Gender <span title="Required" class="text-danger">*</span></label>
                    <select name="gender" class="form-control" id="gender">
                        <option value="">Select</option>
                        <option value="Male" @selected(old('gender', $user?->gender === 'Male'))>Male</option>
                        <option value="Female" @selected(old('gender', $user?->gender === 'Female'))>Female</option>
                        <option value="Other" @selected(old('gender', $user?->gender === 'Other'))>Other</option>
                    </select>
                    @error('gender')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row pt-3 pr-3">
            <button type="submit" class="btn btn-primary btn-icon-text ml-auto">
                <i class="mdi mdi-file-check btn-icon-prepend"></i> Submit </button>
        </div>
    </form>
</div>
