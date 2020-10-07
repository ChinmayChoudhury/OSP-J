<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Muli:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/kkb7kdd.css">
    <title>Covid-19 Dashboard</title>
</head>

<body>

    <?php include_once 'headerv2.php'; ?>

    <?php
        $tdata = json_decode(file_get_contents('https://api.covid19india.org/data.json'),true);
        $data = $tdata['statewise'];
        //0 index has total values, other indexes have state/UT data
    ?>
<div class="container">
    <h1 class="text-center">Statewise data</h1>
    <span><i>Last updated on: <?= $data[0]['lastupdatedtime'] ?></i></span>
        &nbsp;&nbsp;
    <a href="statewise.php"><i class="fa fa-refresh" aria-hidden="true"></i></a><br>
    <!-- <p class="text-center">API data will be shown here.</p> -->

    <!-- Fetching and displaying data from the API -->
    <!-- <div class="row mt-5"> -->
    <div class="col-12 mt-md-3 ">
        <table class="table thead-light">
            <tr>
                <th>State</th>
                <th>Confirmed</th>
                <th>Deceased</th>
                <th>Recovered</th>
                <!-- <th>Tested</th> -->
            </tr>
        <?php
            // $data = json_decode(file_get_contents('https://api.covid19india.org/v4/data.json'),true);
            foreach ($data as $key=>$state) {
                if ($state['state'] == "Total" || $state['state'] == "State Unassigned" || $state['state'] == "Lakshadweep") {
                    continue;
                }
                echo "<tr>"; //create a row for each state data
                echo "<td>" . $state['state'] . "</td>"; //state
                echo "<td>" . $state['confirmed'] . "</td>"; //confirmed cases in state
                echo "<td>" . $state['deaths'] . "</td>"; //deaths in state
                echo "<td>" . $state['recovered'] . "</td>"; //total recovered in state
                // echo "<td>" . $state[] . "</td>"; //total people tested in the state
                echo "</tr>";  //close the row for the state
                
            }
        ?>
        </table>
    </div>
</div>
    <?php
        include_once 'footerv2.php';
    ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>