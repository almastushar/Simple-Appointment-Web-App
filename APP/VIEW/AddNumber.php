      <?php 
        include(APP_ROOT.'/APP/VIEW/LoggedIn.php');
        include(APP_ROOT.'/APP/VIEW/Head.php');
        include(APP_ROOT.'/APP/VIEW/BeforeBody.php');
      ?>
      <!-- BODY CONTENT STARTS -->
      <section class="content content--full">
        <div class="content__inner">
          <header class="content__title">
            <h1>ADD NEW NUMBER</h1>
          </header>
        </div>
        <div class="card">
          <div class="card-body">
            <?php
              if (isset($_GET["ERR"])) {
                echo "<p style='color: red'>Number Already Exists</p>";
              }
            ?>
            <form action ="" method="POST">
              <div class="form-group form-group--float">
                <input type="text" class="form-control" name="Number">
                <label>Number</label>
                <i class="form-group__bar"></i>
              </div>
              <div class="form-group form-group--float">
                <input type="text" class="form-control" name="Name">
                <label>Name</label>
                <i class="form-group__bar"></i>
              </div>
              <div class="form-group">
              <div class="select">
                <select class="form-control form-control-sm" name="PrimaryQuery">
                  <option>Select Query</option>
                  <option value="E-commerce">E-commerce</option>
                  <option value="Newspaper">Newspaper</option>
                  <option value="Corporate">Corporate</option>
                  <option value="Education">Education</option>
                  <option value="Custom">Custom</option>
                </select>
                <i class="form-group__bar"></i>
              </div>
            </div>
              <button type="submit" class="btn btn-success btn-block btn-lg" name="AddNumberSubmit">Add New</button>
            </form>
          </div>
            
        </div>  
      </section>
      <!-- BODY CONTENT ENDS -->
    </main>
    <?php 
        include(APP_ROOT.'/APP/VIEW/AfterBody.php');
    ?>

    <?php
      if (isset($_POST["AddNumberSubmit"])) {
        $Number = $_POST["Number"];
        $Name = $_POST["Name"];
        $PrimaryQuery = $_POST["PrimaryQuery"];
        $UserID = $_COOKIE["UserID"];
        $BDDT = BDDT();
        # CHECK EXISTENCE
        $Q = mysqli_query($DBCON, "SELECT * FROM contactlist WHERE PhoneNumber = '$Number' AND Existence = '1'");
        $NumRows = mysqli_num_rows($Q);
        if ($NumRows == 1) {
         header("Location: $AddNumber&ERR=1");
        }
        else{
          $IQ = mysqli_query($DBCON, "INSERT INTO contactlist (Name, PhoneNumber, PrimaryQuery, Existence, UserID, BDDT) VALUES ('$Name', '$Number', '$PrimaryQuery', '1', '$UserID', '$BDDT')");
          header("Location: $Contacts");
        }
      }
    ?>
