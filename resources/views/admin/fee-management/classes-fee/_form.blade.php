<div class="form-group col-md-3">
    <label for="label" class="control-label">For Class<span class="text-danger">*</span></label>
    <select  name="label_id" id="label_id" class="form-control">
        <option value="">--Select Class--</option>
        @foreach($labels as $label)
            <option @if(old('label_id',isset($classes_fee->label_id) ? $classes_fee->label_id : null) == $label->id) selected @endif value="{{ $label->id }}">{{ $label->name }}</option>
        @endforeach
    </select>
    @error('label_id')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="fee_type" class="control-label">Fee Types<span class="text-danger">*</span></label>
    <select  name="type_id" id="type_id" class="form-control">
        <option value="">--Select Fee Types--</option>
        @foreach($fee_types as $fee_type)
            <option @if(old('type_id',isset($classes_fee->type_id) ? $classes_fee->type_id : null) == $fee_type->id) selected @endif value="{{ $fee_type->id }}">{{ $fee_type->fee_type }}</option>
        @endforeach
    </select>
    @error('type_id')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-md-3">
    <label for="amount" class="control-label">Amount<span class="text-danger">*</span></label>
    <input class="form-control" value="{{ old('amount',isset($classes_fee->amount) ? $classes_fee->amount : null) }}" name="amount" id="amount" min="0" type="number" placeholder="Enter classes fees" required>
    @error('amount')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
