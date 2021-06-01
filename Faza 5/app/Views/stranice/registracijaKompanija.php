<div class="regKompanija" id="regKompanija">
<h1><b>Registracija kompanije</b></h1>

  <div class="forma">


    <span class="greskaprijava">
      <?php if (isset($validation)) if ($validation->hasError("nazivKomp")) echo $validation->getError("nazivKomp");
      else if ($validation->hasError("pib")) echo $validation->getError("pib");
      else if ($validation->hasError("adresa")) echo $validation->getError("adresa");
      else if ($validation->hasError("telefon")) echo $validation->getError("telefon");
      else if ($validation->hasError("regBr")) echo $validation->getError("regBr");
      else if ($validation->hasError("lozinka")) echo $validation->getError("lozinka");

      ?></span>
    <form method="post" action="<?= site_url('Gost/proveraRegKomp') ?>">

      <table width="70%" cellpadding="5px" align="center">



         </td>
        </tr>
        <tr>
          <td>Naziv kompanije:</td>
          <td colspan="2">Adresa:</td>
        </tr>
        <tr>
          <td> <input type="text" name="nazivKomp"  value="<?= set_value('nazivKomp') ?>" placeholder="Unesite naziv kompanije"></td>
          <td colspan="2"><input type="text" name="adresa"  value="<?= set_value('adresa') ?>" placeholder="Unesite adresu kompanije"></td>
        </tr>
        <tr>
          <td>PIB:</td>
          <td colspan="2">Telefon:</td>
        </tr>
        <tr>
          <td><input type="text" name="pib"  value="<?= set_value('pib') ?>" placeholder="Unesite PIB"></td>

          <td colspan="2"><input type="text" name="telefon"  value="<?= set_value('telefon') ?>" placeholder="Unesite telefon"></td>
        </tr>

        <tr>
          <td>Registarski broj:</td>
          <td colspan="2">Lozinka:</td>
        </tr>
        <tr>
          <td><input type="text" name="regBr" value="<?= set_value('regBr') ?>" placeholder="Unesite registarski broj"></td>

          <td colspan="2"><input type="password" value="<?= set_value('lozinka') ?>" name="lozinka" placeholder="Unesite lozinku"></td>
        </tr>

        <tr>

          <td align="center" colspan="2">
            <button class="btn btn-dark " style="margin-top:25px">Registruj se</button>
    </form>
    </td>
    </tr>
    </table>

  </div>
</div>