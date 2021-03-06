<div class="form-group row">
    <label for="role" class="control-label col-md-3">Role</label>
    <div class="col-md-8">
        <select  name="role" id="role" class="form-control">
            <option value="">--Select Role--</option>
            <option @if(old('role',isset($user->role) ? $user->role : null) == \App\Models\User::User_Admin_Role) selected @endif value="{{ \App\Models\User::User_Admin_Role }}">Admin</option>
            <option @if(old('role',isset($user->role) ? $user->role : null) == \App\Models\User::User_Teacher_Role) selected @endif value="{{ \App\Models\User::User_Teacher_Role }}">Teacher</option>
        </select>
        @error('role')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
    <div class="form-group row">
        <label for="name" class="control-label col-md-3">Name</label>
        <div class="col-md-8">
            <input class="form-control" value="{{ old('name',isset($user->name) ? $user->name : null) }}" name="name" id="name" type="text" placeholder="Enter full name" required>
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-3">Email</label>
        <div class="col-md-8">
            <input class="form-control col-md-8" @isset($user) disabled @endisset name="email" id="email" type="email" value="{{ old('email',isset($user->email) ? $user->email : null) }}" placeholder="Enter email address" required>
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="phone" class="control-label col-md-3">Phone</label>
        <div class="col-md-8">
            <input class="form-control col-md-8" value="{{ old('email',isset($user->phone) ? $user->phone : null) }}" name="phone" id="phone" type="text" placeholder="Enter phone number">
            @error('phone')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

 @if(!isset($user))
     <div class="form-group row">
         <label for="password" class="control-label col-md-3">Password</label>
         <div class="col-md-8">
             <input class="form-control col-md-8" name="password" id="password" type="password" placeholder="Enter password" required>
             @error('password')
             <span class="text-danger">{{ $message }}</span>
             @enderror
         </div>
     </div>

     <div class="form-group row">
         <label for="confirmPassword" class="control-label col-md-3">Confirm Password</label>
         <div class="col-md-8">
             <input class="form-control col-md-8" name="password_confirmation" id="password_confirmation" type="password" placeholder="Enter confirm assword">
         </div>
     </div>
 @endif

    <div class="form-group row">
        <label for="address" class="control-label col-md-3">Address</label>
        <div class="col-md-8">
            <textarea class="form-control" name="address" id="address" rows="4" placeholder="Enter your address" required>{{ old('address',isset($user->address) ? $user->address : null) }}</textarea>
            @error('address')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-3">Gender</label>
        <div class="col-md-9">
            <div class="form-check">
                <label for="male" class="form-check-label">
                    <input class="form-check-input" @if(old('gender',isset($user->gender) ? $user->gender : null)== 'male') checked @endif type="radio" value="male" name="gender">Male
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" @if(old('gender',isset($user->gender) ? $user->gender : null)== 'female') checked @endif value="female" name="gender">Female
                </label>
            </div>
            @error('gender')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-3">Image</label>
        <div class="col-md-8">
            <input class="form-control"  onchange="document.getElementById('user_image').src = window.URL.createObjectURL(this.files[0])" value="{{ old('image') }}" type="file" name="image" id="image">
        </div>
        @if(isset($user) && $user->image != null)
            <img id="user_image" class="ml-5" src="{{ asset($user->image) }}" width="20%" alt="">
        @endif
    </div>
