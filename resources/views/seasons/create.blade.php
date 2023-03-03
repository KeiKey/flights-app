@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('general.create_season') }}</div>

                    <div class="card-body">
                        @include('partials.season-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
