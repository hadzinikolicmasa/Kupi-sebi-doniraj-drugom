<div class="dodavanjeFondacija" id="dodavanjeFondacija">

    <div class="forma">
    <h1><b>Fondacija</b></h1>


    <span class="greskaprijava" ><?php if(isset($validation)) echo $validation->listErrors() ?></span> 
    <form method="post" action= "<?= site_url('Admin/proveraDodavanjaFondacije')?>" >

    <table width="70%"  cellpadding="5px" align="center">

  
  
</span> </td></tr>
        <tr>
          <td>Naziv:</td>
          <td colspan="2">Opis:</td>
        </tr>
        <tr>
          <td> <input type="text" name="nazivFond" placeholder="Unesite naziv fondacije"></td>
          <td rowspan="2"><textarea name="opisFond" cols="12" rows="3" placeholder="Opis..." width=""></textarea></td>
        </tr>
        <tr>
          <td>Adresa:</td>
          <td></td>
        </tr>
        <tr>
          <td><input type="text"  name="adresaFond" placeholder="Unesite adresu fondacije" ></td>
          <td></td>
        </tr>

        <tr>
          <td>Račun:</td>
          <td colspan="2">Logo:</td>
        </tr>
        <tr>
          <td><input type="text"  name="racunFond" placeholder="Unesite racun fondacije"></td>

          <td colspan="2"><input type="file" name="logoFond" ></td>
        </tr>
       
        <tr>

          <td align="center" colspan="2">
            <button class="btn btn-dark " style="margin-top:25px">Dodaj fondaciju</button>
            </form>
          </td>
        </tr>
      </table>
     
    </div>
  </div>
  