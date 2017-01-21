// Get Screen Sizes
var screenHeight = $(window).height();

$('section').height(screenHeight - 50);
$('section main').height(screenHeight - 100);
$('.footerButtonContainers i').css('top', screenHeight - 35 + 'px');

// Get selected section
$('.navButton').click(function(){

  console.log('Clicked!');

  // Create blank variable for selected section and get icon position
  var selectedSection;
  var iconPosition = $(this).position().left;

  // Determine which button is selected and assign the matching section
  switch ($(this).attr('id')) {
    case 'homeButton':
        selectedSection = '#homeSection';
      break;
    case 'libraryButton':
        selectedSection = '#librarySection';
      break;
    case 'informationButton':
        selectedSection = '#informationSection';
      break;
    case 'contactButton':
        selectedSection = '#contactSection';
      break;
  }

  // Add styles to container so it remains stationary
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

    // Reset Section Height;
    $('section').height(screenHeight - 50);
    $('section main').height(screenHeight - 100);

    // Move selected section icon to the center
    $(selectedSection + ' header i').animate({
      left: '50%'
    },500);



  })

  // Move Navigation Button
  $(this).animate({
    top: 10
  },500,function(){
    $(this).css('display','none');

  });



})//End of get selected sections
