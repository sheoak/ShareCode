<?php
  require_once 'classes/uri.class.php';
  require_once 'include/init.php';
?>
<!doctype html>
<html>
  
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Share live code snippets with anyone, anywhere. Aand keep control of it.">

      <title>Share live code in your browser</title>
      
      <link rel="stylesheet" href="css/reset.css">
      <link rel="stylesheet" href="codemirror/lib/codemirror.css">
      <link rel="stylesheet" href="codemirror/theme/monokai.css">
      <link rel="stylesheet" href="css/main.css">
  </head>

  <body>
    
    <textarea id="code" name="code"></textarea>
      
    <script src="codemirror/lib/codemirror.js"></script>
    <script src="codemirror/mode/css/css.js"></script>
    <script src="codemirror/mode/clike/clike.js"></script>
    <script src="codemirror/mode/htmlmixed/htmlmixed.js"></script>
    <script src="codemirror/mode/javascript/javascript.js"></script>
    <script src="codemirror/mode/php/php.js"></script>
    <script src="codemirror/mode/xml/xml.js"></script>
    <script src="codemirror/addon/edit/matchbrackets.js"></script>
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/main.js"></script>

    <script>
      window.slug = '<?= $slug ?>';
    </script>

  </body>

</html>
