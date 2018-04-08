@extends('layouts.app')

@section('header')
    <div class="col-md-8">
        <h2 class="margin-top-xs-55">Create your corporation</h2>
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
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-padding">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#participants" aria-expanded="true" aria-controls="participants">
                                    <i class="fa fa-angle-up" aria-hidden="true"></i>
                                </a>
                                Create your corporation
                                <span class="pull-right participants-count">2/2</span>
                            </h4>
                        </div>
                    </div>
                    <div id="participants" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            {!! Form::open(['action' => 'CorporationController@store']) !!}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        {{ Form::label('name', 'Name') }}
                                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Your corporation name here']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                        {{ Form::label('definition_of_done', 'DoD (definition of done)') }}
                                        {!! Form::textarea('definition_of_done', null, ['class' => 'form-control', 'rows' => 5, 'placeholder' => 'Describe your DoD (definition of done)']) !!}
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-bordered">Save <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
