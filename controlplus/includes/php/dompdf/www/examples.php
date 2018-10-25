<?php

require_once("../dompdf_config.inc.php");
if ( isset( $_POST["html"] ) ) {

  if ( get_magic_quotes_gpc() )
    $_POST["html"] = stripslashes($_POST["html"]);
  
  $dompdf = new DOMPDF();
  $dompdf->load_html($_POST["html"]);
  $dompdf->set_paper("letter", "portrait");
  $dompdf->render();

  $dompdf->stream("dompdf_out.pdf");

  exit(0);
}

?>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
<div>


<textarea name="html" cols="60" rows="20">
<html>
<head>
<link rel="stylesheets" type="text/css" href="teste.css" />

<style>
</style>
</head>

<body>

<table border="1" class="tb">
<tr>
<td>row 1, cell 1</td>
<td>row 1, cell 2</td>
</tr>
<tr>
<td>row 2, cell 1</td>
<td>row 2, cell 2</td>
</tr>
</table> 

</body>
</html>
</textarea>

<div style="text-align: center; margin-top: 1em;">
<input type="submit" name="submit" value="submit"/>
</div>
</div>
</form>
