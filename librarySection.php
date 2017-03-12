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

  </div><!-- top -->


  <div id="searchBar" class="search">

    <input type="text" ng-model="searchCylinder" placeholder="Search...">
    <i class="fa fa-search" aria-hidden="true"></i>

  </div>

  <div id="libraryContainer">
    <div class="cylinderSquare" ng-click="expandCylinder()" ng-model="cylinderSquare" ng-repeat="item in returnedCylinderData | searchForCylinder:searchCylinder">

      <div class="metaInfo">
        <h2>{{ item.title }}</h2>
        <i class="fa fa-sort-desc" style="display: none;" aria-hidden="true"></i>
        <div class="subMetaInfo">
          <h3>{{ item.artist }}</h3>
          <h4>Take: {{ item.take }}</h4>
          <h4>Mold: {{ item.mold }}</h4>
        </div>

      </div>




      <img ng-src="{{ item.imageURL }}" alt="">
    </div>
  </div>

</main>
