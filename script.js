	$(document).ready(function(){

		$('.edit').click(function(){
			var listingId = $(this).closest('tr').attr('id');
			$(this).addClass('hidden');
			$('#save_'+listingId).removeClass('hidden');
			$('#mobile_edit_'+listingId).removeClass('hidden');
			$('#mobile_'+listingId).addClass('hidden');
		});

		$('.save').click(function(){
			var listingId = $(this).closest('tr').attr('id');
			var ph = $('#mobile_data_'+listingId).val();
			$.ajax({
				type:"POST",
				data:{mobile:ph,id:listingId,action:'update'},
				id:listingId,
				mobile:ph,
				action:'update',
				success:callback
			});
		});

		$('.delete').click(function(){
			var listingId = $(this).closest('tr').attr('id');
			$('#'+listingId).addClass('hidden');
			$.ajax({
				type:"POST",
				data:{id:listingId,action:'delete'},
				id:listingId,
				action:'delete',
				success:callback
			});
		});


	});


	function callback(data, status){
			var listingId = this.id;
			if(this.action=='update'){
				$('#mobile_'+listingId).html(this.mobile);
				$('#save_'+listingId).addClass('hidden');
				$('#mobile_edit_'+listingId).addClass('hidden');
				$('#mobile_'+listingId).removeClass('hidden');
				$('#edit_'+listingId).removeClass('hidden');
			}
			if(this.action=='delete'){
				location.reload();
			}
	}
