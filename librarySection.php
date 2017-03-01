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

    <div class="search">
    <!-- <i class="fa fa-search" aria-hidden="true"></i> -->
    <span>
      <i class="fa fa-search" style="color: white;" aria-hidden="true"></i>
      <input type="text" name="" placeholder="Title, Author, Year, Etc...">
      <i id="showAdvancedSearch" style="color: white;" class="fa fa-chevron-down" aria-hidden="true"></i>
      <div id="advancedSearch" style="display: none;">
        <select class="" name="">
          <option value="title">Title</option>
          <option value="author">Author</option>
          <option value="genre">Genre</option>
        </select>
      </div>
    </span>

      <!-- <div class="menu-item">
        <p>Search&#9661</p>
        <div class="sub-menu">
          <input type="text" placeholder="Search...">
        </div>
      </div> -->
    </div> <!-- search -->
  </div><!-- top -->

    <!-- <div class="overPlay">
      <img src="img/temp.jpg" width="300px">
    <div class="shadeBack">
      <h2>Town Topics of Pumpkin Center</h2>
      <h3>Cal Stewart</h3>
    </div>
      <audio controls="controls" preload="none">
        <source src="http://dgm4410.tropht.com/cylinderAudioFiles/c101.ogg" type="audio/ogg">
      </audio>
    </div> -->

  <div class="libGrid">
    <div ng-repeat="item in returnedCylinderData">
    <div class="square">
      <img src="img/temp.jpg" width="100%">
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
