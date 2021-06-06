
<?php
    /**
     * @author Masa Hadzi-Nikolic  18/0271
     * 
     */
?>
<div class="korisnikpocetna">
    <div style=" display: flex; flex-direction:column">
        <div class="card">
            <img class="card-imgtop rounded-circle" src="/slike/user.png" alt="Card image">
            <div class="card-body">
                <h4 class="cardtitle" style="font-family: 'Courier New', monospace;">
                    <?php echo $korisnik['korisnickoime']; ?>
                </h4>
                <p class="cardtext">Korisnik</p>
                <form action="<?= site_url('Korisnik/profil') ?>" method="post">
                
                    <button class="btn btn-dark" style="margin-bottom: 10px;">Profil</button><br>
                </form>
            </div>
        </div>

        <div class="kategorije_korisnik">

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
    </div>

    <div class="proizvodi_korisnik">
        <h1 style="margin-bottom:20px; margin:auto; font-family: 'Courier New', monospace;"><?php if (isset($odabrana)) {
                                                                                                echo $odabrana;
                                                                                            } else {
                                                                                                echo 'Kupi i doniraj';
                                                                                            } ?></h1>
        <hr>
        <table align="center" cellpadding="20px">
            <?php
            if ($licitacije == null)
                echo "<td align='left'>Nažalost nemamo proizvode iz ove kategorije. </td>";
            $counter = 0;
            foreach ($licitacije as $licitacija) {

                if ($counter % 4 == 0) echo "<tr>";
                $counter++;

                echo '<td align="left" >' . '<img class="proizvod" src = "' .$licitacija['slika'] . '" width = "150px" height = "190px" "/><br>' .   anchor("$controller/proizvod/{$licitacija['idLicitacija']}", '' . $licitacija['naziv_stvari'])  . '</td>';

                if ($counter % 4 == 0) echo "<tr>";
            }

            ?>
        </table>
    </div>


</div>