

<main>

    <!-- Place your HTML here -->

    <!-- Search bar HTML is needed -->





  <div id="libraryContainer">
    <div class="cylinderSquare" style="background-color: {{ item.backColor }}" ng-click="expandCylinder()" ng-model="cylinderSquare" ng-repeat="item in returnedCylinderData | searchForCylinder:searchCylinder">

      <!-- Used to grab URL. Do not display! -->
      <!-- <h5 class="cylinderURL" style="display: none;">{{ item.url }}</h5> -->
      <h5 class="cylinderImageURL" style="display: none;">{{ item.cylinderTopURL }}</h5>





      <div class="metaInfo">
        <h2>{{ item.cylinderTitle }}</h2>
        <i class="fa fa-sort-desc" style="display: none;" aria-hidden="true"></i>
        <div class="subMetaInfo">
          <h4><strong>Artist:</strong> {{ item.cylinderArtist }}</h4>
          <h4><strong>Take:</strong> {{ item.cylinderTake }}</h4>
          <h4><strong>Mold:</strong> {{ item.cylinderMold }}</h4>
          <h4><strong>Comments:</strong> {{ item.cylinderComments }}</h4>
        </div>
      </div>

      <div class="playButtons">
        <i class="fa fa-music loadCylinderButton" style="cursor: pointer;"><span>Listen</span></i>

        <div id="jp_container_1" class="playControls">
          <i class="fa fa-play-circle-o jp-play playButton" style="cursor: pointer;" aria-hidden="true"></i>
          <i style="display: none;" class="fa fa-pause-circle-o jp-play pauseButton" style="cursor: pointer;" aria-hidden="true"></i>
        </div>
      </div>


      <img class="cylinderTopImage" style="display: none; opacity: 0;" alt="Cylinder Cover Image">
      <img class="cylinderBackImage lazy" src="img/grey.gif" ng-src="{{ item.imageURL }}" alt="Blank Grey Image">



    </div><!-- End of Cylinder Square -->


  </div><!-- End of Library Container -->

  <div id="largeActiveCylinder" class="activeMetaInfo">
    <div class="line">
      <img id="largeCylinderImg"  alt="Cylinder Cover Image" style="width: 200px; height: 200px; opacity: .8;">


      <span>
        <h6 id="largeCylinderName"></h6><br>
        <h4><strong>Artist: </strong></h4><h5 id="largeArtistName"></h5><br>
        <h4><strong>Take: </strong></h4><h5 id="largeTakeNumber"></h5><br>
        <h4><strong>Mold: </strong></h4><h5 id="largeMoldNumber"></h5><br>
        <h4><strong>Comments: </strong></h4><h5 id="largeComments"></h5><br>
      </span>

      <div class="largePlayButtons">
        <i class="fa fa-music loadCylinderButton" style="cursor: pointer;"><span>Load Cylinder</span></i>

        <div id="jp_container_1" class="playControls" >
          <i class="fa fa-play-circle-o jp-play playButton" style="cursor: pointer;" aria-hidden="true"></i>
          <i style="display: none; cursor: pointer;" class="fa fa-pause-circle-o jp-play pauseButton" aria-hidden="true"></i>
          <h2>This cylinder is now ready in the player!</h2>
        </div>
      </div>

      <i id="metaInfoLargeActive" class="fa fa-question metaInfoButton" style="cursor: pointer;" aria-hidden="true"></i>
    </div><!-- line -->


  </div>


</main>
