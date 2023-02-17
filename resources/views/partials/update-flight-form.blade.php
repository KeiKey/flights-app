<form method="POST" action="{{ route('flights.update', $flight) }}">
    @csrf
    @method('PUT')

    <div class="row mb-3">
        <label for="flightCategory" class="col-md-4 col-form-label text-md-right">{{ __('Flight Category') }}</label>

        <div class="col-md-6">
            <select class="form-select form-control-rounded" id="flightCategory" name="flightCategory" disabled>
                <option value="{{ $flight->flight_category }}">{{ $flight->flight_category }}</option>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <label for="flightSeason" class="col-md-4 col-form-label text-md-right">{{ __('Flight Season') }}</label>

        <div class="col-md-6">
            <select class="form-select form-control-rounded" id="flightSeason" name="flightSeason" disabled>
                <option value="{{ $flight->season->id }}">
                    {{ $flight->season->start_date?->format('d M Y') }} - {{ $flight->season->end_date?->format('d M Y') }}
                </option>
            </select>

            @error('flightSeason')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="destination_description" class="col-md-4 col-form-label text-md-right">{{ __('Destination Description') }}</label>

        <div class="col-md-6">
            <input class="form-control" type="text" id="destination_description" name="destination_description"
                   value="{{ old('destination_description', $flight->destination_description) }}" required>

            @error('destination_description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="destination" class="col-md-4 col-form-label text-md-right">{{ __('Destination') }}</label>

        <div class="col-md-6">
            <input class="form-control" type="text" id="destination" name="destination"
                   value="{{ old('destination', $flight->destination) }}" required>

            @error('destination')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="call_sign" class="col-md-4 col-form-label text-md-right">{{ __('Call Sign') }}</label>

        <div class="col-md-6">
            <input class="form-control" type="text" id="call_sign" name="call_sign"
                   value="{{ old('call_sign', $flight->call_sign) }}" required>

            @error('call_sign')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="flight_date" class="col-md-4 col-form-label text-md-right">{{ __('Flight date') }}</label>

        <div class="col-md-6">
            <p class="mb-2">{{ $flight->flight_date?->dayName }}</p>

            <input class="form-control" type="date" id="flight_date" name="flight_date"
                   value="{{ old('flight_date', $flight->flight_date?->format('Y-m-d')) }}" required>

            @error('flight_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="flight_hour" class="col-md-4 col-form-label text-md-right">{{ __('Flight hour') }}</label>

        <div class="col-md-6 d-flex justify-content-between">
            <div>
                <input class="form-control" type="time" id="flight_hour" name="flight_hour"
                       value="{{ old('flight_hour', $flight->flight_hour) }}" required>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>

        <div class="col-md-6">
            <textarea class="form-control" id="comment" name="comment" rows="4" cols="50"
            >{{ old('comment', $flight->comment) }}</textarea>

            @error('comment')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Update') }}
            </button>
        </div>
    </div>
</form>
