<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="icon" href="./src/favicon.ico" type="image/png">
  <title>Hackers Poulette</title>
</head>
<body>
<!-- HEADER > logo + page title -->
<header>
  <div class="row">
    <div class="col s10 m6 offset-s1 offset-m3 center-align">
      <img class="responsive-img" src="./src/img/hackers-poulette-logo.png" alt="Hackers Poulette logo">
    </div>
    <div class="col s10 m6 offset-s1 offset-m3 grey darken-3 white-text center-align">
      <h1>Contact form</h1>
    </div>
  </div>
</header>
  <section>
  <!-- FORMULAR SECTION -->
  <div class="row">
    <form class="col s10 m6 offset-s1 offset-m3" action="#">
      <div class="row">
        <div class="input-field col s12 m6">
          <input id="first_name" type="text" class="validate">
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s12 m6">
          <input id="last_name" type="text" class="validate">
          <label for="last_name">Last Name</label>
        </div>
      </div>
      <!-- GENDER SELECTION > inline radio buttons -->
      <div class="row">
        <div class="col s12">
          <label for="gender">Gender:</label>
          <div class="col s12 grey lighten-4">
          <p>
            <label>
              <input name="gender" type="radio" checked />
              <span>female</span>
            </label>
          </p>
          <p>
            <label>
              <input name="gender" type="radio" />
              <span>male</span>
            </label>
          </p>
        </div>
        </div>
      </div>
      <!-- END OF GENDER SELECTION -->
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">email</i>
          <input id="email" type="email" class="validate">
          <label for="email">Email</label>
          <span class="helper-text" data-error="Invalid format, please check your email address" data-success="Valid email format">name@domain.ext</span>
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">location_on</i>
              <input type="text" id="autocomplete-input" class="autocomplete validate">
              <label for="autocomplete-input">Country</label>
            </div>
          </div>
        </div>
      </div>
      <div class="input-field col s12">
        <i class="material-icons prefix">insert_comment</i>
        <!-- FIX FIREFOX option 'selected' PROBLEM > autocomplete="off" -->
        <select name="subject" autocomplete="off">
          <option value="" disabled>Choose your option</option>
          <option value="1">Contact customer service</option>
          <option value="2">Question about a product</option>
          <option value="3" selected>others</option>
        </select>
        <label>Subject</label>
      </div>
    </form>
  </div>
</section>
<!--JavaScript at end of body for optimized loading-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="./js/main.js"></script>
</body>
</html>
