app.controller('albums_controller',function($scope, $http){

    $scope.albums=[];


    //var date = ''; // TODO remove this line
    $http.get("/get-albums").success(function(response){

        $scope.albums = response;

    });

    $scope.deleteAlbum = function(item_id){
        $http.delete("/albums/"+item_id).success(function(response){
            $('#album-tr-'+item_id).hide('Slow')
        });
    }
    $scope.sort = function(keyname){
        $scope.sortKey = keyname;   //set the sortKey to the param passed
        $scope.reverse = !$scope.reverse; //if true make it false and vice versa
    }

    $scope.refreshList = function(){
        var band_name = $('#band_select').find(":selected").text();
        if(band_name == 'All Bands')
            band_name = '';

        $http.get("/get-albums/"+band_name).success(function(response){

            $scope.albums = response;

        });
    }
    $scope.$on('LastRepeaterElement', function (scope) {

    });

});