<div class="pocetna" id="pocetna">
<div class="col-10 offset-1" >
<table>
    <tr align="center"><td colspan="2"><h1>Dobrodošli</h1></td></tr>
    <tr><td><img src="/slike/deka.png" alt="" width="140px"></td>
    <td>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium,Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque eveniet ad tempora et recusandae delectus minima, dolorum veritatis nesciunt beatae? repudiandae ullam hic quas, fugiat quam ex maiores quos esse, qui ipsam dolor libero sapiente. Facilis possimus consequuntur pariatur, magni quibusdam dolor blanditiis ipsum nobis incidunt aperiam et modi adipisci officia perspiciatis iusto. Tenetur ab eius recusandae quidem non magni dicta.</p>

    </td></tr>
    <tr>
    <form action= "<?= site_url('Gost/pregled')?>" >
        <td align="center" colspan="2"><button style="width:50%;"class="btn btn-dark">Kupovina</button></td>
        </from>
    </tr>
</table>


</div>

<h1>Do sada smo postigli:</h1>
<table class="tabela" cellpadding="30px" align="center" >

<?php 
$counter=0;
foreach($fondacije as $fondacija){

if($counter%3==0)echo "<tr>";
$counter++;
echo '<td class="first">'.'<img  src = "data:image/png;base64,' . base64_encode($fondacija['logo']) . '" width = "85%" height = "95%"/>'.
'<br>'.$fondacija['naziv'].'<br><b>Donirano:</b> '.$fondacija["iznos"]." din".'</td>';

if($counter%3==0)echo "</tr>";

}

?>
</table>
</div>


