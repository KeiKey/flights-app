<form method="POST" action="{{ route('flights.store') }}">
    @csrf

    <div class="row mb-3">
        <label for="flightCategory" class="col-md-4 col-form-label text-md-right">{{ __('Flight Category') }}</label>

        <div class="col-md-6">
            <select class="form-select form-control-rounded" id="flightCategory" name="flightCategory" required>
                <option value="" disabled selected>Select Flight Category</option>

                @foreach($flightCategories as $flightCategory)
                    <option value="{{ $flightCategory }}">{{ $flightCategory }}</option>
                @endforeach
            </select>

            @error('flightCategory')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="flightSeason" class="col-md-4 col-form-label text-md-right">{{ __('Flight Season') }}</label>

        <div class="col-md-6">
            <select class="form-select form-control-rounded" id="flightSeason" name="flightSeason" required>
                <option value="" disabled selected>Select Flight Season</option>

                @foreach($seasons as $season)
                    <option value="{{ $season->id }}">
                        {{ $season->start_date?->format('d M Y') }} - {{ $season->end_date?->format('d M Y') }}
                    </option>
                @endforeach
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
                   value="{{ old('destination_description') }}" required>

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
            <input class="form-control" type="text" id="destination" name="destination" value="{{ old('destination') }}" required>

            @error('destination')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="arrival" class="col-md-4 col-form-label text-md-right">{{ __('Arrival') }}</label>

        <div class="col-md-6">
            <select class="form-select form-control-rounded" id="arrival" name="arrival" required>
                <option value="" disabled selected>Select arrival or departure</option>
                <option value="0">Arrives</option>
                <option value="1">Departures</option>
            </select>

            @error('arrival')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="call_sign" class="col-md-4 col-form-label text-md-right">{{ __('Call Sign') }}</label>

        <div class="col-md-6">
            <input class="form-control" type="text" id="call_sign" name="call_sign" value="{{ old('call_sign') }}" required>

            @error('call_sign')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="timetables" class="col-md-4 col-form-label text-md-right">{{ __('Timetables') }}</label>

        <div class="col-md-6 d-flex justify-content-between">
            <div>
                <label for="Monday" class="mb-2">{{ __('Monday') }}</label>
                <input class="form-control" type="time" id="Monday" name="timetables[Monday]" value="{{ old('timetables[Monday]') }}">
            </div>
            <div class="mx-1">
                <label for="Tuesday" class="mb-2">{{ __('Tuesday') }}</label>
                <input class="form-control" type="time" id="Tuesday" name="timetables[Tuesday]" value="{{ old('timetables[Tuesday]') }}">
            </div>
            <div>
                <label for="Wednesday" class="mb-2">{{ __('Wednesday') }}</label>
                <input class="form-control" type="time" id="Wednesday" name="timetables[Wednesday]" value="{{ old('timetables[Wednesday]') }}">
            </div>
            <div class="mx-1">
                <label for="Thursday" class="mb-2">{{ __('Thursday') }}</label>
                <input class="form-control" type="time" id="Thursday" name="timetables[Thursday]" value="{{ old('timetables[Thursday]') }}">
            </div>
            <div>
                <label for="Friday" class="mb-2">{{ __('Friday') }}</label>
                <input class="form-control" type="time" id=Friday" name="timetables[Friday]" value="{{ old('timetables[Friday]') }}">
            </div>
            <div class="mx-1">
                <label for="Saturday" class="mb-2">{{ __('Saturday') }}</label>
                <input class="form-control" type="time" id="Saturday" name="timetables[Saturday]" value="{{ old('timetables[Saturday]') }}">
            </div>
            <div>
                <label for="Sunday" class="mb-2">{{ __('Sunday') }}</label>
                <input class="form-control" type="time" id="Sunday" name="timetables[Sunday]" value="{{ old('timetables[Sunday]') }}">
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <label for="start_date" class="col-md-4 col-form-label text-md-right">{{ __('Start date') }}</label>

        <div class="col-md-6">
            <input class="form-control" type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" required>

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
            <input class="form-control" type="date" id="end_date" name="end_date" value="{{ old('end_date') }}" required>

            @error('end_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>

        <div class="col-md-6">
            <textarea class="form-control" id="comment" name="comment" rows="4" cols="50"
            >{{ old('comment') }}</textarea>

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
                {{ __('Create') }}
            </button>
        </div>
    </div>
</form>
