<div class="proizvodi">

<div class="kategorije col-2 ">
<form action="">
  <h3 style="padding-top:20px; margin-bottom:25px;">Kategorije</h3>
  <table style="text-align:left;" class=" table">
  <?php 
  foreach($kategorije as $kategorija){
    echo '<tr><td>'.'<input type="radio" name="radio" id="" value="'.$kategorija['naziv'].'">'.$kategorija['naziv'].'</td></tr>';  }
  
  ?>

</table>
  <br><br>
  <?php

  echo "<button class='btn btn-dark' style='margin-bottom:20px;'>".anchor("$controller/kategorija/{$kategorija['naziv']}",'Pretraga')."</button>";

  ?>
</form>

</div>

</div>
