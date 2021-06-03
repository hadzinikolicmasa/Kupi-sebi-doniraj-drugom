<div class="profil" id="profil">
  <h1>Profil kompanije</h1>

  <div class="formaprofil">

    <form method="post" >

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
          <td><?php echo $kompanija['adresa']; ?></td>
        </tr>

        <tr>
          <td>Telefon:</td>
          <td><?php echo $kompanija['telefon']; ?></td>
        </tr>

        <tr>
          <td align="center"> <button class="btn btn-dark" value="Izmeni">Izmeni</button></td>
    </form>
    <form action= "<?= site_url('Kompanija/index')?>">
      <td align="left"> <button class="btn btn-dark" value="Nazad">Nazad</button></td>
    </form>
    </tr>
    </table>

  </div>