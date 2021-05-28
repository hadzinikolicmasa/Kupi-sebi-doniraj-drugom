
<div class="proizvodi">
<h1 style="margin-bottom:100px;"><?php if(isset($odabrana)){ echo $odabrana;} else {echo 'Kupite i donirajte';} ?></h1>

<div class="kategorije col-2 ">

  <h3 style="padding-top:20px; margin-bottom:25px;">Kategorije</h3>
  <div class="dropdown">
 <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" value="masa"style="margin-bottom:20px;">
Izaberi kategoriju
 </button>
 <div class="dropdown-menu" >
 <?php
 
 foreach($kategorije as $kategorija){
  echo "<a class='dropdown-item' href=''>".anchor("$controller/kategorija/{$kategorija['naziv']}",''.$kategorija['naziv'])."</a>";
 }
 
 
 ?>
 </div>
</div>

</div>

<div style="text-align:center; " class="col-6 offset-3">
<?php 
$counter=0;
foreach($licitacije as $licitacija){

echo "<tr>";
$counter++;

echo '<td>'.'<img src = "data:image/png;base64,' . base64_encode($licitacija['slika']) . '" width = "150px" height = "190px" style="margin-right:30px;"/></td>';

echo "</tr>";

}

?>
</div>

</div>


