var x = 1;

function cek(){ //function untuk mengecek pesan 
    $.ajax({
        url: "../notification/cek.php", //script php untuk mengecek pesan, didalamnya berupa query select
        cache: false,
        success: function(msg){ 
            $("#jumlah").html(msg);
        }
    });
    var waktu = setTimeout("cek()",2000);
}

$(document).ready(function(){  //event pada saat document telah selesai loadingnya
    cek();
    $("#notifikasi").click(function(){ //pada saat diklik link message akan muncul daftar pesannya
        $("#loading").show();
        if(x==1){
            $("#notifikasi").css("background-color","#4B59a9");
            x = 0;
        }else{
            $("#notifikasi").css("background-color","#4B59a9");
            x = 1;
        }
        $("#info").toggle();
        //ajax untuk menampilkan pesan yang belum terbaca
        $.ajax({
            url: "../notification/lihat.php",
            cache: false,
            success: function(msg){
                $("#loading").hide();
                $("#konten-info").html(msg);
            }
        });

    });
    $("#content").click(function(){
        $("#info").hide();
        $("#notifikasi").css("background-color","#4B59a9");
        x = 1;
    });
});