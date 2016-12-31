<?php 
	require_once 'header.php';
	require_once 'ingredients.php';
 ?>	


	<div class="acasa pagina active">
		<div class="bara navbar navbar-inverse navbar-static-top ">
			<div class="container">
				<a href="index.php#acasa" class="navbar-brand subtitlu">Restaurant menu</a>
				<button class="navbar-toggle" data-toggle="collapse" data-target="#navHeader">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navHeader">
					<ul class="meniu nav navbar-nav navbar-right">
						<li class="active"><a href="index.php#acasa" title="Pagina principală">Home</a></li>
						<li>
							<a href="" title="loghează-te!" data-toggle="modal" data-target=".login-modal">Autentificare</a>
						</li>
						<li><a href="" data-toggle="modal" data-target=".register-modal">Înregistrează-te</a></li>
						<li>
							<a class="page-link" href="index.php#cos" title="Coș de cumpărături">
								<div class="cart"></div>
							</a>
						</li>
					</ul> <!-- meniu -->
				</div>
			</div> <!--container -->	
		</div> <!-- navbar -->
		<div class="container">
			<div class="row">
				<div class="antet-menu col-xs-12">
					<h1 class="title">Restaurant menu</h1> <!-- titlu pagina -->
				</div>
				<div class="col-md-6 col-md-offset-3 col-xs-12">
					<form action="index.php" method="POST">  <!-- form top start -->
						<div class="subsol panel panel-default">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-4 col-sm-4 col-md-4">
										<h1 class="addingredients-title">Adauga ingrediente!</h1>
									</div>
									<div class="col-xs-4 col-sm-4 col-md-4">
										<select class="ingrediente form-control" id="sel2" title="Ingrediente">
											<option disabled="true">~ Sosuri ~</option>
							        <option value="sos_tomat">Sos tomat</option>
							        <option disabled="true">~ Legume ~</option>
							        <option value="ardei">Ardei</option>
							        <option value="brânză_mozzarella">Brânză mozzarella</option>
							        <option value="ceapă">Ceapă</option>
							        <option value="ciuperci">Ciuperci</option>
							        <option value="dublu_pepperoni">Dublu pepperoni</option>
							        <option value="măsline">Măsline</option>
							        <option value="porumb">Porumb</option>
							        <option value="roșii">Roșii</option>
							        <option value="șuncă">Șuncă</option>
							      </select>	
									</div>
									<div class="col-xs-4 col-sm-4 col-md-4">
										<h3 class="subtitlu">
											<a class="add-ingredients btn btn-default" href="#" role="button">Adauga!
											</a>
										</h3>
									</div>
								</div>					
							</div>
							<div class=" panel-body">
								<div class="row">
									<div class="ingrediente-on col-xs-12">
											<label class="checkbox-inline">
											  <input type="checkbox" id="sos_tomat" value="sos tomat" name="sos_tomat"> Sos tomat
											</label>
											<label class="checkbox-inline">
											  <input type="checkbox" id="ardei" value="ardei" name="ardei"> Ardei
											</label>
											<label class="checkbox-inline">
											  <input type="checkbox" id="brânză_mozzarella" value="branza mozzarella" name="brânză_mozzarella"> Brânză mozzarella
											</label>
											<label class="checkbox-inline">
											  <input type="checkbox" id="ceapă" value="ceapă" name="ceapa"> Ceapă
											</label>
											<label class="checkbox-inline">
											  <input type="checkbox" id="ciuperci" value="ciuperci" name="ciuperci"> Ciuperci
											</label>
											<label class="checkbox-inline">
											  <input type="checkbox" id="dublu_pepperoni" value="dublu pepperoni" name="dublu_pepperoni"> Dublu pepperoni
											</label>
											<label class="checkbox-inline">
											  <input type="checkbox" id="măsline" value="masline" name="masline"> Măsline
											</label>
											<label class="checkbox-inline">
											  <input type="checkbox" id="porumb" value="porumb" name="porumb"> Porumb
											</label>
											<label class="checkbox-inline">
											  <input type="checkbox" id="roșii" value="rosii" name="rosii"> Roșii
											</label>
											<label class="checkbox-inline">
											  <input type="checkbox" id="șuncă" value="sunca" name="sunca"> Șuncă
											</label>
											
										</div> <!-- ingrediente-on-->
									<div class="row">
										<div class="col-xs-12">
											<h3 class="subtitlu">
												<input type="submit" name="submit" value="Sortează după ingrediente!" class="sorteaza btn btn-default"/>
											</h3>
										</div>
									</div>
								</div>
							</div>
						</div>		<!-- subsol panel-->
					</form>
					

				</div>
			</div> <!-- row -->
			<div class="row">
				<div class="col-xs-12 hidden-xs col-sm-6 col-md-3">
					<div class="imaginep">
						<img id="produs1" src="img/Pmargherita.jpg" class="imagine" alt="...">
						<img id="produs2" src="img/Proma.jpg" class="imagine active" alt="...">
						<img id="produs3" src="img/Pvegetariana.jpg" class="imagine" alt="...">
						<img id="produs4" src="img/Pquattro.jpg" class="imagine" alt="...">
						<img id="produs5" src="img/Ppepperoni.jpg" class="imagine" alt="...">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3">
					<div class="panel panel-default panou-produse">
						<div class="panel-heading"><h3 class="subtitlu">Food</h3></div>
						<div class="bo panel-body">
							<div class="tab-panels">
								<div class="antet">
									<ul class="tabs">
										<li rel="Pizza" class="active">Pizza</li>
										<li rel="Chicken">Chicken</li>
										<li rel="Meat">Meat</li>
										<li rel="Fish">Fish</li>
									</ul>
								</div>
								<div id="Pizza" class="panel active">
									<ul class="pizza">

										<?php if (isset($_POST['submit'])): ?>
											<?php foreach ($query as $row): ?>
												
												
												<li class="mancare" data-li="produs<?php echo $row['id_produs']; ?>">
													<h4 class="pizaa">
														<?php echo $row['nume_produs']; ?> 
														<span class="badge pret">
															<?php echo $row['pret']; ?>
														</span>
												  </h4>
													<p class="p-ingrediente"><?php echo $row['ingrediente']; ?></p>
												</li>
											<?php endforeach; ?>
											
										<?php endif; ?>
										
		
										
									</ul>
								</div> <!-- pizza panel -->

								<div id="Chicken" class="panel">
									<p>chicken</p>
								</div> <!-- chicken -->
								<div id="Meat" class="panel">
									<p>meat</p>
								</div> <!-- meat panel -->
								<div id="Fish" class="panel">
									<p>fish</p>
								</div> <!-- fish panel -->
							</div> <!-- tab-panels -->
						</div> <!-- panel-body -->
					</div> <!-- panel -->
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3">
					<div class="panel panel-default panou-produse">
						<div class="panel-heading"><h3 class="subtitlu">Drinks</h3></div>
						<div class="bo panel-body">
							
							

							<div class="tab-panels">
								<div class="antet">
									<ul class="tabs">
										<li rel="All" class="active">All</li>
										<li rel="Soda">Soda</li>
										<li rel="Beer">Beer</li>
										<li rel="Rum">Rum</li>
									</ul>
								</div>
								<div id="All" class="panel active">
									<ul class="pizza">
										<li class="mancare" data-li="produs6">
											<h4 class="drinks">COCA COLA 0.5L <span class="badge pret">5</span> </h4>
										</li>
										<li class="mancare" data-li="produs7">
											<h4 class="drinks">SPRITE 0.5L <span class="badge pret">5</span> </h4>
										</li>
										<li class="mancare" data-li="produs8">
											<h4 class="drinks">FANTA 0.5L <span class="badge pret">5</span> </h4>
										</li>
										<li class="mancare" data-li="produs9">
											<h4 class="drinks">APĂ MINERALĂ 0.5 L <span class="badge pret">3.50</span> </h4>
										</li>
										<li class="mancare" data-li="produs10">
											<h4 class="drinks">NESTEA 0.5L <span class="badge pret">6</span> </h4>
										</li>
										<li class="mancare" data-li="produs11">
											<h4 class="drinks">BERE URSUS 0.5L <span class="badge pret">5</span> </h4>
										</li>
										<li class="mancare" data-li="produs12">
											<h4 class="drinks">BERE URSUS FARA ALCOOL 0.5L <span class="badge pret">6</span> </h4>
										</li>
										<li class="mancare" data-li="produs13">
											<h4 class="drinks">BERE TUBORG 0.5L <span class="badge pret">5.50</span> </h4>
										</li>
										<li class="mancare" data-li="produs14">
											<h4 class="drinks">BERE CALSBERG 0.5 L <span class="badge pret">6.50</span> </h4>
										</li>
										<li class="mancare" data-li="produs15">
											<h4 class="drinks">APPLETON Estate <span class="badge pret">170</span> </h4>
										</li>
										<li class="mancare" data-li="produs16">
											<h4 class="drinks">ZAYA GRAN RESERVA <span class="badge pret">115</span> </h4>
										</li>
									</ul>
								</div>
								<div id="Soda" class="panel">
									<ul class="pizza">
										<li class="mancare" data-li="produs6">
											<h4 class="drinks">COCA COLA 0.5L <span class="badge pret">5</span> </h4>
										</li>
										<li class="mancare" data-li="produs7">
											<h4 class="drinks">SPRITE 0.5L <span class="badge pret">5</span> </h4>
										</li>
										<li class="mancare" data-li="produs8">
											<h4 class="drinks">FANTA 0.5L <span class="badge pret">5</span> </h4>
										</li>
										<li class="mancare" data-li="produs9">
											<h4 class="drinks">APĂ MINERALĂ 0.5 L <span class="badge pret">3.50</span> </h4>
										</li>
										<li class="mancare" data-li="produs10">
											<h4 class="drinks">NESTEA 0.5L <span class="badge pret">6</span> </h4>
										</li>
									</ul>
								</div>
								<div id="Beer" class="panel">
									<ul class="pizza">
										<li class="mancare" data-li="produs11">
											<h4 class="drinks">BERE URSUS 0.5L <span class="badge pret">5</span> </h4>
										</li>
										<li class="mancare" data-li="produs12">
											<h4 class="drinks">BERE URSUS FARA ALCOOL 0.5L <span class="badge pret">6</span> </h4>
										</li>
										<li class="mancare" data-li="produs13">
											<h4 class="drinks">BERE TUBORG 0.5L <span class="badge pret">5.50</span> </h4>
										</li>
										<li class="mancare" data-li="produs14">
											<h4 class="drinks">BERE CALSBERG 0.5 L <span class="badge pret">6.50</span> </h4>
										</li>
									</ul>
								</div>
								<div id="Rum" class="panel">
									<ul class="pizza">
										<li class="mancare" data-li="produs15">
											<h4 class="drinks">APPLETON Estate <span class="badge pret">170</span> </h4>
										</li>
										<li class="mancare" data-li="produs16">
											<h4 class="drinks">ZAYA GRAN RESERVA <span class="badge pret">115</span> </h4>
										</li>
									</ul>
								</div>
							</div><!--tab panels  -->

						</div>				
					</div>
				</div>
				<div class="col-xs-12 hidden-xs col-sm-6 col-md-3">
					<div class="imaginep">
						<img id="produs6" src="img/Cola.jpg" class="imagine active" alt="...">
						<img id="produs7" src="img/Sprite.jpg" class="imagine" alt="...">
						<img id="produs8" src="img/Fanta.jpg" class="imagine" alt="...">
						<img id="produs9" src="img/Apam.jpg" class="imagine" alt="...">
						<img id="produs10" src="img/Nestea.jpg" class="imagine" alt="...">
						<img id="produs11" src="img/Bereursus.jpg" class="imagine" alt="...">
						<img id="produs12" src="img/Faraalcool.jpg" class="imagine" alt="...">
						<img id="produs13" src="img/tuborg.jpg" class="imagine" alt="...">
						<img id="produs14" src="img/calsberg.jpg" class="imagine" alt="...">
						<img id="produs15" src="img/zappleton.jpg" class="imagine" alt="...">
						<img id="produs16" src="img/zaya.jpg" class="imagine" alt="...">
					</div>
				</div>
			</div> <!-- row -->
		</div> <!-- container-->

	</div> <!-- acasa pagina-->

	<div class="cos pagina">
		<div class="row">
			<div class="col-xs-12">		
					<a class="page-link cart-link" href="index.php#acasa">
						<div class="home">
						</div>
					</a>			
				</div>
			<div class="col-md-6 col-md-offset-3 col-xs-12">
				<div class="subsol panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-8 col-sm-4 col-md-4">
								<h3 class="subtitlu">Comanda!</h3>
							</div>
							<div class="lei col-xs-8 col-sm-4 col-md-4">	
								<div class="raspuns"></div>
								<h4 class="valuta hidden-md hidden-sm hidden-xs">.Lei</h4>
							</div>
							<div class="col-xs-8 col-sm-4 col-md-4">
								<h3 class="subtitlu">
									<a class="lanseaza btn  btn-custom btn-default" href="#" role="button">Lanseaza comanda!
									</a>
								</h3>
							</div>
						</div>					
					</div>
					<div class="co panel-body">
						<ul id="comanda">
						</ul>
					</div>
				</div>		
			</div>
		</div> <!-- row -->
	</div>  <!-- cos pagina-->


<?php 
	require_once 'footer.php';


	
 ?>

 