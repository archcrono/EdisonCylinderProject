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
  else if(screenWidth >= 650 && screenWidth <= 999){
    currentScreenType = 'tablet';
  }
  else if(screenWidth >= 1000){
    currentScreenType = 'desktop';
  }

  if(screenType !== currentScreenType){
    // console.log("Change!");
    screenType = currentScreenType;
    var activeBackgroundColor = $('.activeCylinder').css('backgroundColor');//Get active cylinder backgroundColor

    $('#largeActiveCylinder').css('display','none');//Hide active cylinder
    $('#largeActiveCylinder').insertAfter('#libraryContainer');//Must be moved first to keep index in order
    $('.activeCylinder').find('.cylinderPlayOptions').css('display','none');//Remove Play Button


    $('.activeCylinder').removeAttr('style');
    $('.activeCylinder').css('background-color', activeBackgroundColor);
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
    screenSize = false;

    // Home Page Slider Height and Width
    $('#homeSlider').height(screenHeight - 270);
    $('#homeSlider div').height(screenHeight - 270);
    $('.backColor').width(screenWidth);

    // Cylinder Metadata IS THIS NECCESSARY?
    var cylinderWidth = $('.cylinderSquare').width();//Grab Cylinder Width
    $('.metaInfo').width(cylinderWidth);
    $('.activeCylinder .metaInfo').width($('.activeCylinder').width());
    $('.bannerContainer').width($('.active main').width());
    $('.active .cylinderOfTheDay').width(screenWidth);//Reset Cylinder of the Day Width
    $('#searchBar').width(screenWidth);//Reset searchBar width

    $('header ul li i').removeAttr('style');//Restore header icon back to header area


  }else{
    $('section').height(screenHeight);
    $('section main').height(screenHeight);
    $('section').width(screenWidth - 50);
    $('section main').width(screenWidth - 100);
    screenSize = true;

    // Cylinder Metadata
    var cylinderWidth = $('.cylinderSquare').width();//Grab Cylinder Width
    $('.metaInfo').width(cylinderWidth);
    $('.activeCylinder .metaInfo').width($('.activeCylinder').width());

    // Cylinder of the Day / Search resize
    $('.bannerContainer').width($('.active main').width());
    $('.active .cylinderOfTheDay').width(($('.active .cylinderOfTheDay').parent().width() - $('.active .tabletBanner').width()) - 5);
    $('#searchBar').width(($('#searchBar').parent().width() - $('.active .tabletBanner').width()) - 5);

    // Home Content Fit
    $('#largeHomeSlider').height($('#largeHomeSlider').parent().parent().height() - 155);

    // Large Active Cylinder
    $('#largeActiveCylinder').width(screenWidth - 116);

    // Home page color width
    $('.backColor').width($('#largeHomeSlider .slide').width());

    // Section Header (Information/Contact Page)
    $('.sectionHeader').width(screenWidth - 100);

    // Remove Search Bar Lock
    $('#searchBar').removeClass("lockBar");
  }
};
fitScreen();

$(window).resize(function(){
  screenHeight = $(window).height();
  screenWidth = $(window).width();
  compareScreenType();
  fitScreen();
});


// ///////////////
// Get selected Nav section
// ///////////////
$('.navButton').on('click', function(){

  $('.navButton').css('color','white');
  $(this).css('color','green');

  // Create blank variable for selected section and get icon position
  var selectedSection;

  // Determine which button is selected and assign the matching section
  switch ($(this).attr('id')) {
    case 'homeButton':
        selectedSection = '#homeSection';

        $('#homeSlider').slick({
          arrows: false,
          infinite: false,
          dots: true
        });

      break;
    case 'libraryButton':
        selectedSection = '#librarySection';

        $(selectedSection + ' .banner h3').html('Cylinder Library');
        $(selectedSection + ' .tabletBanner h1').html('Cylinder Library');

        $('#homeSlider').slick('unslick');
      break;
    case 'informationButton':
        selectedSection = '#informationSection';

        $(selectedSection + ' .banner h3').html('Cylinder Information');
        $(selectedSection + ' .tabletBanner h1').html('Cylinder Information');

        $('#homeSlider').slick('unslick');
      break;
    case 'contactButton':
        selectedSection = '#contactSection';

        $(selectedSection + ' .banner h3').html('Cylinder Contact');
        $(selectedSection + ' .tabletBanner h1').html('Cylinder Contact');

        $('#homeSlider').slick('unslick');
      break;
  }


  // $(selectedSection + ' .navButton').css('color','red');

  // Determin if screen is in Mobile or Tablet/Desktop View
  if(!screenSize){
    // Mobile view

    var iconPosition = $(this).position().left;

    // Add styles to container so it remains stationary
    // This is not handled by CSS because the broswer cannot handle two levels of hidden overflow
    // It also locks the container in place so that scrolling down can not occur while screen changes.
    $('#container').height(screenHeight - 50);
    $('#container').css('position','absolute');
    $('#container').css('top','0');
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
    fitScreen();
    $(selectedSection).css('top','0');
    $(selectedSection).css('left', screenWidth);


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
      fitScreen();
      // Move Selected Icon to center
      $(selectedSection + ' header i').animate({
        top: '50%'
      },500);

    });

  }

