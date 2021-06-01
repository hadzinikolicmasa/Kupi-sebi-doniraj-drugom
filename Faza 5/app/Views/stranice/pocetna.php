<div class="pocetna " id="pocetna">

        <div class="col-2 offset-1 one">
                <p style="font-weight:bolder"><i>For it is in giving that we receive</i></p>
                <i>~Francis of assisi</i>
        </div>

        <div class="col-4 offset-1 two">
                <h1 style="font-family: 'Courier New', monospace;">
                        <b>Dobrodošli</b>
                </h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi ipsam quaerat quam perferendis fugit labore accusantium itaque qui, Nisi ipsam quaerat quam perof ferendis corrupti eveniet. Nisi ipsam quaerat quam perferendis .</p>
                <form action="<?= site_url('Gost/pregled') ?>">
                        <td align="center" colspan="2"><button style="width:100%; color:white;  background-color:#012627;" class="btn ">Kupovina</button></td>
                        </from>
        </div>

        <div class="col-2 offset-1 three">
                <p style="font-weight:bolder"><i>Lorem ipsum dolor sit amet</i></p>
                <i>~Lorem ipsum</i>
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
                                echo '<td class="firsttd">' . '<img class="firsticon"src = "data:image/png;base64,' . base64_encode($fondacija['logo']) . ' " width = "95%" height = "120%"/>' .
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