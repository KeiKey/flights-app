@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if(is_null($user->email_verified_at))
                                        <form action="{{ route('users.update', $user) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="email_verified_at" value="true">
                                            <button class="btn btn-success btn-sm" type="submit">Activate User</button>
                                        </form>
                                    @else
                                        <form action="{{ route('users.update', $user) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="email_verified_at" value="false">
                                            <button class="btn btn-danger btn-sm" type="submit">Deactivate User</button>
                                        </form>
                                    @endif
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
