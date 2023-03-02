<form method="POST" action="{{ isset($company) ? route('companies.update', $company) :  route('companies.store') }}">
    @csrf
    @isset($company)
        @method('PUT')
    @endisset

    <div class="row mb-3">
        <label for="season" class="col-md-4 col-form-label text-md-right">{{ __('Season') }}</label>

        <div class="col-md-6">
            <select class="form-select form-control-rounded" id="season" name="season_id">
                <option value="" disabled selected>Select Season</option>

                @foreach($seasons as $season)
                    <option value="{{ $season->id }}" {{ $season->id == old('season_id', isset($company) ? $company->season->id : '') ? ' selected' : '' }}>
                        {{ $season->name }}: {{ $season->start_date?->format('d/m/Y') }} - {{ $season->end_date?->format('d/m/Y') }}
                    </option>
                @endforeach
            </select>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Company name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', isset($company) ? $company->name : '') }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                @if(isset($company)) {{ __('Update') }} @else {{ __('Create') }} @endif
            </button>
        </div>
    </div>
</form>
