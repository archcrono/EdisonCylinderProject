// Get Screen Sizes
var screenHeight = $(window).height();
var screenWidth = $(window).width();
var screenSizeChange = 650;//The pixel size when the styling changes
var screenSize = null; //False indicates mobile, True indicates tablet and larger


// Fit screen type
var fitScreen = function(){
  // Makes the elements fit appropriate depending upon screensize
  if(screenWidth <= screenSizeChange){
    $('section').height(screenHeight - 50);
    $('section main').height(screenHeight - 100);
    $('section').width(screenWidth);
    $('section main').css('width','100%');
    $('.footerButtonContainers i').css('top', '15px');
    screenSize = false;

    // Home Page Slider Height and Width
    $('#homeSlider').height(screenHeight - 270);
    $('#homeSlider div').height(screenHeight - 270);
    $('.backColor').width(screenWidth);

  }else{
    $('section').height(screenHeight);
    $('section main').height(screenHeight);
    $('section').width(screenWidth - 50);
    $('section main').width(screenWidth - 100);
    $('.footerButtonContainers i').removeAttr('style');
    screenSize = true;
  }
};
fitScreen();


$(window).resize(function(){
  screenHeight = $(window).height();
  screenWidth = $(window).width();
  fitScreen();
});



// Get selected section
$('.navButton').on('click', function(){

  // console.log('Clicked!');
  // $('.navButton').off('click');
  // $('.tempButton').removeClass('navButton');

  // Create blank variable for selected section and get icon position
  var selectedSection;

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

  // Determin if screen is in Mobile or Tablet/Desktop View
  if(!screenSize){
    // Mobile view

    var iconPosition = $(this).position().left;

    // Add styles to container so it remains stationary
    // This is not handled by CSS because the broswer cannot handle two levels of hidden overflow
    // It also locks the container in place so that scrolling down can not occur while screen changes.
    $('#container').height(screenHeight - 50);
    $('#container').css('position','absolute');
    $('#container').css('overflow','hidden');

    // Prep/Animate selected section
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
      $('#container').height(screenHeight);
      $('#container').removeAttr('style');

      // Reset Section Height
      $('section').height(screenHeight - 50);
      $('section main').height(screenHeight - 100);

      // Move selected section icon to the center
      $(selectedSection + ' header i').animate({
        left: '50%'
      },500);

    });
  }
  else if (screenSize){
    // Tablet/Desktop view

    var iconPosition = $(this).position().top;

    // Assign Height and width to the selected section
    $(selectedSection).css('display','block');
    $(selectedSection).height(screenHeight);
    $(selectedSection).width(screenWidth - 50);
    $(selectedSection).css('top','0');
    $(selectedSection).css('left', screenWidth);


    $(selectedSection + ' header i').css('top', iconPosition);

    $(selectedSection).animate({
      left: 0
    }, 500, function(){

      // Remove and add active and inactive classes
      $('.active').addClass('inactive');
      $('.active').removeAttr('style');
      $('.active').removeClass('active');
      $(selectedSection).removeClass('inactive');
      $(selectedSection).addClass('active');

      // Move Selected Icon to center
      $(selectedSection + ' header i').animate({
        top: '50%'
      },500);

    });

  }

$('.navButton').on('click');

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

// ///////////
// Slick Slider
// ///////////

$(document).ready(function(){
  $('#homeSlider').slick({
    arrows: false,
    infinite: false,
    dots: true
  })
});

// /////////////
// Advanced Search
// /////////////
$("#showAdvancedSearch").click(function(){
  $("#advancedSearch").toggle();
})

// ////////
// Angular
// ////////
var cylinderApp = angular.module('cylinderApp', []);

// Services for HTTP Requests
cylinderApp.service('cylinderData', ['$http', function($http){
  this.getCylinderData = function(){
    return $http.get('php/get.php');
  }
}]);



// Controller for App
cylinderApp.controller('cylinderAppCtrl', ['$scope','cylinderData', function($scope, cylinderData){

  // Variables
  $scope.returnedCylinderData;

  // Get data
  cylinderData.getCylinderData().then(function(data){
    $scope.returnedCylinderData = data.data;

  });


}]);//End Of controller
