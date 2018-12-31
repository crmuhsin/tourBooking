<?php
	
	if(isset($_POST['submit']) )
	{
		$radio=$_POST['radio'];
		if($radio=="form1")
		{
			Session::set("destination", $_POST['destination1']);

			
		echo "<script>window.location='search_results.php?search=hotel';</script>";
			
			
		}
		else if($radio=="form3")
		{
			Session::set("destinationfrom", $_POST['destination3']);
			Session::set("destinationto", $_POST['destination4']);


		echo "<script>window.location='search_results_bus.php?search=bus';</script>";
			
		}		
		
		else if($radio=="form5")
		{
			Session::set("destination", $_POST['destination5']);
			
		echo "<script>window.location='search_results.php?search=package';</script>";
			
		}
		
	} 
	
	
?>
	<!--search-->
	<div class="main-search">
		<form id="main-search" method="post">
			<!--column-->
			<div class="column radios">
				<h4><span>01</span> What?</h4>
				<div class="f-item" >
					<input type="radio" name="radio" id="hotel" value="form1" checked/>
					<label for="hotel">Hotel</label>
				</div>

				<div class="f-item">
					<input type="radio" name="radio" id="bus" value="form3" />
					<label for="bus">Bus</label>
				</div>

				<div class="f-item" >
					<input type="radio" name="radio" id="packages" value="form5" />
					<label for="packages">Package</label>	
				</div>

			</div>
			<!--//column-->
			
			<div class="forms">
				<!--form hotel-->
				<div class="form" id="form1">
					<!--column-->
					<div class="column">
						<h4><span>02</span> Where?</h4>
						<div class="f-item">
							<label for="destination1">Your destination</label>
							<input type="text" placeholder="City, region, district or specific hotel" id="destination1" name="destination1" />
						</div>
					</div>
					<!--//column-->
					
					<!--column-->
					<div class="column twins">
						<h4><span>03</span> When?</h4>
						<div class="f-item datepicker">
							<label for="datepicker1">Check-in date</label>
							<div class="datepicker-wrap"><input type="date" placeholder="" id="datepicker1" name="datepicker1" /></div>
						</div>
						<div class="f-item datepicker">
							<label for="datepicker2">Check-out date</label>
							<div class="datepicker-wrap"><input type="date" placeholder="" id="datepicker2" name="datepicker2" /></div>
						</div>
					</div>
					<!--//column-->
				
					<!--column-->
					<div class="column triplets">
						<h4><span>04</span> Who?</h4>
						<div class="f-item spinner">
							<label for="spinner1">Rooms</label>
							<input type="text" placeholder="" id="spinner1" name="spinner1" />
						</div>
						<div class="f-item spinner">
							<label for="spinner2">Adults</label>
							<input type="text" placeholder="" id="spinner2" name="spinner1" />
						</div>
						<div class="f-item spinner">
							<label for="spinner3">Children</label>
							<input type="text" placeholder="" id="spinner3" name="spinner1" />
						</div>
					</div>
					<!--//column-->
				</div>	
				<!--//form hotel-->


				
				<!--form bus-->
				<div class="form" id="form3">
					<!--column-->
					<div class="column">
						<h4><span>02</span> Where?</h4>
						<div class="f-item">
							<label for="destination3">Leaving from</label>
							<input type="text" placeholder="City, region, district or specific airport" id="destination3" name="destination3" />
						</div>
						<div class="f-item">
							<label for="destination4">Going to</label>
							<input type="text" placeholder="City, region, district or specific airport" id="destination4" name="destination4" />
						</div>
					</div>
					<!--//column-->
					
					<!--column-->
					<div class="column two-childs">
						<h4><span>03</span> When?</h4>
						<div class="f-item datepicker">
							<label for="datepicker6">Departing on</label>
							<div class="datepicker-wrap"><input type="date" placeholder="" id="datepicker6" name="datepicker6" /></div>
							<select>
								<option>Select time</option>
								<option>Lowest fare</option>
								<option>Morning</option>
								<option>Midday</option>
								<option>Afternoon</option>
								<option>Evening</option>
							</select>
						</div>
						<div class="f-item datepicker">
							<label for="datepicker7">Arriving on</label>
							<div class="datepicker-wrap"><input type="date" placeholder="" id="datepicker7" name="datepicker7" /></div>
							<select>
								<option>Select time</option>
								<option>Lowest fare</option>
								<option>Morning</option>
								<option>Midday</option>
								<option>Afternoon</option>
								<option>Evening</option>
							</select>
						</div>
					</div>
					<!--//column-->
				
					<!--column-->
					<div class="column triplets">
						<h4><span>04</span> Who?</h4>
						<div class="f-item spinner">
							<label for="spinner6">Adults</label>
							<input type="text" placeholder="" id="spinner6" name="spinner6" />
						</div>
						<div class="f-item spinner">
							<label for="spinner7">Children</label>
							<input type="text" placeholder="" id="spinner7" name="spinner7" />
						</div>
						<div class="f-item spinner">
							<label for="spinner8">Infants</label>
							<input type="text" placeholder="" id="spinner8" name="spinner8" />
						</div>
					</div>
					<!--//column-->
				</div>	
				<!--//form bus-->
				

				
				<!--form package-->
				<div class="form" id="form5">
					<!--column-->
					<div class="column">
						<h4><span>02</span> Where?</h4>
						<div class="f-item">
							<label for="destination5">Leaving from</label>
							<input type="text" placeholder="City, region, district or specific airport" id="destination5" name="destination5" />
						</div>
						<div class="f-item">
							<label for="destination6">Going to</label>
							<input type="text" placeholder="City, region, district or specific airport" id="destination6" name="destination6" />
						</div>
					</div>
					<!--//column-->
					
					<!--column-->
					<div class="column two-childs">
						<h4><span>03</span> When?</h4>
						<div class="f-item datepicker">
							<label for="datepicker9">Departing on</label>
							<div class="datepicker-wrap"><input type="date" placeholder="" id="datepicker9" name="datepicker9" /></div>
							<select>
								<option>Select time</option>
								<option>Lowest fare</option>
								<option>Morning</option>
								<option>Midday</option>
								<option>Afternoon</option>
								<option>Evening</option>
							</select>
						</div>
						<div class="f-item datepicker">
							<label for="datepicker10">Arriving on</label>
							<div class="datepicker-wrap"><input type="date" placeholder="" id="datepicker10" name="datepicker10" /></div>
							<select>
								<option>Select time</option>
								<option>Lowest fare</option>
								<option>Morning</option>
								<option>Midday</option>
								<option>Afternoon</option>
								<option>Evening</option>
							</select>
						</div>
					</div>
					<!--//column-->
				
					<!--column-->
					<div class="column triplets">
						<h4><span>04</span> Who?</h4>
						<div class="f-item spinner">
							<label for="spinner10">Adults</label>
							<input type="text" placeholder="" id="spinner10" name="spinner10" />
						</div>
						<div class="f-item spinner">
							<label for="spinner11">Children</label>
							<input type="text" placeholder="" id="spinner11" name="spinner11" />
						</div>
						<div class="f-item spinner">
							<label for="spinner12">Rooms</label>
							<input type="text" placeholder="" id="spinner12" name="spinner12" />
						</div>
					</div>
					<!--//column-->
				</div>	
				<!--//form package-->
				

			</div>
			<input type="submit" name="submit" value="Proceed to results" class="search-submit" id="search-submit" />
		</form>
	</div>
	<!--//search-->