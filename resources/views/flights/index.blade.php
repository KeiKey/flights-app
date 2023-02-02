@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        {{ __('Flights') }}

                        <a href="{{ route('flights.create') }}" class="btn btn-sm btn-primary">Create a new flight</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Company</th>
                                <th scope="col">Start date</th>
                                <th scope="col">End date</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($flights as $flight)
                                <tr>
                                    <th scope="row">{{ $flight->id }}</th>
                                    <th scope="row">{{ $flight->id }}</th>
                                    <th scope="row">{{ $flight->id }}</th>
                                    <td class="d-flex justify-content-start">
                                        <a href="{{ route('flights.edit', $flight) }}"
                                           class="btn btn-success btn-sm" type="submit">Update</a>

                                        <form action="{{ route('flights.destroy', $flight) }}" method="POST">
                                            @csrf
                                            @method('Delete')

                                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
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
