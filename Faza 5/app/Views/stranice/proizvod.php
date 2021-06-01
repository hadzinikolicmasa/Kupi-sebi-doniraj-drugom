<div class='container licitacija'>
    <div class="row">


        <div class='col-5 offset-1 infoproizvod'>

            <div class="licitacijaslika">
                <?php

                echo '<img class="proizvod" src = "data:image/png;base64,' . base64_encode($licitacija['slika']) . '" width = "180px" height = "220px" "/><br>';

                ?>

            </div>

            <div class="licitacijatext">
                <h2 style="text-align:center"> <?php echo $licitacija['naziv_stvari']; ?></h2>
                <table>
                    <tr>
                        <td>Broj licitacije: </td>
                        <td><?php echo $licitacija['idLicitacija']; ?></td>
                    </tr>
                    <tr>
                        <td>Opis: </td>
                        <td><?php echo $licitacija['opis']; ?></td>
                    </tr>
                    <tr>
                        <td>Fondacija: </td>
                        <td><?php echo $fondacija; ?></td>
                    </tr>
                    <tr>
                        <td>Postavio: </td>
                        <td><?php echo $licitacija['korisnik']; ?></td>
                    </tr>

                </table>
            </div>

        </div>

        <div class='col-4 offset-1 licitiraj'>
            <h2 style="text-align:center; margin-top:20px"> Licitiraj</h2>
            <table  width="90%" align="center">

            <tr>
                <td>Preostalo vreme: </td>
                <td>3 dana, 10 sati</td>
            </tr>

            <tr>
                <td>Trenutna cena: </td>
                <td>300 din</td>
            </tr>
            <tr>
                <td align="center" colspan="2">( masahn )</td>
            </tr>
            <tr>
            <td align="left" colspan="2">Nova ponuda: </td>
            </tr>
            <tr>
                <td align="center" colspan="2"><input type="text" placeholder="Unesite cenu"></td>
            </tr>
            <tr>
                <td><input type="checkbox" name="" id=""> Anonimno</td>
            </tr>
            <tr>
                <form action= "<?= site_url('Korisnik/index')?>">
                <td align="center"><button class="btn btn-dark">Nazad</button></td>
                </form>
                <td><button class="btn btn-dark">Licitiraj</button></td>
            </tr>
            </table>

        </div>






    </div>
</div>