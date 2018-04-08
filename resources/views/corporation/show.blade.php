@extends('layouts.app')

@section('header')
    <div class="col-md-8">
        <h2 class="margin-top-xs-55">{{ ucfirst($corporation->name) }} corporation</h2>
        <a href="http://testnet.stellarchain.io/address/{{ $corporation->account_address }}" class="btn btn-white text-uppercase">
            <i class="fa fa-key" aria-hidden="true"></i> View ledger key
        </a>
    </div>
    <div class="col-md-2 col-md-offset-2">
        <div class="dropdown margin-top-xs-55">
            <div class="dropdown-toggle menu" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                {{ Auth::user()->name }}
                <i class="fa fa-caret-down" aria-hidden="true"></i>
            </div>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-padding">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#participants" aria-expanded="true" aria-controls="participants">
                                    <i class="fa fa-angle-up" aria-hidden="true"></i>
                                </a>
                                Participants
                                <span class="pull-right participants-count">3/4</span>
                            </h4>
                        </div>
                    </div>
                    <div id="participants" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        @forelse ($corporation->users as $user)
                                            <tr>
                                                <td>
                                                    <div class="media">
                                                        <div class="media-left media-middle">
                                                            <a href="#">
                                                                <img class="media-object" src="{{ asset('/images/photo.svg') }}" alt="...">
                                                            </a>
                                                            </div>
                                                            <div class="media-body">
                                                                <p class="media-heading">{{ $user->name }}</p>
                                                                <span class="text-muted">{{ $user->email }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td width="200">
                                                    <a href="" class="text-blue"><i class="fa fa-user-circle" aria-hidden="true"></i> View participant</a>
                                                    <br>
                                                    <span class="text-muted">
                                                        <i class="fa fa-clock-o" aria-hidden="true"></i> {{ \Carbon\Carbon::parse($user->created_at)->format('Y-m-d') }}
                                                    </span>
                                                </td>
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
                        <div class="panel-footer">
                            Invite your participants
                            <span class="pull-right">
                                <a href="" class="btn btn-bordered">
                                    <i class="fa fa-user-plus" aria-hidden="true"></i>Send invitation link
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-padding">
                        <div class="panel-heading" role="tab" id="dodHead">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#dod" aria-expanded="true" aria-controls="dod">
                                    <i class="fa fa-angle-up" aria-hidden="true"></i>
                                </a>
                                Definition of done
                                <span class="pull-right participants-count">1/2</span>
                            </h4>
                        </div>
                    </div>
                    <div id="dod" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="dodHead">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            @if ($corporation->definition_of_done)
                                            <td>
                                                <div class="media">
                                                    <div class="media-left media-middle">
                                                        <a href="#">
                                                            <img class="media-object rounded-check" src="{{ asset('/images/check.svg') }}" alt="...">
                                                        </a>
                                                        </div>
                                                        <div class="media-body">
                                                            {{ $corporation->definition_of_done }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            @else
                                                <td>
                                                    <div class="media">
                                                        <div class="media-left media-middle">
                                                            <div class="media-body">
                                                                <i>Sorry, but you have chosen not to have a DoD (definition of done).</i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
