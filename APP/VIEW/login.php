      <?php 
        include(APP_ROOT.'/APP/VIEW/LoggedOut.php');
        include(APP_ROOT.'/APP/VIEW/Head.php');
      ?>
      <!-- BODY CONTENT STARTS -->
      <section class="content content--full">
        <div class="card">
          <div class="card-header">
            LOGIN NOW
          </div>
          <div class="card-body">
            <?php
              if (isset($_GET["ERR"])) {
                echo "<p style='color: red'>DID NOT MATCH. PLEASE TRY AGAIN!</p>";
              }
            ?>
            <form action ="<?php echo $ActionLogin; ?>" method="POST">
              <div class="form-group form-group--float">
                <input type="text" class="form-control" name="UserName">
                <label>User Name</label>
                <i class="form-group__bar"></i>
              </div>
              <div class="form-group form-group--float">
                <input type="password" class="form-control" name="Password">
                <label>Password</label>
                <i class="form-group__bar"></i>
              </div>
              <button type="submit" class="btn btn-success btn-block btn-lg" name="LoginSubmit">Login</button>
            </form>
          </div>
        </div>
      </section>
      <!-- BODY CONTENT ENDS -->
    </main>
    <?php 
        include(APP_ROOT.'/APP/VIEW/AfterBody.php');
    ?>
    