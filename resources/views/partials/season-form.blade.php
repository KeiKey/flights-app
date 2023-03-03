<form method="POST" action="{{ isset($season) ? route('seasons.update', $season): route('seasons.store') }}">
    @csrf
    @isset($season)
        @method('PUT')
    @endisset

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('general.season_name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', isset($season) ? $season->name : '') }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="start_date" class="col-md-4 col-form-label text-md-right">{{ __('general.start_date_short') }}</label>

        <div class="col-md-6">
            <input class="form-control" type="date" id="start_date" name="start_date" value="{{ old('start_date', isset($season) ? $season->start_date?->format('Y-m-d') : '') }}" required>

            @error('start_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('general.end_date_short') }}</label>

        <div class="col-md-6">
            <input class="form-control" type="date" id="end_date" name="end_date" value="{{ old('end_date', isset($season) ? $season->end_date?->format('Y-m-d') : '') }}" required>

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
                @if(isset($season)) {{ __('general.update') }} @else {{ __('general.create') }} @endif
            </button>
        </div>
    </div>
</form>
