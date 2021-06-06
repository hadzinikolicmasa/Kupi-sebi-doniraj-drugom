<?php
    /**
     * 
     * @author Nadja Milojkovic 18/0269
     */
?>
<div class="recenzija" id="recenzija">
    <h1>Recenzija</h1>

    <div class="formarecenzija">

    
    <form method="post" action= "<?= site_url('Korisnik/proveraRecenzije')?>" >
    <span class="greskarecenzija" style="color:red">

    <?php if (isset($validation)) if ($validation->hasError("korisnickoime")) echo $validation->getError("korisnickoime");
      else if ($validation->hasError("ocena")) echo $validation->getError("ocena");
      else if ($validation->hasError("komentar")) echo $validation->getError("komentar");

      ?>
  
  </span>
    <span class="greskarecenzija2"style="color:red" ><?php if(!empty($greskarecenzija2))echo $greskarecenzija2  ?></span> 

        <table width="100%" cellpadding="5px" align="center">
    
         <tr>
         <td>Korisničko ime :</td>
         <td>Ocena:</td>
         </tr>

         <tr><td><input type="text" id="korisnickoime" name="korisnickoime" value="<?=set_value('korisnickoime')?>"  placeholder="Unesite korisničko ime"></td>
         <td>
           <select name="ocena" value="<?=set_value('ocena')?>" >
           <option style="display:none">
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>
           </select>
         </td>
         </tr>

         <tr><td>Komentar:</td></tr>
         <tr><td colspan="2">
         <textarea type="text" cols="45" name="komentar" value="<?=set_value('komentar')?>"  placeholder="Unesite komentar"></textarea>
         </td></tr>
         <tr>
         <td align="center" ><button class="btn btn-dark" type="submit">Pošalji</button></td>
         </form> 
         <td > <form action= "<?= site_url('Korisnik/index')?>" ><button class="btn btn-dark">Odustani</button></form></td>
         </tr>
    
    
    </table>    

      
    </div>




</div>
    

