
<?php
    /**
     * 
     * @author Nina Savkic 18/0692
     * @coauthor Masa Hadzi-Nikolic 18/0271
     */
?>
<div class="pocetna " id="pocetna">

        <div class="col-2 offset-1 one">
                <p style="font-weight:bolder"><i>Čovek postaje velikan shodno stepenu na kojem radi za dobrobit drugih ljudi</i></p>
                <i>~Mahatma Gandi</i>
        </div>

        <div class="col-4 offset-1 two">
                <h1 style="font-family: 'Courier New', monospace;">
                        <b>Dobrodošli</b>
                </h1>
                <p><b>Kupi sebi, doniraj drugom</b> je internet aplikacija koja ima za cilj da pomogne odraslima, deci, udruzenjima i ustanovama iz Srbije kojima je pomoc najpotrebnija. </p>
                <form action="<?= site_url('Gost/pregled') ?>">
                        <td align="center" colspan="2"><button style="width:100%; color:white;  background-color:#012627;" class="btn ">Kupovina</button></td>
                        </from>
        </div>

        <div class="col-2 offset-1 three">
                <p style="font-weight:bolder"><i>Čovek samo srcem dobro vidi. Suština se očima ne da sagledati</i></p>
                <i>~Mali princ</i>
        </div>


        <br>



        <div class="col-12" style="float:left">
        <h1 style="font-family: 'Courier New', monospace;">Do sada smo postigli:</h1>
                <table class="tabela" cellpadding="30px" align="center" style="margin-bottom:50px" >
                        
                        <?php
                        $counter = 0;
                        foreach ($fondacije as $fondacija) {

                                if ($counter % 3 == 0) echo "<tr>";
                                $counter++;
                                echo '<td class="firsttd">' . '<img class="firsticon"src = "' .$fondacija['logo'] . ' " width = "95%" height = "120%"/>' .
                                        '<br>' . $fondacija['naziv'] . '<br><b>Donirano:</b> ' . $fondacija["iznos"] . " din" . '</td>';

                                if ($counter % 3 == 0) echo "</tr>";
                        }

                        ?>
                </table>
        </div>
        <div style="text-align:center">
    <img src="/slike/ruke.png" alt="" style="height:200px;width:50%; margin-top:50px; ">
</div>
</div>