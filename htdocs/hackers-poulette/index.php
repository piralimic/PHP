<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="./src/css/main.css">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="icon" href="./src/favicon.ico" type="image/png">
  <title>Hackers Poulette</title>
</head>
<body>
  <!-- MODAL Honeypot > inform user about anti-spam -->
  <div id="honeypot" class="modal">
    <div class="modal-content center-align">
      <h4>Validation Check</h4>
      <p>Sorry something went wrong during the validation process.<br><br>Could you please check all the fields and submit the form again.</p>
      <div class="modal-close col s2 offset-s4">
        <i class="medium material-icons">check_box</i>
      </div>
    </div>
  </div>
  <!-- BODY > Header > logo + page title -->
  <header>
    <div class="row">
      <div class="col s10 m6 offset-s1 offset-m3 center-align">
        <img class="responsive-img" src="./src/img/hackers-poulette-logo.png" alt="Hackers Poulette text with a teal colour triumphal crown and five little stars at the bottom">
      </div>
      <div class="col s10 m6 offset-s1 offset-m3 grey darken-4 white-text center-align">
        <h1>Contact form</h1>
      </div>
    </div>
  </header>
  <!-- END OF Header -->
  <!-- SECTION > Contact form -->
  <section>
    <div class="row">
      <div class="col s10 m6 offset-s1 offset-m3">
        <p>
          Hi ! Please complete all the fields of the form below in order to contact us or ask some questions about our products and services.
        </p>
      </div>
      <div class="col s10 m6 offset-s1 offset-m3" id="validation">
      </div>
      <form name="contact" action="form.php" method="POST" class="col s10 m6 offset-s1 offset-m3">
        <div class="row">
          <div class="input-field col s12 m6">
            <input id="first_name" name="firstName" type="text" class="validate" required>
            <label for="firstName">First Name</label>
            <span class="helper-text" data-error="First Name is required" data-success="OK"></span>
          </div>
          <div class="input-field col s12 m6">
            <input id="last_name" name="lastName" type="text" class="validate" required>
            <label for="lastName">Last Name</label>
            <span class="helper-text" data-error="Last Name is required" data-success="OK"></span>
          </div>
        </div>
        <!-- FORM PART > Gender selection > radio buttons -->
        <div class="row">
          <div class="col s12">
            <label for="gender">Gender:</label>
            <div class="col s12 grey lighten-4">
              <p>
                <label>
                  <input name="gender" type="radio" value="1" checked />
                  <span>female</span>
                  <img class="right" src="./src/img/gender_female.png" height="30px" alt="gender unicode female symbol">
                </label>
              </p>
              <p>
                <label>
                  <input name="gender" type="radio" value="2"/>
                  <span>male</span>
                  <img class="right" src="./src/img/gender_male.png" height="30px" alt="gender unicode male symbol">
                </label>
              </p>
            </div>
          </div>
        </div>
        <!-- END OF > Gender selection -->
        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">email</i>
            <input id="email" name="email" type="email" class="validate" required>
            <label for="email">Email</label>
            <span class="helper-text" data-error="Invalid format, please check your email address" data-success="OK">We will answer to this email address</span>
          </div>
        </div>
        <div class="row">
          <div class="col s12">
            <div class="row">
              <div class="input-field col s12">
                <i class="material-icons prefix">location_on</i>
                <input name="country" type="text" id="autocomplete-input" class="autocomplete validate" required>
                <label for="autocomplete-input">Country</label>
                <span class="helper-text" data-error="Country is required" data-success="OK"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">insert_comment</i>
          <!-- FIX > Firefox 'selected' not working > autocomplete="off" solve it -->
          <select name="subject" autocomplete="off">
            <option value="" disabled>Choose a subject</option>
            <option value="1">Contact customer service</option>
            <option value="2">Question about a product</option>
            <option value="0" selected>others</option>
          </select>
          <label>Subject</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">edit</i>
          <textarea id="message" name="message" class="materialize-textarea validate" required></textarea>
          <label for="message">Edit your message</label>
          <span class="helper-text" data-error="Your message is required" data-success="OK"></span>
        </div>
        <!-- FORM PART > Honeypot -->
        <div class="input-field col s12 hide">
          <i class="material-icons prefix">web</i>
          <input id="website" name="website" type="text" value="hahaha">
          <label for="website">Website</label>
        </div>
        <!-- END OF Honeypot -->
        <div class="col s10 m6 offset-s1 offset-m3 center-align">
          <button type="submit" name="submit" class="btn waves-effect waves-light">Submit
            <i class="material-icons right">send</i>
          </button>
        </div>
        <div class="col s10 m6 offset-s1 offset-m3">
          <table>
            <tr>
              <td><i class="material-icons">info</i></td>
              <td>Please note that all the fields of this form are required.</td>
            </tr>
          </table>
        </div>
      </form>
    </section>
    <!-- END OF Contact form -->
    <!-- BODY > Footer > copyight + privacy policy -->
    <footer class="page-footer grey darken-4">
      <div class="footer-copyright">
        <div class="container">
          © 2017 Hackers Poulette
          <a class="grey-text text-lighten-4 right" href="#">Privacy policy</a>
        </div>
      </div>
    </footer>
    <!--JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="./src/js/validate.min.js"></script>
    <script type="text/javascript" src="./src/js/main.js"></script>
    <script type="text/javascript" src="./src/js/validation_rules.js"></script>
  </body>
  </html>
