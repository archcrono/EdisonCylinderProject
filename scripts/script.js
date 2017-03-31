// Get Screen Sizes
var screenHeight = $(window).height();
var screenWidth = $(window).width();
var screenSizeChange = 650;//The pixel size when the styling changes
var screenSize = null; //False indicates mobile, True indicates tablet and larger
var screenType = null;//Determine screen type (phone/tablet/desktop)


// ///////////////
// Check If Screen Size Has Changed
// ///////////////
if(screenWidth < 650){
  screenType = 'phone';
}
else if(screenWidth >= 650 && screenWidth <= 1100){
  screenType = 'tablet';
}
else{
  screenType = 'desktop';
}

var compareScreenType = function(){
  var currentScreenType = null;

  if(screenWidth < 650){
    currentScreenType = 'phone';
  }
  else if(screenWidth >= 650 && screenWidth <= 1100){
    currentScreenType = 'tablet';
  }
  else if(screenWidth > 1100){
    currentScreenType = 'desktop';
  }

  if(screenType !== currentScreenType){
    // console.log("Change!");
    screenType = currentScreenType;
    $('#largeActiveCylinder').css('display','none');//Hide active cylinder
    $('#largeActiveCylinder').insertAfter('#libraryContainer');//Must be moved first to keep index in order
    $('.activeCylinder').find('.cylinderPlayOptions').css('display','none');//Remove Play Button
    $('.playButton').css('display','block');//Make play button the first one to appear
    $('.pauseButton').css('display','none');//Hide pause button
    $('.activeCylinder').find('.activeMetaInfo').removeClass('activeMetaInfo');//Removes Active Metadata Status
    $('.activeCylinder').find('.subMetaInfo').css('display','none');//Hides Sub Meta info if open
    $('.activeCylinder').find('.metaInfo').width($('.cylinderSquare').width());//Restores width of metadata to regular cylinder width
    $('.activeCylinder').addClass('cylinderSquare');//Restores cylinder class (so it can be clicked)
    $('.activeCylinder').removeClass('activeCylinder');//Removes active cylinder class

  }
}


// /////////////
// Fit screen type
// /////////////
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

    // Cylinder Metadata IS THIS NECCESSARY?
    var cylinderWidth = $('.cylinderSquare').width();//Grab Cylinder Width
    $('.metaInfo').width(cylinderWidth);
    $('.activeCylinder .metaInfo').width($('.activeCylinder').width());

    $('#cylinderOfTheDay').width(screenWidth);//Reset Cylinder of the Day Width
    $('#searchBar').width(screenWidth);//Reset searchBar width

    $('header ul li i').removeAttr('style');//Restore header icon back to header area


  }else{
    $('section').height(screenHeight);
    $('section main').height(screenHeight);
    $('section').width(screenWidth - 50);
    $('section main').width(screenWidth - 100);
    $('.footerButtonContainers i').removeAttr('style');
    screenSize = true;

    // Cylinder Metadata
    var cylinderWidth = $('.cylinderSquare').width();//Grab Cylinder Width
    $('.metaInfo').width(cylinderWidth);
    $('.activeCylinder .metaInfo').width($('.activeCylinder').width());

    // Cylinder of the Day / Search resize
    $('#cylinderOfTheDay').width($('#cylinderOfTheDay').parent().width() - 405);
    $('#searchBar').width($('#searchBar').parent().parent().width() - 405);

    // Home Content Fit
    $('#largeHomeSlider').height($('#largeHomeSlider').parent().parent().height() - 155);

    // Large Active Cylinder
    $('#largeActiveCylinder').width(screenWidth - 116);

    // Home page color width
    $('.backColor').width($('#largeHomeSlider .slide').width());

    // Cylinder Of The Day width
    $('.cylinderOfTheDay').width(screenWidth - 505);

  }
};
fitScreen();

$(window).resize(function(){
  screenHeight = $(window).height();
  screenWidth = $(window).width();
  compareScreenType();
  fitScreen();
});



// Get selected section
$('.navButton').on('click', function(){

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

    // Home Slider Width
    $('#homeSlider .slick-track').width('100%');
    $('#homeSlider .slick-slide').width('100%');

    // Prep/Animate selected section
    $(selectedSection).css('display','block');
    $(selectedSection + ' header i').css('left', iconPosition);

    // Assign meta info width
    var cylinderWidth = $('.cylinderSquare').width();//Grab Cylinder Width
    $('.metaInfo').width(cylinderWidth);
    $('.activeCylinder .metaInfo').width($('.activeCylinder').width());

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

    // Cylinder of the Day / Search resize
    $('#cylinderOfTheDay').width($('#cylinderOfTheDay').parent().width() - 405);
    $('#searchBar').width($('#searchBar').parent().parent().width() - 405);


    // Cylinder Metadata
    var cylinderWidth = $('.cylinderSquare').width();//Grab Cylinder Width
    $('.metaInfo').width(cylinderWidth);
    $('.activeCylinder .metaInfo').width($('.activeCylinder').width());


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

// $('.navButton').on('click');

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
  });


});

