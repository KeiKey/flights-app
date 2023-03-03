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
        <th>{{ __('general.company_name') }}</th>
        <th>{{ __('general.season') }}</th>
    </thead>
    <tbody>
    @foreach($companies as $company)
        <tr>
            <th>{{ $company->id }}</th>
            <td>{{ $company->name }}</td>
            <td>{{ $company->season->name }}: {{ $company->season->start_date?->format('d/m/Y') }} - {{ $company->season->end_date?->format('d/m/Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
