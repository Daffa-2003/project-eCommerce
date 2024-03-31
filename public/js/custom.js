$(document).ready(function () {
    var nilai = $("#qty").val();
    var harga = $("#harga").val();
    var total = $("#total").val();
    var subtotal = parseInt(harga) * parseInt(nilai);

    if (nilai > 0) {
        $("#total").val(subtotal);
    }

    if (nilai == 0) {
        $("#minus").prop("disabled", true);
    }

    $("#plus").click(function () {
        var qty = $("#qty").val();
        var jumlah = parseInt(qty) + parseInt(1);
        $("#qty").val(jumlah);
        var harga = $("#harga").val();
        var subtotal = parseInt(harga) * parseInt(jumlah);
        $("#total").val(subtotal);

        if (jumlah > 0) {
            $("#minus").prop("disabled", false);
        }
    });
    $("#minus").click(function () {
        var qty = $("#qty").val();
        var jumlah = parseInt(qty) - parseInt(1);
        $("#qty").val(jumlah);
        var harga = $("#harga").val();
        var subtotal = parseInt(harga) * parseInt(jumlah);
        $("#total").val(subtotal);

        if (jumlah == 0) {
            $("#minus").prop("disabled", true);
        }
    });
});

$(document).ready(function () {
    var total_harga = $("#total_harga").val();
    var discon = $("#discon").val();
    var ongkir = $("#ongkir").val();
    var total = parseInt(total_harga) + parseInt(ongkir) - parseInt(discon);
    $("#total_bayar").val(total);
    $("#bayar").on("input", function () {
        var bayar = $("#bayar").val();
        var kembali = parseInt(bayar) - parseInt(total);
        $("#kembalian").val(kembali);
    });
});
