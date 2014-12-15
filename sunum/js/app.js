var app = angular.module('notdurumu', []);
app.controller('notlistesi', ['$scope','$http', function($scope, $http){
  
  var onSuccess = function(response){
    alert("cdf000");
    //$scope.ogrno = response.data["Öğrenci No"];
  };
  var onError = function(response){
    $scope.error = 'Kullanıcı bulunamadı!';
  };
  
  $scope.getGithubRepos = function(){
    $http.get("192.168.0.14/curl/login")
    .then(onSuccess, onError);
  };
  
}]);