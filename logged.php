<?php 
require_once 'header.php';

if(!isset($_SESSION['logged_in'])) {
	exit();
}
$query = $db->prepare("SELECT rating_number, FORMAT((total_points / rating_number),1) as average_rating FROM sac_rating WHERE post_id = 1 AND status = 1");
$query->execute();
//$ratingRow = $result->fetch_assoc();

?>
	
		<div class="acasa pagina active">
			<div class="bara navbar navbar-inverse navbar-static-top ">
				<div class="container">
					<a href="logged.php#acasa" class="navbar-brand subtitlu">Restaurant menu</a>
					<button class="navbar-toggle" data-toggle="collapse" data-target="#navHeader">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="collapse navbar-collapse" id="navHeader">
						<ul class="meniu nav navbar-nav navbar-right">
							<li class="active"><a class="acasa page-link" href="logged.php#acasa" title="Pagina principală">Home</a></li>
							<li class="recomandari"><a class="recomandari page-link" href="logged.php#recomandari">Recomandari</a></li>
							<li>
									
									<div class="dropdown logged-dropdown">
									  <button class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									    Cont - <?php echo $_SESSION['nume_utilizator']; ?>
									    <span class="caret"></span>
									  </button>
									  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
									    <li><a href="logout.php">Ieși din cont!</a></li>
									  </ul>
									</div>
							</li>
							<li>
								<a class="page-link" href="logged.php#cos" title="Coș de cumpărături">
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
						<form action="logged.php" method="POST">  <!-- form top start -->
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
								        <option value="branza_mozzarella">Brânză mozzarella</option>
								        <option value="ceapa">Ceapă</option>
								        <option value="ciuperci">Ciuperci</option>
								        <option value="dublu_pepperoni">Dublu pepperoni</option>
								        <option value="masline">Măsline</option>
								        <option value="morcovi">Morcovi</option>
								        <option value="patrunjel">Patrunjel</option>
								        <option value="porumb">Porumb</option>
								        <option value="rosii">Roșii</option>
								        <option value="sunca">Șuncă</option>
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
											<input type="text" id="sos_tomat">
											<input type="text" id="ardei">
											<input type="text" id="branza_mozzarella">
											<input type="text" id="ceapa">
											<input type="text" id="ciuperci">
											<input type="text" id="dublu_pepperoni">
											<input type="text" id="masline">
											<input type="text" id="porumb">
											<input type="text" id="rosii">
											<input type="text" id="sunca">

											
											
										</div> <!-- ingrediente-on-->
										<div class="row">
											<div class="col-xs-12">
												
												<h3 class="subtitlu">
													<input type="button" name="submit" value="Sortează după ingrediente!" id="sorteaza" class="sorteaza btn btn-default"/>
												</h3>
												<h3 class="subtitlu">
													<a href="logged.php#recomandari" class="recomandari btn btn-default page-link" id="recomandari">Recomandari de produse!</a>
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
					<div class="imagini col-xs-12 hidden-xs col-sm-6 col-md-3">
						<div class="imaginep food-images">
							<img id="produs1" src="img/Pmargherita.jpg" class="imagine" alt="...">
							<img id="produs2" src="img/Proma.jpg" class="imagine active" alt="...">
							<img id="produs3" src="img/Pvegetariana.jpg" class="imagine" alt="...">
							<img id="produs4" src="img/Pquattro.jpg" class="imagine" alt="...">
							<img id="produs5" src="img/Ppepperoni.jpg" class="imagine" alt="...">
							<img id="produs6" src="img/Pulpepui.jpg" class="imagine" alt="...">
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<div class="panel panel-default panou-produse">
							<div class="panel-heading"><h3 class="subtitlu">Food</h3></div>
							<div class="bo panel-body">
								<div class="searchPanel">
									<ul class="tabs-food">
										<li rel="pizza" class="active">Pizza</li>
										<li rel="chicken">Chicken</li>
										<li rel="meat">Meat</li>
										<li rel="fish">Fish</li>
									</ul>
									
								</div>
								<div class="searchResult">
									
								</div>


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
										<ul class="bauturi">
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
										<ul class="bauturi">
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
										<ul class="bauturi">
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
										<ul class="bauturi">
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
					<div class="imagini col-xs-12 hidden-xs col-sm-6 col-md-3">
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
						<a class="page-link cart-link" href="logged.php#acasa">
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
										<a href="logged.php#livrare" id="checkout" class="checkout btn btn-custom btn-default page-link disabled">Checkout!
										</a>
									</h3>
								</div>
							</div>					
						</div>
						<div class="co panel-body">
							<table>
								<thead>
									<tr>
										<th>Produse</th>
										<th>Pret unitar</th>
										<th>Cantitate</th>			
										<th>Pret total</th>
										<th>Sterge</th>	
									</tr>
								</thead>
								<tbody id="comanda">
								</tbody>
							</table>
							<ul class="afisorComanda">
								<li>
									Total produse: <span class="totalPrice">0</span>
								</li>
								<li>
									Transport: <span class="transport">0</span>
								</li>
								<li>
									Total comanda: <span class="totalCom">0</span>
								</li>
							</ul>
						</div>
					</div>		
				</div>
			</div> <!-- row -->
		</div>  <!-- cos pagina-->
		<div class="recomandari pagina">
			<div class="bara navbar navbar-inverse navbar-static-top ">
				<div class="container">
					<a href="logged.php#acasa" class="navbar-brand subtitlu">Restaurant menu</a>
					<button class="navbar-toggle" data-toggle="collapse" data-target="#navHeader">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="collapse navbar-collapse" id="navHeader">
						<ul class="meniu nav navbar-nav navbar-right">
							<li class="acasa"><a class="acasa page-link" href="logged.php#acasa" title="Pagina principală">Home</a></li>
							<li class="active recomandari"><a class="recomandari page-link" href="logged.php#recomandari">Recomandari</a></li>
							<li>
								<div class="dropdown logged-dropdown">
								  <button class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								    Cont - <?php echo $_SESSION['nume_utilizator']; ?>
								    <span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								    <li><a href="logout.php">Ieși din cont!</a></li>
								  </ul>
								</div>
							</li>
							<li>
								<a class="page-link" href="logged.php#cos" title="Coș de cumpărături">
									<div class="cart"></div>
								</a>
							</li>
						</ul> <!-- meniu -->
					</div>
				</div> <!--container -->	
			</div> <!-- navbar -->
			<div class="row">
				<div class="col-md-10 col-md-offset-1 col-xs-12">
					<div class="recomandari-panel panel panel-default">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-12">
									<h3 class="subtitlu recomandari-titlu">Recomandari pe baza voturilor!</h3>
								</div>
							</div>					
						</div>
						<div class="panel-body">
							<div class="row">
						 		<div class="col-xs-4"></div>
							 	<div class="col-xs-4 recom-buttons">
									<button class="btn active btn-default top-voted subtitlu">Cele mai votate!</button>
									<button class="btn btn-default top-rated subtitlu">Cele mai apreciate!</button>
								</div>
							 	<div class="col-xs-4"></div>
						 	</div>
							<div class="recomandari-result">
								<!-- 	ajax -->
							</div>
						</div>
					</div>	<!-- recomandari-panel	  -->
				</div>
			</div>
		</div> <!-- recomandari pagina -->
		<div class="livrare pagina">  <!-- livrare start -->
			<div class="row">
				<div class="livrare-col col-md-6 col-md-offset-3 col-xs-12">
					<div class="livrare-panel panel panel-default">
						<div class="panel-heading">	
							<div class="row">
								<div class="col-xs-1 col-sm-2 col-md-2"></div>
								<div class="col-xs-10 col-sm-8 col-md-8">
									<h3 class="subtitlu livrare-heading">Informatii facturare!</h3>
								</div>
								<div class="col-xs-1 col-sm-2 col-md-2"></div>
							</div>		
						</div>
						<div class="panel-body">
							<div class="row">
						 		<div id="contents">
									<div id="main">
										<form action="comanda.php" method="post" id="checkout"> <!-- form livrare -->
											<div class="contentbox fillup informatii-facturare">
												<div class="row">
													<div class="col-xs-1"></div>
													<div class="col-xs-10">
														<div class="input">
															<label class="login-label">
																<p class="livrare-paragraf">Nume</p>
																<div class="input-group">
																	<div class="input-group-addon">
																		<span class="glyphicon glyphicon-user"></span>
																	</div>
																	<input class="form-control" type="text" name="nume-livrare" placeholder = "nume">
																</div>
												 			</label>	
														</div>
														<div class="input">
															<label class="login-label">
																<p class="livrare-paragraf">Adresa:</p>
																<div class="input-group">
																	<div class="input-group-addon">
																		<span class="glyphicon glyphicon-home"></span>
																	</div>
																	<input class="form-control" type="text" name="adresa-livrare" placeholder = "adresa">
																</div>
												 			</label>	
														</div>
														<div class="input">
															<label class="login-label">
																<p class="livrare-paragraf">Oras:</p>
																<div class="input-group">
																	<div class="input-group-addon">
																		<span class="glyphicon glyphicon-globe"></span>
																	</div>
																	<input class="form-control" type="text" name="oras-livrare" placeholder = "oras">
																</div>
												 			</label>	
														</div>
														<div class="input">
															<label class="login-label">
																<p class="livrare-paragraf">Judet:</p>
																<div class="input-group">
																	<div class="input-group-addon">
																		<span class="glyphicon glyphicon-globe"></span>
																	</div>
																	<input class="form-control" type="text" name="judet-livrare" placeholder = "judet">
																</div>
												 			</label>	
														</div>
														<div class="input">
															<label class="login-label">
																<p class="livrare-paragraf">Email:</p>
																<div class="input-group">
																	<div class="input-group-addon">
																		<span class="glyphicon glyphicon-envelope"></span>
																	</div>
																	<input class="form-control" type="email" name="email-livrare" placeholder = "example@gmail.com">
																</div>
												 			</label>	
														</div>
														<div class="input">
															<label class="login-label">
																<p class="livrare-paragraf">Telefon:</p>
																<div class="input-group">
																	<div class="input-group-addon">
																		<span class="glyphicon glyphicon-earphone"></span>
																	</div>
																	<input class="form-control" type="text" name="telefon-livrare" placeholder = "telefon">
																</div>
												 			</label>	
														</div>
														<div id="compute" class="contentbox">
															<h2><span>Total</span></h2>
															<div class="afisorLivrare">
																<!-- ajax -->
															</div>
														</div> <!-- compute -->
														<input type="submit" value="Trimite comanda!" name="trimite-comanda" class="trimite-comanda subtitlu btn btn-default">
													</div> <!-- col -->
													<div class="col-xs-1"></div>
												</div>
											</div>
										</form>
									</div>
								</div>
						 	</div>
						</div>
					</div>	<!-- recomandari-panel	  -->
				</div>
			</div>			
		</div> <!-- livrare end -->

<?php 







require_once 'footer.php';



?>



 