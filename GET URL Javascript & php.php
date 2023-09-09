<script type="text/javascript">
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;
    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

var NamaGuru = getUrlParameter('namaguru');
var MataKursus = getUrlParameter('matakursus');


if (NamaGuru != null) {
document.getElementById('form-field-namaguru').value = NamaGuru;
}
else {
   document.getElementById('form-field-namaguru').value = "Nama Guru belum dipilih";
}


if (MataKursus != null) {
document.getElementById('form-field-matakursus').value = MataKursus;
}
else {
   document.getElementById('form-field-matakursus').value = "Mata kursus belum dipilih";
}

</script>


<?php 


function dapetin_nilai_nama_guru() {
    $namaguru = get_field('nama_guru');
    return $namaguru;
}
add_shortcode('nama_guru','dapetin_nilai_nama_guru');


function dapetin_nama_kursus() {
    $namakursus = get_field('pelajaran_yang_di_ampuh');
    return $namakursus;
}
add_shortcode('nama_kursus','dapetin_nama_kursus');



 ?>

