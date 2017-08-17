
        </div>
    </div>
    
	<footer class="footer">
	  <div class="container">
	    <div class="content has-text-centered">
	      <p>
	        Code with <i class="em em-heart_eyes_cat"></i>
	      </p>
	    </div>
	  </div>
	</footer>

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script>
		$(function(){

			$('#form').attr('action', '<?php echo base_url() ?>transactions/ajax_add');
			list_transactions();
			$('#table').DataTable();

			$('#submit-btn').click(function(e){
				e.preventDefault();
				var url = $('#form').attr('action');
				var data = $('#form').serialize();

				console.log(data);

				$.ajax({
					type: 'ajax',
					method: 'post',
					url: url,
					data: data,
					async: false,
					dataType: 'json',
					success: function(response){
						if(response.success){
						}else{
							alert("Error in response");
						}
					},
					error: function(data){
						alert("Could not add data");
					}
				}).done(function(){
					list_transactions();
				})

			});

			function list_transactions(){
				$.ajax({
					type: 'ajax',
					url: '<?php echo base_url() ?>transactions/ajax_list',
					async: false,
					dataType: 'json',
					success: function(data){
						var html = '';
						var i;

						for(i = 0; i < data.length; i++){
							html +=  '<tr class="budget-data">' +
													'<td>' +
														'<div class="data-details">' +
															'<span class="icon is-small text-right">' +
																'<img src="<?php echo base_url(); ?>/assets/img/pizza.svg"/>' +
															'</span>' +
																'<div class="details-name">' +
																	'<span>'+ data[i].category_name +'</span>' +
																	' <p>'+ data[i].transaction_name +'</p>' +
																'</div>' +
														'</div>' +
													'</td>' +
													'<td>' +
														'<div class="data-dates has-text-centered">' +
															'<span>'+ data[i].created_at +'</span>' +
															'<p>'+ data[i].created_at +'</p>' +
														'</div>' +
													'</td>' +
													'<td>' +
														'<div class="data-transaction has-text-centered">' +
																'<span class="transaction-expenses"> -'+ data[i].transaction_price + 'MYR </span>' +
																'<p>'+ data[i].transaction_flow +'</p>' +
														'</div>' +
													'</td>' +
                   ' </tr>';
						}
						$('#table_body').html(html);
					},
					error: function(){
						alert("Could not get from database");
					}
				})
			}
		});
	</script>

</body>
</html>