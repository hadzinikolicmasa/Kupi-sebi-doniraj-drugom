
<div class="proizvodi">
<h1 style="margin-bottom:20px;"><?php if(isset($odabrana)){ echo $odabrana;} else {echo 'Kupite i donirajte';} ?></h1>

<div class="kategorije " style="float:left;" >

  <h3 style="padding-top:20px; margin-bottom:25px;">Kategorije</h3>
  <div class="dropdown">

 <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" value="masa"style="margin-bottom:20px;">
Izaberi kategoriju
 </button>

 <div class="dropdown-menu" >
 <?php
 
 foreach($kategorije as $kategorija){
  echo "<a class='dropdown-item class ='link'href=''>".anchor("$controller/kategorija/{$kategorija['naziv']}",''.$kategorija['naziv'])."</a>";
 }
 
 
 ?>
 </div>
</div>

</div>

<div style="text-align:center;  width:60%; float:left;" class="" >
<table align="center"  cellpadding="20px">
<?php 
$counter=0;
foreach($licitacije as $licitacija){

  if($counter%4==0)echo "<tr>";
$counter++;

echo '<td align="left">'.'<img src = "data:image/png;base64,' . base64_encode($licitacija['slika']) . '" width = "150px" height = "190px" "/><br>'.$licitacija['naziv_stvari'].'</td>';

if($counter%4==0)echo "<tr>";

}

?>
</table>
</div>

</div>


