@extends('layouts.layout')

@section('content')

        <!-- Main content -->
<div role="main" class="container-fluid text-center" ng-app="music_app" ng-controller="bands_controller" style="margin-top: 30px;">
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

                            <a type="button" class="btn btn-success flight-buttons"  href="/add-band" style="float: right;">Add Brand</a>
                        </form>

                        <table class="table table-striped table-hover brand_table" id="brandTable" style="margin-top:40px;">
                            <thead>
                            <tr>
                                <th style="display: none">ID</th>
                                <th class="th-name" ng-click="sort('name')">Name
                                    <span class="glyphicon sort-icon" ng-show="sortKey=='name'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                </th>
                                <th class="th-start_date" ng-click="sort('start_date')">Start Date
                                    <span class="glyphicon sort-icon" ng-show="sortKey=='start_date'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                </th>
                                <th class="th-website" ng-click="sort('website')">Website
                                    <span class="glyphicon sort-icon" ng-show="sortKey=='website'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                </th>
                                <th class="th-still_active" ng-click="sort('still_active')">Still Active
                                    <span class="glyphicon sort-icon" ng-show="sortKey=='still_active'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                                </th>
                                <th style="">Edit</th>
                                <th style="">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr dir-paginate="band in bands|orderBy:sortKey:reverse|filter:search|itemsPerPage:5" emit-last-repeater-element class="band-tr" id="band-tr-<%band.id%>" brand-id="<%band.id%>">
                                <td class="td-id" style="display: none;"><%band.id%></td>
                                <td class="td-name"><%band.name%></td>
                                <td class="td-start_date"><%band.start_date%></td>
                                <td class="td-website"><a href="<%band.website%>"><%band.website%></a></td>
                                <td class="td-still_active"><%band.still_active%></td>
                                <td>
                                    <a type="button" href="/update-band/<%band.id%>" class="btn btn-default"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                </td>
                                <td>
                                    <button type="button" ng-click="deleteBand(band.id)" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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