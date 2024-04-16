<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Examen | Colegio de Prevencionistas de Riesgos del Perú</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" type="text/css" href="/public/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/public/plantilla/css/line-awesome.css">
	<link rel="stylesheet" type="text/css" href="/public/plantilla/css/line-awesome-font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/public/plantilla/css/style.css">
	<link rel="stylesheet" type="text/css" href="/public/plantilla/css/responsive.css">
</head>

<body class="sign-in">
	<div class="wrapper">		
		<div class="sign-in-page">
			<div class="signin-popup">
				<div class="signin-pop">
					<div class="row">
						<div class="col-lg-6">
							<div class="cmp-info">
								<div class="cm-logo">
									<!-- <img src="/public/plantilla/images/cm-logo.png" alt=""> -->
									<p style="text-align: justify;">¡Bienvenido a nuestra red social para Profesionales Prevencionistas de Riesgos! Nos complace enormemente darte la bienvenida a este espacio dedicado a conectar a los expertos en prevención de riesgos. En esta plataforma, podrás compartir tus conocimientos, experiencias y oportunidades laborales con una comunidad dedicada y apasionada. Queremos destacar que a través de nuestra red social, las empresas tendrán la oportunidad de conectar directamente contigo, como prevencionista, lo que les permitirá acceder a un grupo selecto de profesionales para mejorar sus programas de prevención y ofrecer oportunidades laborales más relevantes y significativas.</p>								
								</div><!--cm-logo end-->	
										
							</div><!--cmp-info end-->
						</div>
						<div class="col-lg-6">
							<div class="login-sec">
								<ul class="sign-control">
									<!-- <li data-tab="tab-1" class="current"><a href="#" title="">Iniciar sesión</a></li>				
									<li data-tab="tab-2"><a href="#" title="">Registrarse</a></li> -->
								</ul>			
								<div class="sign_in_sec current" id="tab-1">									
									<h3>Iniciar sesión</h3>
									
									<form id="form_login" style="margin-bottom: 1rem;">
										<div class="row" style="margin: 0;">
											<div class="col-lg-12 no-pdd">
												<div class="sn-field">
													<input type="text" id="username_login" name="username_login" placeholder="Correo">
													<i class="la la-user"></i>
												</div><!--sn-field end-->
											</div>
											<div class="col-lg-12 no-pdd">
												<div class="sn-field">
													<input type="password" id="password_login" name="password_login" placeholder="Contraseña">
													<i class="la la-lock"></i>
												</div>
											</div>
											<p aling="justify">Iniciar sesión con su usuario y contraseña registrados.</p>
											
											<!-- <div class="col-lg-12 no-pdd">
												<div class="checky-sec">
													<a href="#" title="">¿Olvidaste tu contraseña?</a>
												</div>
											</div> -->
											<div class="col-lg-12 no-pdd">
												<button type="button" id="loginButton">Iniciar sesión</button>
												<a target="_blank" href="https://campusvirtual.camaraprevencionistas.com/"><button type="button">Aula Virtual</button></a>
											</div>
										</div>
									</form>
									<div class="row">
										<div class="col-12 no-pdd">					
											<div id="mensajeError" class="alert alert-danger" role="alert" style="display: none;">
												Mensaje
											</div>					
										</div>					
									</div>
								</div><!--sign_in_sec end-->
								<div class="sign_in_sec" id="tab-2">
									<div class="signup-tab">
										<i class="fa fa-long-arrow-left"></i>
										<h2>correo@example.com</h2>
										<ul>
											<li data-tab="tab-3" class="current"><a href="#" title="">Usuario</a></li>
											<li data-tab="tab-4"><a href="#" title="">Empresa</a></li>
										</ul>
									</div><!--signup-tab end-->	
									<div class="dff-tab current" id="tab-3">
										<form>
											<div class="row">
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
														<input type="text" name="name" placeholder="Full Name">
														<i class="la la-user"></i>
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
														<input type="text" name="country" placeholder="Country">
														<i class="la la-globe"></i>
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
														<select>
															<option>Category</option>
															<option>Category 1</option>
															<option>Category 2</option>
															<option>Category 3</option>
															<option>Category 4</option>
														</select>
														<i class="la la-dropbox"></i>
														<span><i class="fa fa-ellipsis-h"></i></span>
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
														<input type="password" name="password" placeholder="Password">
														<i class="la la-lock"></i>
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
														<input type="password" name="repeat-password" placeholder="Repeat Password">
														<i class="la la-lock"></i>
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<div class="checky-sec st2">
														<div class="fgt-sec">
															<input type="checkbox" name="cc" id="c2">
															<label for="c2">
																<span></span>
															</label>
															<small>Yes, I understand and agree to the workwise Terms & Conditions.</small>
														</div><!--fgt-sec end-->
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<button type="submit" value="submit">Get Started</button>
												</div>
											</div>
										</form>
									</div><!--dff-tab end-->
									<div class="dff-tab" id="tab-4">
										<form>
											<div class="row">
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
														<input type="text" name="company-name" placeholder="Company Name">
														<i class="la la-building"></i>
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
														<input type="text" name="country" placeholder="Country">
														<i class="la la-globe"></i>
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
														<input type="password" name="password" placeholder="Password">
														<i class="la la-lock"></i>
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
														<input type="password" name="repeat-password" placeholder="Repeat Password">
														<i class="la la-lock"></i>
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<div class="checky-sec st2">
														<div class="fgt-sec">
															<input type="checkbox" name="cc" id="c3">
															<label for="c3">
																<span></span>
															</label>
															<small>Yes, I understand and agree to the workwise Terms & Conditions.</small>
														</div><!--fgt-sec end-->
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<button type="submit" value="submit">Get Started</button>
												</div>
											</div>
										</form>
									</div><!--dff-tab end-->
								</div>		
							</div><!--login-sec end-->
						</div>
					</div>		
				</div><!--signin-pop end-->
			</div><!--signin-popup end-->
			<div class="footy-sec">
				<div class="container">
					<ul>
						<li><a href="#" title="">Aula Virtual</a></li>
						<li><a href="#" title="">Validación de Certificados</a></li>
						<li><a href="#" title="">Políticas de Privacidad</a></li>
						<li><a href="#" title="">Nuestra Organización</a></li>
						<li><a href="#" title="">Nuestra Comunidad</a></li>
					</ul>
					<p><img src="#" alt="">Copyright 2024</p>
				</div>
			</div><!--footy-sec end-->
		</div><!--sign-in-page end-->
	</div><!--theme-layout end-->
<script type="text/javascript" src="/public/plantilla/js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="/public/plantilla/js/popper.js"></script> -->
<script type="module" src="/public/js/controladores/login.js"></script>
</body>
</html>