<div class="odabir">
  <div class="cardd ">
    <img class="card-imgtop rounded-circle" src="/slike/company.png" alt="Card image">
    <div class="card-body">
      <h4 class="cardtitle" style="font-family: 'Courier New', monospace;" id="nazivkompanije"><?php echo $kompanija['naziv']; ?> </h4>
      <p class="cardtext" style="font-family: 'Courier New', monospace;">Kompanija</p>
      <form action="<?= site_url('Kompanija/profil') ?>" ><button class="btn btn-dark" style="margin-bottom: 10px;">Profil</button><br></form>
    </div>
  </div>

  <form action="<?= site_url('Kompanija/proveraizbor') ?>" method="post">
    <div id="odabirfondacija" style="font-family: 'Courier New', monospace;">
      <h3 style="margin-left: 20px;">Izaberite fondaciju</h3>
      <hr>
      <span class="greskaprijava"><?php if (!empty($greskabiranje)) echo $greskabiranje  ?></span>


      <table cellpadding="15px">

        <?php
        $counter = 0;
        foreach ($fondacije as $fondacija) {

          if ($counter % 3 == 0) echo "<tr>";
          $counter++;
          echo '<td>' . '<input type="radio" name="radio" id="" value="' . $fondacija['naziv'] . '">' . '</td>';
          echo '<td class="firsttd">' . '<img class="firsticon" src = "' . $fondacija['logo'] . '" width = "150px" height = "150px"/>' . '</td>';

          if ($counter % 3 == 0) echo "</tr>";
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
<div style="text-align:center">
    <img src="/slike/ruke.png" alt="" style="height:200px;width:50%; margin-top:50px; ">
</div>