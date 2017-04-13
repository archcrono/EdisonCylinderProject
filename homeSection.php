
<main>


  <!-- Place your HTML here -->
  <div id="homeContainer">
    <div class="bannerContainer">
      <!-- Banner -->
      <?php include 'banner.php'; ?>
      <!-- Cylinder Of The Day -->
      <div class="cylinderOfTheDay">
        <img src="img/cover4.png" alt="Album Cover">
        <i class="fa fa-play-circle-o" aria-hidden="true"></i>
        <div class="cylinderOfTheDayMetadata">
          <h2>Song Title</h2>
          <h3>Artist Name</h3>
        </div>
      </div>
    </div>

    <!-- Main Content -->
    <!-- <div id="indicators">
      <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
      <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
    </div> -->

    <div id="homeSlider">

      <div class="libraryLink slide">
        <h2>Search Library</h2>
        <p>You can search our extensive library of many cylinders.</p>
        <p>Feel free to search by artist, title, or even year!</p>

        <button class='homeLibraryButton' onclick="homeNavButtons()">Go!</button>
        <div class="backColor">

        </div>
      </div>

      <div class="historyLink slide">
        <h2>Today In History</h2>
        <p>Find out what people were listening to over 100 years ago on their phonographs!</p>

        <button class='homeHistoryButton' onclick="homeNavButtons()">Go!</button>
        <div class="backColor">

        </div>
      </div>

      <div class="randomLink slide">
        <h2>Random</h2>
        <p>Can't think of something to look for? Try one at random!</p>

        <button class='homeRandomButton' onclick="homeNavButtons()">Go!</button>
        <div class="backColor">

        </div>
      </div>

    </div><!-- End of Home Slider -->

    <div id="largeHomeSlider">

      <div class="libraryLink slide">
        <h2>Search Library</h2>
        <p>You can search our extensive library of many cylinders.</p>
        <p>Feel free to search by artist, title, or even year!</p>

        <button class='homeLibraryButton' onclick="homeNavButtons()">Go!</button>
        <div class="backColor">

        </div>
      </div>

      <div class="historyLink slide">
        <h2>Today In History</h2>
        <p>Find out what people were listening to over 100 years ago on their phonographs!</p>

        <button class='homeHistoryButton' onclick="homeNavButtons()">Go!</button>
        <div class="backColor">

        </div>
      </div>

      <div class="randomLink slide">
        <h2>Random</h2>
        <p>Can't think of something to look for? Try one at random!</p>

        <button class='homeRandomButton' onclick="homeNavButtons()">Go!</button>
        <div class="backColor">

        </div>
      </div>

    </div><!-- End of Large Home Slider -->


  </div>


</main>
