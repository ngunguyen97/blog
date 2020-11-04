<div class="form-group pt-2">
    <label for="name">Name</label>
<input type="text" name="name" value="{{ old('name') ?? $customer->name }}" class="form-control">
    {{ $errors->first('name') }}
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" value="{{ old('email') ?? $customer->email }}" class="form-control">
    @if ($errors->has('email'))
    <p>{{ $errors->first('email') }}</p>
    @endif
</div>

<div class="form-group">
    <label for="status">Status</label>
    <select name="status" id="status" class="form-control">
        <option value="" disabled>Select customer status</option>

        @foreach ($customer->activeOptions() as $activeOptionKey => $activeOptionValue)

            <option value="{{ $activeOptionKey }}" {{ $customer->status == $activeOptionKey ? 'selected': ''}}> {{ $activeOptionValue }}</option>
        @endforeach
    </select>
    @if ($errors->has('status'))
    <p>{{ $errors->first('status') }}</p>
    @endif
</div>

<div class="form-group">
    <label for="status">Companies</label>
    <select name="company_id" id="company_id" class="form-control">
        <option value="" disabled>Select company</option>
        @foreach ($companies as $company)
            <option value="{{ $company->id }}" {{ $customer->customer_id === $company->id ? 'selected': ''}}>{{ $company->name}}</option>
        @endforeach
    </select>
    @if ($errors->has('company_id'))
    <p>{{ $errors->first('company_id') }}</p>
    @endif
</div>

<div class="form-group d-flex flex-column">
    <label for="image">Profile Image</label>
    <input type="file" name="image" id="image" class="py-3">
    @if ($errors->has('image'))
    <p>{{ $errors->first('image') }}</p>
    @endif
</div>
@csrf
