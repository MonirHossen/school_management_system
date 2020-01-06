<div class="form-group col-md-3">
    <label for="label" class="control-label">Label<span class="text-danger">*</span></label>
    <select  name="label_id" id="label_id" class="form-control">
        <option value="">--Select Label--</option>
        @foreach($labels as $label)
            <option @if(old('label_id',isset($subject->label_id) ? $subject->label_id : null)== $label->id) selected @endif value="{{ $label->id }}">{{ $label->name }}</option>
        @endforeach
    </select>
    @error('label_id')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="name" class="control-label">Subject Name<span class="text-danger">*</span></label>
    <input class="form-control" value="{{ old('name',isset($subject->name) ? $subject->name : null) }}" name="name" id="name" type="text" placeholder="Enter subject name" required>
    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="status" class="control-label">Status<span class="text-danger">*</span></label>
    <select  name="status" id="status" class="form-control">
        <option value="">--Select Status--</option>
        <option @if(old('status',isset($subject->status) ? $subject->status : null) ==  \App\Models\Subject::Active_Status) selected @endif value="{{ \App\Models\Subject::Active_Status }}">Active</option>
        <option @if(old('status',isset($subject->status) ? $subject->status : null) == \App\Models\Subject::InActive_Status) selected @endif value="{{ \App\Models\Subject::InActive_Status }}">Inactive</option>
    </select>
    @error('status')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
