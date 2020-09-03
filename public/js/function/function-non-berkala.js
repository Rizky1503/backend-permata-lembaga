// ========================================================================================================

// Restricts input for the given textbox to the given inputFilter.
function setInputFilter(textbox, inputFilter) {
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
    textbox.addEventListener(event, function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      }
    });
  });
}
setInputFilter(document.getElementById("asumsi_inflansi"), function(value) {
  return /^-?\d*[.,]?\d*$/.test(value); 
});
setInputFilter(document.getElementById("target_kinerja_investasi_per_tahun"), function(value) {
  return /^-?\d*[.,]?\d*$/.test(value); 
});

setInputFilter(document.getElementById("usia_mulai"), function(value) {
  return /^-?\d*$/.test(value); 
});
setInputFilter(document.getElementById("usia_selesai"), function(value) {
  return /^-?\d*$/.test(value); 
});

$('#usia_mulai').on('change',function(){
    var usia_mulai_pan_investasi = $('#usia_mulai_pan_investasi').val();
    if (this.value < usia_mulai_pan_investasi) {
        $('#usia_mulai').val(usia_mulai_pan_investasi);
    }
});

$('#usia_selesai').on('change',function(){
    var usia_mulai = $('#usia_mulai').val();
    if (this.value < usia_mulai) {
        $('#usia_selesai').val(usia_mulai);
    }
});


function BerkalaCounting(){
    $.ajax({
        type:'GET',
        url:url,
        data:{
            date_birth : date_birth,
            start_invest : $('#m_datepicker_1').val()
        },
        success:function(DataResult){  
            $('#usia_mulai_pan_investasi').val(DataResult);
            functionUsiaMulai();
            functionUsiaSelesai();    
            kebutuan_per_bulan_masaa_depan();
            kebutuhan_per_tahun_masa_depan();
            kebutuhan_berkala_terkumpul_pada_saat_mulai();
            kebutuhan_awal_terkumpul_pada_saat_mulai();
            total_target_dana_terkumpul_masa_depan();
            target_kinerja_indestasi_per_bulan();
            rencana_investasi_setiap_tahun();
            rencana_investasi_setiap_bulan();            
        }
    });
}

function functionUsiaMulai(){
    var countsa = $('#usia_mulai').val();
    var countb = $('#usia_mulai_pan_investasi').val();
    if (countsa == "") {
        var counta = countb;
    }else{
        var counta = countsa;

    }
    var masa_investasi = counta - countb;
    $('#masa_investasi').val(masa_investasi);
}


function functionUsiaSelesai(){
    var countsa = $('#usia_selesai').val();
    if (countsa == "") {
        var counta = 0;
    }else{
        var counta = countsa;

    }

    var countsb = $('#usia_mulai').val();
    if (countsb == "") {
        var countb = 0;
    }else{
        var countb = countsb;

    }
    var masa = counta - countb;
    $('#masa').val(masa);
}



function kebutuan_per_bulan_masaa_depan(){
    var kebutuhan_berkala_bulan_masa_kinis   = $('#kebutuhan_berkala_bulan_masa_kini').val();
    if (kebutuhan_berkala_bulan_masa_kinis == "") {
        var kebutuhan_berkala_bulan_masa_kini   = 0;
    }else{        
        var kebutuhan_berkala_bulan_masa_kini   = kebutuhan_berkala_bulan_masa_kinis.replace(/\./g,'');
    }

    var asumsi_inflansi_value               = $('#asumsi_inflansi').val();
    if (asumsi_inflansi_value == "") {
        var asumsi_inflansi                 = 0;
    }else{
        var asumsi_inflansi                 = asumsi_inflansi_value
    }

    var masa_investasi                      = $('#masa_investasi').val();

    var pangkat                             = Math.pow(1 + asumsi_inflansi / 100, masa_investasi);

    var kali                                = Math.floor(kebutuhan_berkala_bulan_masa_kini * pangkat);

     // value sub total
    var number_string = kali.toString(),
        sisa    = number_string.length % 3,
        rupiah  = number_string.substr(0, sisa),
        ribuan  = number_string.substr(sisa).match(/\d{3}/g);
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    $('#kebutuhan_per_bulan_masa_depan').val(rupiah);

}


function kebutuhan_per_tahun_masa_depan(){
    var kebutuhan_per_bulan_masa_depan  = $('#kebutuhan_per_bulan_masa_depan').val();
    var total                           = Math.floor(kebutuhan_per_bulan_masa_depan.replace(/\./g,'') * 12);

     // value sub total
    var number_string = total.toString(),
        sisa    = number_string.length % 3,
        rupiah  = number_string.substr(0, sisa),
        ribuan  = number_string.substr(sisa).match(/\d{3}/g);
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    $('#kebutuhan_per_tahun_masa_depan').val(rupiah);
}



