<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cylinder Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Reset -->
      <link href="styles/reset.css" rel="stylesheet" type="text/css" />
    <!-- Phone -->
      <link href="styles/phone.css" rel="stylesheet" type="text/css" />
    <!-- Tablet -->
      <link href="styles/tablet.css" rel="stylesheet" type="text/css" />
    <!-- Desktop -->
      <link href="styles/desktop.css" rel="stylesheet" type="text/css" />

    <!-- Angular -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.min.js" type="text/javascript"></script>
    <!-- Font Awesome -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Nunito+Sans|Roboto|Rubik|Arsenal" rel="stylesheet" />
    <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- LAZY LOADER -->
      <script src="scripts/jquery.lazyload.js" type="text/javascript"></script>
      <script type="text/javascript" charset="utf-8">
        $(function() {
          $("img.lazy").lazyload({threshold: 400, effect: "fadeIn" });
          // Threashold so the images load before they reach the fold
          // Fadein to have them fade in when loaded
        });
      </script>
    <!-- JPlayer -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jplayer/2.9.2/jplayer/jquery.jplayer.min.js"></script>
  </head>
  <body ng-app="cylinderApp">

    <div id="container" ng-controller="cylinderAppCtrl">
      <!-- All Meta Data -->
      <div id="allMetadata">

        <i id="closeAllMetadata" class="fa fa-times-circle" aria-hidden="true"></i>

        <img id="allMetaImg" alt="Cylinder Top Image">
        <h1>Title: <span id="allMetaTitle">Title</span></h1>
        <h2>Artist: <span id="allMetaArtist">Artist</span></h2>
        <h2>Take: <span id="allMetaTake">Take</span></h2>
        <h2>Mold: <span id="allMetaMold">Mold</span></h2>
        <h2>Comments: <span id="allMetaComments">Comments</span></h2>
      </div>

      <!-- Banner/COD/Player  -->
      <div id="bannerContainer">
        <?php include 'banner.php' ?>

      </div>

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
