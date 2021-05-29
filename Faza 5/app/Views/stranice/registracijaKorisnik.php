


<div class="regKorisnik" id="regKorisnik">
    <div class="forma">
      <h1 ><b>Registracija korisnika</b></h1>
      <form method="post" action= "<?= site_url('Gost/proveraRegKor')?>" >
      
                <table class="masinaUplata" width="70%"  align="center">

                <tr><td colspan="3"> <span class="greskaprijava" ><?php if(isset($validation)) 
                 if(null!==$validation->showError('pol')) echo  $validation->showError('pol')
                ?></span> </td></tr>
                    <tr>
                    <td>Pol:</td><td>Ime:</td>
                    </tr>
                    <tr>
                    <td align="justify"><input type="radio" name="pol" value="musko" >&nbsp;Muško &nbsp;
                    <input type="radio" name="pol" value="zensko" >&nbsp;Žensko</td>
                    <td><input type="text" name="ime" value="<?=set_value('ime')?>" placeholder="Unesite ime"> </td></td>
                    </tr>

                    <tr>
                        <td >Prezime: </td>
                        <td> Adresa: </td>
                    </tr>
                    <tr>
                    <td > <input type="text" name="prez" value="<?=set_value('prez')?>" placeholder="Unesite prezime"> </td>
                    <td> <input type="text" name="adr" value="<?=set_value('adr')?>" placeholder="Unesite adresu"> </td>
                    </tr>

                    <tr><td >Telefon:</td><td>Grad:</td></tr>
                    <tr> 
                    <td> <input type="text" name="fon" value="<?=set_value('fon')?>" placeholder="Unesite telefon"> </td>
                    <td> <input type="text" name="grad" value="<?=set_value('grad')?>"placeholder="Unesite grad"> </td>
                    </tr>

                    <tr>
                        <td>Korisničko ime:</td><td>Lozinka:</td>
                    </tr>

                    <tr>
                        <td><input type="text"name="korime" value="<?=set_value('korime')?>" placeholder="Unesite korisnicko ine">
                        <td><input type="password"name="lozinkareg" value="<?=set_value('lozinkareg')?>" placeholder="Unesite lozinku"></td>
                    </tr>

                        
                    <tr>
                        <td align="center" colspan="2"><button class="btn btn-dark" style="margin-top:25px" type="submit" >Registruj se</button></td>
                    </tr>

                </table>
            
        
    
        </form>

    </div>
  </div>

  