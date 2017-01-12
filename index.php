

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="./lib/bootstrap/css/bootstrap.min.css">
<script src="./lib/bootstrap/js/bootstrap.min.js"></script>
<title>Title of the document</title>
</head>

<body>
<div class="container">
<?php
   $output = array();
   $command = 'cat /etc/passwd | grep "/home" |cut -d: -f1';
   //$command = 'cat /etc/passwd | grep "/home"';
   echo 'running the command: <b>'.$command."</b><br />";
   $line = exec($command, $output);

   $line = implode("<br />\n", $output);
   //$allLine = explode($line,"\n");
   //echo $allLine[0];
   echo $line ;
?>
</div>
</body>

</html>

