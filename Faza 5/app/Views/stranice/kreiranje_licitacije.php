
<?php
    /**
     * 
     * @author Nina Savkic 18/0692
     */
?>
<div class="kreiranjeLicit" id="kreiranjeLicit">
<h1><b>Kreiraj licitaciju</b></h1>

  <div class="formaLicitacije">


    <span class="greskaLicitacija">
      <?php if (isset($validation)) if ($validation->hasError("nazivProizvoda")) echo $validation->getError("nazivProizvoda");
      else if ($validation->hasError("trajanje")) echo $validation->getError("trajanje");
      else if ($validation->hasError("opis")) echo $validation->getError("opis");
      else if ($validation->hasError("pocetnaCena")) echo $validation->getError("pocetnaCena");
      else if ($validation->hasError("fondacija")) echo $validation->getError("fondacija");
      else if ($validation->hasError("kategorija")) echo $validation->getError("kategorija");
      else if ($validation->hasError("slika")) echo $validation->getError("slika");


      ?></span>

    <form method="post" action="<?= site_url('Korisnik/proveraLicitacije') ?>">

      <table width="70%" cellpadding="5px" align="center">

        <tr>
          <td>Naziv prozivoda:</td>
          <td>Trajanje:</td>
        </tr>

        <tr>
          <td> <input  style="width: 200px" type="text" name="nazivProizvoda"  value="<?= set_value('nazivProizvoda') ?>" placeholder="Unesite naziv proizvoda"></td>
          <td colspan="2"><input type="date" name="trajanje"  value="<?= set_value('trajanje') ?>" placeholder="Unesite trajanje licitacije"></td>
        </tr>

        <tr>
          <td>Opis:</td>
          <td>Fondacija:</td>
          <td>Kategorija:</td>
        </tr>

        <tr>
            <td>
                <textarea type="text" cols="10" rows="3" name="opis" value="<?=set_value('opis')?>"  placeholder="Unesite opis proizvoda"></textarea>
            </td>
            <td>
            <select name="fondacija" value="<?=set_value('fondacija')?>">
                <option style="display:none">
                <?php 
                  foreach($fondacije as $fondacija)
                  {
                    echo '<option value="' . $fondacija['idFondacija'] . '">' . $fondacija['naziv'];
                  }
                ?>

             </select>
            </td>
            <td>
            <select name="kategorija" value="<?=set_value('kategorija')?>">
                <option style="display:none">

                <?php 
                  foreach($kategorije as $kategorija)
                  {
                    echo '<option value="' . $kategorija['IdKategorije'] . '">' . $kategorija['naziv'];
                  }
                ?>

             </select>
            </td>
        </tr>

        <tr>
          <td>Pocetna cena:</td>
          <td colspan="3">Slika:</td>
        </tr>
        <tr>
        <td>
          <input type="text" id="text" name="pocetnaCena"  value="<?= set_value('pocetnaCena') ?>" placeholder="Unesite pocetnu cenu">
        </td>

        <td colspan="2">
            <input type="file" name="slika"  value="<?= set_value('slika') ?>" placeholder="Ubacite sliku">
        </td>
        </tr>

        <tr>
         <td align="right">
         <button class="btn btn-dark" type="submit">Postavi</button>
         </form> 
        </td>
         <td align="right">
         <form action= "<?= site_url('Korisnik/index')?>" ><button class="btn btn-dark">Odustani</button></form>
        </td>
         </tr>
    
     </table>

    </form>
   

  </div>
</div>
