<form method="POST" action="{{ isset($flight) ? route('flights.update', $flight): route('flights.store') }}">
    @csrf
    @isset($flight)
        @method('PUT')
    @endisset

    <div class="row mb-3">
        <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Flight Category') }}</label>

        <div class="col-md-6">
            <select class="form-select form-control-rounded" id="category" name="category" required>
                <option value="">Select company</option>

                @foreach($companies as $company)
                    <option value="{{ $company->id }}"
                        {{ old('company') ? ($company->id == old('company') ? 'selected' : '' ) : (isset($season) ? ($company->id == $season?->company_id ? 'selected' : '' ) : '') }}
                    >{{ $company->name }}</option>
                @endforeach
            </select>

            @error('company')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

        <div class="col-md-6">
            <input type="date" id="date" name="date" value="{{ old('date', isset($season) ? $season->start_date?->format('Y-m-d') : '') }}" required>

            @error('start_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('End date') }}</label>

        <div class="col-md-6">
            <input type="date" id="end_date" name="end_date" value="{{ old('end_date', isset($season) ? $season->end_date?->format('Y-m-d') : '') }}" required>

            @error('end_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                @if(isset($season)) {{ __('Update') }} @else {{ __('Create') }} @endif
            </button>
        </div>
    </div>
</form>