// ///////////////
// Expand Cylinder
// ///////////////
$(document).on('click','.cylinderSquare',function(){

    // Ready Player
    var cylinderURL = $(this).find('.cylinderURL').html();

    $(".musicPlayer").jPlayer("clearMedia");
    $(".musicPlayer").jPlayer("setMedia",{
      m4a: cylinderURL,
      oga: cylinderURL
    });

    $(".musicPlayer").jPlayer({
        ready: function(event) {
          $(this).jPlayer("setMedia", {
            m4a: cylinderURL,
            oga: cylinderURL
          });
        },
        supplied: "mp3, oga",
        useStateClassSkin: true
    });

  if(screenWidth < 650){
    // Mobile

    // Animate active cylinder back to normal
    $('.activeCylinder').animate({
      width: '50%' //This might need to be restore to 49.5%
    }, 500);

    // Restore active cylinder to normal
    $('.activeCylinder').find('.cylinderPlayOptions').css('display','none');//Remove Play Button
    $('.playButton').css('display','block');//Make play button the first one to appear
    $('.pauseButton').css('display','none');//Hide pause button
    $('.activeCylinder').find('.activeMetaInfo').removeClass('activeMetaInfo');//Removes Active Metadata Status
    $('.activeCylinder').find('.subMetaInfo').css('display','none');//Hides Sub Meta info if open
    $('.activeCylinder').find('.metaInfo').width($('.cylinderSquare').width());//Restores width of metadata to regular cylinder width
    $('.activeCylinder').addClass('cylinderSquare');//Restores cylinder class (so it can be clicked)
    $('.activeCylinder').removeClass('activeCylinder');//Removes active cylinder class

    // Make this active cylinder
    $(this).addClass('activeCylinder');//Add active cylinder class to this
    $(this).removeClass('cylinderSquare');//Remove cylinder class (so it cannot be clicked)
    $(this).find('.metaInfo').addClass('activeMetaInfo');//Make this metadata the active metadata
    $(this).find('.cylinderPlayOptions').css('display','block');//Show Play Button

    if(($(this).index() + 1) % 2 == 0){
      // If in an even position spot, move and animate size
       $(this).prev().before($(this));

       $(this).animate({
         width: "100%"
       }, 500);

      // Animate Meta Info
       $(this).find('.activeMetaInfo').animate({
         width: $(window).width() - 10
       }, 500);

     }else{
       $(this).animate({
         width: "100%"
       }, 500);

      // Animate Meta Info
       $(this).find('.activeMetaInfo').animate({
         width: $(window).width() - 10
       }, 500);
     }
  }//End of Mobile
  else if(screenWidth >= 650 && screenWidth <= 1100){
    //
    // Tablet
    //

    // // Remove Large Active Cylinder
    $('#largeActiveCylinder').css('display','none');//Hide active cylinder
    $('#largeActiveCylinder').insertAfter('#libraryContainer');//Must be moved first to keep index in order
    $('#largeActiveCylinder').width(screenWidth - 116);
    $('#largeActiveCylinder .largeCylinderPlayOptions .playButton').css('display','block');//Ensure that play is displayed
    $('#largeActiveCylinder .largeCylinderPlayOptions .pauseButton').css('display','none');//Hide pause button when loaded

    switch (($(this).index() + 1) % 3) {
      case 0:
        $("#largeActiveCylinder").insertAfter($(this));
        $("#largeActiveCylinder").css('display','block');
        break;
      case 1:
        $("#largeActiveCylinder").insertAfter($(".cylinderSquare").eq($(this).index() + 2));
        $("#largeActiveCylinder").css('display','block');
        break;
      case 2:
        $("#largeActiveCylinder").insertAfter($(".cylinderSquare").eq($(this).index() + 1));
        $("#largeActiveCylinder").css('display','block');
        break;
    }

  }//End of Tablet
  else{
    //
    // Desktop
    //

    // // Remove Large Active Cylinder
    $('#largeActiveCylinder').css('display','none');//Hide active cylinder
    $('#largeActiveCylinder').insertAfter('#libraryContainer');//Must be moved first to keep index in order
    $('#largeActiveCylinder').width(screenWidth - 110);
    $('#largeActiveCylinder .largeCylinderPlayOptions .playButton').css('display','block');//Ensure that play is displayed
    $('#largeActiveCylinder .largeCylinderPlayOptions .pauseButton').css('display','none');//Hide pause button when loaded

    switch (($(this).index() + 1) % 5) {
      case 0:
        $("#largeActiveCylinder").insertAfter($(this));
        $("#largeActiveCylinder").css('display','block');
        break;
      case 1:
        $("#largeActiveCylinder").insertAfter($(".cylinderSquare").eq($(this).index() + 4));
        $("#largeActiveCylinder").css('display','block');
        break;
      case 2:
        $("#largeActiveCylinder").insertAfter($(".cylinderSquare").eq($(this).index() + 3));
        $("#largeActiveCylinder").css('display','block');
        break;
      case 3:
        $("#largeActiveCylinder").insertAfter($(".cylinderSquare").eq($(this).index() + 2));
        $("#largeActiveCylinder").css('display','block');
        break;
      case 4:
        $("#largeActiveCylinder").insertAfter($(".cylinderSquare").eq($(this).index() + 1));
        $("#largeActiveCylinder").css('display','block');
        break;

    }

  }//End of Desktop


});//End Expand Cylinder
  //
  // Expand Meta Info
  //
