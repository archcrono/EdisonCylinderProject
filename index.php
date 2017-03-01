<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cylinder Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Reset -->
      <link href="styles/reset.css" rel="stylesheet" type="text/css" >
    <!-- Phone -->
      <link href="styles/phone.css" rel="stylesheet" type="text/css" >
    <!-- Tablet -->
      <link href="styles/tablet.css" rel="stylesheet" type="text/css" >
    <!-- Desktop -->
      <link href="styles/desktop.css" rel="stylesheet" type="text/css" >
    <!-- Angular -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.min.js" type="text/javascript"></script>
    <!-- Font Awesome -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Nunito+Sans|Roboto|Rubik" rel="stylesheet">
    <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- Slick Slider -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
  </head>
  <body ng-app="cylinderApp">

    <div id="container" ng-controller="cylinderAppCtrl">

      <!-- Home Section/Landing Page -->

      <section id="homeSection" class="active">
        <?php include 'homeSection.php'; ?>
      </section>

      <!-- Library Section/Cylinder Library -->

      <section id="librarySection" class="inactive">
        <?php include 'librarySection.php'; ?>
      </section>


      <!-- Information Section/About Page -->

      <section id="informationSection" class="inactive">
        <?php include 'informationSection.php'; ?>
      </section>

      <!-- Contact Section/Contact Form -->

      <section id="contactSection" class="inactive">
        <?php include 'contactSection.php'; ?>
      </section>

    </div>


    <?php include 'footer.php'; ?>

    <script type="text/javascript" src="scripts/script.js"></script>
  </body>
</html>
