// CLASS Format Mata Uang IDR 
$(document).ready(function(){
    // Format mata uang rp.
    $( '.uang' ).mask('000.000.000.000.000', {reverse: true});

})
$(document).ready(function(){
    $('.angka1').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0, allowNegative:true, allowZero:true});
    $('.angka2').maskMoney({prefix:'US$'});
    $('.angka3').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:2, allowNegative:true, allowZero:true});
    $('.angka4').maskMoney({prefix:'', thousands:'.', decimal:',', precision:2, allowNegative:true, allowZero:true});
    $('.angka5').maskMoney({prefix:'', thousands:'', decimal:'', precision:0, allowNegative:true, allowZero:true});
});

function duit(angka) {
    var duit = angka.toString().split(".");
    duit[0] = duit[0].replace(/\B(?=(\d{3})+(?!\d))/g,".");
    return duit.join(",");
  }

function desimal(angka) {
    var n = angka.toString().split(".");
    n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g,".");
    return n.join(",");
}

function hitungSaldo() {
    var rp = "Rp. "

        var simpan = document.getElementById("simpan").value
        var simpan1 = simpan.split("Rp.").join("").split(".").join("")

        var ambil = document.getElementById('ambil').value
        var ambil1 = ambil.split("Rp.").join("").split(".").join("")

        var htgSaldo = (parseInt(simpan1) - parseInt(ambil1))
        // document.getElementById('saldo').value = htgSaldo
        document.getElementById('saldo').value = rp.concat(desimal(htgSaldo)).concat(",00")

}