$(document).on('click','.activeMetaInfo',function(){

  $(this).find('.subMetaInfo').height($(this).parent().height());

  $(this).find('.subMetaInfo').toggle();

});
  //
  // Toggle Play/Pause
  //
$(document).on('click','.playButton',function(){
  $('.playButton').toggle();
  $('.pauseButton').toggle();
});
$(document).on('click','.pauseButton',function(){
  $('.playButton').toggle();
  $('.pauseButton').toggle();
});



// /////////////
// Advanced Search
// /////////////
$("#showAdvancedSearch").click(function(){
  $("#advancedSearch").toggle();
});

// //////////////
// SeachBar Lock
// //////////////
var searchBar = $('#searchBar');

$('#librarySection main').scroll(function(){
  // console.log(searchBar.position().top);

  if(screenWidth <= screenSizeChange){
    // Mobile
    if($('#librarySection main').scrollTop() > 90 ){
      // console.log("Hello");
  		searchBar.addClass("lockBar");
  	}
  	else{
  		searchBar.removeClass("lockBar");
  	}
  }


});

// //////////////
// Select banner
// //////////////

var imgArray = ['banner1.png', 'banner2.png', 'banner3.png', 'banner4.png'];//Potential banner img URLs
var bannerImgPath = "img/";

// function to create random image path
var randomBannerImg = function(){
  return bannerImgPath + imgArray[Math.round(Math.random() * (imgArray.length - 1))];
}

// Assign random image to each banner
for(var i = 0; i < $('.banner').length; i++){
  $('.banner').eq(i).append(
    "<img class='bannerRotate' src='" + randomBannerImg() + "' alt='Banner Image'>"
  )
}

// ///////////////////////
// Select Cylinder BG Image
// ///////////////////////
var randomCylinderImage = function(){
  var cylinderImagePath = 'img/libraryCover/cylinder';
  return cylinderImagePath + (Math.round(Math.random() * 27) + 1) + '.jpg';
}

// ///////////////////////
// adjust img height for about page
// ///////////////////////

console.log($('#content_one').height());

// ////////
// Angular
// ////////
var cylinderApp = angular.module('cylinderApp', []);

// Services for HTTP Requests
cylinderApp.service('cylinderData', ['$http', function($http){
  this.getCylinderData = function(){
    // return $http.get('php/get.php');

    return $http.get('https://edisoncylindertestdb.firebaseio.com/cylinders.json');
  }
}]);

// //////////////////////
// Filter / Search Feature
// //////////////////////
cylinderApp.filter('searchForCylinder', function(){


  return function(arr, searchCylinder){

    if(!searchCylinder){
      return arr;
    }

    var result = [];

    searchCylinder = searchCylinder.toLowerCase();


    angular.forEach(arr, function(item){

      if(item.title.toLowerCase().indexOf(searchCylinder) !== -1 || item.artist.toLowerCase().indexOf(searchCylinder) !== -1){
        result.push(item);
      }
    });

    return result;
  }
});

// Controller for App
cylinderApp.controller('cylinderAppCtrl', ['$scope','cylinderData', function($scope, cylinderData){

  // Variables
  $scope.returnedCylinderData;



  // Select Background Color
  var bgColors = ['red', 'orange', 'yellow','green','blue','indigo','violet'];

  var randomColor = function(){
    return bgColors[Math.round(Math.random() * (bgColors.length -1))];
  }


  // Get data
  cylinderData.getCylinderData().then(function(data){
    $scope.returnedCylinderData = data.data;



    for(var i = 0; i < $scope.returnedCylinderData.length; i++){

      $scope.returnedCylinderData[i].imageURL = randomCylinderImage();
      $scope.returnedCylinderData[i].backColor = randomColor();

    }

  });



  $scope.expandCylinder = function(){

    $('#largeCylinderName').html(this.item.title);
    $('#largeArtistName').html(this.item.artist);
    $('#largeMoldNumber').html(this.item.mold);
    $('#largeTakeNumber').html(this.item.take);

  }

  // $scope.cylinderSquare.forEach(function(){
  //   console.log("hello");
  // })

}]);//End Of controller