function kebutuhan_berkala_terkumpul_pada_saat_mulai(){
    var kebutuhan_per_tahun_masa_depan  = $('#kebutuhan_per_tahun_masa_depan').val();
    var masa                            = $('#masa').val();        
    var total                           = Math.floor(kebutuhan_per_tahun_masa_depan.replace(/\./g,'') * masa);

     // value sub total
    var number_string = total.toString(),
        sisa    = number_string.length % 3,
        rupiah  = number_string.substr(0, sisa),
        ribuan  = number_string.substr(sisa).match(/\d{3}/g);
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    $('#kebutuhan_berkala_terkumpul_pada_saat_mulai').val(rupiah);
}


function kebutuhan_awal_terkumpul_pada_saat_mulai(){
    var kebutuhan_dana_awal_bulan_masa_kinis     = $('#kebutuhan_dana_awal_bulan_masa_kini').val();
    if (kebutuhan_dana_awal_bulan_masa_kinis == "") {
        var kebutuhan_dana_awal_bulan_masa_kini   = 0;
    }else{
        var kebutuhan_dana_awal_bulan_masa_kini   = kebutuhan_dana_awal_bulan_masa_kinis.replace(/\./g,'');
    }

    var asumsi_inflansi_value               = $('#asumsi_inflansi').val();
    if (asumsi_inflansi_value == "") {
        var asumsi_inflansi                 = 0;
    }else{
        var asumsi_inflansi                 = asumsi_inflansi_value
    }
    var masa_investasi                          = $('#masa_investasi').val();

    var pangkat                                 = Math.pow(1 + asumsi_inflansi / 100, masa_investasi);

    var kali                                    = Math.floor(kebutuhan_dana_awal_bulan_masa_kini * pangkat);

     // value sub total
    var number_string = kali.toString(),
        sisa    = number_string.length % 3,
        rupiah  = number_string.substr(0, sisa),
        ribuan  = number_string.substr(sisa).match(/\d{3}/g);
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    $('#kebutuhan_awal_terkumpul_pada_saat_mulai').val(rupiah);

}


function total_target_dana_terkumpul_masa_depan(){
    var kebutuhan_berkala_terkumpul_pada_saat_mulai = $('#kebutuhan_berkala_terkumpul_pada_saat_mulai').val();
    var kebutuhan_awal_terkumpul_pada_saat_mulai    = $('#kebutuhan_awal_terkumpul_pada_saat_mulai').val();
    var total                                       = parseInt(kebutuhan_berkala_terkumpul_pada_saat_mulai.replace(/\./g,'')) + parseInt(kebutuhan_awal_terkumpul_pada_saat_mulai.replace(/\./g,''));

     // value sub total
    var number_string = total.toString(),
        sisa    = number_string.length % 3,
        rupiah  = number_string.substr(0, sisa),
        ribuan  = number_string.substr(sisa).match(/\d{3}/g);
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    $('#total_target_dana_terkumpul_masa_depan').val(rupiah);
}



function target_kinerja_indestasi_per_bulan(){
    var target_kinerja_investasi_per_tahuns  = $('#target_kinerja_investasi_per_tahun').val();
    if (target_kinerja_investasi_per_tahuns == "") {
        var target_kinerja_investasi_per_tahun  = 0;
    }else{
        var target_kinerja_investasi_per_tahun  = target_kinerja_investasi_per_tahuns;        
    }

    var pangkat                             = Math.pow(1 + target_kinerja_investasi_per_tahun / 100, 1 / 12);
    var kurang                              = pangkat - 1;
    var total                               = kurang *100;
    $('#target_kinerja_indestasi_per_bulan').val(total.toFixed(2));

}

function rencana_investasi_setiap_tahun(){
    var total_target_dana_terkumpul_masa_depan  = $('#total_target_dana_terkumpul_masa_depan').val();
    var target_kinerja_investasi_per_tahuns  = $('#target_kinerja_investasi_per_tahun').val();
    if (target_kinerja_investasi_per_tahuns == "") {
        var target_kinerja_investasi_per_tahun  = 0;
    }else{
        var target_kinerja_investasi_per_tahun  = target_kinerja_investasi_per_tahuns;        
    }    

    var masa_investasi                          = $('#masa_investasi').val();

    var nilai_pangkat_pertama                   =  Math.pow(1 + target_kinerja_investasi_per_tahun / 100, masa_investasi);
    var kurang                                  = nilai_pangkat_pertama - 1;
    var nilai_pertama                           = kurang * 100;
    var nilai_kedua                             = nilai_pertama / target_kinerja_investasi_per_tahun / 100;
    var nilai_ketiga                            =  total_target_dana_terkumpul_masa_depan.replace(/\./g,'') / nilai_kedua;

    var pembagian_akhir                         =   1 + target_kinerja_investasi_per_tahun;
    var nilai_keempat                           = nilai_ketiga / pembagian_akhir;
    var number_string = Math.floor(nilai_keempat).toString(),
        sisa    = number_string.length % 3,
        rupiah  = number_string.substr(0, sisa),
        ribuan  = number_string.substr(sisa).match(/\d{3}/g);
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    $('#rencana_investasi_setiap_tahun').val(rupiah);
}





