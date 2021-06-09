<<<<<<< HEAD
<div class="dodavanjeFondacija">

  <div class="forma">
    <h1><b>Dodaj fondaciju</b></h1>
=======
<?php
    /**
     * @author Milanka Labovic  18/0698
     * 
     */
?>

<div class="dodavanjeFondacija">
<h1><b>Dodaj fondaciju</b></h1>
  <div class="forma">
    
>>>>>>> 8f6b11b8ea33019127f0e381b44c15ce81d3cb01


    <span class="greskaprijava">
      <?php if (isset($validation)) if ($validation->hasError("nazivFond")) echo $validation->getError("nazivFond");
      else if ($validation->hasError("nazivFond")) echo $validation->getError("nazivFond");
      else if ($validation->hasError("adresaFond")) echo $validation->getError("adresaFond");
      else if ($validation->hasError("racunFond")) echo $validation->getError("racunFond");
      else if ($validation->hasError("logoFond")) echo $validation->getError("logoFond");
      else if ($validation->hasError("opisFond")) echo $validation->getError("opisFond");

      ?></span>
<<<<<<< HEAD
    <form method="post" action="<?= site_url('Admin/proveraDodavanjaFondacije') ?>">
=======
    <form method="post" action="<?= site_url("$controller/proveraDodavanjaFondacije") ?>"  >
>>>>>>> 8f6b11b8ea33019127f0e381b44c15ce81d3cb01

      <table width="90%" cellpadding="5px" align="center">


<<<<<<< HEAD

=======
>>>>>>> 8f6b11b8ea33019127f0e381b44c15ce81d3cb01
        </span> </td>
        </tr>
        <tr>
          <td>Naziv:</td>
          <td colspan="2">Opis:</td>
        </tr>
        <tr>
          <td> <input type="text" name="nazivFond" value="<?= set_value('nazivFond') ?>" placeholder="Unesite naziv "></td>
          <td rowspan="3"><textarea name="opisFond" value="<?= set_value('opisFond') ?>" cols="30" rows="5" placeholder="Opis..." width=""></textarea></td>
        </tr>
        <tr>
          <td>Adresa:</td>
          <td></td>
        </tr>
        <tr>
          <td><input type="text" name="adresaFond" value="<?= set_value('adresaFond')?>" placeholder="Unesite adresu "></td>
          <td></td>
        </tr>

        <tr>
          <td>Račun:</td>
          <td colspan="2">Logo:</td>
        </tr>
        <tr>
          <td><input type="text" name="racunFond" value="<?= set_value('racunFond')?>" placeholder="Unesite račun "></td>

          <td colspan="2"><input type="file" name="logoFond" value="<?= set_value('logoFond')?>"></td>
        </tr>
<<<<<<< HEAD

        <tr>

          <td align="center" colspan="2">
            <button class="btn btn-dark " style="margin-top:25px">Dodaj fondaciju</button>
    </form>
=======
    
        <tr>

          <td align="center" colspan="2">
            <button class="btn btn-dark " style="margin-top:25px">Dodaj fondaciju</button>  
            </form>
           <form action="<?= site_url("$controller/index") ?>">
           <button class="btn btn-dark " style="margin-top:25px">Odustani</button>  
           </form>
           
 
>>>>>>> 8f6b11b8ea33019127f0e381b44c15ce81d3cb01
    </td>
    </tr>
    </table>

  </div>
</div>