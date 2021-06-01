<div class="regKorisnik" id="regKorisnik">
<h1><b>Registracija korisnika</b></h1>

    <div class="forma">
        <span class="greskaprijava">
            <?php if (isset($validation)) if ($validation->hasError("ime")) echo $validation->getError("ime");
            else if ($validation->hasError("prez")) echo $validation->getError("prez");
            else if ($validation->hasError("adr")) echo $validation->getError("adr");
            else if ($validation->hasError("fon")) echo $validation->getError("fon");
            else if ($validation->hasError("grad")) echo $validation->getError("grad");
            else if ($validation->hasError("korime")) echo $validation->getError("korime");
            else if ($validation->hasError("lozinkareg")) echo $validation->getError("lozinkareg");
            else if ($validation->hasError("pol")) echo $validation->getError("pol");


            ?></span></span>
        <form method="post" action="<?= site_url('Gost/proveraRegKor') ?>">

            <table class="masinaUplata" width="70%" align="center">


                <tr>
                    <td>Pol:</td>
                    <td>Ime:</td>
                </tr>
                <tr>
                    <td align="justify"><input type="radio" name="pol" value="musko">&nbsp;Muško &nbsp;
                        <input type="radio" name="pol" value="zensko">&nbsp;Žensko
                    </td>
                    <td><input type="text" name="ime" value="<?= set_value('ime') ?>" placeholder="Unesite ime"> </td>
                    </td>
                </tr>

                <tr>
                    <td>Prezime: </td>
                    <td> Adresa: </td>
                </tr>
                <tr>
                    <td> <input type="text" name="prez" value="<?= set_value('prez') ?>" placeholder="Unesite prezime"> </td>
                    <td> <input type="text" name="adr" value="<?= set_value('adr') ?>" placeholder="Unesite adresu"> </td>
                </tr>

                <tr>
                    <td>Telefon:</td>
                    <td>Grad:</td>
                </tr>
                <tr>
                    <td> <input type="text" name="fon" value="<?= set_value('fon') ?>" placeholder="Unesite telefon"> </td>
                    <td> <input type="text" name="grad" value="<?= set_value('grad') ?>" placeholder="Unesite grad"> </td>
                </tr>

                <tr>
                    <td>Korisničko ime:</td>
                    <td>Lozinka:</td>
                </tr>

                <tr>
                    <td><input type="text" name="korime" value="<?= set_value('korime') ?>" placeholder="Unesite korisnicko ine">
                    <td><input type="password" name="lozinkareg" value="<?= set_value('lozinkareg') ?>" placeholder="Unesite lozinku"></td>
                </tr>


                <tr>
                    <td align="center" colspan="2"><button class="btn btn-dark" style="margin-top:25px" type="submit">Registruj se</button></td>
                </tr>

            </table>



        </form>

    </div>
</div>