      <?php 
        include(APP_ROOT.'/APP/VIEW/LoggedIn.php');
        include(APP_ROOT.'/APP/VIEW/Head.php');
        include(APP_ROOT.'/APP/VIEW/BeforeBody.php');
      ?>
      
      <!-- BODY CONTENT STARTS -->
      <section class="content content--full">
        <div class="content__inner">
          <header class="content__title">
            <h1 style='font-family: montserrat;'>AFTER QUERY</h1>
          </header>
        </div>
        <div class="card">
          <div class="card-body">
            <table class="table table-striped mb-0">
              <thead>
                <th>SL</th>
                <th>Name</th>
                <th>Actions</th>
              </thead>
              <tbody>
                <?php
                  $Q = mysqli_query($DBCON, "SELECT * FROM callloglist WHERE NextStep != 'Closed' AND NextStepStatus = '0' ORDER BY NextBDDT ASC");
                  $Counter = 1;
                  while ($Row = mysqli_fetch_assoc($Q)) {
                    $ContactListID = $Row["ContactListID"];
                    $NextBDDT = $Row["NextBDDT"];
                    $NextStep = $Row["NextStep"];
                    $Query = $Row["Note"];
                    $Type = "N";
                    $Name = Info($DBCON, $ContactListID, $Type);
                    $Type = "PN";
                    $PhoneNumber = Info($DBCON, $ContactListID, $Type);
                    echo "<tr>";
                    echo "<td>$Counter</td>";
                    echo "<td>
                              <div class='email' onclick=\"this.classList.add('expand')\">
                                <div class='from'>
                                  <div class='from-contents'>
                                    <div class='name' style='font-family: montserrat;'>$Name</div>
                                  </div>
                                </div>
                                <div class='to'>
                                  <div class='to-contents'>
                                    <div class='top'>
                                      <div class='name-large'>$Name</div>
                                      <div class='x-touch' onclick=\"document.querySelector('.email.expand').classList.remove('expand');event.stopPropagation();\">
                                        <div class='x'>
                                          <div class='line1'></div>
                                          <div class='line2'></div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class='bottom'>
                                      <div style='float:left;'>
                                        <div class='link'><p class='btn btn-info' style='font-family: montserrat;'>$NextStep</p></div>
                                        <div class='link'><p class='btn btn-warning' style='font-family: montserrat;'>$NextBDDT</p></div>
                                      </div>
                                      <div style='float:right;'>
                                        <div class='link'><p class='btn btn-success' style='font-family: montserrat;'>$Query</p></div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
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