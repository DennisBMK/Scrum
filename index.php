<html>
    <head>
        <link rel="icon" href="img/Scrum.png" type="image">

        <!--Style for the page-->
        <link rel="stylesheet" href="css/style.css">

        <!--title for the tab-->
        <title>Scrumboard</title>
    </head>
    <body>
        <header>
            <h1>
                The scrumboard
            </h1>
            <button id="add-todo">
                Add To do
            </button>
            <br>
            <br>
            <!-- The Modal from: w3schools.com/howto/howto_css_modals.asp -->
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <form action="php/insert.php">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title"><br><br>
                        <label for="text">Text:</label>
                        <input type="text" id="text" name="text"><br><br>
                        <input type="submit" value="Submit">
                    </form>
                </div>

            </div>
            <script src="js/add.js"></script>
            
        </header>
        <table>
            <tr>
                <th class="headings">
                    <h2>
                        To do
                    </h2>
                </th>
                <th class="headings">
                    <h2>
                        In progress
                    </h2>
                </th>
                <th class="headings">
                    <h2>
                        Reviewing
                    </h2>
                </th>
                <th class="headings">
                    <h2>
                        Done
                    </h2>
                </th>
            </tr>
            <?php
                require('php/db_connection.php');

                //fetch data for todo section
                $todosql = "SELECT * FROM tasks WHERE TPlacement = 0";

                $todoresult = mysqli_query($conn,$todosql);

                if ($todoresult->num_rows > 0) {
                    $i = 0;
                    // output data of each row
                    while($todorows = $todoresult->fetch_assoc()) {
                        $todorow[$i] = $todorows["TId"];
                        $i++;
                        $todorow[$i] = $todorows["TTitle"];
                        $i++;
                        $todorow[$i] = $todorows["TText"];
                        $i++;
                        $todorow[$i] = $todorows["TPlacement"];
                        $i++;
                    }
                }
                
                //fetch data for in progress section
                $inprosql = "SELECT * FROM tasks WHERE TPlacement = 1";

                $inproresult = $conn->query($inprosql);

                if ($inproresult->num_rows > 0) {
                    $j = 0;
                    // output data of each row
                    while($inprorows = $inproresult->fetch_assoc()) {
                        $inprorow[$j] = $inprorows["TId"];
                        $j++;
                        $inprorow[$j] = $inprorows["TTitle"];
                        $j++;
                        $inprorow[$j] = $inprorows["TText"];
                        $j++;
                        $inprorow[$j] = $inprorows["TPlacement"];
                        $j++;
                    }
                }

                //fetch data for review section
                $revsql = "SELECT * FROM tasks WHERE TPlacement = 2";

                $revresult = $conn->query($revsql);

                if ($revresult->num_rows > 0) {
                    $k = 0;
                    // output data of each row
                    while($revrows = $revresult->fetch_assoc()) {
                        $revrow[$k] = $revrows["TId"];
                        $k++;
                        $revrow[$k] = $revrows["TTitle"];
                        $k++;
                        $revrow[$k] = $revrows["TText"];
                        $k++;
                        $revrow[$k] = $revrows["TPlacement"];
                        $k++;
                    }
                }

                //fetch data for done section
                $donesql = "SELECT * FROM tasks WHERE TPlacement = 3";

                $doneresult = $conn->query($donesql);

                if ($doneresult->num_rows > 0) {
                    $l = 0;
                    // output data of each row
                    while($donerows = $doneresult->fetch_assoc()) {
                        $donerow[$l] = $donerows["TId"];
                        $l++;
                        $donerow[$l] = $donerows["TTitle"];
                        $l++;
                        $donerow[$l] = $donerows["TText"];
                        $l++;
                        $donerow[$l] = $donerows["TPlacement"];
                        $l++;
                    }
                }

                //Count the amount of inserted sql
                if(isset($todorow)){
                    $todoamount = count($todorow);
                }
                else{
                    $todoamount = 0;
                }
                
                //Count the amount of inserted sql
                if(isset($inprorow)){
                    $inproamount = count($inprorow);
                }
                else{
                    $inproamount = 0;
                }
                
                //Count the amount of inserted sql
                if(isset($revrow)){
                    $revamount = count($revrow);
                }
                else{
                    $revamount = 0;
                }
                
                //Count the amount of inserted sql
                if(isset($donerow)){
                    $doneamount = count($donerow);
                }
                else{
                    $doneamount = 0;
                }
                
                //variable to increment when task is shown
                $i = 0;

                //variable to increment each time a to do i shown
                $j = 1;

                //variable to increment each time a to do i shown
                $k = 1;

                //variable to increment each time a to do i shown
                $l = 1;

                //variable to increment each time a to do i shown
                $m = 1;
                while($i != 5){
                    if($j <= $todoamount || $k <= $inproamount || $l <= $revamount || $m <= $doneamount){
                        echo "<tr>";
                        if($j <= $todoamount){
                            echo "<th>";
                            echo "<h3>".$todorow[$j]."</h3>";
                            echo "<p>".$todorow[$j+1]."</p>";
                            echo "<a class='rightButton' href='php/update.php?id=".$todorow[$j-1]."&place=1'>In progress >></a>";
                            echo "</th>";
                            $j += 4;
                            $i++;
                        }
                        else{
                            echo "<th class='none'></th>";
                            $i++;
                        }
                        if($k <= $inproamount){
                            echo "<th>";
                            echo "<h3>".$inprorow[$k]."</h3>";
                            echo "<p>".$inprorow[$k+1]."</p>";
                            echo "<a class='leftButton' href='php/update.php?id=".$inprorow[$k-1]."&place=0'><< To do</a>";
                            echo "<a class='rightButton' href='php/update.php?id=".$inprorow[$k-1]."&place=2'>Reviewing >></a>";
                            echo "</th>";
                            $k += 4;
                            $i++;
                        }
                        else{
                            echo "<th class='none'></th>";
                            $i++;
                        }
                        if($l <= $revamount){
                            echo "<th>";
                            echo "<h3>".$revrow[$l]."</h3>";
                            echo "<p>".$revrow[$l+1]."</p>";
                            echo "<a class='leftButton' href='php/update.php?id=".$revrow[$l-1]."&place=1'><< In progress</a>";
                            echo "<a class='rightButton' href='php/update.php?id=".$revrow[$l-1]."&place=3'>Done >></a>";
                            echo "</th>";
                            $l += 4;
                            $i++;
                        }
                        else{
                            echo "<th class='none'></th>";
                            $i++;
                        }
                        if($m <= $doneamount){
                            echo "<th>";
                            echo "<h3>".$donerow[$m]." <a href='php/delete.php?id=".$donerow[$m-1]."'>delete</a></h3>";
                            echo "<p>".$donerow[$m+1]."</p>";
                            echo "<a class='leftButton' href='php/update.php?id=".$donerow[$m-1]."&place=2'><< Reviewing</a>";
                            echo "</th>";
                            $m += 4;
                            $i++;
                        }
                        else{
                            echo "<th class='none'></th>";
                            $i++;
                        }
                        echo "</tr>";
                        $i = 0;
                    }
                    else{
                        $i = 5;
                    }
                    
                }

            ?>
            </tr>
        </table>
        <footer id="footer">
            <h4>
                Ver. 1.0
            </h4>
        </footer>
    </body>
</html>