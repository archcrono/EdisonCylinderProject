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

    <?php include 'banner.php'; ?>

    <div id="searchBar" class="search">

      <input type="text" ng-model="searchCylinder" placeholder="Search...">
      <i class="fa fa-search" aria-hidden="true"></i>

    </div>

  </div><!-- top -->




  <div id="libraryContainer">
    <div class="cylinderSquare" style="background-color: {{ item.backColor }}" ng-click="expandCylinder()" ng-model="cylinderSquare" ng-repeat="item in returnedCylinderData | searchForCylinder:searchCylinder">

      <!-- Used to grab URL. Do not display! -->
      <h5 class="cylinderURL" style="display: none;">{{ item.url }}</h5>

      <div class="musicPlayer"></div>
      <div id="jp_container_1" class="cylinderPlayOptions" aria-label="media player">
        <i class="fa fa-play-circle-o jp-play playButton" style="cursor: pointer;" aria-hidden="true"></i>
        <i style="display: none;" class="fa fa-pause-circle-o jp-play pauseButton" style="cursor: pointer;" aria-hidden="true"></i>
      </div>


      <div class="metaInfo">
        <h2>{{ item.title }}</h2>
        <i class="fa fa-sort-desc" style="display: none;" aria-hidden="true"></i>
        <div class="subMetaInfo">
          <h4><b>Artist:</b> {{ item.artist }}</h4>
          <h4><b>Take:</b> {{ item.take }}</h4>
          <h4><b>Mold:</b> {{ item.mold }}</h4>
          <h4><b>Comments:</b> {{ item.comments }}</h4>
        </div>

      </div>

      <img ng-src="{{ item.imageURL }}" alt="">
    </div>

  </div>

  <div id="largeActiveCylinder" class="activeMetaInfo">
    <div class="line">
      <img src="http://localhost/edisoncylinderproject/img/libraryCover/cylinder13.jpg" alt="Cylinder Image" style="width: 200px; height: 200px; background-color: orange;">

      <div id="jp_container_1" class="largeCylinderPlayOptions" aria-label="media player">
        <i class="fa fa-play-circle-o jp-play playButton" style="cursor: pointer;" aria-hidden="true"></i>
        <i style="display: none;" class="fa fa-pause-circle-o jp-play pauseButton" style="cursor: pointer;" aria-hidden="true"></i><br>
      </div>
      <span>
        <h4><b>Cylinder: </b></h4><h5 id="largeCylinderName"></h5>
        <h4><b>Artist: </b></h4><h5 id="largeArtistName"></h5>
        <h4><b>Take: </b></h4><h5 id="largeTakeNumber"></h5>
        <h4><b>Mold: </b></h4><h5 id="largeMoldNumber"></h5>
        <h4><b>Comments: </b></h4><h5 id="largeComments"></h5>
      </span>
    </div><!-- line -->
  </div>
  <!-- Large Active Cylinder Info -->

</main>
