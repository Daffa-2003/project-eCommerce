$(document).ready(function () {
    $(".plus").click(function (e) {
        e.preventDefault();
        var card = $(this).closest(".card-body");
        var harga = card.find("#harga").val();
        var qty = card.find("#qty").val();

        var tambah = parseInt(qty) + 1;
        card.find("#qty").val(tambah);

        var subtotal = parseInt(harga) * parseInt(tambah);
        card.find(".total").val(subtotal);

        if (qty > 0) {
            card.find(".minus").prop("disabled", false);
        }
    });

    $(".minus").click(function (e) {
        e.preventDefault();
        var card = $(this).closest(".card-body");
        var harga = card.find("#harga").val();
        var qty = card.find("#qty").val();

        var tambah = parseInt(qty) - 1;
        card.find("#qty").val(tambah);

        var subtotal = parseInt(harga) * parseInt(tambah);
        card.find(".total").val(subtotal);

        if (qty <= 1) {
            card.find(".minus").prop("disabled", true);
        }
    });
    $(".card-body").each(function () {
        var card = $(this);
        var harga = card.find("#harga").val();
        var qty = card.find("#qty").val();
        var total = parseInt(harga) * parseInt(qty);
        card.find("#total").val(total);
    });
});

$(document).ready(function () {
    $(".eksp").change(function (e) {
        e.preventDefault();
        var eksp = $(".eksp").val();

        if (eksp === "jnt") {
            var ongkir = $(".ongkir").val(9000);
        } else if (eksp === "jne") {
            var ongkir = $(".ongkir").val(10000);
        } else if (eksp === "sicepat") {
            var ongkir = $(".ongkir").val(8000);
        } else if (eksp === "ninja") {
            var ongkir = $(".ongkir").val(9500);
        } else {
            var ongkir = $(".ongkir").val(0);
        }

        $(".pembayaran").each(function () {
            var card = $(this);
            var totalBelanja = card.find(".totalBelanja").val();
            var disc = card.find(".discount").val();
            var totalDisc = parseInt(totalBelanja) * parseFloat(disc);
            var ongkir = card.find(".ongkir").val();

            var subtotal = parseInt(totalBelanja) + parseInt(ongkir);
            card.find(".dibayarkan").val(subtotal);
            // card.find('.ppn').val(ppn);

            $("#bayar").on("input", function () {
                var bayar = $("#bayar").val();
                var kembali = parseInt(bayar) - parseInt(subtotal);
                $("#kembalian").val(kembali);
            });
        });
    });
});
