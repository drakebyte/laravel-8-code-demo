@csrf

<div class="input-group mb-3 has-validation">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Name</span>
    </div>
    <input type="text" class="form-control @if ($errors->first('name')) is-invalid @endif" placeholder="Insert name here..." aria-label="Name" aria-describedby="basic-addon1" name="name" value="{{ old('name') ?? $customer->name }}">
    <div class="invalid-feedback">{{ $errors->first('name') }}</div><!-- this will catch the failed validation messages -->
</div>

<div class="input-group mb-3 has-validation">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">E-mail</span>
    </div>
    <input type="text" class="form-control @if ($errors->first('email')) is-invalid @endif" placeholder="Insert email here..." aria-label="Name" aria-describedby="basic-addon1" name="email" value="{{ old('email') ?? $customer->email }}">
    <div class="invalid-feedback">{{ $errors->first('email') }}</div><!-- this will catch the failed validation messages -->
</div>

<div class="form-group mb-3 has-validation">
    <select name="active" class="form-control @if ($errors->first('active')) is-invalid @endif" aria-label="Default select example">
        <option selected="" disabled>Select customer status</option>
        {{-- AUTO OPTIONS from  Customer::activeOptions() --}}
        @foreach($customer->activeOptions() as $k => $v )
            <option value="{{ $k }}" @if (isset($customer->id)) {{ $customer->active == $v ? 'selected' : '' }} @endif>{{ $v }}</option>
        @endforeach
    </select>
    <div class="invalid-feedback">{{ $errors->first('active') }}</div>
</div>

<div class="form-group mb-3 has-validation">
    <select name="company_id" class="form-control @if ($errors->first('company_id')) is-invalid @endif"
            aria-label="Default select example">
        <option selected="" disabled>Select company</option>
        @foreach($companies as $company)
            <option value="{{ $company->id }}" @if (isset($customer->id)) {{ $company->id == $customer->company_id ? 'selected' : '' }} @endif>{{ $company->name }}</option>
        @endforeach
    </select>
    <div class="invalid-feedback">{{ $errors->first('company_id') }}</div>
</div>

<button type="submit" class="btn btn-success">Add customer</button>