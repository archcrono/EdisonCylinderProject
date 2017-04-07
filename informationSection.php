<header>
  <ul>
    <li>
      <i class="fa fa-info-circle" aria-hidden="true"></i>
    </li>
  </ul>
</header>
<main>
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


  <!-- Place your HTML here -->
  <div id="infoContainer">


  <h1>Cylinder Project</h1>
  <p class="top__content">This website is an ongoing collective project of Utah Valley University Digital Media Students. It took a lot of different skillsets to create this website over a period of several years.</p>
<!--   <div class="vis">
    <img src="http://lorempixel.com/1200/200" alt="">
  </div> -->
  <div class="about">
  <div class="row">
    <div class="col">
      <div class="header">
        <h2 class="header__title">Transcribing</h2>
        <p class="header__num">01</p>
      </div>
      <div class="content">
        <p>The cylinders needed to be transcribed. Over the past 7 years, with the input of Professor Mike Wisland and mechanical engineer Gary Hannah, the method of transcription has evolved over the years to the point that we now have a unique way of transcribing cylinder not found anywhere else. Read more information on our transcribing process activities here.</p>
        <div id="hidden_one">
          <div class="hidden_img">
            <img src="/img/img1.JPG">  
            <span>description</span>
          </div>
            <p>
            First, to transcribe the cylinders electrically, we remove the original Edison playback assembly (needle and diaphragm) and insert some form of playback device using a modern phonograph needle.  Using a Stanton 500 cartridge, we can use a wide variety of needle sizes to optimize the playback of the cylinders.  The first device we had seen on the internet was a brass device that fit perfectly into the Edison mounting hole, but with a phono needle mounted directly beneath. The device, pictured here, was made by an unknown inventor sometime in the early 2000’s. The item was no longer available, so we borrowed the same device from the Library of Congress and had the device copied, and mounted it into an Edison Amberola 30 player, allowing electric playback, as pictured here.
            </p>
          <div class="hidden_img-right">
            <img src="/img/img1.JPG">  
            <span>description</span>
          </div>
            <p>
              We eventually decided that the contact angle was not optimized, so we decided to modify the playback device to correct the contact angle.  That device is pictured on the right, here.
            </p>
          <div class="hidden_img">
            <img src="/img/img1.JPG">  
            <span>description</span>
          </div>
            <p>
              After studying the devices we had created, Gary Hannah, a mecahnical engineer from Kansas City, decided to approach a playback device from a completely new angle.  Truly thinking outside of the circle, Gary engineered a playback device that resembles a tonearm that fits into the original Edison hole.  The pictures presented here show how this fits into an Amberola.  This allows the tonearm to float considerably more, to allow playback of out-of-round cylinders.  It is a very effective device to use to try to correct skips using the first method.
            </p>
          <div class="hidden_img">
            <img src="/img/img1.JPG">  
            <span>description</span>
          </div>
            <p>
              Gary was determined to create an even better transcribing device.  If you’ve ever used an original Edison Amberola to play back cylinders, you know how robust that device is in playing not only out-of-round cylinders, but also its ability to play through skips.  So we went back to the original Edison design to creat our 4th modification of cylinder playback.  Gary carefully made measurement of the original Amerola 30 device, including the original needle and rocker arm, tied to the diaphragm with a string.  We simply replaced the diapraghm with an inverted Stanton 500 cartride, by with no needle since that’s no longer necessary.  It’s tied to a new needle that we ground out of a 8 mil saphire rod. Gary then 3-D printed the whole device.  Fully assembled.  This is how that device looks now.
            </p>
            <div style="clear:both;"></div>
            <div class="video">
              <button id="video_btn">Watch Video</button>
            </div>
            <div id="modal">
              <div class="modal">
                <div class="modal_content">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/ZG1vrfoe8ns" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
            </div>
        </div>
        <div class="right">
          <button id="content_1">Read More</button>
        </div>
        <script>
        // show and hide Readmore contents
          $('#content_1').click(function(){
            $('#hidden_one').slideToggle();
            var x = $('#content_1').text();
            if(x == 'Read More'){
              $('#content_1').text('Close');
            }else{
              $('#content_1').text('Read More');
            }
          });

        // modal
          $('#video_btn').click(function(){
            var targetW = $('.modal_content iframe').width();
            var targetH = $('.modal_content iframe').height();
            $('.modal').css('display', 'block');
            $('.modal_content').css({
              'width': targetW,
              'height': targetH
            });
          });
          $(window).click(function(e){
            var modal = $('.modal')[0];
            if(e.target == modal){
              $('.modal').css('display', 'none');
            }
          });
        </script>
      </div>
    </div>
    <div class="col col__img">
      <img src="img/cylinder1.jpg" alt="">
    </div>
  </div>
  <div class="row">
    <div class="col col__img">
      <img src="img/cylinder2.jpg" alt="">
    </div>
    <div class="col">
      <div class="header">
        <h2 class="header__title">Restoration</h2>
        <p class="header__num">02</p>
      </div>
      <div class="content">
        <div>
          <p>The transcribed audio files then need to be restored. The Audio Restoration students first declick the cylinders, then denoise them before posting them to the website. We use a variety of softwares to do this, and that is an ever-evolving process. More information on who and how we restored the cylinders can be found here.</p>
          <div id="hidden_two">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="right">
            <button id="content_2">Read More</button>
          </div>
          <script>
          $('#content_2').click(function(){
            $('#hidden_two').slideToggle();
            var x = $('#content_2').text();
            if(x == 'Read More'){
              $('#content_2').text('Close');
            }else{
              $('#content_2').text('Read More');
            }
          });
        </script>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="header">
        <h2 class="header__title">Information</h2>
        <p class="header__num">03</p>
      </div>
      <div class="content">
        <p>Various metadata about the cylinders is researched and collected, including a photo of the actual cylinder, Record Label, Label number, Title and Artist. If other information about the recording can be found (take number, mold number, etc), we include that in the metadata, which is displayed whenever you click on a cylinder recording.</p>
      </div>
    </div>
    <div class="col col__img">
      <img src="img/cylinder3.jpg" alt="">
    </div>
  </div>
  <div class="row">
    <div class="col col__img">
      <img src="img/cylinder4.jpg" alt="">
    </div>
    <div class="col">
      <div class="header">
        <h2 class="header__title">Website</h2>
        <p class="header__num">04</p>
      </div>
      <div class="content">
        <div>
          <p>The creation of the website itself is the work of Mengxi Li, Jared Cooley, and Yuki Arai. The project manager who put everything together was Abe Raigne. The Design, Look, and Function was created by Yuki Arai, Jared Cooley, and Blake Stevens. Once the website code is created, then it must interface with the database of the cylinder recordings and their metadata. It was decided to separate the website code from the ever-growing database. That is technically called the website’s back end, which was designed and implemented by Blake Stevens.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="header">
        <h2 class="header__title">Database</h2>
        <p class="header__num">05</p>
      </div>
      <div class="content">
        <p>The database interface was created by Blake Stevens in MySQL. By separating the database from the actual website code, this allowed Blake to create a user interface that allows us internet dummies to add new cylinders and metadata to the database without having to know webcode. This makes updating the contents of the website very simple. The website then references the database and displays the requested content. This also allows you to search on any topic in the “metadatabase” and see the results. We sure appreciate Blake’s work….</p>
      </div>
    </div>
    <div class="col col__img">
      <img src="img/cylinder2.jpg" alt="">
    </div>
  </div>
  </div>
  <h1>Project Members</h1>
  <div class="members">
    <div class="member">
      <img class="img--circle" src="http://lorempixel.com/150/150" alt="">
      <p>Name of Member</p>
    </div>
    <div class="member">
      <img class="img--circle" src="http://lorempixel.com/150/150" alt="">
      <p>Name of Member</p>
    </div>
    <div class="member">
      <img class="img--circle" src="http://lorempixel.com/150/150" alt="">
      <p>Name of Member</p>
    </div>
    <div class="member">
      <img class="img--circle" src="http://lorempixel.com/150/150" alt="">
      <p>Name of Member</p>
    </div>
    <div class="member">
      <img class="img--circle" src="http://lorempixel.com/150/150" alt="">
      <p>Name of Member</p>
    </div>
    <div class="member">
      <img class="img--circle" src="http://lorempixel.com/150/150" alt="">
      <p>Name of Member</p>
    </div>
  </div>

  </div><!-- End of Info Container -->
</main>
