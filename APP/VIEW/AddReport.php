      <?php 
        include(APP_ROOT.'/APP/VIEW/LoggedIn.php');
        include(APP_ROOT.'/APP/VIEW/Head.php');
        include(APP_ROOT.'/APP/VIEW/BeforeBody.php');
      ?>
      <?php 
        if (!isset($_GET["N"])) {
          header("Location: Contacts.php");
        }
        else{
          $N = $_GET["N"];
          $R = $_GET["R"];
          $Type = 'PN';
          $PhoneNumber = Info($DBCON, $N, $Type);
          $Type = 'N';
          $Name = Info($DBCON, $N, $Type);
          $BDDT = BDDT();
        }
      ?>
      <!-- BODY CONTENT STARTS -->
      <section class="content content--full">
        <div class="content__inner">
          <header class="content__title">
            <h1 style='font-family: montserrat;'>RECORD CALL REPORT</h1>
          </header>
        </div>
        <div class="card">
          <div class="card-header">
            <p>Name: <?php echo "$Name"; ?></p>
            <p>Phone Number: <?php echo "$PhoneNumber"; ?></p>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <input type="hidden" name="ContactListID" value="<?php echo $N; ?>">
              <input type="hidden" name="CallBDDT" value="<?php echo $BDDT; ?>">
              <input type="hidden" name="R" value="<?php echo $R; ?>">
              <div class="form-group">
                <div class="select">
                  <select class="form-control form-control-sm" name="CallLogType">
                    <option>Call Result</option>
                    <option value="Picked">Picked</option>
                    <option value="Missed Call">MissedCall</option>
                    <option value="Call Dropped">Call Dropped</option>
                    <option value="Busy">Busy</option>
                    <option value="Busy After Phone Has Rung">Busy After Phone Has Rung</option>
                    <option value="Waiting">Waiting</option>
                  </select>
                  <i class="form-group__bar"></i>
                </div>
              </div>
              <div class="form-group">
                <div class="select">
                  <select class="form-control form-control-sm" name="NextStep">
                    <option>Select Next Step</option>
                    <option value="Follow Up">Follow Up</option>
                    <option value="Office Visit">Office Visit</option>
                    <option value="Closed">Closed</option>
                  </select>
                  <i class="form-group__bar"></i>
                </div>
              </div>
              <div class="form-group form-group--float">
                <input type="date" class="form-control" name="NextBDDT">
                <i class="form-group__bar"></i>
              </div>
              <div class="form-group form-group--float">
                <input type="text" class="form-control" name="Note">
                <label>Note</label>
                <i class="form-group__bar"></i>
              </div>
              <button type="submit" class="btn btn-success btn-block btn-lg" name="AddCallRecord">ADD CALL RECORD</button>
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
      if (isset($_POST["AddCallRecord"])) {
        $ContactListID = $_POST["ContactListID"];
        $CallBDDT = $_POST["CallBDDT"];
        $R = $_POST["R"];
        $CallLogType = $_POST["CallLogType"];
        $NextStep = $_POST["NextStep"];
        $NextBDDT = $_POST["NextBDDT"];
        $Note = $_POST["Note"];
        $UserID = $_COOKIE["UserID"];

        $IQ = mysqli_query($DBCON, "

              INSERT INTO callloglist
              (ContactListID, CallLogType, NextStep, Note, NextBDDT, CallBDDT, UserID)
              VALUES 
              ('$ContactListID', '$CallLogType', '$NextStep', '$Note', '$NextBDDT', '$CallBDDT', '$UserID')

              ");
        $CallLogListID = mysqli_insert_id($DBCON);
        $UQX = mysqli_query($DBCON, "UPDATE callloglist SET NextStepStatus = '1' WHERE ContactListID = '$ContactListID' AND CallLogListID != '$CallLogListID'");

        if ($NextStep == "Closed") {
          $UQ = mysqli_query($DBCON, "UPDATE contactlist SET Closed = '1', Existence = '0' WHERE ContactListID = '$ContactListID'");
        }

        if ($R == "C") {
          header("Location: $Contacts");
        }
        else{
          header("Location: $ToCall");
        }
      }

    ?>
