<div class='container licitacija'>

    <div class="row">

        <div class='col-8 offset-2 productinfo'>
            <div class="licitacijaslika">
                <?php

                echo '<img class="proizvod" src = "' . $licitacija['slika'] . '" width = "260px" height = "350px" "/><br>';

                ?>

            </div>


            
            <form method="post" action="<?= site_url("$controller/licitiraj/{$licitacija['idLicitacija']}") ?>">


                <div class="licitacijatext">
                    <h2 style="color:#FF9F1C"> <?php echo $licitacija['naziv_stvari']; ?></h2>
                    <p><?php echo $licitacija['opis']; ?></p>
                    <hr>

                    <table>
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
                            <td><?php echo $licitacija['korisnik'] ?></td>
                        </tr>
                        <tr>
                            <td>Prosečna ocena: </td>
                            <td><?php if($ocena==0)echo "/" ;else echo $ocena; ?></td>
                        </tr>
                        <tr>
                            <td>Preostalo vreme: &nbsp;&nbsp;</td>
                            <td>
                                <input type="hidden" id="time" value="<?php echo $licitacija['trajanje'] ?>">
                                <input type="hidden" id="trenutni" value="<?php echo $trenutni['korisnickoime'] ?>">

                                <span id="vreme"></span>
                            </td>
                        </tr>
                        <tr>
                            <span class="greskaprijava"><?php if (!empty($poruka)) echo $poruka  ?></span>

                            <td>Trenutna cena: </td>
                            <td><?php if (isset($cena)) echo $cena; ?></td>
                        </tr>
                        <tr>
                        <input type="hidden" id="licitirao" value="<?php if($pobednik!=NULL)echo $pobednik['korisnickoime'] ?>">

                            <td align="center" colspan="2"><?php if ($korisnik != null) echo "(" . $korisnik['korisnickoime'] . ")";
                                                            else if(isset($pobednik))echo "(anonimno)";
                                                            ?></td>
                        </tr>
                        <tr>
                            <td align="left">Nova ponuda: </td>
                            <td><input type="text" id="text"name='cena' placeholder="Unesite cenu"></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="anonimno" value="anonimno"> Anonimno</td>
                        </tr>
                        <tr>

                            <td align="right"><button id="licitiraj" class="btn btn-dark licitiraj">Licitiraj</button></td>
            </form>
           <form action="<?= site_url("$controller/uplata/{$licitacija['idLicitacija']}") ?>">
                <td align="center">
                <button class="btn btn-dark odustani" id="uplatapobednik"style="display:none">Uplata</button>
            </form>
                <form action="<?= site_url('Korisnik/index') ?>">
                <button class="btn btn-dark odustani">Nazad</button>
                </td>
            </form>
            </tr>

            </table>


        </div>


    </div>


</div>
</div>
