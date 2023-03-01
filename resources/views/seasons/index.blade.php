@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        {{ __('Seasons') }}

                        <a href="{{ route('seasons.create') }}" class="btn btn-sm btn-primary">Create a new seasons</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Start date</th>
                                <th scope="col">End date</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($seasons as $season)
                                <tr>
                                    <th scope="row">{{ $season->id }}</th>
                                    <td>{{ $season->name }}</td>
                                    <td>{{ $season->start_date->format('d-m-Y') }}</td>
                                    <td>{{ $season->end_date->format('d-m-Y') }}</td>
                                    <td class="d-flex justify-content-start">
                                        <a href="{{ route('seasons.edit', $season) }}"
                                           class="btn btn-success btn-sm" type="submit">Update</a>

                                        <form action="{{ route('seasons.destroy', $season) }}" method="POST">
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
