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
                        {{ __('Flights') }}

                        <a href="{{ route('flights.create') }}" class="btn btn-sm btn-primary">Create a new flight</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Season') }}</th>
                                <th scope="col">{{ __('Company') }}</th>
                                <th scope="col">{{ __('Flight date') }}</th>
                                <th scope="col">{{ __('Flight hour') }}</th>
                                <th scope="col">{{ __('Destination') }}</th>
                                <th scope="col">{{ __('Call sign') }}</th>
                                <th scope="col">{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($flights as $flight)
                                <tr>
                                    <th scope="row">{{ $flight->id }}</th>
                                    <th scope="row">{{ $flight->season->start_date?->format('d M Y') }} - {{ $flight->season->end_date?->format('d M Y') }}</th>
                                    <th scope="row">{{ $flight->company->name }}</th>
                                    <th scope="row">{{ $flight->flight_date?->format('d M Y') }}</th>
                                    <th scope="row">{{ $flight->flight_hour }}</th>
                                    <th scope="row">{{ $flight->destination }}</th>
                                    <th scope="row">{{ $flight->call_sign }}</th>
                                    <td class="d-flex justify-content-start">
                                        <a href="{{ route('flights.edit', $flight) }}"
                                           class="btn btn-success btn-sm" type="submit">Update</a>

                                        <form action="{{ route('flights.destroy', $flight) }}" method="POST">
                                            @csrf
                                            @method('Delete')

                                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-end">
                            {{ $flights->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
