@extends('layouts.layout')

@section('content')

        <!-- Main content -->
@if (isset($band['link']['market'])){{$band['link']['market']}}@endif
        <div class="container-fluid" style="margin-top: 30px;">
            <div class="row">
                {!! Form::open(array('action' => 'BandsController@store', 'method' => 'post')) !!}
                <div class="col-md-4">
                    <div class="form-group add-field">
                        {!! Form::label('name', 'Name*', ['class' => 'band_insert_label']) !!}
                        {!! Form::text('name','',array('class'=>'form-control','placeholder'=>'Name','required')) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group add-field">
                        {!! Form::label('start_date', 'Start Date', ['class' => 'band_insert_label']) !!}
                        {!! Form::input('date', 'start_date', null, ['class' => 'form-control', 'placeholder' => 'Start Date']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group add-field">
                        {!! Form::label('website', 'Website', ['class' => 'airplane_flight_insert_label']) !!}
                        {!! Form::text('website','',array('class'=>'form-control','placeholder'=>'Website')) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group add-field">
                        {!! Form::label('still_active', 'Still Active', ['class' => 'airplane_flight_insert_label']) !!}
                        {!! Form::checkbox('still_active', true) !!}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::submit('Add Band',array('class'=>'btn btn-success','style'=>'float:right;')) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>

    <!-- /.content -->
@endsection