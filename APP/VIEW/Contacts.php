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
                  $Q = mysqli_query($DBCON, "SELECT * FROM contactlist WHERE Closed != '1' AND Existence = '1' ORDER BY ContactListID DESC");
                  $Counter = 1;
                  while ($Row = mysqli_fetch_assoc($Q)) {
                    $ContactListID = $Row["ContactListID"];
                    $Name = $Row["Name"];
                    $Number = $Row["PhoneNumber"];
                    $PrimaryQuery = $Row["PrimaryQuery"];
                    echo "<tr>";
                    echo "<td>$Counter</td>";
                    echo "<td>
                            <p>$Name</p>
                            <p class='btn btn-info'>$PrimaryQuery</p>
                          </td>";
                    echo "<td>
                            <a href='tel:$Number' class='btn btn-danger btn-block'><i class='zmdi zmdi-phone'></i></a>
                            <a href='$AddReport&N=$ContactListID&R=C' class='btn btn-success btn-block'><i class='zmdi zmdi-border-color'></i></a>
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