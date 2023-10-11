<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    </head>

<link rel="stylesheet" href="../assets/css/homeAdmin.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
<body>
    <section class="page">  
<?php require_once "masterLayout/header.php"?>
<aside>
    <section class="individual">
        <article class="img">
            <img src="../assets/imgUpload/<?php echo $data['result']['Image'] ?>" alt="img">
        </article>
        <article class="Personal_Information"></article>
            <h2> <?php echo $data['result']['Name'] ?></h2>
            <h4>
                <?php echo $data['result']['Permission']==0 ?  "HR" : "Admin"; ?>
            </h4>
        </article>
    </section>
    <?php require_once "masterLayout/navigation.php"?>
</aside>
<main>
<div id="piechart" style="width: 100%; height: 300px;"></div>
</main>
</section>

</body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Number of accounts'],
          ['Account Admin',     <?= $data['Admin'] ['count(Id)']?>],
          ['Account User',      <?= $data['User'] ['count(Id)']?>],
          ['Account Canceled',  <?= $data['Canceled'] ['count(Id)']?>],
          ['Account Admin Canceled', <?= $data['AdminCanceled'] ['count(Id)']?>],
          ['Account User Canceled',    <?= $data['UserCanceled'] ['count(Id)']?>]
        ]);

        var options = {
          title: 'Account management'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

</html>