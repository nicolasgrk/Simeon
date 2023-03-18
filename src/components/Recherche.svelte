<section class="section">
	<div class="container">
		<div class="columns is-mobile">
			<div class="column is-four-fifths">
				<div class="field">
					<p class="control has-icons-left">
						<input class="input" id="searchBox" type="text" placeholder="Recherche...">
						<span class="icon is-small is-left" id="searchIconBackground">
							<i class="fas fa-search"></i>
						</span>
					</p>
				</div>
			</div>
			<div class="column">
				<span class="icon is-large" id="settingsIcon">
					<i class="fas fa-sliders-h"></i>
				</span>
			</div>
		</div>
	</div>
</section>

<style>
	#searchBox{
		background-color: #fff;
		border-radius: 34px;
		border-style: hidden;
		height: 50px;
	}
	#searchBox::placeholder{
		font-family: "Poppins", sans-serif;
		font-size: 16px;
	}
	#searchIconBackground{
		background-color: #FCF0E8 ;
		border-radius: 100px;
		margin-left: 10px;
		margin-top: 5px;
	}
	#settingsIcon{
		background-color: #fff ;
		border-radius: 100px;
	}
	.fa-search, .fa-sliders-h{
		color: #0CAC5C;
	}
	.control.has-icons-left .input, .control.has-icons-left .select select {
		padding-left: 3.5em;
	}
	section{
		padding-top:0;
		padding-bottom: 0;
	}

	
	
</style>