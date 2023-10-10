<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    </head>

<link rel="stylesheet" href="../assets/css/homeAdmin.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
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
<div id="myfirstchart" style="height: 250px;"></div>
</main>
</section>

</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
    // Explain
new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { year: '2008', value: 2, 1: 25, 2: 14 },
    { year: '2009', value: 1, 1: 25, 2: 14 },
    { year: '2010', value: 52, 1: 25, 2: 14 },
    { year: '2011', value: 15, 1: 25, 2: 14 },
    { year: '2012', value: 20, 1: 25, 2: 14 }
  ],

  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value', '1', "2"],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value','1', "2"]
});
</script>
</html>