<?php
    /**
     * 
     * @author Nadja Milojkovic 18/0269
     */
?>

<div class="profil" id="profil">
  <h1>Profil kompanije</h1>

  <div class="formaprofil">
  <span class="greskaprijava"><?php if (!empty($greskaizmena)) echo $greskaizmena  ?></span>

  <form method="post" action="<?= site_url("$controller/proveraIzmena") ?>">

      <table width="100%" cellpadding="5px">

        <tr>
          <td>Naziv: </td>
          <td><?php echo $kompanija['naziv']; ?></td>
        </tr>

        <tr>
          <td>PIB:</td>
          <td><?php echo $kompanija['PIB']; ?></td>
        </tr>

        <tr>
          <td>Registarski broj:</td>
          <td><?php echo $kompanija['registarskibroj']; ?></td>
        </tr>

        <tr>
          <td>Adresa:</td>
          <td><?php 
          if (isset($rezimizmena)) echo "<input type='text' name='adresa'  value='" . set_value('adresa') . "' placeholder='Unesite novu adresu' >";
          else echo $kompanija['adresa'];
          ?></td>
        </tr>

        <tr>
          <td>Telefon:</td>
          <td><?php
              if (isset($rezimizmena)) echo "<input type='text' name='telefon'  value='" . set_value('telefon') . "' placeholder='Unesite novi telefon' >";
              else echo $kompanija['telefon']; ?></td>
        </tr>

        <tr>
        <?php if (!isset($rezimizmena)) echo '<td align="center"> <button class="btn btn-dark" value="Izmeni">' . anchor("$controller/izmena", 'Izmeni') . '</button></td>  ';
      else echo '  <form method="post" action=' . site_url("$controller/proveraIzmena") . '><td align="center"> <button class="btn btn-dark" value="Izmeni">Sačuvaj</button></td>   </form>'

      ?>
 </form>

      <?php if (!isset($rezimizmena)) echo ' <td align="left"> <button class="btn btn-dark" value="Izmeni">'.  anchor("$controller/index", 'Nazad') .'</button></td> ';
      else echo '  <form method="post" action=' . site_url("$controller/profil") . '><td align="left"> <button class="btn btn-dark" value="Izmeni">Odustani</button></td>   </form>'

      ?>
    </tr>
    </table>

  </div>