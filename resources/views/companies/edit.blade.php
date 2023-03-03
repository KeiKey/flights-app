@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        {{ __('general.edit_company') }}
                        <span>
                            {{ $company->name }}
                        </span>
                    </div>

                    <div class="card-body">
                        @include('partials.company-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
