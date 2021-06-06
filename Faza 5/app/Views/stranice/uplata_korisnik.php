
<?php
    /**
     * 
     * @author Masa Hadzi-Nikolic 18/0271
     */
?>
<div class="uplata" id="uplata">


  <div class="forma">
    <h1><b>Nalog za uplatu</b></h1>
    <form method="post" action="<?= site_url("$controller/proverauplata/$licitacija") ?>">

      <span class="greskaprijava"><?php if (!empty($greskauplata)) echo $greskauplata  ?></span>

      <table width="100%" cellpadding="5px">
        <tr>
          <td width="40%">Uplatilac:</td>
          <td width="12%">Šifra:</td>
          <td width="12%">Valuta:</td>
          <td width="36%">Iznos:</td>
        </tr>
        <tr>
          <td valign="bottom"><input type="text" name="uplatilac" value="<?php echo $korisnik['korisnickoime'] ?>" disabled></td>
          <td>
            <select name="sifra" value="<?php set_value('sifra'); ?> " style="border: 3px solid #cccccc;height: 45px; margin-top: 15px; width:100%">
              <option value="289">289</option>
              <option value="189">189</option>
            </select>
          </td>
          <td><select name="valuta" value="<?php set_value('valuta'); ?>" style="border: 3px solid #cccccc;height: 45px; margin-top: 15px; width:100%">
              <option value="rsd">RSD</option>
              <option value="eur">EUR</option>
            </select></td>
          <td valign="bottom"> <input type="text" name="iznos" value="<?php echo $cena ?>"  disabled ></td>
        </tr>
        <tr>
          <td>Svrha uplate/Šifra licitacije:</td>
          <td colspan="3">Račun primaoca:</td>
        </tr>
        <tr>
          <td> <input type="text" value="<?php echo $licitacija ?>" disabled></td>
          <td colspan="3"><input type="text" value="<?php echo $fondacija['racun'] ?>" disabled style=" width:94%"></td>
        </tr>
        <tr>
          <td>Primalac:</td>
          <td colspan="2">Model:</td>
          <td>Poziv na broj:</td>
        </tr>
        <tr>
          <td><input type="text" name="primalac" value="<?php echo $fondacija['naziv'] ?>" disabled></td>

          <td colspan="2"><input type="text" name="model" value="<?= set_value('model') ?>" placeholder="Unesite model"></td>
          <td><input type="text" name="poziv" value="<?= set_value('poziv') ?>" placeholder="Unesite poziv na broj"></td>
        </tr>

        <tr>

          <td colspan="4" align="center">
            <button class="btn btn-dark ">Uplati</button>
    </form> 
   
    </td>
    </tr>
    </table>

  </div>
</div>
<