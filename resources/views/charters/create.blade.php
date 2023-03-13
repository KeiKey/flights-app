@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('general.create_charter_flight') }}</div>

                    <div class="card-body">
                        @include('partials.charter-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
