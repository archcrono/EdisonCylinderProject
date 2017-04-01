// ////////
// ajax
// ////////
$('#createNewCylinderButton').click(function(){
  $('#randomCylinderId').val(Date.now());

  var data = $('#createForm').serialize();

  $.ajax({
    data: data,
    type: "post",
    url: "php/post.php",
    success: function(data){
      // window.location.reload();
      alert(data);
    }
  })

});

$('#updateCylinder').click(function(){
  var data = $('#cylinderUpdateForm').serialize();

  $.ajax({
    data: data,
    type: "post",
    url: "php/update.php",
    success: function(data){
      // window.location.reload();
      alert(data);
    }
  })

})

$('#deleteCylinder').click(function(){
  var data = $('#cylinderUpdateForm').serialize();

  $.ajax({
    data: data,
    type: "post",
    url: "php/delete.php",
    success: function(data){
      // window.location.reload();
      alert(data);
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
    return $http.get('php/get.php');

    // return $http.get('https://edisoncylindertestdb.firebaseio.com/cylinders.json');
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
    $scope.cylinderCondition = parseInt(this.item.cylinderCondition);
    $scope.cylinderMold = parseInt(this.item.mold);
    $scope.cylinderNumber = parseInt(this.item.cylinderNumber);
    $scope.cylinderTake = parseInt(this.item.take);
    $scope.cylinderId = parseInt(this.item.id);

    $scope.checkbox = {
      unplayable: false,
      playable: false,
      flatEdge: false,
      ucsb: false,
      website: false
    }

    var changeToBoolean = function(itemData){
      if(parseInt(itemData) == 1){
        return true;
      }else{
        return false;
      }
    }

    $scope.checkbox.playable = changeToBoolean(this.item.crackedPlayable);
    $scope.checkbox.unplayable = changeToBoolean(this.item.cracedUnplayable);
    $scope.checkbox.flatEdge = changeToBoolean(this.item.flatEdge);
    $scope.checkbox.ucsb = changeToBoolean(this.item.inUCSBdb);
    $scope.checkbox.website = changeToBoolean(this.item.onWebsite);


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
