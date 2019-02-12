<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 10/02/2019
 * Time: 2:33 PM
 */
?>
<h1>Aliens Abducted Me - Report an Abduction</h1>
<p>Share your story of alien abduction:</p>
<form method="post" action="../index.php?c=aliens&a=report">
  <label for="firstname">First name:</label>
  <input type="text" id="firstname" name="firstname" required /><br />
  <label for="lastname">Last name:</label>
  <input type="text" id="lastname" name="lastname" required /><br />
  <label for="email">What is your email address?</label>
  <input type="text" id="email" name="email" required /><br />
  <label for="whenithappened">When did it happen?</label>
  <input type="text" id="whenithappened" name="whenithappened" required /><br />
  <label for="howlong">How long were you gone?</label>
  <input type="text" id="howlong" name="howlong" required /><br />
  <label for="howmany">How many did you see?</label>
  <input type="text" id="howmany" name="howmany" required /><br />
  <label for="aliendescription">Describe them:</label>
  <input type="text" id="aliendescription" name="aliendescription" size="32" required /><br />
  <label for="whattheydid">What did they do to you?</label>
  <input type="text" id="whattheydid" name="whattheydid" size="32" required /><br />
  <label for="fangspotted">Have you seen my dog Fang?</label>
  Yes <input id="fangspotted" name="fangspotted" type="radio" value="yes" />
  No <input id="fangspotted" name="fangspotted" type="radio" value="no" /><br />
  <img src="../images/fang.jpg" width="100" height="175"
       alt="My abducted dog Fang." /><br />
  <label for="other">Anything else you want to add?</label>
  <textarea id="other" name="other"></textarea><br />
  <a class="btn btn-danger" href="http://vsheadfirstphpmysql/">Back to home page</a>
  <input class="btn btn-success" type="submit" value="Report Abduction" name="submit" />
</form>
