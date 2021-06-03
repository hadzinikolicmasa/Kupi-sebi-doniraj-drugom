<div class='container licitacija'>
    <div class="row">

        <div class='col-8 offset-2 productinfo'>
            <div class="licitacijaslika">
                <?php

                echo '<img class="proizvod" src = "data:image/png;base64,' . base64_encode($licitacija['slika']) . '" width = "260px" height = "350px" "/><br>';

                ?>

            </div>

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
                <td>Trenutna cena: </td>
                <td>300 din</td>
            </tr>
            <tr>
                <td align="center" colspan="2">( masahn )</td>
            </tr>
            <tr>
            <td align="left">Nova ponuda: </td>
            <td><input type="text" placeholder="Unesite cenu"></td>
            </tr>
            <tr>
                <td><input type="checkbox" name="" id=""> Anonimno</td>
            </tr>
            <tr>
                <form action= "<?= site_url('Korisnik/index')?>">
                <td align="right"><button class="btn btn-dark odustani">Nazad</button></td>
                </form>
                <td align="center"><button class="btn btn-dark licitiraj">Licitiraj</button></td>
            </tr>

                </table>


            </div>


        </div>


    </div>
</div>