/**
 * Created by Lorik on 2/3/2017.
 */
var app = angular.module('music_app', ['angularUtils.directives.dirPagination'],function($interpolateProvider){
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
app.directive('emitLastRepeaterElement', function($timeout) {
    return function(scope) {
        if (scope.$last){
            $timeout(function () {
                scope.$emit('LastRepeaterElement');
            });
        }
    };
});