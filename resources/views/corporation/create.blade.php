@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create your corporation</div>

                <div class="panel-body">
                    {!! Form::open(['action' => 'CorporationController@store']) !!}
                        <div class="col-md-6">
                            <div class="form-group">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Your corporation name here']) !!}
                            </div>
                        </div>
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