function rencana_investasi_setiap_bulan(){
    var total_target_dana_terkumpul_masa_depan = $('#total_target_dana_terkumpul_masa_depan').val(); //C17
    var target_kinerja_investasi_per_tahuns  = $('#target_kinerja_investasi_per_tahun').val(); //C20
    if (target_kinerja_investasi_per_tahuns == "") {
        var target_kinerja_investasi_per_tahun  = 0;
    }else{
        var target_kinerja_investasi_per_tahun  = target_kinerja_investasi_per_tahuns;        
    }    
    var masa_investasi                         = $('#masa_investasi').val(); // c8

    // (C17/((((1+(C20/12))^(C8*12))-1)/(C20/12))) /(1+C20/12)
    var percent     = target_kinerja_investasi_per_tahun / 100; //C20
    var angka1      = Math.pow(1 + percent / 12, masa_investasi * 12); // ((1+(C20/12))^(C8*12))
    var angka2      = angka1 - 1; //(((1+(C20/12))^(C8*12))-1)
    var angka2_constanta = angka2 * 100; // //(((1+(C20/12))^(C8*12))-1) -> diconstantakan
    var angka3              =  percent / 12; //(C20/12)
    var angka3_constanta    = angka3 * 100; //(C20/12) -> diconstantakan
    var angka4              = angka2_constanta / angka3_constanta;//((((1+(C20/12))^(C8*12))-1)/(C20/12))
    var angka5  = total_target_dana_terkumpul_masa_depan.replace(/\./g,'') / angka4; //(C17/((((1+(C20/12))^(C8*12))-1)/(C20/12)))
    var angka6  = 1 + percent / 12; //(1+C20/12)
    var angka7  = angka5 / angka6; //(C17/((((1+(C20/12))^(C8*12))-1)/(C20/12))) /(1+C20/12) 

    var number_string = angka7.toFixed(2).toString(),
        sisa    = number_string.length % 3,
        rupiah  = number_string.substr(0, sisa),
        ribuan  = number_string.substr(sisa).match(/\d{3}/g);
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    $('#rencana_investasi_setiap_bulan').val(rupiah);
}



function Functioncompile(){
    BerkalaCounting();    
}


$(document).on("keyup","#asumsi_inflansi , #priceClass, #usia_mulai, #usia_selesai, #kebutuhan_berkala_bulan_masa_kini, #kebutuhan_dana_awal_bulan_masa_kini, #target_kinerja_investasi_per_tahun", function(){ //user click on remove text 
    Functioncompile();
});

$(document).on("change","#m_datepicker_1 ,#asumsi_inflansi , #priceClass, #usia_mulai, #usia_selesai, #kebutuhan_berkala_bulan_masa_kini, #kebutuhan_dana_awal_bulan_masa_kini, #target_kinerja_investasi_per_tahun", function(){ //user click on remove text 
    Functioncompile();
});


var kebutuhan_berkala_bulan_masa_kini = document.getElementById('kebutuhan_berkala_bulan_masa_kini');
kebutuhan_berkala_bulan_masa_kini.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    kebutuhan_berkala_bulan_masa_kini.value = formatRupiah(this.value);
    kebutuan_per_bulan_masaa_depan();
});


var kebutuhan_dana_awal_bulan_masa_kini = document.getElementById('kebutuhan_dana_awal_bulan_masa_kini');
kebutuhan_dana_awal_bulan_masa_kini.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    kebutuhan_dana_awal_bulan_masa_kini.value = formatRupiah(this.value);
    kebutuan_per_bulan_masaa_depan();
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split           = number_string.split(','),
    sisa            = split[0].length % 3,
    rupiah          = split[0].substr(0, sisa),
    ribuan          = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}







// ==============================================================================================================
var Select2 = {
    init: function() {
        $("#m_select2_1").select2({
            placeholder: "Select a state"
        })
    }
};

var BootstrapDatepicker = {
    init: function() {
        $("#m_datepicker_1").datepicker({
            todayHighlight: !0,
            orientation: "bottom left",
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            },
            format: 'd M yyyy',
            autoclose:true,
        }).on('change', function(){
            $('.datepicker').hide();
        });    
    }
};






jQuery(document).ready(function() {
    BootstrapDatepicker.init();
    Select2.init();
    Functioncompile();
});        