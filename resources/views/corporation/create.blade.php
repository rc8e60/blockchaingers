@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create your corporation</div>

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
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
