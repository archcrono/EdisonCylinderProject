

<main>

    <!-- Place your HTML here -->

    <!-- Search bar HTML is needed -->





  <div id="libraryContainer">
    <div class="cylinderSquare" style="background-color: {{ item.backColor }}" ng-click="expandCylinder()" ng-model="cylinderSquare" ng-repeat="item in returnedCylinderData | searchForCylinder:searchCylinder">


      <i class="fa fa-circle cylinderPointer" aria-hidden="true"></i>
      <!-- Used to grab URL. Do not display! -->
      <!-- <h5 class="cylinderURL" style="display: none;">{{ item.url }}</h5> -->
      <h5 class="cylinderImageURL" style="display: none;">{{ item.cylinderImg }}</h5>





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

      <div class="playButtons">
        <button type="button" class="loadCylinderButton" name="button">Listen</button>

        <div id="jp_container_1" class="playControls">
          <i class="fa fa-play-circle-o jp-play playButton" style="cursor: pointer;" aria-hidden="true"></i>
          <i style="display: none;" class="fa fa-pause-circle-o jp-play pauseButton" style="cursor: pointer;" aria-hidden="true"></i>
        </div>
      </div>


      <img class="cylinderTopImage" style="display: none; opacity: 0;" alt="Cylinder Top Image">
      <img class="cylinderBackImage" ng-src="{{ item.imageURL }}" alt="">



    </div><!-- End of Cylinder Square -->


  </div><!-- End of Library Container -->

  <div id="largeActiveCylinder" class="activeMetaInfo">
    <div class="line">
      <img id="largeCylinderImg"  alt="Cylinder Image" style="width: 200px; height: 200px;">


      <span>
        <h6 id="largeCylinderName"></h6><br>
        <h4><b>Artist: </b></h4><h5 id="largeArtistName"></h5><br>
        <h4><b>Take: </b></h4><h5 id="largeTakeNumber"></h5><br>
        <h4><b>Mold: </b></h4><h5 id="largeMoldNumber"></h5><br>
        <h4><b>Comments: </b></h4><h5 id="largeComments"></h5><br>
      </span>

      <i class="fa fa-question metaInfoButton" style="cursor: pointer;" aria-hidden="true"></i>
    </div><!-- line -->


  </div>
  <!-- Large Active Cylinder Info -->

  <!-- <div id="cylinderPointer">

  </div> -->


</main>
