<?php
  require_once('php/King.php');
  require_once('php/Queen.php');
  $King = new King(4,3);
  $Queen = new Queen(1,1);
  $King->move(2,2);
  $Queen->move(7,3);
?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body>
  <!-- Add your site or application content here -->
  <p>Hello world! This is HTML5 Boilerplate.</p>
  <p><?php $King->show_position(); ?></p>
  <p><?php $Queen->show_position(); ?></p>
  <?php
    $vocabulary = ['red','blue','green','yellow','lime','magenta','black','gold','gray','tomato'];
    for($i=0;$i<5;$i++) {
      echo '<p>';
      for ($j = 0; $j < 5; $j++) {
        $color = $word = array_rand($vocabulary, 1);
        while ($color == $word) {
          $color = array_rand($vocabulary, 1);
        }
        echo '<span style="color:' . $vocabulary[$color] . '">' . $vocabulary[$word] . '</span> ';
      }
      echo '</p>';
    }
  ?>
  <div style="border:1px solid black">
    <form id="bankomat">
      <input type="text" name="nominal"/>
      <input type="text" name="gold"/>
      <input type="submit" value="отправка"/>
    </form>
  </div>
  <?php
  include_once('parser/simple_html_dom.php');
  // Create DOM from URL or file
  $html = file_get_html('https://terrikon.com/football/italy/championship/');
  $komand = 'Аталанта';
  foreach($html->find('div#champs-table') as $article) {
    $item['title'] = $article->find('tr td.team a', 0)->plaintext;
    $item['win'] = $article->find('tr td.win', 0)->plaintext;
    $item['drow'] = $article->find('tr td.draw', 0)->plaintext;
    $item['lose'] = $article->find('tr td.lose', 0)->plaintext;
    $articles[] = $item;
    echo '<p><span style="font-size:18px">'.$item['title'].'</span> - W:'. $item['win'].' D:'.$item['drow'].' L:'.$item['lose'].'</p>';
  }
  ?>
  <script src="js/vendor/modernizr-3.11.2.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script>
    $('#bankomat').submit(function(event){
      event.preventDefault()
      $data = $('#bankomat').serialize();
      $.ajax({
        url: "php/banlomat.php",
        type: 'POST',
        dataType: 'json',
        data: $data,
        success: function (data) {
          console.log(data);
          $table = '';
          $.each(data, function(key,value){
            // $table +=1;
            $table += '<p><span style="color:gray">'+key+'</span> '+value+'</p>';
          });
          $('#bankomat').html($table);
        }
      });
    });
  </script>
  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>
