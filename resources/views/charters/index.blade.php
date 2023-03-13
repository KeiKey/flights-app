@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mb-2">
                    @include('partials.filters', ['filters' => ['fromDate', 'toDate', 'day']])
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        {{ __('general.charters') }}

                        <div>
                            <a href="{{ route('charters.create') }}" class="btn btn-sm btn-primary">{{ __('general.create_charter_flight') }}</a>
                            <a href="{{ route('charters.download', request()->query()) }}" class="btn btn-sm btn-primary">{{ __('general.print') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('general.flight_day') }}</th>
                                <th scope="col">{{ __('general.flight_date') }}</th>
                                <th scope="col">{{ __('general.call_sign') }}</th>
                                <th scope="col">{{ __('general.type_of_aircraft') }}</th>
                                <th scope="col">{{ __('general.type_of_flight') }}</th>
                                <th scope="col">{{ __('general.nationality') }}</th>
                                <th scope="col">{{ __('general.from') }}</th>
                                <th scope="col">{{ __('general.to') }}</th>
                                <th scope="col">{{ __('general.eta') }}</th>
                                <th scope="col">{{ __('general.etd') }}</th>
                                <th scope="col">{{ __('general.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($charters as $flight)
                                <tr>
                                    <th scope="row">{{ $flight->id }}</th>
                                    <th scope="row">{{ __('general.'.strtolower($flight->flight_date?->dayName)) }}</th>
                                    <th scope="row">{{ $flight->flight_date?->format('d/m/Y') }}</th>
                                    <th scope="row">{{ $flight->call_sign }}</th>
                                    <th scope="row">{{ $flight->type_of_aircraft }}</th>
                                    <th scope="row">{{ $flight->type_of_flight }}</th>
                                    <th scope="row">{{ $flight->nationality }}</th>
                                    <th scope="row">{{ $flight->from }}</th>
                                    <th scope="row">{{ $flight->to }}</th>
                                    <th scope="row">{{ $flight->eta }}</th>
                                    <th scope="row">{{ $flight->etd }}</th>
                                    <td class="d-flex justify-content-start">
                                        <a href="{{ route('charters.edit', $flight) }}"
                                           class="btn btn-success btn-sm" type="submit">{{ __('general.update') }}</a>

                                        <form action="{{ route('charters.destroy', $flight) }}" method="POST">
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
                            {{ $charters->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
