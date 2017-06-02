
<main>



  <div id="contactContainer">
    <div id="contactHeader">
      <h2>Contact Us</h2>
      <h3>Have a question? Let us know!</h3>
    </div>
    <form action="FormToEmail.php">
      <fieldset>
        <h3>Name</h3>
        <input class="fifty" type="text" name="name" placeholder="Full Name" pattern="[a-zA-Z -._]{4,99}" required title="Name Invalid">
        <h3>Email</h3>
        <input class="fifty" type="email" name="email" placeholder="example@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required title="Email Invalid" autocomplete="on">
        <h3>Comments</h3>
        <textarea rows="6" cols="20" name="comment"></textarea>
      </fieldset>
      <button class="submit_button" type="submit" value="Submit">Submit</button>
    </form>
  </div>





</main>
