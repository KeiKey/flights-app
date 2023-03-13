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
        <th>{{ __('general.flight_date') }}</th>
        <th>{{ __('general.call_sign') }}</th>
        <th>{{ __('general.type_of_aircraft') }}</th>
        <th>{{ __('general.type_of_flight') }}</th>
        <th>{{ __('general.nationality') }}</th>
        <th>{{ __('general.from') }}</th>
        <th>{{ __('general.to') }}</th>
        <th>{{ __('general.purpose_of_flight') }}</th>
        <th>{{ __('general.eta') }}</th>
        <th>{{ __('general.etd') }}</th>
        <th>{{ __('general.clr') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($charters as $flight)
        <tr>
            <th>{{ $flight->id }}</th>
            <th>{{ $flight->flight_date?->format('d/m/Y') }}</th>
            <th>{{ $flight->call_sign }}</th>
            <th>{{ $flight->type_of_aircraft }}</th>
            <th>{{ $flight->type_of_flight }}</th>
            <th>{{ $flight->nationality }}</th>
            <th>{{ $flight->from }}</th>
            <th>{{ $flight->to }}</th>
            <th>{{ $flight->purpose_of_flight }}</th>
            <th>{{ $flight->eta }}</th>
            <th>{{ $flight->etd }}</th>
            <th>{{ $flight->clearance_no }}</th>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
