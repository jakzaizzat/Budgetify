
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


			//Close notification			
			$('.notification > button.delete').click(function(){
				$(this).parent().addClass('is-hidden');
			});

			//Set default date
			var date = new Date().toISOString().slice(0,10);;
			$('#datePicker').val(date);

			$('#form').attr('action', '<?php echo base_url() ?>transactions/ajax_add');
			list_transactions();
			$('#table').DataTable();

			
			var balance = parseFloat($('#balance').text());

			//Get value from user
			$('input[name=amount]').keyup(function(){
				var val = parseFloat($('input[name=amount]').val());
				
				var flow_balance = $('select[name=flow]').val();

				if(flow_balance == "Expense"){
					var new_balance = balance - val;
				}else{
					var new_balance = balance + val;
				}
				$('#balance').text(new_balance.toFixed(2));

			});

			$('#submit-btn').click(function(e){
				e.preventDefault();
				var url = $('#form').attr('action');
				var data = $('#form').serialize();

				var amount = $('input[name=amount]').val();
				var flow = $('input[name=flow]').val();

				
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
				});

				$('input[name=transaction_detail]').val('');
				$('input[name=amount]').val('');
				$('input[name=flow]').val('');
				$('input[name=category_id]').val(''); 


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

							var image = "";
							if(data[i].category_name == "Food"){
								image = "pizza";
							}else if(data[i].category_name == "Transportation"){
								image = "bus";
							}else if(data[i].category_name == "Utilities"){
								image = "electric";
							}else if(data[i].category_name == "Salary"){
								image = "salary";
							}


							html +=  '<tr class="budget-data">' +
													'<td>' +
														'<div class="data-details">' +
															'<span class="icon is-small text-right">' +
																'<img src="<?php echo base_url(); ?>/assets/img/'+ image +'.svg"/>' +
															'</span>' +
																'<div class="details-name">' +
																	'<span>'+ data[i].transaction_name +'</span>' +
																	' <p>'+ data[i].category_name +'</p>' +
																'</div>' +
														'</div>' +
													'</td>' +
													'<td>' +
														'<div class="data-dates has-text-centered">' +
															'<span>'+ data[i].created_at +'</span>' +
														'</div>' +
													'</td>' +
													'<td>' +
														'<div class="data-transaction has-text-centered">' ;

														if(data[i].transaction_flow == "Expense"){
																html += '<span class="transaction-expenses"> -'+ data[i].transaction_price + 'MYR </span>' +
																'<p>'+ data[i].transaction_flow +'</p>';
														} else{
																html += '<span class="transaction-income"> +'+ data[i].transaction_price + 'MYR </span>' +
																'<p>'+ data[i].transaction_flow +'</p>';
														}
							html += 							
														'</div>' +
													'</td>' +
													
													'<td>' +
														'<div class="table-action">' +
															'<a href="<?php echo base_url(); ?>transactions/edit/'+ data[i].transaction_id +'">' +
																'<i class="em em-wrench"></i> Edit' +
															'</a>' +
															'<form action="http://localhost/budgetify/transactions/delete/'+ data[i].transaction_id +'">' +
																'<button type="submit" class="button is-danger" onclick="confirm()" >' +
																	'<i class="em em-x"></i>Delete' +
																'</button>' +
															'</form>' +
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
			
			function confirm(){
				confirm("Are you sure want to delete this item?");
			}
		
		});
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

	<script type="text/javascript">
	$(function(){
		
		var income_api = "transactions/chart_api_income"; 
		var expense_api = "transactions/chart_api_expense"; 
		
		var dates=[], income=[], expense=[];

		$.when(
			$.getJSON(income_api),
			$.getJSON(expense_api)		
		).done(function(result1,result2){
			
			//console.log(result1[0].length);
			//console.log(result2);

			console.log("---------Income--------");

			//for (var i = 0; i < result1[0].length; i++) {
			//	dates.push(result1[0][i].created_at);
			//	income.push(result1[0][i].transaction_price);
				//console.log(result1[0][i].created_at + " = " + result1[0][i].transaction_price );
				
			//}
			
			console.log("---------Expense--------");

			for (var i = 0; i < result2[0].length; i++) {
				dates.push(result2[0][i].created_at);
				expense.push(result2[0][i].transaction_price);
				//console.log(result2[0][i].created_at + " = " + result2[0][i].transaction_price );
			}

			console.log(dates);

			var uniqueDates = [];
			$.each(dates, function(i, el){
				if($.inArray(el, uniqueDates) === -1) uniqueDates.push(el);
			});
			uniqueDates.sort();
			console.log(uniqueDates);

			var buyerData = {
				labels : dates,
				datasets : [
					{
					label: 'Expenses',
					data : expense,
					backgroundColor: ["#4BC0C0"]
					}
				]
			};

			var buyers = document.getElementById('myChart').getContext('2d');
	    
			var myLineChart = new Chart(buyers, {
				type: 'line',
				data: buyerData
			});

		});

	});
	</script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/script.js"/>
</body>
</html>