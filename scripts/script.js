// Get Screen Sizes
var screenHeight = $(window).height();
var screenWidth = $(window).width();

$(window).resize(function(){
  screenHeight = $(window).height();
  screenWidth = $(window).width();

  if(screenWidth <= 650){
    $('section').height(screenHeight - 50);
    $('section main').height(screenHeight - 100);
    $('section').width(screenWidth);
    $('.footerButtonContainers i').css('top', '15px');
  }else{
    $('section').height(screenHeight);//Leave in temporarily until filled in with content;
    $('section').width(screenWidth - 50);
    $('.footerButtonContainers i').removeAttr('style');
    console.log(screenWidth);
  }
});



// Get selected section
$('.navButton').click(function(){

  // console.log('Clicked!');

  // Create blank variable for selected section and get icon position
  var selectedSection;
  var iconPosition = $(this).position().left;

  // Determine which button is selected and assign the matching section
  switch ($(this).attr('id')) {
    case 'homeButton':
        selectedSection = '#homeSection';
        $('.activeFooter').addClass('tempActive');
        $('.activeFooter').removeClass('activeFooter');
        $('#homeButtonContainer').addClass('activeFooter');
        changeActiveFooter();
      break;
    case 'libraryButton':
        selectedSection = '#librarySection';
        $('.activeFooter').addClass('tempActive');
        $('.activeFooter').removeClass('activeFooter');
        $('#libraryButtonContainer').addClass('activeFooter');
        changeActiveFooter();
      break;
    case 'informationButton':
        selectedSection = '#informationSection';
        $('.activeFooter').addClass('tempActive');
        $('.activeFooter').removeClass('activeFooter');
        $('#informationButtonContainer').addClass('activeFooter');
        changeActiveFooter();
      break;
    case 'contactButton':
        selectedSection = '#contactSection';
        $('.activeFooter').addClass('tempActive');
        $('.activeFooter').removeClass('activeFooter');
        $('#contactButtonContainer').addClass('activeFooter');
        changeActiveFooter();
      break;
  }

  // Will need to put in logic that determines how wide the screen is

  // Add styles to container so it remains stationary
  // This is not handled by CSS because the broswer cannot handle two levels of hidden overflow
  // It also locks the container in place so that scrolling down can not occur while screen changes.
  $('#container').height(screenHeight - 50);
  $('#container').css('position','absolute');
  $('#container').css('overflow','hidden');

  // Animate selected section
  $(selectedSection).css('display','block');
  $(selectedSection + ' header i').css('left', iconPosition);
  $(selectedSection).animate({
    top: 0
  },500,function(){

    // Remove and add active and inactive classes
    $('.active').addClass('inactive');
    $('.active').removeAttr('style');
    $('.active').removeClass('active');
    $(selectedSection).removeClass('inactive');
    $(selectedSection).addClass('active');

    // Remove container restrictions
    $('#container').removeAttr('style');

    // Reset Section Height
    $('section').height(screenHeight - 50);
    $('section main').height(screenHeight - 100);

    // Move selected section icon to the center
    $(selectedSection + ' header i').animate({
      left: '50%'
    },500);

  });

});//End of get selected sections

// Function For Changing footer
var changeActiveFooter = function(){
  $('.tempActive').animate({
    opacity: 0
  }, 500, function(){
    $('.tempActive').css('display','none');
    $('.tempActive').removeClass('tempActive');
  })


  $('.activeFooter').css('display','block');
  $('.activeFooter').animate({
    opacity: 1
  }, 500)
};

// ////////
// Angular
// ////////
var cylinderApp = angular.module('cylinderApp', []);

// Services for HTTP Requests
cylinderApp.service('cylinderData', ['$http', function($http){
  this.getCylinderData = function(){
    return $http.get('https://edisoncylindertestdb.firebaseio.com/cylinders.json')
  }
}])

// Controller for App
cylinderApp.controller('cylinderAppCtrl', ['$scope','cylinderData', function($scope, cylinderData){

  // Variables
  $scope.returnedCylinderData;

  cylinderData.getCylinderData().then(function(data){
    $scope.returnedCylinderData = data.data;

    console.log($scope.returnedCylinderData);
  });


}]);//End Of controller
