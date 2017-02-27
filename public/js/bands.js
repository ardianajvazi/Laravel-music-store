app.controller('bands_controller',function($scope, $http){

    $scope.bands=[];


    //var date = ''; // TODO remove this line
    $http.get("/get-bands").success(function(response){

        $scope.bands = response;

    });

    $scope.sort = function(keyname){
        $scope.sortKey = keyname;   //set the sortKey to the param passed
        $scope.reverse = !$scope.reverse; //if true make it false and vice versa
    }

    $scope.deleteBand = function(band_id){
        $http.delete("/bands/"+band_id).success(function(response){

            $('#band-tr-'+band_id).hide('Slow');

        });
    }
    //$scope.deleteRecord = function(event,item_id){
    //    var row = $(event.target);
    //    $http.delete("/bakery/"+item_id).success(function(response){
    //        if(response.status =='YES'){
    //            $('#cart-tr-'+item_id).hide('Slow')
    //        }else{
    //            alert(response.message);
    //        }
    //
    //    });
    //}

    //$scope.checkIfIExist = function(){
    //
    //    var exists = false;
    //
    //    angular.forEach($scope.bakery_items, function(value, key) {
    //
    //        //if(value.name = '')
    //        //exists = true;
    //    })
    //    //$('#addItemModal .form-group').hide();
    //    //$('#addItemModal .not-allowed').show();
    //
    //}

    //$scope.exportBakeryCart = function(){
    //
    //    $http.get('/export-bakery').success(function (response) {
    //
    //        window.location.href = response;
    //
    //    });
    //
    //}

    //$scope.$on('LastRepeaterElement', function (scope) {
    //
    //    $scope.appendActivities($scope.flights);
    //    $scope.processUserConstraints($scope.user_constraints_details);
    //
    //});

});