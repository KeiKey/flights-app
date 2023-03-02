@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mb-2">
                    @include('partials.filters', ['filters' => ['company', 'season', 'category', 'fromDate', 'toDate', 'day']])
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        {{ __('general.scheduled_flight') }}

                        <a href="{{ route('scheduled-flights.create') }}" class="btn btn-sm btn-primary">{{ __('general.create_scheduled_flight') }}</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('general.season') }}</th>
                                <th scope="col">{{ __('general.company') }}</th>
                                <th scope="col">{{ __('general.flight_day') }}</th>
                                <th scope="col">{{ __('general.flight_date') }}</th>
                                <th scope="col">{{ __('general.flight_hour') }}</th>
                                <th scope="col">{{ __('general.destination') }}</th>
                                <th scope="col">{{ __('general.comes_goes') }}</th>
                                <th scope="col">{{ __('general.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($scheduledFlights as $flight)
                                <tr>
                                    <th scope="row">{{ $flight->id }}</th>
                                    <th scope="row">{{ $flight->season->start_date?->format('d/m/Y') }} - {{ $flight->season->end_date?->format('d/m/Y') }}</th>
                                    <th scope="row">{{ $flight->company->name }}</th>
                                    <th scope="row">{{ __('general.'.strtolower($flight->flight_date?->dayName)) }}</th>
                                    <th scope="row">{{ $flight->flight_date?->format('d/m/Y') }}</th>
                                    <th scope="row">{{ $flight->flight_hour }}</th>
                                    <th scope="row">{{ $flight->destination }}</th>
                                    <th scope="row">{{ $flight->arrival ? __('general.departures') : __('general.arrives') }}</th>
                                    <td class="d-flex justify-content-start">
                                        <a href="{{ route('scheduled-flights.edit', ['scheduled_flight' => $flight->id]) }}"
                                           class="btn btn-success btn-sm" type="submit">{{ __('general.update') }}</a>

                                        <form action="{{ route('scheduled-flights.destroy', ['scheduled_flight' => $flight->id]) }}" method="POST">
                                            @csrf
                                            @method('Delete')

                                            <button class="btn btn-danger btn-sm" type="submit">{{ __('general.delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-end">
                            {{ $scheduledFlights->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
