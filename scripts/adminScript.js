// ////////
// ajax
// ////////
$('#submitButton').click(function(){
  var data = $('form').serialize();
  $.ajax({
    data: data,
    type: "post",
    url: "php/post.php",
    success: function(data){
      alert("data save: " + data);
    }
  })
})

// //////
// Angular
// //////
var cylinderAdminApp = angular.module('cylinderAdminApp', []);

  //
  // Angular Service
  //
cylinderAdminApp.service('cylinderAdminData', ['$http', function($http){
  this.getAdminCylinderData = function(){
    return $http.get('https://edisoncylindertestdb.firebaseio.com/cylinders.json');
  }
}]);

cylinderAdminApp.controller('cylinderAdminCtrl', ['$scope', 'cylinderAdminData', function($scope, cylinderAdminData){

  // Variable
  $scope.returnedData;

  // Get Data
  cylinderAdminData.getAdminCylinderData().then(function(data){
    $scope.returnedData = data.data;

  })

  $scope.getItemData = function(){
    console.log(this.item);
    $('#cylinderFormInfo').css('display','block');

    $scope.cylinderTitle = this.item.title;
    $scope.cylinderArtist = this.item.artist;
    $scope.cylinderComments = this.item.comments;
  }

  $scope.closeEdit = function(){
    $('#cylinderFormInfo').css('display','none');
    $scope.cylinderTitle = null;
    $scope.cylinderArtist = null;
    $scope.cylinderComments = null;
  }


}])
