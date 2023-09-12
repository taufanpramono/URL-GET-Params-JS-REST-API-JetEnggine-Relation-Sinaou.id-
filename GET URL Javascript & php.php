<!-- ================================================================== -->
<!-- cara mengirim value dari URL GET Parameter ke form field id        -->
<!-- ================================================================== -->

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

//============================================================
// menggunakan Plugin ACF (Advanced Custom Field) Pro 
// Update : 11/09/2023
//============================================================


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





//=============================================================
// menggunakan (crocoblock) jet enggine metabox / meta field, 
// Update : 11/09/2023
//=============================================================

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





//====================================================================
// GET Nama Guru (Post Type Name) get_the_title()
// Update : 11/09/2023
//====================================================================

function dapetin_nilai_nama_guru() {
    $namaguru = get_the_title(); //ambil nama guru / title 
    return $namaguru;
}
add_shortcode('nama_guru','dapetin_nilai_nama_guru');




//====================================================================
// REST API Relational data JETEnggine antar post type
// Update : 11/09/2023
// Project Name : https://sinaou.id/
//====================================================================


function dapetin_nama_kursus() {
    $url_json = 'https://https://sinaou.id/wp-json/jet-rel/20'; //REST API relasional data 
    $jsondata = file_get_contents($url_json);
    //conversion to array
    $array = json_decode($jsondata, true);
    // var_dump($array);
    // cek id saat ini yang tersedia di post
    $post_type_id = get_the_id();
    $sample_array = $array[$post_type_id];  
    
    if (empty($sample_array)) {
        $data_kosong = 'Data Kursus Kosong';
        return $data_kosong;
    }
    else {  
        $dapatkan_judul = [];
        foreach ($sample_array as $sample) {
            $dapatkan_judul[] = get_the_title($sample['child_object_id']);
        }
        //var_dump ($dapatkan_judul); //debug array
        $data_final_string = implode(', ',$dapatkan_judul); 
    }
    return $data_final_string;
}
add_shortcode('nama_kursus','dapetin_nama_kursus');


?>






