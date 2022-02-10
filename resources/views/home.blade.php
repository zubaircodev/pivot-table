@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}


                        <x-user-follow></x-user-follow>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>User</th>
                            <th>email</th>
                            <th>Following</th>
                            <th>Following</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\Models\User::with('following')->where('id', '!=', auth()->user()->id)->get() as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->following->count() }}</td>
                                <td>{{ $user->follower->count() }}</td>
                                <td>{{ '' }}</td>
                                <td>
                                    @if(auth()->user()->following->contains($user->id))
                                    <a class="btn btn-primary" href="{{ route('user.follow', $user->id) }}">Un-Follow</a>
                                    @else
                                        <a class="btn btn-primary" href="{{ route('user.follow', $user->id) }}">Follow</a>
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
