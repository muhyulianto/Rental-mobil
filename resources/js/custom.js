// menyembunyikan form tempat penjemputan jika hanya menyewa mobil
if ($("#services_type").val() == "1") {
    $("#pickup_location").hide();
}

$("#services_type").change(function() {
    if ($(this).val() == "1") {
        $("#pickup_location").hide();
    } else {
        $("#pickup_location").show();
    }
});
