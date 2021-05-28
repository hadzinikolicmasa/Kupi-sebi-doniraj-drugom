<div class="regKompanija" id="regKompanija">

    <h1>Registracija kompanije</h1>
    <div class="forma">
    

    <span class="greskaprijava" ><?php if(isset($validation)) echo $validation->listErrors() ?></span> 
    <form method="post" action= "<?= site_url('Gost/proveraRegKomp')?>" >

    <table width="70%"  cellpadding="5px" align="center">

        
        <tr>
          <td>Naziv kompanije:</td>
          <td colspan="3">Adresa:</td>
        </tr>
        <tr>
          <td> <input type="text" name="nazivKomp"></td>
          <td colspan="3"><input type="text" name="adresa" ></td>
        </tr>
        <tr>
          <td>PIB:</td>
          <td colspan="2">Telefon:</td>
        </tr>
        <tr>
          <td><input type="text"  name="pib" ></td>

          <td colspan="2"><input type="text" name="telefon" ></td>
        </tr>

        <tr>
          <td>Registarski broj:</td>
          <td colspan="2">Lozinka:</td>
        </tr>
        <tr>
          <td><input type="text"  name="regBr" ></td>

          <td colspan="2"><input type="password" name="lozinka" ></td>
        </tr>
       
        <tr>

          <td align="center" colspan="2">
            <button class="btn btn-dark ">Registruj se</button>
            </form>
          </td>
        </tr>
      </table>
     
    </div>
  </div>
  