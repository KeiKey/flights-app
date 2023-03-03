<!DOCTYPE html>
<html>
<head>
    <title>Scheduled</title>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>{{ __('general.season') }}</th>
        <th>{{ __('general.company') }}</th>
        <th>{{ __('general.flight_day') }}</th>
        <th>{{ __('general.flight_date') }}</th>
        <th>{{ __('general.flight_hour') }}</th>
        <th>{{ __('general.destination') }}</th>
        <th>{{ __('general.comes_goes') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($scheduledFlights as $flight)
        <tr>
            <th>{{ $flight->id }}</th>
            <th>{{ $flight->season->start_date?->format('d/m/Y') }} - {{ $flight->season->end_date?->format('d/m/Y') }}</th>
            <th>{{ $flight->company->name }}</th>
            <th>{{ __('general.'.strtolower($flight->flight_date?->dayName)) }}</th>
            <th>{{ $flight->flight_date?->format('d/m/Y') }}</th>
            <th>{{ $flight->flight_hour }}</th>
            <th>{{ $flight->destination }}</th>
            <th>{{ $flight->arrival ? __('general.departures') : __('general.arrives') }}</th>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
