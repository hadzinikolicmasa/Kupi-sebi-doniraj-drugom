
<div class="odabir">
  <div class="card " style="width: 200px;" >
    <img class="card-imgtop rounded-circle" style="width:80%;margin:auto; padding-top: 5px;" src="/slike/company.png" alt="Card image">
      <div class="card-body"> 
          <h4 class="cardtitle" id="nazivkompanije"><?php echo $kompanija['naziv'];?> </h4>
          <p class="cardtext">Kompanija</p>
          <a href="" class="btn btn-dark" style="margin-bottom: 10px;">Profil</a><br>
   </div>
 </div>
    
  
  <div id="odabirfondacija">
  <h3 style="margin-left: 20px;">Izaberite fondaciju</h3>
  <hr>
  <span class="greskaprijava" ><?php if(!empty($greskabiranje))echo $greskabiranje  ?></span> 

  <form action= "<?= site_url('Kompanija/proveraizbor')?>" method="post">
  <table cellpadding="15px">

<?php 
$counter=0;
foreach($fondacije as $fondacija){

if($counter%3==0)echo "<tr>";
$counter++;
echo '<td>'.'<input type="radio" name="radio" id="" value="'.$fondacija['naziv'].'">'.'</td>';
echo '<td>'.'<img src = "data:image/png;base64,' . base64_encode($fondacija['logo']) . '" width = "150px" height = "150px"/>'.'</td>';

if($counter%3==0)echo "</tr>";

}

?>
</table>
<br>
  <div style="width:650px; text-align: center; ">    
             <button class="btn btn-dark">Uplati</button>
  </div> 
  </form>

         
  </div>
</div>


