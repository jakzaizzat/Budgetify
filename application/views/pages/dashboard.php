<h1>Hey, Aizzat</h1>
				
    <div class="columns">

        <div class="column is-half">
            <div class="box stats">
                <h2>Quick Stats View</h2>
                
                <div class="columns">
                    <div class="column is-half stat-detail">
                        <div class="stat-bg">
                            <span>3721</span>
                            <p>Performed Transactions</p>
                        </div>
                    </div>
                    <div class="column is-half stat-detail">
                            <div class="stat-bg">
                                <span>3721</span>
                                <p>Performed Transactions</p>
                            </div>
                        </div>
                </div>

                <div class="columns">
                    <div class="column is-half stat-detail">
                        <div class="stat-bg">
                            <span>3721</span>
                            <p>Performed Transactions</p>
                        </div>
                    </div>
                    <div class="column is-half stat-detail">
                            <div class="stat-bg">
                                <span>3721</span>
                                <p>Performed Transactions</p>
                            </div>
                        </div>
                </div>

            </div>
        </div>

        <div class="column is-half">
            <div class="box stats">
                    <h2>Quick Stats</h2>
                    <canvas id="myChart"></canvas>
                </div>
        </div>


    </div>

    <div class="columns">
            
            <div class="column is-4">
                <div class="box stats bot-report">
                    <h2>Transaction Stats</h2>
                    
                    <span>Keep Going, Jakz</span>
                    <p>You've been keeping your track record green, which means that you are on spot with your pre-adjusted budgets</p>

                </div>
            </div>

            <div class="column is-4">
                <div class="box stats">
                        <h2>Monthly Transactions</h2>
                        <canvas id="myChart2"></canvas>
                    </div>
            </div>

            <div class="column is-4">
                    <div class="box stats stats-budget">
                            <h2>Budget</h2>
                            
                            <p>Food</p>
                            <progress class="progress is-primary" value="30" max="100">30%</progress>
                        
                            <p>Transportation</p>
                            <progress class="progress is-info" value="30" max="100">30%</progress>

                            
                            <p>Utilities</p>
                            <progress class="progress is-danger" value="30" max="100">30%</progress>
                        </div>
                </div>


        </div>

        <script
	src="https://code.jquery.com/jquery-2.2.4.min.js"
	integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
	crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	
	<script type="text/javascript">
			var ctx = document.getElementById("myChart");
			var myChart = new Chart(ctx, {
					type: 'line',
					data: {
							labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
							datasets: [{
									label: '# of Votes',
									data: [12, 19, 3, 5, 2, 3],
									backgroundColor: [
											'rgba(255, 99, 132, 0.2)',
											'rgba(54, 162, 235, 0.2)',
											'rgba(255, 206, 86, 0.2)',
											'rgba(75, 192, 192, 0.2)',
											'rgba(153, 102, 255, 0.2)',
											'rgba(255, 159, 64, 0.2)'
									],
									borderColor: [
											'rgba(255,99,132,1)',
											'rgba(54, 162, 235, 1)',
											'rgba(255, 206, 86, 1)',
											'rgba(75, 192, 192, 1)',
											'rgba(153, 102, 255, 1)',
											'rgba(255, 159, 64, 1)'
									],
									borderWidth: 1
							}]
					},
					options: {
							scales: {
									yAxes: [{
											ticks: {
													beginAtZero:true
											}
									}]
							}
					}
			});

			</script>