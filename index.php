<!DOCTYPE html></pre>
<pre><html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Online Voting System</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div id="wrapper">
        <div class="voting_panel">
            <h1>Which Language is easy for you??</h1>

            <form action="index.php" method="post" align="center">
                <input type="submit" name="php"value="PHP" onclick="">
                <input type="submit" name="c#"value="C#">
                <input type="submit" name="java"value="JAVA">
            </form>
            <?php
            $conn = mysqli_connect("localhost","root","","online_voting_system");

            if(isset($_POST["php"])){

                $vote_php = "UPDATE voting_cat SET php = php+1";

                $run_php = mysqli_query($conn, $vote_php);

                if($run_php){
                    echo '<script language="javascript">';
                    echo 'alert("Your vote has been cast to PHP")';
                    echo '</script>';
                    echo "<h2 align='center'><a href='index.php?result'>View Result</a></h2>";
                }
            }
            if(isset($_POST["c#"])){

                $vote_c = "UPDATE voting_cat SET c = c+1";

                $run_c = mysqli_query($conn, $vote_c);

                if($run_c){
                    echo '<script language="javascript">';
                    echo 'alert("Your vote has been cast to C#")';
                    echo '</script>';
                    echo "<h2 align='center'><a href='index.php?result'>View Result</a></h2>";
                }
            }
            if(isset($_POST["java"])){

                $vote_java = "UPDATE voting_cat SET java = java+1";

                $run_java = mysqli_query($conn, $vote_php);

                if($run_java){
                    echo '<script language="javascript">';
                    echo 'alert("Your vote has been cast to JAVA")';
                    echo '</script>';
                    echo "<h2 align='center'><a href='index.php?result'>View Result</a></h2>";
                }
            }

            ?>
        </div>
        <div class="vote_result">
            <?php
            $conn = mysqli_connect("localhost","root","","online_voting_system");
            if(isset($_GET['result'])){
                $get_votes = 'SELECT * FROM voting_cat';
                $run_votes = mysqli_query($conn, $get_votes);

                $row_votes = mysqli_fetch_array($run_votes);
                $PHP = $row_votes['php'];
                $C = $row_votes['c'];
                $JAVA = $row_votes['java'];

                $total = $PHP+$C+$JAVA;

                $per_php = round($PHP*100/$total) . "%";
                $per_c = round($C*100/$total) . "%";
                $per_java = round($JAVA*100/$total) . "%";
                ?>
                <center>
                    <h2>Voting Results:</h2>
                    <p>PHP : <?php echo $per_php; ?></p>
                    <p>C# : <?php echo $per_c; ?></p>
                    <p>JAVA : <?php echo $per_java; ?></p>

                </center>
            <?php }
            ?>
        </div>
        <div class="footer">
            <p>This system is created by<a href="http://crypticbd.com">Ashikul Islam Tamal</a></p>
        </div>
    </div>
    </body>
    </html>
