function vreme() {
    let vreme = document.getElementById("time").innerText;
    var coundDownDate = new Date(vreme + "T00:00:00Z").getTime();

    let inter = setInterval(function() {
        var now = new Date().getTime();
        var timeleft = coundDownDate - now;
        if (timeleft < 0) {
            clearInterval(myfunc);
            document.getElementById("time").innerText = "Istekla licitacije!";

        } else {
            var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
            var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);
            document.getElementById("time").innerText = days + " dana " + hours + " sati " + minutes + " minuta " + seconds + " sekundi ";
        }
    }, 1000)

}