<!DOCTYPE html>
<html lang="en">
<?php require "masterLayout/head.php" ?>


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
  <article class="header">
    <div id="account" ></div>
    <div id="produt" ></div>

  </article>
  <div id="order" ></div>
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

        var chart = new google.visualization.PieChart(document.getElementById('account'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Total number of products'],
          ['Total number of products',     <?= $data['SumProduct'] ['sumProduct']?>],
          ['Product sold',      <?= $data['SumProduct'] ['sumNumber']?>],
          ['Payment by card',  <?= $data['SumProduct'] ['number_type_ck']?>],
          ['Cash payment',  <?= $data['SumProduct'] ['number_type_tm']?>],
          ['Expenses earned', <?= $data['SumProduct'] ['sumPrice']?>],
          
        ]);
        // [sumPrice] => 2
        //     [sumNumber] => 2
        //     [number_type_ck] => 2
        //     [number_type_tm] => 0
        //     [sumProduct] => 24
        var options = {
          title: 'Product management'
        };

        var chart = new google.visualization.PieChart(document.getElementById('produt'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

// sp: Tên, giá, ảnh, số lượng, size
// user: Tên, ảnh, gmail, phone,address
// chức năng: 1- đang chuẩn bị, 2 là chờ lấy hàng, 3 chờ giao hàng, 4 đã đến nơi, 5 hủy đơn hàng do admin. 6 hủy đơn hàng do user. 7 Trả hàng do user

// sumOrderWaitingForDelivery,
// sumOrderBeingShipped,
// sumOrderDeliveredSuccessfully,
// OrderCancellationAdmin,
// OrderCancellationUser,
// ReturnTheProduct,
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Order'],
          ['Total order quantity',     <?= $data['SumOrder'] ['sumOrder']?>],
          ['Wait for confirmation',     <?= $data['SumOrder'] ['sumOrderWaitForConfirmation']?>],
          ['Waiting for delivery',      <?= $data['SumOrder'] ['sumOrderWaitingForDelivery']?>],
          ['Being shipped',  <?= $data['SumOrder'] ['sumOrderBeingShipped']?>],
          ['Delivered Successfully',  <?= $data['SumOrder'] ['sumOrderDeliveredSuccessfully']?>],
          ['Order cancellation by Admin', <?= $data['SumOrder'] ['OrderCancellationAdmin']?>],
          ['Order cancellation by User', <?= $data['SumOrder'] ['OrderCancellationUser']?>],
          ['Return the product', <?= $data['SumOrder'] ['ReturnTheProduct']?>],
          
        ]);
        // [sumPrice] => 2
        //     [sumNumber] => 2
        //     [number_type_ck] => 2
        //     [number_type_tm] => 0
        //     [sumProduct] => 24
        var options = {
          title: 'Order management'
        };

        var chart = new google.visualization.PieChart(document.getElementById('order'));

        chart.draw(data, options);
      }
    </script>


     

</html>