//Read
$(document).ready(function(){
	$('#add_button').click(function(){
		$('#service_form')[0].reset();
		$('.modal-title').text("Add Toko Service Komputer");
		$('#action').val("Add");
		$('#operation').val("Add");
	});
	
	var dataTable = $('#Service_Data').DataTable({
		ajax: "data.json",
		"serverSide":true,
		"bLengthChange": false,
		"bFilter": true,
		"searching": false,
		"bInfo": false,
		"bAutoWidth": false,
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

    //Add
	$(document).on('submit', '#service_form', function(event){
		event.preventDefault();
		var nama      = $('#nama_service').val();
		var harga     = $('#harga_service').val();
		var idService = $('#idService').val();
	
		if(nama != '')
		{
			$.ajax({
				url:"insert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					$('#service_form')[0].reset();
					$('#serviceModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Both Fields are Required");
		}
	});
    
    //Update Edit
	$(document).on('click', '.update', function(){
		var id_nama_service = $(this).attr("id");
		$.ajax({
			url:"fetch_single.php",
			method:"POST",
			data:{id_nama_service:id_nama_service},
			dataType:"json",
			success:function(data)
			{
				$('#serviceModal').modal('show');
				$('.modal-title').text("Edit Daftar Service");
				
				$('#id_nama_service').val(id_nama_service);
				$('#nama_service').val(data.nama_service);
				$('#harga_service').val(data.harga_service);
				$('#idService').val(data.idService);
				
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	   
	//Delete Data 
	$(document).on('click','.delete',function(){

		swal({
			title: "Hehe gimana nih?",
			text: "Once deleted, you will not be able to recover this Data!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		  })
		  .then((willDelete) => {
			if (willDelete) {
				var id_nama_service = $(this).attr("id");
		
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{id_nama_service:id_nama_service},
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
});