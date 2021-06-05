<div class='container licitacija'>
    <div class="row">

        <div class='col-8 offset-2 productinfo'>
            <div class="licitacijaslika">
                <?php

                echo '<img class="proizvod" src = "' .$licitacija['slika'] . '" width = "260px" height = "350px" "/><br>';

                ?>

            </div>
            <form method="post" action= "<?= site_url("$controller/licitiraj/{$licitacija['idLicitacija']}")?>" >

           
            <div class="licitacijatext">
            <h2 style="color:#E71D36"> <?php echo $licitacija['naziv_stvari']; ?></h2>
            <p><?php echo $licitacija['opis']; ?></p>
                <hr>

                <table >
                    <tr>
                        <td>Broj licitacije: &nbsp; </td>
                        <td><?php echo $licitacija['idLicitacija']; ?></td>
                    </tr>
                    <tr>
                        <td>Fondacija: </td>
                        <td><?php echo $fondacija; ?></td>
                    </tr>
                    <tr>
                        <td>Postavio: </td>
                        <td><?php echo "masahn" ?></td>
                    </tr>
                    <tr>
                        <td>Preostalo vreme:  &nbsp;&nbsp;</td>
                        <td><p id="time"> <?php echo $licitacija['trajanje'];?></p></td>
                    </tr>
                    <tr>
                    <span class="greskaprijava"><?php if (!empty($poruka)) echo $poruka  ?></span>

                <td>Trenutna cena: </td>
                <td><?php if(isset($cena))echo $cena; ?></td>
            </tr>
            <tr>
                <td align="center" colspan="2"><?php if($korisnik!=null)echo "(".$korisnik['korisnickoime'].")";
                else echo "(anonimno)";
                ?></td>
            </tr>
            <tr>
            <td align="left">Nova ponuda: </td>
            <td><input type="text" name='cena'  placeholder="Unesite cenu"></td>
            </tr>
            <tr>
                <td><input type="checkbox" name="anonimno" value="anonimno" > Anonimno</td>
            </tr>
            <tr>
                
                <td align="right"><button class="btn btn-dark licitiraj">Licitiraj</button></td>
                </form>
                <form action= "<?= site_url('Korisnik/index')?>">
                <td align="center"><button class="btn btn-dark odustani">Nazad</button></td>
                </form>
            </tr>

                </table>


            </div>


        </div>


    </div>
</div>