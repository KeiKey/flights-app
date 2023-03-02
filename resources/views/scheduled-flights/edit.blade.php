@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('general.edit_scheduled_flight') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('scheduled-flights.update', ['scheduled_flight' => $scheduledFlight->id]) }}">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="flightSeason" class="col-md-4 col-form-label text-md-right">{{ __('general.season') }}</label>

                                <div class="col-md-6">
                                    <select class="form-select form-control-rounded" id="flightSeason" name="flightSeason" disabled>
                                        <option value="{{ $scheduledFlight->season->id }}">
                                            {{ $scheduledFlight->season->start_date?->format('d/m/Y') }} - {{ $scheduledFlight->season->end_date?->format('d/m/Y') }}
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
                                <label for="company" class="col-md-4 col-form-label text-md-right">{{ __('general.company') }}</label>

                                <div class="col-md-6">
                                    <select class="form-select form-control-rounded" id="company" name="company" disabled>
                                        <option value="{{ $scheduledFlight->company->id }}">
                                            {{ $scheduledFlight->company->name }}
                                        </option>
                                    </select>

                                    @error('company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="destination_description" class="col-md-4 col-form-label text-md-right">{{ __('general.destination_description') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" type="text" id="destination_description" name="destination_description"
                                           value="{{ old('destination_description', $scheduledFlight->destination_description) }}" required>

                                    @error('destination_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="destination" class="col-md-4 col-form-label text-md-right">{{ __('general.destination') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" type="text" id="destination" name="destination"
                                           value="{{ old('destination', $scheduledFlight->destination) }}" required>

                                    @error('destination')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="arrival" class="col-md-4 col-form-label text-md-right">{{ __('general.comes_goes') }}</label>

                                <div class="col-md-6">
                                    <select class="form-select form-control-rounded" id="arrival" name="arrival" required>
                                        <option value="" disabled selected>{{ __('general.choose_comes_goes') }}</option>
                                        <option value="0" {{ $scheduledFlight->arrival == '0' ? ' selected' : '' }}>{{ __('general.arrives') }}</option>
                                        <option value="1" {{ $scheduledFlight->arrival == '1' ? ' selected' : '' }}>{{ __('general.departures') }}</option>
                                    </select>

                                    @error('arrival')
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
                                           value="{{ old('call_sign', $scheduledFlight->call_sign) }}" required>

                                    @error('call_sign')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="flight_date" class="col-md-4 col-form-label text-md-right">{{ __('general.flight_date') }}</label>

                                <div class="col-md-6">
                                    <p class="mb-2">{{ __('general.'.strtolower($scheduledFlight->flight_date?->dayName)) }}</p>

                                    <input class="form-control" type="date" id="flight_date" name="flight_date"
                                           value="{{ old('flight_date', $scheduledFlight->flight_date?->format('Y-m-d')) }}" required>

                                    @error('flight_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="flight_hour" class="col-md-4 col-form-label text-md-right">{{ __('general.flight_hour') }}</label>

                                <div class="col-md-6 d-flex justify-content-between">
                                    <div>
                                        <input class="form-control" type="time" id="flight_hour" name="flight_hour"
                                               value="{{ old('flight_hour', $scheduledFlight->flight_hour) }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('general.comment') }}</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" id="comment" name="comment" rows="4" cols="50"
                                    >{{ old('comment', $scheduledFlight->comment) }}</textarea>

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
                                        {{ __('general.update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
