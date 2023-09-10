<!-- ========================================== -->
<!-- cara mengirim value dari URL GET Parameter ke form field id -->
<!-- ========================================== -->

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

//======================
//menggunakan ACF Field, cara panggil nilai dari custom field  kodenya & caranya seperti dibawah
//======================


function dapetin_nilai_nama_guru() {
    $namaguru = get_field('nama_guru');
    return $namaguru;
}
add_shortcode('nama_guru','dapetin_nilai_nama_guru'); // cara panggil di acf


function dapetin_nama_kursus() {
    $namakursus = get_field('nama-materi-kursus'); //cara panggil di acf
    return $namakursus;
}
add_shortcode('nama_kursus','dapetin_nama_kursus');






//======================
//menggunakan (crocoblock) jet enggine metabox / meta field, cara panggil nilai dari meta field kodenya & caranya seperti dibawah
//======================

function dapetin_nilai_nama_guru() {
    $namaguru = get_post_meta( get_the_ID(), 'nama-guru', true ); //cara panggil jet enggine metafield
    return $namaguru;
}
add_shortcode('nama_guru','dapetin_nilai_nama_guru');


function dapetin_nama_kursus() {
    $namakursus = get_post_meta( get_the_ID(), 'nama-materi-kursus', true ); //cara panggil jet enggine metafield
    return $namakursus;
}
add_shortcode('nama_kursus','dapetin_nama_kursus');


//cara pemanggilan metafiled crocoblock dapat dilakukan dengan 2 cara 
// 1. plain WP API  
get_post_meta( get_the_ID(), 'field_key', true );
// 2. with JetEngine API 
jet_engine()->listings->data->get_meta( 'field_key' );




 ?>




