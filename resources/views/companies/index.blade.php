@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        {{ __('general.companies') }}

                        <div>
                            <a href="{{ route('companies.create') }}" class="btn btn-sm btn-primary">{{ __('general.create_company') }}</a>
                            <a href="{{ route('companies.download') }}" class="btn btn-sm btn-primary">{{ __('general.print') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('general.name') }}</th>
                                <th scope="col">{{ __('general.season') }}</th>
                                <th scope="col">{{ __('general.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <th scope="row">{{ $company->id }}</th>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->season->name }}: {{ $company->season->start_date?->format('d/m/Y') }} - {{ $company->season->end_date?->format('d/m/Y') }}</td>
                                    <td class="d-flex justify-content-start">
                                        <a href="{{ route('companies.edit', $company) }}"
                                           class="btn btn-success btn-sm" type="submit">{{ __('general.update') }}</a>

                                        <form action="{{ route('companies.destroy', $company) }}" method="POST">
                                            @csrf
                                            @method('Delete')

                                            <button class="btn btn-danger btn-sm" type="submit">{{ __('general.delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
