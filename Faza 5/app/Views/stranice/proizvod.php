<<<<<<< HEAD
<div class='container licitacija'>
    <div class="row">


        <div class='col-5 offset-1 infoproizvod'>

            <div class="licitacijaslika">
                <?php

                echo '<img class="proizvod" src = "data:image/png;base64,' . base64_encode($licitacija['slika']) . '" width = "180px" height = "220px" "/><br>';
=======

<?php
    /**
     * 
     * @author Masa Hadzi-Nikolic 18/0271
     */
?>
<div class='container licitacija'>

    <div class="row">

        <div class='col-8 offset-2 productinfo'>
            <div class="licitacijaslika">
                <?php

                echo '<img class="proizvod" src = "' . $licitacija['slika'] . '" width = "260px" height = "350px" "/><br>';
>>>>>>> 8f6b11b8ea33019127f0e381b44c15ce81d3cb01

                ?>

            </div>

<<<<<<< HEAD
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
=======

            
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
>>>>>>> 8f6b11b8ea33019127f0e381b44c15ce81d3cb01
