// menyembunyikan form tempat penjemputan jika hanya menyewa mobil
if ($("#tipe_peminjaman").val() == "1"){
  $('#lokasi_penjemputan').hide();
}

$("#tipe_peminjaman").change(function() {
  if ($(this).val() == "1") {
    $('#lokasi_penjemputan').hide();
  } else {
    $('#lokasi_penjemputan').show();
  }
});
