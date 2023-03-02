@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('general.create_scheduled_flight') }}</div>

                    <div class="card-body">
                        <livewire:create-scheduled-flights />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
