<div class="form-group col-md-3">
    <label for="fee_type" class="control-label">Fee Type<span class="text-danger">*</span></label>
    <input class="form-control" value="{{ old('fee_type',isset($fee_type->fee_type) ? $fee_type->fee_type : null) }}" name="fee_type" id="fee_type" type="text" placeholder="Enter Fee Type" required>
    @error('fee_type')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="status" class="control-label">Status<span class="text-danger">*</span></label>
    <select  name="status" id="status" class="form-control">
        <option value="">--Select Status--</option>
        <option @if(old('status',isset($fee_type->status) ? $fee_type->status : null) ==  \App\Models\FeeType::Active_Status) selected @endif value="{{ \App\Models\FeeType::Active_Status }}">Active</option>
        <option @if(old('status',isset($fee_type->status) ? $fee_type->status : null) == \App\Models\FeeType::InActive_Status) selected @endif value="{{ \App\Models\FeeType::InActive_Status }}">Inactive</option>
    </select>
    @error('status')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
