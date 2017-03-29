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
    $('#modal--bg').addClass('modal--bg');
    $('#cylinderFormInfo').css('display','block');
    // $('.modal__container').css('display','block');

    $scope.cylinderTitle = this.item.title;
    $scope.cylinderArtist = this.item.artist;
    $scope.cylinderComments = this.item.comments;
  }

  $scope.closeEdit = function(){

    $('#modal--bg').removeClass('modal--bg');
    $('#cylinderFormInfo').css('display','none');
    // $('.modal__container').css('display','none');
    
    $scope.cylinderTitle = null;
    $scope.cylinderArtist = null;
    $scope.cylinderComments = null;
  }

  $scope.openNew = function(){
    console.log('clicked');
    $('#modal--bg').addClass('modal--bg');
    $('.modal__container').css('display','block');
  }
  $scope.closeNewForm = function(){
    $('#modal--bg').removeClass('modal--bg');
    $('.modal__container').css('display','none');
  }


}])


$('#content_1').click(function(){
  console.log('test1');
});

$('#content_2').click(function(){
  console.log('test');
});