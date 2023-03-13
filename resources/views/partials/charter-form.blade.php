<div>
    <form method="POST" action="{{ isset($flight) ? route('charters.update', $flight) : route('charters.store') }}">
        @csrf
        @isset($flight)
            @method('put')
        @endisset

        <div class="row mb-3">
            <label for="flight_date" class="col-md-4 col-form-label text-md-right">{{ __('general.date') }}</label>

            <div class="col-md-6">
                <input class="form-control" type="date" id="flight_date" name="flight_date"
                       value="{{ old('flight_date', isset($flight) ? $flight->flight_date->format('Y-m-d') : '') }}" required>

                @error('flight_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="call_sign" class="col-md-4 col-form-label text-md-right">{{ __('general.call_sign') }}</label>

            <div class="col-md-6">
                <input class="form-control" type="text" id="call_sign" name="call_sign"
                       value="{{ old('call_sign') ? old('call_sign') : (isset($flight) ? $flight->call_sign : '') }}" required>

                @error('call_sign')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="type_of_aircraft" class="col-md-4 col-form-label text-md-right">{{ __('general.type_of_aircraft') }}</label>

            <div class="col-md-6">
                <input class="form-control" type="text" id="type_of_aircraft" name="type_of_aircraft"
                       value="{{ old('type_of_aircraft') ? old('type_of_aircraft') : (isset($flight) ? $flight->type_of_aircraft : '') }}" required>

                @error('type_of_aircraft')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="type_of_flight" class="col-md-4 col-form-label text-md-right">{{ __('general.type_of_flight') }}</label>

            <div class="col-md-6">
                <select class="form-select form-control-rounded" id="type_of_flight" name="type_of_flight" required>
                    <option value="" disabled selected>{{ __('general.choose_type_of_flight') }}</option>

                    @foreach($charterTypes as $charterType)
                        <option value="{{ $charterType }}"
                            {{ old('type_of_flight') ? ($charterType == old('type_of_flight') ? 'selected' : '' ) : (isset($flight) ? ($charterType == $flight->type_of_flight ? 'selected' : '' ) : '') }}
                        >
                            {{ $charterType }}
                        </option>
                    @endforeach
                </select>

                @error('type_of_flight')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="nationality" class="col-md-4 col-form-label text-md-right">{{ __('general.nationality') }}</label>

            <div class="col-md-6">
                <input class="form-control" type="text" id="nationality" name="nationality"
                       value="{{ old('nationality') ? old('nationality') : (isset($flight) ? $flight->nationality : '') }}" required>

                @error('nationality')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="from" class="col-md-4 col-form-label text-md-right">{{ __('general.from') }}</label>

            <div class="col-md-6">
                <input class="form-control" type="text" id="from" name="from"
                       value="{{ old('from') ? old('from') : (isset($flight) ? $flight->from : '') }}" required>

                @error('from')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="to" class="col-md-4 col-form-label text-md-right">{{ __('general.to') }}</label>

            <div class="col-md-6">
                <input class="form-control" type="text" id="to" name="to"
                       value="{{ old('to') ? old('to') : (isset($flight) ? $flight->to : '') }}" required>

                @error('to')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="purpose_of_flight" class="col-md-4 col-form-label text-md-right">{{ __('general.purpose_of_flight') }}</label>

            <div class="col-md-6">
                <input class="form-control" type="text" id="purpose_of_flight" name="purpose_of_flight"
                       value="{{ old('purpose_of_flight') ? old('purpose_of_flight') : (isset($flight) ? $flight->purpose_of_flight : '') }}" required>

                @error('purpose_of_flight')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="eta" class="col-md-4 col-form-label text-md-right">{{ __('general.eta') }}</label>

            <div class="col-md-6">
                <input class="form-control" type="time" id="eta" name="eta"
                       value="{{ old('eta') ? old('eta') : (isset($flight) ? $flight->eta : '') }}" >

                @error('eta')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="etd" class="col-md-4 col-form-label text-md-right">{{ __('general.etd') }}</label>

            <div class="col-md-6">
                <input class="form-control" type="time" id="etd" name="etd"
                       value="{{ old('etd') ? old('etd') : (isset($flight) ? $flight->etd : '') }}" >

                @error('etd')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="clearance_no" class="col-md-4 col-form-label text-md-right">{{ __('general.clearance_no') }}</label>

            <div class="col-md-6">
                <input class="form-control" type="text" id="clearance_no" name="clearance_no"
                       value="{{ old('clearance_no') ? old('clearance_no') : (isset($flight) ? $flight->clearance_no : '') }}" required>

                @error('clearance_no')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('general.comment') }}</label>

            <div class="col-md-6">
                <textarea class="form-control" id="comment" name="comment" rows="4" cols="50"
                >{{ old('comment') ? old('comment') : (isset($flight) ? $flight->comment : '') }}</textarea>

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
                    @if(isset($flight)) {{ __('general.update') }} @else {{ __('general.create') }} @endif
                </button>
            </div>
        </div>
    </form>
</div>
