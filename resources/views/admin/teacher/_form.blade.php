    <div class="form-group">
        <label for="name" class="control-label col-md-3">Name <span class="text-danger">*</span></label>
        <div class="col-md-8">
            <input class="form-control" value="{{ old('name',isset($teacher->name) ? $teacher->name : null) }}" name="name" id="name" type="text" placeholder="Enter full name" required>
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3">Email <span class="text-danger">*</span></label>
        <div class="col-md-8">
            <input class="form-control col-md-8" name="email" id="email" type="email" value="{{ old('email',isset($teacher->email) ? $teacher->email : null) }}" placeholder="Enter email address" required>
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="phone" class="control-label col-md-3">Phone <span class="text-danger">*</span></label>
        <div class="col-md-8">
            <input class="form-control col-md-8" value="{{ old('phone',isset($teacher->phone) ? $teacher->phone : null) }}" name="phone" id="phone" type="number" placeholder="Enter phone number">
            @error('phone')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group">
            <label for="age" class="control-label col-md-3">Age <span class="text-danger">*</span></label>
            <div class="col-md-8">
                <input class="form-control col-md-8" value="{{ old('age',isset($teacher->age) ? $teacher->age : null) }}" name="age" id="age" type="text" placeholder="Enter age here">
                @error('age')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
    </div>


    <div class="form-group">
        <label for="address" class="control-label col-md-3">Address</label>
        <div class="col-md-8">
            <textarea class="form-control" name="address" id="address" rows="4" placeholder="Enter your address">{{ old('address',isset($teacher->address) ? $teacher->address : null) }}</textarea>
            @error('address')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3">Gender <span class="text-danger">*</span></label>
        <div class="col-md-9">
            <div class="form-check">
                <label for="male" class="form-check-label">
                    <input class="form-check-input" @if(old('gender',isset($teacher->gender) ? $teacher->gender : null)== 'male') checked @endif type="radio" value="male" name="gender">Male
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" @if(old('gender',isset($teacher->gender) ? $teacher->gender : null)== 'female') checked @endif value="female" name="gender">Female
                </label>
            </div>
            @error('gender')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="blood_group" class="control-label col-md-3">Blood Group</label>
        <div class="col-md-8">
            <select  name="blood_group" id="blood_group" class="form-control">
                <option value="">--Select Blood Group--</option>
                <option @if(old('blood_group',isset($teacher->blood_group) ? $teacher->blood_group : null) == 'A+') selected @endif value="A+">A+</option>
                <option @if(old('blood_group',isset($teacher->blood_group) ? $teacher->blood_group : null) == 'A-') selected @endif value="A-">A-</option>
                <option @if(old('blood_group',isset($teacher->blood_group) ? $teacher->blood_group : null) == 'B+') selected @endif value="B+">B+</option>
                <option @if(old('blood_group',isset($teacher->blood_group) ? $teacher->blood_group : null) == 'B-') selected @endif value="B-">B-</option>
                <option @if(old('blood_group',isset($teacher->blood_group) ? $teacher->blood_group : null) == 'AB+') selected @endif value="AB+">AB+</option>
                <option @if(old('blood_group',isset($teacher->blood_group) ? $teacher->blood_group : null) == 'AB-') selected @endif value="AB-">AB-</option>
                <option @if(old('blood_group',isset($teacher->blood_group) ? $teacher->blood_group : null) == 'O+') selected @endif value="O+">O+</option>
                <option @if(old('blood_group',isset($teacher->blood_group) ? $teacher->blood_group : null) == 'O-') selected @endif value="O-">O-</option>
            </select>
            @error('blood_group')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="joining_date" class="control-label col-md-3">Joining Date <span class="text-danger">*</span></label>
        <div class="col-md-8">
            <input class="form-control col-md-8" value="{{ old('joining_date',isset($teacher->joining_date) ? $teacher->joining_date : null) }}" name="joining_date" id="joining_date" type="date" placeholder="Enter Joining Date">
            @error('joining_date')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="edu_status" class="control-label col-md-3">Education Status <span class="text-danger">*</span></label>
        <div class="col-md-8">
            <select  name="edu_status" id="edu_status" class="form-control">
                <option value="">--Select Education Status--</option>
                <option @if(old('edu_status',isset($teacher->edu_status) ? $teacher->edu_status : null) == 'SSC') selected @endif value="SSC">SSC</option>
                <option @if(old('edu_status',isset($teacher->edu_status) ? $teacher->edu_status : null) == 'HSC') selected @endif value="HSC">HSC</option>
                <option @if(old('edu_status',isset($teacher->edu_status) ? $teacher->edu_status : null) == 'BSc/Honors') selected @endif value="BSc/Honors"> BSc/Honors </option>
            </select>
            @error('edu_status')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="salary" class="control-label col-md-3">Salary <span class="text-danger">*</span></label>
        <div class="col-md-8">
            <input class="form-control col-md-8" value="{{ old('salary',isset($teacher->salary) ? $teacher->salary : null) }}" name="salary" id="salary" type="number" min="0" placeholder="Enter salary here">
            @error('salary')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="description" class="control-label col-md-3">Description</label>
        <div class="col-md-8">
            <textarea class="form-control" name="description" id="description" rows="4" placeholder="Enter Teacher Sort description">{{ old('description',isset($teacher->description) ? $teacher->description : null) }}</textarea>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="designation" class="control-label col-md-3">Designation <span class="text-danger">*</span></label>
        <div class="col-md-8">
            <select  name="designation" id="designation" class="form-control">
                <option value="">--Select Teacher Designation--</option>
                <option @if(old('designation',isset($teacher->designation) ? $teacher->designation : null) == 'Head Teacher') selected @endif value="Head Teacher">Head Teacher</option>
                <option @if(old('designation',isset($teacher->designation) ? $teacher->designation : null) == 'General Teacher') selected @endif value="General Teacher">General Teacher</option>
                <option @if(old('designation',isset($teacher->designation) ? $teacher->designation : null) == 'Guest Teacher') selected @endif value="BSc/Honors"> Guest Teacher </option>
            </select>
            @error('designation')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3">Image</label>
        <div class="col-md-8">
            <input class="form-control"  onchange="document.getElementById('user_image').src = window.URL.createObjectURL(this.files[0])" value="{{ old('image') }}" type="file" name="image" id="image">
        </div>
        @if(isset($teacher) && $teacher->image != null)
            <img id="user_image" class="ml-3" src="{{ asset($teacher->image) }}" width="15%" alt="">
        @endif
    </div>

    <div class="form-group">
        <label for="status" class="control-label col-md-3">Status <span class="text-danger">*</span></label>
        <div class="col-md-8">
            <select  name="status" id="status" class="form-control">
                <option value="">--Select Teacher Status--</option>
                <option @if(old('status',isset($teacher->status) ? $teacher->status : null) ==  \App\Models\Teacher::Active_Status) selected @endif value="{{ \App\Models\Teacher::Active_Status }}">Active</option>
                <option @if(old('status',isset($teacher->status) ? $teacher->status : null) == \App\Models\Teacher::InActive_Status) selected @endif value="{{ \App\Models\Teacher::InActive_Status }}">Inactive</option>
            </select>
            @error('status')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
