<header>
  <ul>
    <li>
      <i class="fa fa-music" aria-hidden="true"></i>
    </li>
  </ul>
</header>
<main>

    <!-- Place your HTML here -->

    <!-- Search bar HTML is needed -->
  <div class="top">
    <!-- <div class="banner">
      <img src="img/banner.png">
    </div> -->
    <?php include 'banner.php'; ?>

    <div id="searchBar" class="search">
    <!-- <i class="fa fa-search" aria-hidden="true"></i> -->
      <span>
        <input type="text" name="" placeholder="Search...">
        <i class="fa fa-search" aria-hidden="true"></i>
      </span>

    </div> <!-- search -->
  </div><!-- top -->

    <!-- <div class="overPlay">
      <img src="img/temp.jpg" width="300px">
      <div class="shadeBackBig">
        <h2>Town Topics of Pumpkin Center</h2>
        <h3>Cal Stewart</h3>
      </div>
      <audio controls="controls" preload="none">
        <source src="http://dgm4410.tropht.com/cylinderAudioFiles/c101.ogg" type="audio/ogg">
      </audio>
    </div> -->

  <div class="libGrid">
    <div class="cylinderSquare" ng-model="cylinderSquare" ng-repeat="item in returnedCylinderData">
    <div class="square">
      <img ng-src="{{ item.imageURL }}" width="100%">
      <div class="overlay"></div>
    </div>
    <div class="shadeBack">
      <h2>{{ item.title }}</h2>
      <h3>{{ item.artist }}</h3>
 <!-- <audio controls="controls" preload="none">
        <source src="{{item.url}}" type="audio/ogg">
      </audio> -->

    </div>
    </div> <!-- ng-repeat -->
  </div> <!-- libgrid -->

</main>
