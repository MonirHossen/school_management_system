<div class="form-group col-md-3">
    <label for="admin" class="control-label">Admin<span class="text-danger">*</span></label>
    <select  name="user_id" id="user_id" class="form-control">
        <option value="">--Select Admin--</option>
        @foreach($users as $user)
            <option @if(old('user_id',isset($student->user_id) ? $student->user_id : null)== $user->id) selected @endif value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    @error('user_id')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="label" class="control-label">Label<span class="text-danger">*</span></label>
    <select  name="label_id" id="label_id" class="form-control">
        <option value="">--Select Label--</option>
        @foreach($labels as $label)
            <option @if(old('label_id',isset($student->label_id) ? $student->label_id : null)== $label->id) selected @endif value="{{ $label->id }}">{{ $label->name }}</option>
        @endforeach
    </select>
    @error('label_id')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>


<div class="form-group col-md-3">
    <label for="name" class="control-label">Student Name<span class="text-danger">*</span></label>
    <input class="form-control" value="{{ old('name',isset($student->name) ? $student->name : null) }}" name="name" id="name" type="text" placeholder="Enter student name" required>
    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-md-3">
    <label class="control-label">Gender <span class="text-danger">*</span></label>
    <div class="form-check">
        <label for="male" class="form-check-label">
            <input class="form-check-input" @if(old('gender',isset($student->gender) ? $student->gender : null)== 'male') checked @endif type="radio" value="male" name="gender">Male
        </label>
    </div>
    <div class="form-check">
        <label class="form-check-label">
            <input class="form-check-input" type="radio" @if(old('gender',isset($student->gender) ? $student->gender : null)== 'female') checked @endif value="female" name="gender">Female
        </label>
    </div>
    @error('gender')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="roll" class="control-label">Roll Number<span class="text-danger">*</span></label>
    <input class="form-control" value="{{ old('roll',isset($student->roll) ? $student->roll : null) }}" name="roll" id="roll" min="1" type="number" placeholder="Enter student roll" required>
    @error('roll')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="father_name" class="control-label">Father Name<span class="text-danger">*</span></label>
    <input class="form-control" value="{{ old('father_name',isset($student->father_name) ? $student->father_name : null) }}" name="father_name" id="father_name" type="text" placeholder="Enter student father name" required>
    @error('father_name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="mother_name" class="control-label">Mother Name<span class="text-danger">*</span></label>
    <input class="form-control" value="{{ old('mother_name',isset($student->mother_name) ? $student->mother_name : null) }}" name="mother_name" id="mother_name" type="text" placeholder="Enter student mother name" required>
    @error('mother_name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="phone" class="control-label">Phone Number<span class="text-danger">*</span></label>
    <input class="form-control" value="{{ old('phone',isset($student->phone) ? $student->phone : null) }}" name="phone" id="phone" min="0" type="number" placeholder="Enter student phone" required>
    @error('phone')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="address" class="control-label">Address</label>
    <textarea class="form-control" name="address" id="address"  type="number" placeholder="Enter student address">{{ old('address',isset($student->address) ? $student->address : null) }}</textarea>
    @error('address')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="date_of_birth" class="control-label">Date of Birth<span class="text-danger">*</span></label>
    <input class="form-control" value="{{ old('date_of_birth',isset($student->date_of_birth) ? $student->date_of_birth : null) }}" name="date_of_birth" id="date_of_birth" type="date"  required>
    @error('date_of_birth')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="session" class="control-label">Session<span class="text-danger">*</span></label>
    <input class="form-control" value="{{ old('session',isset($student->session) ? $student->session : null) }}" name="session" id="session" type="text" placeholder="Select Year" required>
    @error('session')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="admission_date" class="control-label">Admission Date<span class="text-danger">*</span></label>
    <input class="form-control" value="{{ old('admission_date',isset($student->admission_date) ? $student->admission_date : null) }}" name="admission_date" id="admission_date" type="date"  required>
    @error('admission_date')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="blood_group" class="control-label">Blood Group<span class="text-danger">*</span></label>
    <select  name="blood_group" id="blood_group" class="form-control">
        <option value="">--Select Blood Group--</option>
        <option @if(old('blood_group',isset($student->blood_group) ? $student->blood_group : null) == 'A+') selected @endif value="A+">A+</option>
        <option @if(old('blood_group',isset($student->blood_group) ? $student->blood_group : null) == 'A-') selected @endif value="A-">A-</option>
        <option @if(old('blood_group',isset($student->blood_group) ? $student->blood_group : null) == 'B+') selected @endif value="B+">B+</option>
        <option @if(old('blood_group',isset($student->blood_group) ? $student->blood_group : null) == 'B-') selected @endif value="B-">B-</option>
        <option @if(old('blood_group',isset($student->blood_group) ? $student->blood_group : null) == 'AB+') selected @endif value="AB+">AB+</option>
        <option @if(old('blood_group',isset($student->blood_group) ? $student->blood_group : null) == 'AB-') selected @endif value="AB-">AB-</option>
        <option @if(old('blood_group',isset($student->blood_group) ? $student->blood_group : null) == 'O+') selected @endif value="O+">O+</option>
        <option @if(old('blood_group',isset($student->blood_group) ? $student->blood_group : null) == 'O-') selected @endif value="O-">O-</option>
    </select>
    @error('blood_group')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="image" class="control-label">Image</label>
    <input class="form-control"  onchange="document.getElementById('user_image').src = window.URL.createObjectURL(this.files[0])" value="{{ old('image') }}" type="file" name="image" id="image">
    @if(isset($student) && $student->image != null)
        <img id="user_image" class="ml-3" src="{{ asset($student->image) }}" style="height: 20px;width: 20px;" alt="">
    @endif
</div>

<div class="form-group col-md-3">
    <label for="admission_free" class="control-label">Admission Fees<span class="text-danger">*</span></label>
    <input class="form-control" value="{{ old('admission_free',isset($student->admission_free) ? $student->admission_free : null) }}" name="admission_free" id="admission_free" min="0" type="number" placeholder="Enter student admission fees" required>
    @error('admission_free')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="status" class="control-label">Status<span class="text-danger">*</span></label>
    <select  name="status" id="status" class="form-control">
        <option value="">--Select Status--</option>
        <option @if(old('status',isset($student->status) ? $student->status : null) ==  \App\Models\Student::Active_Status) selected @endif value="{{ \App\Models\Student::Active_Status }}">Active</option>
        <option @if(old('status',isset($student->status) ? $student->status : null) == \App\Models\Student::InActive_Status) selected @endif value="{{ \App\Models\Student::InActive_Status }}">Inactive</option>
    </select>
    @error('status')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