// $('.navButton').on('click');

});//End of get selected sections



// Home Nav Button Is for the slider button navigation
var homeNavButtons = function(){

  $('.navButton').css('color','white');
  $('#libraryButton').css('color','green');

  $('#container').css('top','0');
  $('#librarySection .banner h3').html('Cylinder Library');
  $('#librarySection .tabletBanner h1').html('Cylinder Library');
  $('#homeSlider').slick('unslick');

  // Determin if screen is in Mobile or Tablet/Desktop View
  if(!screenSize){
    // Mobile view

    // var iconPosition = $(this).position().left;

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
    $('#librarySection').css('display','block');

    // Assign meta info width
    var cylinderWidth = $('.cylinderSquare').width();//Grab Cylinder Width
    $('.metaInfo').width(cylinderWidth);
    $('.activeCylinder .metaInfo').width($('.activeCylinder').width());

    $('#librarySection').animate({
      top: 0
    },500,function(){

      // Remove and add active and inactive classes
      $('.active').addClass('inactive');
      $('.active').removeAttr('style');
      $('.active').removeClass('active');
      $('#librarySection').removeClass('inactive');
      $('#librarySection').addClass('active');

      // Remove container restrictions
      $('#container').height(screenHeight);
      $('#container').removeAttr('style');

      // Reset Section Height
      $('section').height(screenHeight - 50);
      $('section main').height(screenHeight - 100);

      // Move selected section icon to the center
      $('#librarySection' + ' header i').animate({
        left: '50%'
      },500);

    });
  }
  else if (screenSize){
    // Tablet/Desktop view

    // var iconPosition = $(this).position().top;

    // Assign Height and width to the selected section
    $('#librarySection').css('display','block');
    $('#librarySection').height(screenHeight);
    $('#librarySection').width(screenWidth - 50);
    fitScreen();
    $('#librarySection').css('top','0');
    $('#librarySection').css('left', screenWidth);


    // Cylinder Metadata
    var cylinderWidth = $('.cylinderSquare').width();//Grab Cylinder Width
    $('.metaInfo').width(cylinderWidth);
    $('.activeCylinder .metaInfo').width($('.activeCylinder').width());



    $('#librarySection').animate({
      left: 0
    }, 500, function(){

      // Remove and add active and inactive classes
      $('.active').addClass('inactive');
      $('.active').removeAttr('style');
      $('.active').removeClass('active');
      $('#librarySection').removeClass('inactive');
      $('#librarySection').addClass('active');

      // Move Selected Icon to center
      $('#librarySection' + ' header i').animate({
        top: '50%'
      },500);

    });

  }

};//End of get selected sections





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
  else if(screenWidth >= 650 && screenWidth <= 999){
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
    $('#largeActiveCylinder').width(screenWidth - 116);
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

//
// Phone
//
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

//
// Tablet
//
var randomTabletBannerNumber = function(){
  return Math.floor(Math.random() * 4) + 1;
}

for(var i = 0; i < $('.tabletBanner').length; i++){
  $('.tabletBanner').eq(i).append(
    "<img class='largeBannerRotate' src='img/tabletBanners/tabletBanner" +
    randomTabletBannerNumber() +
    ".jpg' alt='Banner Image'>"
  )
}

// ///////////////////////
// Select Cylinder BG Image
// ///////////////////////
var randomCylinderImage = function(){
  var cylinderImagePath = 'img/libraryCover/cylinder';
  return cylinderImagePath + (Math.round(Math.random() * 27) + 1) + '.jpg';
}

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
// Searchbar
// //////////////////////

if(screenType == 'phone'){
  $('.activeFooter > #searchButton').click(function(){
    console.log('clicked');
    var height = $('#searchFunction').height();
    console.log(height);
    if(height == 0){
      $('#searchFunction').animate({
        height: "100px"
      },300);
    }else if(height > 0){
      $('#searchFunction').animate({
        height: 0
      }, 300);
    }
  });
}else{
  $('.activeFooter > #searchButton').click(function(){
    console.log('clicked');
    var width = $('#searchFunction').width();
    console.log(width);
    if(width == 0){
      $('#searchFunction').animate({
        width: "60%"
      },300);
    }else{
      $('#searchFunction').animate({
        width: 0
      },300);
    }
  });
}



// //////////////////////
// Filter / Search Feature
// //////////////////////
cylinderApp.filter('searchForCylinder', function(){


  return function(arr, searchCylinder){
    fitScreen();
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
    $('#largeComments').html(this.item.comments);

  }

  // $scope.cylinderSquare.forEach(function(){
  //   console.log("hello");
  // })

}]);//End Of controller
