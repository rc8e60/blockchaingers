@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
            <h1>{{ ucfirst($corporation->name) }} corporation</h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    Participants
                    <span class="pull-right text-muted badge">
                        {{ count($corporation->users) }}
                    </span>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email address</th>
                                <th scope="col">User since</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($corporation->users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ \Carbon\Carbon::parse($user->created_at)->format('Y-m-d H:i:s') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">
                                        There are no participants...
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Definition of done
                    <span class="pull-right text-muted">
                        When are you done?
                    </span>
                </div>
                <div class="panel-body">
                    @if (!$corporation->definition_of_done)
                        <div class="text-warning">Sorry, but you have chosen not to have a DoD (definition of done).</div>
                    @endif
                    {{ $corporation->definition_of_done }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Invitation link
                    <span class="pull-right text-muted">
                        Invite your participants
                    </span>
                </div>
                <div class="panel-body">
                    <div class="col-md-10">
                        <input id="link" value="{{ action('CorporationController@join', $corporation->id) }}" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <button class="invitation-link btn btn-success" data-clipboard-target="#link">
                            <span class="glyphicon glyphicon-copy" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
