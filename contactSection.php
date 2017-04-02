<header>
  <ul>
    <li>
      <i class="fa fa-envelope" aria-hidden="true"></i>
    </li>
  </ul>
</header>
<main>

  <div class="bannerContainer">
    <!-- Banner -->
    <?php include 'banner.php'; ?>
    <!-- Cylinder of the Day -->
    <div class="cylinderOfTheDay">
      <img src="img/cover4.png" alt="Album Cover">
      <i class="fa fa-play-circle-o" aria-hidden="true"></i>
      <h2>Song Title</h2>
    </div>
  </div>



  <div id="contactContainer">
    <div id="contactHeader">
      <h2>Contact Us</h2>
      <h3>Have a question? Let us know!</h3>
    </div>
    <!-- <form action="FormToEmail.php"> -->
    <form>
      <fieldset>
        <h3>Name</h3>
        <input type="text" name="fullName" required>
        <h3>Email</h3>
        <input type="email" name="email" required>
        <h3>Comments</h3>
        <textarea rows="6" cols="20"></textarea>
      </fieldset>
      <button class="submit_button" type="submit" name="submit" value="Submit">Submit</button>
    </form>
  </div>


<!-- <div class="container">
  		<div class="row header">
    		<h1 style="color: black;">CONTACT US &nbsp;</h1>
    	<h3>Fill out the form below to learn more!</h3>
  </div>

  		<div class="row body">
          <form action="#">
      <ul>

        <li>
          <p class="left">
            <label for="first_name">first name</label>
            <input type="text" name="first_name" placeholder="John" />
          </p>
          <p class="pull-right">
            <label for="last_name">last name</label>
            <input type="text" name="last_name" placeholder="Smith" />
          </p>
        </li>

        <li>
          <p>
            <label for="email">email <span class="req">*</span></label>
            <input type="email" name="email" placeholder="john.smith@gmail.com" />
          </p>
        </li>
        <li><div class="divider"></div></li>
        <li>
          <label for="comments">comments</label>
          <textarea cols="46" rows="3" name="comments"></textarea>
        </li>

        <li>
          <input class="btn btn-submit" type="submit" value="Submit" />
          <small>or press <strong>enter</strong></small>
        </li>

      </ul>
    </form>
  </div>
</div> -->


</main>
