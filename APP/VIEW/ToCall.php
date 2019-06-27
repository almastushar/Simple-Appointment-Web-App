      <?php 
        include(APP_ROOT.'/APP/VIEW/LoggedIn.php');
        include(APP_ROOT.'/APP/VIEW/Head.php');
        include(APP_ROOT.'/APP/VIEW/BeforeBody.php');
      ?>
      
      <!-- BODY CONTENT STARTS -->
      <section class="content content--full">
        <div class="content__inner">
          <header class="content__title">
            <h1>CONTACTS</h1>
          </header>
        </div>
        <div class="card">
          <div class="card-body">
            <table class="table table-striped mb-0">
              <thead>
                <th>#</th>
                <th>Name</th>
                <th>**</th>
              </thead>
              <tbody>
                <?php
                  $Q = mysqli_query($DBCON, "SELECT * FROM callloglist WHERE NextStep != 'Closed' AND NextStepStatus = '0' ORDER BY NextBDDT ASC");
                  $Counter = 1;
                  while ($Row = mysqli_fetch_assoc($Q)) {
                    $ContactListID = $Row["ContactListID"];
                    $NextBDDT = $Row["NextBDDT"];
                    $NextStep = $Row["NextStep"];
                    $Type = "N";
                    $Name = Info($DBCON, $ContactListID, $Type);
                    $Type = "PN";
                    $PhoneNumber = Info($DBCON, $ContactListID, $Type);
                    echo "<tr>";
                    echo "<td>$Counter</td>";
                    echo "<td>
                            <p>$Name</p>
                            <p class='btn btn-info'>$NextStep</p>
                            <p class='btn btn-warning'>$NextBDDT</p>
                          </td>";
                    echo "<td>
                            <a href='tel:$PhoneNumber' class='btn btn-danger btn-block'><i class='zmdi zmdi-phone'></i></a>
                            <a href='$AddReport&N=$ContactListID&R=TC' class='btn btn-success btn-block'><i class='zmdi zmdi-border-color'></i></a>
                          </td>";
                    echo "</tr>";
                    $Counter++;
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </section>
      <!-- BODY CONTENT ENDS -->
    </main>
    <?php 
        include(APP_ROOT.'/APP/VIEW/AfterBody.php');
    ?>