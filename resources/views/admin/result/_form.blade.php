<div class="form-group col-md-3">
    <label for="admin" class="control-label">Teacher<span class="text-danger">*</span></label>
    <select  name="user_id" id="user_id" class="form-control">
        <option value="">--Select Teacher--</option>
        @foreach($users as $user)
            <option @if(old('user_id',isset($result->user_id) ? $result->user_id : null) == $user->id) selected @endif value="{{ $user->id }}">{{ $user->name }}</option>
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
            <option @if(old('label_id',isset($result->label_id) ? $result->label_id : null) == $label->id) selected @endif value="{{ $label->id }}">{{ $label->name }}</option>
        @endforeach
    </select>
    @error('label_id')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>


<div class="form-group col-md-3">
    <label for="student_id" class="control-label">Student<span class="text-danger">*</span></label>
    <select  name="student_id" id="student_id" class="form-control">
{{--        <option value="">--Select Student--</option>--}}
        <option value="0" disabled="true" selected="true">Select Student</option>
    </select>
    @error('student_id')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="label" class="control-label">Subject<span class="text-danger">*</span></label>
    <select  name="subject_id" id="subject_id" class="form-control">
        <option value="0" disabled="true" selected="true">Select Subject</option>
    </select>
    @error('subject_id')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="label" class="control-label">Exam<span class="text-danger">*</span></label>
    <select  name="exam_id" id="exam_id" class="form-control">
        <option value="">--Select Exam--</option>
        @foreach($exams as $exam)
            <option @if(old('exam_id',isset($result->exam_id) ? $result->exam_id : null) == $exam->id) selected @endif value="{{ $exam->id }}">{{ $exam->exam_type }}</option>
        @endforeach
    </select>
    @error('exam_id')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="exam_date" class="control-label">Exam Date<span class="text-danger">*</span></label>
    <input class="form-control" value="{{ old('exam_date',isset($result->exam_date) ? $result->exam_date : null) }}" name="exam_date" id="exam_date" type="date"  required>
    @error('exam_date')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="marks" class="control-label">Marks<span class="text-danger">*</span></label>
    <input class="form-control" value="{{ old('marks',isset($result->marks) ? $result->marks : null) }}" name="marks" id="marks" min="0" type="number" placeholder="Enter marks here" required>
    @error('marks')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="comment" class="control-label">comment</label>
    <textarea class="form-control" name="comment" id="comment"   placeholder="Enter result comment">{{ old('comment',isset($result->comment) ? $result->comment : null) }}</textarea>
    @error('comment')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="status" class="control-label">Status<span class="text-danger">*</span></label>
    <select  name="status" id="status" class="form-control">
        <option value="">--Select Status--</option>
        <option @if(old('status',isset($result->status) ? $result->status : null) ==  \App\Models\result::Active_Status) selected @endif value="{{ \App\Models\result::Active_Status }}">Active</option>
        <option @if(old('status',isset($result->status) ? $result->status : null) == \App\Models\result::InActive_Status) selected @endif value="{{ \App\Models\result::InActive_Status }}">Inactive</option>
    </select>
    @error('status')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
