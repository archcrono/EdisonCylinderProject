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
    $('#modal--bg').addClass('dark');
    $('#cylinderFormInfo').addClass('show');

    $scope.cylinderTitle = this.item.title;
    $scope.cylinderArtist = this.item.artist;
    $scope.cylinderComments = this.item.comments;
    $scope.cylinderURL = this.item.url;
    $scope.cylinderCondition = this.item.condition;
    $scope.cylinderMold = this.item.mold;
    $scope.cylinderNumber = this.item.number;
    $scope.cylinderTake = this.item.take;
    $scope.cylinderPlayable = this.item.crackedPlayable;
    
    $scope.checkbox = {
      unplayable: false,
      playable: false,
      flatEdge: false,
      ucsb: false,
      website: false
    }

    $scope.checkbox.playable = this.item.crackedPlayable;
    $scope.checkbox.unplayable = this.item.cracedUnplayable;
    $scope.checkbox.flatEdge = this.item.flatEdge;
    $scope.checkbox.ucsb = this.item.inUCSBdb;
    $scope.checkbox.website = this.item.onWebsite;


  }

  $scope.closeEdit = function(){

    $('#cylinderFormInfo').removeClass('show');
    $('#modal--bg').removeClass('dark');
    
    $scope.cylinderTitle = null;
    $scope.cylinderArtist = null;
    $scope.cylinderComments = null;
    $scope.cylinderURL = null;
    $scope.cylinderCondition = null;
    $scope.cylinderMold = null;
    $scope.cylinderNumber = null;
    $scope.cylinderTake = null;
    $scope.cylinderPlayable = null;
    $scope.checkbox.playable = null;
    $scope.checkbox.unplayable = null;
    $scope.checkbox.flatEdge = null;
    $scope.checkbox.ucsb = null;
    $scope.checkbox.website = null;

  }


  $scope.openNewForm = function(){
    $('#modal--bg').addClass('dark');
    $('#createNewCylinderForm').addClass('show');
  }
  $scope.closeNewForm = function(){
    $('#modal--bg').removeClass('dark');
    $('#createNewCylinderForm').removeClass('show');
  }


}]);