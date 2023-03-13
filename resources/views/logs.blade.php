@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        {{ __('Logs') }}

                        <form action="{{ route('logs.index') }}" method="GET">
                            <div class="input-group">
                                <input type="search" class="form-control rounded" name="search" value="{{ request()->input('search') }}"/>

                                <button type="button" class="btn btn-outline-primary">
                                    <i class="fas fa-search"></i> {{ __('general.search') }}
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('general.created_at') }}</th>
                                <th>{{ __('general.user') }}</th>
                                <th>{{ __('general.function') }}</th>
                                <th class="w-50">{{ __('general.comment') }}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($logs as $log)
                                <tr>
                                    <td>{{ $log->created_at }}</td>
                                    <td>{{ $log->causer->name }} {{ $log->causer->surname }}</td>
                                    <td>{{ $log->event }}</td>
                                    <td>{{ $log->description }}</td>
                                    <td>
                                        <button type="button" class="btn btn-secondary" data-toggle="tooltip"
                                                data-placement="right" title="{{ $log->properties }}">
                                            {{ __('general.technical_data') }}
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    {!! $logs->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
