<div class="uplata" id="uplata">

    <h1>Nalog za uplatu</h1>
    <div class="forma">
    <form method="post" action= "<?= site_url('Kompanija/proverauplata')?>" >

    <span class="greskaprijava" ><?php if(!empty($greskauplata))echo $greskauplata  ?></span> 

    <table width="100%"  cellpadding="5px"  >
        <tr>
          <td width="40%">Uplatilac:</td>
          <td width="12%">Šifra:</td>
          <td width="12%">Valuta:</td>
          <td width="36%">Iznos:</td>
        </tr>
        <tr>
          <td valign="bottom"><input type="text" name="uplatilac" value="<?php echo $kompanija['naziv']?>"  disabled ></td>
          <td >
            <select  name="sifra" value="<?php set_value('sifra');?> "style="border: 3px solid #cccccc;height: 45px; margin-top: 15px; width:100%">
            <option value="289">289</option>
            <option value="189">189</option>
          </select></td>
          <td ><select   name="valuta" value="<?php set_value('valuta');?>" style="border: 3px solid #cccccc;height: 45px; margin-top: 15px; width:100%">
            <option value="rsd">RSD</option>
            <option value="eur">EUR</option>
          </select></td>
          <td valign="bottom"> <input type="text" name="iznos" value="<?=set_value('iznos')?>"   placeholder="Unesite iznos"></td>
        </tr>
        <tr>
          <td>Svrha uplate/Šifra licitacije:</td>
          <td colspan="3">Račun primaoca:</td>
        </tr>
        <tr>
          <td> <input type="text" value="Donacija" disabled placeholder="Unesite svrhu plate"></td>
          <td colspan="3"><input type="text" value="<?php echo $fondacija['racun']?>"  disabled  style=" width:94%"></td>
        </tr>
        <tr>
          <td>Primalac:</td>
          <td colspan="2">Model:</td>
          <td>Poziv na broj:</td>
        </tr>
        <tr>
          <td><input type="text"  name="primalac" value="<?php echo $fondacija['naziv']?>" disabled ></td>

          <td colspan="2"><input type="text" name="model" value="<?=set_value('model')?>" placeholder="Unesite model"></td>
          <td ><input type="text" name="poziv" value="<?=set_value('poziv')?>" placeholder="Unesite poziv na broj"></td>
        </tr>
       
        <tr>

          <td colspan="4" align="center">
            <button class="btn btn-dark ">Uplati</button>
            </form>
            <form  action= "<?= site_url('Kompanija/index')?>">
            <button class="btn btn-dark " style="margin: 10px;">Odustani</button>
            </form>
          </td>
        </tr>
      </table>
     
    </div>
  </div>
  <