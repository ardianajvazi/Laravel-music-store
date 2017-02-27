@extends('layouts.layout')

@section('content')

        <!-- Main content -->
<div role="main" class="container-fluid text-center" ng-app="music_app" ng-controller="albums_controller" style="margin-top: 30px;">
    <div class="panel panel-default usersTableDiv">

        <div class="container-fluid theme-showcase">
            <div class="" style="margin-top:40px;">
                <div class="col-lg-12">
                    <div class="bs-component">
                        <form class="form-inline">
                            <div class="form-group" style="float: left;margin-bottom: 25px;">
                                <label >Search</label>
                                <input type="text" ng-model="search" class="form-control" placeholder="Search">
                            </div>
                            <div class="form-group">
                                {!! Form::label('band', 'Band', ['class' => '']) !!}
                                {!! Form::select('band_select',$band_names,null,['required','class'=>'form-control','placeholder'=>'All Bands','id'=>'band_select'] ) !!}
                            </div>
                            <button class="btn btn-default flight-buttons" href="#" type="button" ng-click="refreshList()" style="">Find albums</button>

                            <a type="button" class="btn btn-success flight-buttons"  href="/add-album" style="float: right;">Add Album</a>
                        </form>

                        <table class="table table-striped table-hover brand_table" id="brandTable" style="margin-top:40px;">
                            <thead>
                            <tr>
                                <th style="display: none">ID</th>
                                <th class="th-name" ng-click="sort('name')">Album Name
                                    <span class="glyphicon sort-icon" ng-show="sortKey=='name'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                </th>
                                <th class="th-band" ng-click="sort('band')">Band
                                    <span class="glyphicon sort-icon" ng-show="sortKey=='band'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                </th>
                                <th class="th-recorded_date" ng-click="sort('recorded_date')">Recorded date
                                    <span class="glyphicon sort-icon" ng-show="sortKey=='recorded_date'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                </th>
                                <th class="th-release_date" ng-click="sort('release_date')">Release date
                                    <span class="glyphicon sort-icon" ng-show="sortKey=='release_date'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                </th>
                                <th class="th-number_of_tracks" ng-click="sort('number_of_tracks')">Number of tracks
                                    <span class="glyphicon sort-icon" ng-show="sortKey=='number_of_tracks'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                </th>
                                <th class="th-label" ng-click="sort('label')">Label
                                    <span class="glyphicon sort-icon" ng-show="sortKey=='label'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                </th>
                                <th class="th-producer" ng-click="sort('producer')">Producer
                                    <span class="glyphicon sort-icon" ng-show="sortKey=='producer'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                </th>
                                <th class="th-genre" ng-click="sort('genre')">Genre
                                    <span class="glyphicon sort-icon" ng-show="sortKey=='genre'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                </th>
                                <th style="">Edit</th>
                                <th style="">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr dir-paginate="album in albums|orderBy:sortKey:reverse|filter:search|itemsPerPage:5" emit-last-repeater-element class="album-tr" id="album-tr-<%album.id%>" album-id="<%album.id%>">
                                <td class="td-id" style="display: none;"><%album.id%></td>
                                <td class="td-name"><%album.name%></td>
                                <td class="td-band"><%album.band.name%></td>
                                <td class="td-recorded_date"><%album.recorded_date%></td>
                                <td class="td-release_date"><%album.release_date%></td>
                                <td class="td-number_of_tracks"><%album.number_of_tracks%></td>
                                <td class="td-label"><%album.label%></td>
                                <td class="td-producer"><%album.producer%></td>
                                <td class="td-genre"><%album.genre%></td>
                                <td>
                                    <a type="button" href="/update-album/<%album.id%>" class="btn btn-default"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                </td>
                                <td>
                                    <button type="button" ng-click="deleteAlbum(album.id)" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                </td>
                                {{--<td class="emailTD"><%user.dummy_1%></td>--}}
                                {{--<td class="emailTD"><%user.i_regjistruar%></td>--}}
                                {{--<td ng-show=" user.i_regjistruar == 0"><button type="button" ng-click="unAprove(Aprove(user.id))" class="btn btn-danger">Largo</button><button type="button" ng-click="Aprove(user.id)" style="margin-left: 2px;" class="btn btn-success">Aprovo</button></td>--}}
                                {{--<td ng-show=" user.i_regjistruar == 1"><button type="button" ng-click="unAprove(Aprove(user.id))" class="btn btn-danger">Largo</button></td>--}}
                            </tr>
                            </tbody>
                        </table>
                        <dir-pagination-controls
                                max-size="5"
                                direction-links="true"
                                boundary-links="true" >
                        </dir-pagination-controls>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<!-- /.content -->
@endsection
