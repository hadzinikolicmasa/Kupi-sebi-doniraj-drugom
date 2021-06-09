function vreme() {
    let vreme = document.getElementById("time").value;

    var coundDownDate = new Date(vreme + "T00:00:00Z").getTime();

    var now = new Date().getTime();
    var timeleft = coundDownDate - now;
    if (timeleft < 0) {
        document.getElementById("vreme").style.color = "#E71D36";
        document.getElementById("text").style.display = "none";
        document.getElementById("licitiraj").style.display = "none";
        document.getElementById("vreme").innerText = "Licitacija zavrsena!";

        if (document.getElementById("trenutni").value == document.getElementById("licitirao").value) {
            document.getElementById("uplatapobednik").style.display = "inline";

        }
    }

    let inter = setInterval(function() {
        now = new Date().getTime();

        timeleft = coundDownDate - now;
        if (timeleft >= 0) {

            var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
            var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);
            document.getElementById("vreme").innerText = days + " dana " + hours + " sati " + minutes + " minuta " + seconds + " sekundi ";

        }

    }, 1000);

}