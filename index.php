<?php

// get configs
include 'config.php';



// value assignment
$values = array(

  // dimensions
  'width' => isset($_GET['w']) ? $_GET['w'] : $defaultValues['width'],
  'height' => isset($_GET['h']) ? $_GET['h'] : $defaultValues['height'],

  // colours
  'background' => isset($_GET['b']) ? $_GET['b'] : $defaultValues['background'],
  'colour' => isset($_GET['c']) ? $_GET['c'] : $defaultValues['colour'],

  // typography
  'fontFamily' => isset($_GET['ff']) ? $_GET['ff'] : $defaultValues['fontFamily'],
  'fontSize' => isset($_GET['fs']) ? $_GET['fs'] : $defaultValues['fontSize'],
  'fontWeight' => isset($_GET['fw']) ? $_GET['fw'] : $defaultValues['fontWeight'],

  // message
  'message' => isset($_GET['m']) ? $_GET['m'] : ''

);



// check for presets
if ($values['background'] == 'random') { include 'dist/inc/colours.php'; }
if ($values['message'] == 'ascii') { include 'dist/inc/ascii.php'; }



// convert colour inputs into proper hexcodes
if (preg_match('([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})', $values['background'])) { $values['background'] = '#'.$values['background']; }
if (preg_match('([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})', $values['colour'])) { $values['colour'] = '#'.$values['colour']; }



// generate that thingy
header('Content-Type: image/svg+xml'); ?>
<!--

  unseen;ninja
  SVG placeholder generator

-->

<svg xmlns   = "http://www.w3.org/2000/svg"
     viewBox = "<?php echo '0 0 '.$values['width'].' '.$values['height']; ?>"
     width   = "<?php echo $values['width']; ?>"
     height  = "<?php echo $values['height']; ?>">

  <?php
    switch ($values['fontFamily']) {

      case $defaultValues['fontFamily']:
        echo '<style>@import url(\'https://fonts.googleapis.com/css?family=Roboto:'.$values['fontWeight'].'\');</style>';
        break;

      case 'fa':
        echo '<style>@import url("https://use.fontawesome.com/releases/v5.5.0/css/solid.css");</style>'."\n  ";
        echo '<style>@import url("https://use.fontawesome.com/releases/v5.5.0/css/fontawesome.css");</style>'."\n  ";
        echo '<style>* { font-family: "Font Awesome 5 Free"; }</style>';
        break;

      default:
        echo "<style>@import url('https://fonts.googleapis.com/css?family=".$values['fontFamily'].":".$values['fontWeight'].");</style>";
        break;

    }
  ?>


  <g>
    <rect x                 = "0"
          y                 = "0"
          width             = "<?php echo $values['width'] ?>"
          height            = "<?php echo $values['height']; ?>"
          fill              = "<?php echo $values['background']; ?>"/>

    <text x                 = "<?php echo $values['width'] / 2; ?>"
          y                 = "<?php echo $values['height'] / 2; ?>"
          fill              = "<?php echo $values['colour']; ?>"
          font-family       = "<?php echo $values['fontFamily']; ?>"
          font-size         = "<?php echo $values['fontSize']; ?>"
          font-weight       = "<?php echo $values['fontWeight']; ?>"
          text-anchor       = "middle"
          dominant-baseline = "central">

      <?php echo $values['message'] !== '' ? $values['message'] : $values['width'].' x '.$values['height'] ?>

    </text>
  </g>

</svg>
