<div class="proizvodi">
  <h1 style="margin-bottom:20px; margin:auto; font-family: 'Courier New', monospace;"><?php if (isset($odabrana)) {
                                                                                        echo $odabrana;
                                                                                      } else {
                                                                                        echo 'Kupite i donirajte';
                                                                                        $odabrana = 'undefined';
                                                                                      } ?></h1>
  <hr>

  <span style="color:red; margin-left:100px;"><?php if (isset($unavailable)) echo $unavailable; ?></span>
  <div class="kategorije " style="float:left;">

    <h3 style="padding-top:20px; margin-bottom:25px;  font-family: 'Courier New', monospace;"><b>Kategorije</b></h3>
    <div class="dropdown">

      <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" value="masa" style="margin-bottom:20px;">
        Izaberi kategoriju
      </button>

      <div class="dropdown-menu">
        <?php

        foreach ($kategorije as $kategorija) {
          echo "<a class='dropdown-item style='margin-left:3px' href=''>" . anchor("$controller/kategorija/{$kategorija['naziv']}", '' . $kategorija['naziv']) . "</a>";
        }


        ?>
      </div>
    </div>

  </div>

  <div style="text-align:center;  width:60%; float:left; margin-left:70px;">
    <table align="center" cellpadding="20px">
      <?php
      if ($licitacije == null)
        echo "<td align='left'>Nažalost nemamo proizvode iz ove kategorije. </td>";
      $counter = 0;
      foreach ($licitacije as $licitacija) {

        if ($counter % 4 == 0) echo "<tr>";
        $counter++;

        echo '<td align="left" >' . '<img class="proizvod" src = "data:image/png;base64,' . base64_encode($licitacija['slika']) . '" width = "150px" height = "190px" "/><br>' .  anchor("$controller/unavailable/{$odabrana}", '' . $licitacija['naziv_stvari']) . '</td>';

        if ($counter % 4 == 0) echo "<tr>";
      }

      ?>
    </table>
  </div>

</div>