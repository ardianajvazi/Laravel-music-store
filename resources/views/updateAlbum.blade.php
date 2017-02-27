@extends('layouts.layout')

@section('content')

    <!-- Main content -->
    <div class="container-fluid" style="margin-top: 30px;">
        <div class="row">
            {!!Form::open(array('url' => 'albums/'.$album['id'],'method'=>'POST'))!!}
            <div class="col-md-4">
                <div class="form-group add-field">
                    {!! Form::label('name', 'Name*', ['class' => 'album_update_label']) !!}
                    {!! Form::text('name',$album['name'],array('class'=>'form-control','placeholder'=>'Name','required')) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group add-field">
                    {!! Form::label('band', 'Band*', ['class' => 'album_insert_label']) !!}<br>
                    {!! Form::select('band',$band_names,$band_selected,['required','class'=>'form-control'] ) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group add-field">
                    {!! Form::label('recorded_date', 'Recorded Date', ['class' => 'album_insert_label']) !!}
                    {!! Form::input('date', 'recorded_date', $album['recorded_date'], ['class' => 'form-control', 'placeholder' => 'Recorded Date']) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group add-field">
                    {!! Form::label('release_date', 'Release Date', ['class' => 'album_insert_label']) !!}
                    {!! Form::input('date', 'release_date', $album['release_date'], ['class' => 'form-control', 'placeholder' => 'Recorded Date']) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group add-field">
                    {!! Form::label('number_of_tracks', 'Number of tracks', ['class' => 'album_insert_label']) !!}<br>
                    {!! Form::number('number_of_tracks',$album['number_of_tracks'],['class'=>'form-control','placeholder'=>'Number of tracks']) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group add-field">
                    {!! Form::label('label', 'Label', ['class' => 'album_insert_label']) !!}
                    {!! Form::text('label',$album['label'],array('class'=>'form-control','placeholder'=>'Label')) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group add-field">
                    {!! Form::label('producer', 'Producer', ['class' => 'album_insert_label']) !!}
                    {!! Form::text('producer',$album['producer'],array('class'=>'form-control','placeholder'=>'Producer')) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group add-field">
                    {!! Form::label('genre', 'Genre', ['class' => 'album_insert_label']) !!}
                    {!! Form::text('genre',$album['genre'],array('class'=>'form-control','placeholder'=>'Genre')) !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::submit('Update Album',array('class'=>'btn btn-success','style'=>'float:right;')) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>

    <!-- /.content -->
@endsection