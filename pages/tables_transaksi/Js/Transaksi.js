//Read
$(document).ready(function(){
	// View Data
     $(document).on('click', '.VIEW', function(){
        var employee_id=$(this).attr("id");
        $.ajax({
         method:"POST",
         url:"notifView.php",
         data:{employee_id:employee_id},
         success:function(data){
          $('#dataModal').modal('show');
          $('#viewNotifikasi').html(data);
         }
        });
	   });
	   
	var dataTable = $('#Service_Data').DataTable({
		ajax: "data.json",
		"serverSide":true,
		"bLengthChange": false,
		"bFilter": true,
		"bInfo": false,
		"bAutoWidth": false,
		"searching": false,
		"order":[],
		
		"ajax":{
			url:"fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
		],
	});
	 
	setInterval( function () {
		dataTable.ajax.reload( null, false ); // user paging is not reset on reload
	},3000 );
    
	
     
	//Decline Data 
	$(document).on('click','.decline',function(){

		swal({
			title: "Tolak Permintaan?",
			text: "Permintaan tidak dapat dipulihkan setelah ditolak!",
			icon: "warning",
			buttons: ["Batal", "Ya!"],
			dangerMode: true,
		  })
		  .then((willDelete) => {
			if (willDelete) {
				var idTransaksi = $(this).attr("id");
		
			$.ajax({
				url:"decline.php",
				method:"POST",
				data:{idTransaksi:idTransaksi},
				success:function(data)
				{
					dataTable.ajax.reload();
				}
			});
			  swal("Your Data Deleted", {
				icon: "success",
			  });
			} 
		  });


	})

	//Accept Data 
	$(document).on('click','.accept',function(){

		swal({
			title: "Setuju?",
			text: "Setelah permintaan disetujui, Silahkan klik COMPLETE apabila status pengerjaan sudah selesai!",
			icon: "info",
			buttons: ["Batal", "Setuju!"],
			dangerMode: false,
		  })
		  .then((willDelete) => {
			if (willDelete) {
				var idTransaksi = $(this).attr("id");
		
			$.ajax({
				url:"accept.php",
				method:"POST",
				data:{idTransaksi:idTransaksi},
				success:function(data)
				{
					dataTable.ajax.reload();
				}
			});
			  swal("Anda menyetujui permintaan user!", {
				icon: "success",
			  });
			} 
		  });
	})
	
	//Proses Data 
	$(document).on('click','.proses',function(){

		swal({
			title: "Sudah Selesai?",
			text: "Pemberitahuan akan dikirim ke User!",
			icon: "info",
			buttons: ["Belum", "Complete!"],
			dangerMode: false,
		  })
		  .then((willDelete) => {
			if (willDelete) {
				var idTransaksi = $(this).attr("id");
		
			$.ajax({
				url:"proses.php",
				method:"POST",
				data:{idTransaksi:idTransaksi},
				success:function(data)
				{
					dataTable.ajax.reload();
				}
			});
			  swal("Anda menyetujui permintaan user!", {
				icon: "success",
			  });
			} 
		  });
	})

	//Complete Data 
	$(document).on('click','.complete',function(){

		swal({
			title: "Apakah barang sudah diambil?",
			text: "Pemberitahuan akan dikirim ke User!",
			icon: "info",
			buttons: ["Belum", "Complete!"],
			dangerMode: false,
		  })
		  .then((willDelete) => {
			if (willDelete) {
				var idTransaksi = $(this).attr("id");
		
			$.ajax({
				url:"complete.php",
				method:"POST",
				data:{idTransaksi:idTransaksi},
				success:function(data)
				{
					dataTable.ajax.reload();
				}
			});
			  swal("Pemberitahuan sudah dikirim!", {
				icon: "success",
			  });
			} 
		  });
	})
    
    
});