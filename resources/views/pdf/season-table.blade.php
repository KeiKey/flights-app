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
        <th>{{ __('general.season_name') }}</th>
        <th>{{ __('general.start_date_short') }}</th>
        <th>{{ __('general.end_date_short') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($seasons as $season)
        <tr>
            <th>{{ $season->id }}</th>
            <td>{{ $season->name }}</td>
            <td>{{ $season->start_date->format('d-m-Y') }}</td>
            <td>{{ $season->end_date->format('d-m-Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
