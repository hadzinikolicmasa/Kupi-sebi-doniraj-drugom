<div class="regKompanija" id="regKompanija">

    <div class="forma">
    <h1><b>Registracija kompanije</b></h1>


    <span class="greskaprijava" ><?php if(isset($validation)) echo $validation->listErrors() ?></span> 
    <form method="post" action= "<?= site_url('Gost/proveraRegKomp')?>" >

    <table width="70%"  cellpadding="5px" align="center">

  
  
</span> </td></tr>
        <tr>
          <td>Naziv kompanije:</td>
          <td colspan="2">Adresa:</td>
        </tr>
        <tr>
          <td> <input type="text" name="nazivKomp" placeholder="Unesite naziv kompanije"></td>
          <td colspan="2"><input type="text" name="adresa" placeholder="Unesite adresu kompanije"></td>
        </tr>
        <tr>
          <td>PIB:</td>
          <td colspan="2">Telefon:</td>
        </tr>
        <tr>
          <td><input type="text"  name="pib" placeholder="Unesite PIB" ></td>

          <td colspan="2"><input type="text" name="telefon" placeholder="Unesite telefon" ></td>
        </tr>

        <tr>
          <td>Registarski broj:</td>
          <td colspan="2">Lozinka:</td>
        </tr>
        <tr>
          <td><input type="text"  name="regBr" placeholder="Unesite registarski broj"></td>

          <td colspan="2"><input type="password" name="lozinka"  placeholder="Unesite lozinku"></td>
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
  