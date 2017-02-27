@extends('layouts.layout')

@section('content')
        <!-- Main content -->
<div class="container-fluid" style="margin-top: 30px;">
    <div class="row">
        {!!Form::open(array('url' => 'bands/'.$band['id'],'method'=>'POST'))!!}
        <div class="col-md-4" style="display: none">
            <div class="form-group add-field">
                {!! Form::label('id', 'Id', ['class' => 'band_insert_label']) !!}
                {!! Form::number('id', $band['id']) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group add-field">
                {!! Form::label('name', 'Name*', ['class' => 'band_insert_label']) !!}
                {!! Form::text('name',$band['name'],array('class'=>'form-control','placeholder'=>'Name','required')) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group add-field">
                {!! Form::label('start_date', 'Start Date', ['class' => 'band_insert_label']) !!}
                {!! Form::input('date', 'start_date', $band['start_date'], ['class' => 'form-control', 'placeholder' => 'Start Date']) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group add-field">
                {!! Form::label('website', 'Website', ['class' => 'airplane_flight_insert_label']) !!}
                {!! Form::text('website',$band['website'],array('class'=>'form-control','placeholder'=>'Website')) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group add-field">
                {!! Form::label('still_active', 'Still Active', ['class' => 'airplane_flight_insert_label']) !!}
                {!! Form::checkbox('still_active', $band['still_active'],$band['still_active']) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::submit('Update Band',array('class'=>'btn btn-success','style'=>'float:right;')) !!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>
</div>

<!-- /.content -->
@endsection