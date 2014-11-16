/*angular.module('httpExample', [])
.controller('FetchController', ['$scope', '$http', '$templateCache',
  function($scope, $http, $templateCache) {
    $scope.method = 'GET';
    $scope.url = 'https://asp1.selcuk.edu.tr/asp/ogr/not.asp';

    $scope.fetch = function() {
      $scope.code = null;
      $scope.response = null;

    $http({
		method: $scope.method, 
		url: $scope.url,
		cache: $templateCache,
		headers:{
			'Accept':"* / *",
			'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Methods': 'GET, POST, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers': 'Content-Type, X-Requested-With',
            'X-Random-Shit':'123123123'
		}
	}).
    success(function(data, status) {
        $scope.status = status;
        $scope.data = data;
		alert(data);
    }).
    error(function(data, status) {
        $scope.data = data || "Request failed";
        $scope.status = status;
    });
};

    $scope.updateModel = function(method, url) {
      $scope.method = method;
      $scope.url = url;
    };
  }]);
*/

$(function(){
/*function createCORSRequest(method, url){
    var xhr = new XMLHttpRequest();
    if ("withCredentials" in xhr){
        // XHR has 'withCredentials' property only if it supports CORS
        xhr.open(method, url, true);
    } else if (typeof XDomainRequest != "undefined"){ // if IE use XDR
        xhr = new XDomainRequest();
        xhr.open(method, url);
    } else {
        xhr = null;
    }
    return xhr;
}
var request = createCORSRequest( "get", "https://asp2.selcuk.edu.tr/asp/ogr/giris.htm" );
if ( request ){
    // Define a callback function
    request.onload = function(){};
    // Send request
    request.send();
}*/
$.ajax({
  url:"service.php",
}).done(function(cb){
  $("body").html(cb);
});
});
/*
  $("#pencere").load(function(){
    alert("asdasdf");
    $(this).attr("src",$("form").attr("action"));
    console.log($(this).contents().find("frameset"));
  });*/