@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Show a ScheduledFlight') }}</div>

                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="flightCategory" class="col-md-4 col-form-label text-md-right">{{ __('ScheduledFlight Category') }}</label>

                            <div class="col-md-6">
                                <select class="form-select form-control-rounded" id="flightCategory" name="flightCategory" disabled>
                                    <option value="{{ $flight->flight_category }}">{{ $flight->flight_category }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="flightSeason" class="col-md-4 col-form-label text-md-right">{{ __('ScheduledFlight Season') }}</label>

                            <div class="col-md-6">
                                <select class="form-select form-control-rounded" id="flightSeason" name="flightSeason" disabled>
                                    <option value="{{ $flight->season->id }}">
                                        {{ $flight->season->start_date?->format('d/m/Y') }} - {{ $flight->season->end_date?->format('d/m/Y') }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="destination_description" class="col-md-4 col-form-label text-md-right">{{ __('Destination Description') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" id="destination_description" name="destination_description" value="{{ $flight->destination_description }}" disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="destination" class="col-md-4 col-form-label text-md-right">{{ __('Destination') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" id="destination" name="destination" value="{{ old('destination', $flight->destination) }}" disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="call_sign" class="col-md-4 col-form-label text-md-right">{{ __('Call Sign') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" id="call_sign" name="call_sign" value="{{ old('call_sign', $flight->call_sign) }}" disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="flight_date" class="col-md-4 col-form-label text-md-right">{{ __('ScheduledFlight date') }}</label>

                            <div class="col-md-6">
                                <p class="mb-2">{{ $flight->flight_date?->dayName }}</p>

                                <input class="form-control" type="date" id="flight_date" name="flight_date" value="{{ old('flight_date', $flight->flight_date?->format('Y-m-d')) }}" disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="flight_hour" class="col-md-4 col-form-label text-md-right">{{ __('ScheduledFlight hour') }}</label>

                            <div class="col-md-6 d-flex justify-content-between">
                                <div>
                                    <input class="form-control" type="time" id="flight_hour" name="flight_hour" value="{{ old('flight_hour', $flight->flight_hour) }}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control" id="comment" name="comment" rows="4" cols="50" disabled
                                >{{ old('comment', $flight->comment) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
