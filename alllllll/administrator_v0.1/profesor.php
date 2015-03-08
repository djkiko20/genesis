<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Genesis</title>
    
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css" />
        <!-- gebo blue theme-->
            <link rel="stylesheet" href="css/blue.css" id="link_theme" />
        <!-- breadcrumbs-->
            <link rel="stylesheet" href="lib/jBreadcrumbs/css/BreadCrumb.css" />
        <!-- tooltips-->
            <link rel="stylesheet" href="lib/qtip2/jquery.qtip.min.css" />
        <!-- colorbox -->
            <link rel="stylesheet" href="lib/colorbox/colorbox.css" />    
        <!-- code prettify -->
            <link rel="stylesheet" href="lib/google-code-prettify/prettify.css" />    
        <!-- notifications -->
            <link rel="stylesheet" href="lib/sticky/sticky.css" />    
        <!-- splashy icons -->
            <link rel="stylesheet" href="img/splashy/splashy.css" />
		<!-- flags -->
            <link rel="stylesheet" href="img/flags/flags.css" />	
		<!-- calendar -->
            <link rel="stylesheet" href="lib/fullcalendar/fullcalendar_gebo.css" />
            
        <!-- main styles -->
            <link rel="stylesheet" href="css/style.css" />
			
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
	
        <!-- Favicon -->
            <link rel="shortcut icon" href="favicon.ico" />
		
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="css/ie.css" />
            <script src="js/ie/html5.js"></script>
			<script src="js/ie/respond.min.js"></script>
			<script src="lib/flot/excanvas.min.js"></script>
        <![endif]-->


        <script src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.tokeninput.js"></script>

        <link rel="stylesheet" href="css/token-input.css" type="text/css" />

        <script type="text/javascript">
            $(document).ready(function() {
                $("#demo-input").click(function () {
                   // alert("Would submit: " + $(this).siblings("#demo-input").val());
                });
            });
        </script>




    <!-- Shared on MafiaShare.net  --><!-- Shared on MafiaShare.net  --></head>
    <body>

		
		<div id="maincontainer" class="clearfix">
			<!-- header -->
            <header>
                <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            <a class="brand" href="dashboard.html"><i class="icon-home icon-white"></i> Админ панел</a>
                            <ul class="nav user_menu pull-right">


                                <li class="divider-vertical hidden-phone hidden-tablet"></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
										<li><a href="login.html">Одјави се</a></li>
                                    </ul>
                                </li>
                            </ul>
							<a data-target=".nav-collapse" data-toggle="collapse" class="btn_menu">
								<span class="icon-align-justify icon-white"></span>
							</a>

                        </div>
                    </div>
                </div>
            </header>

            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">

                    <div id="jCrumbs" class="breadCrumb module">
                        <h4>Додади професор</h4>
                    </div>

                    <form action="skripti/add_profesor.php" method="post" enctype="multipart/form-data">
                        <div class="formSep">
                            <div id="responsecontainer">
                                <?php
                                if($_GET['success'] == 1){
                                    echo '<p style="color: green;">Успешно е додаден професор!</p>';
                                } else if($_GET['success'] == 2){
                                    echo '<p style="color: red;">Неуспешно додавање на професор!</p>';
                                }
                                ?>
                            </div>
                            <label>Име</label>
                            <input type="text" name="ime" id="ime">
                            <label>Презиме</label>
                            <input type="text" name="prezime" id="prezime">
                            <label>Кратка биографија</label>
                            <textarea name="biografija" id="biografija" cols="10" rows="10"></textarea>
                            <label>Е-маил</label>
                            <input type="text" name="email" id="email">
                            <label>Факултети</label>
                                <input type="text" id="demo-input" name="fakulteti" />
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                                //<input type='hidden' name='fakulteti[]' vo Fakulteti niza imame site izbrani fakulteti
                                                $("#demo-input").tokenInput("skripti/lista_auto_complete_fakulteti.php");
                                    });
                                </script>
                            <label>Слика</label>
                            <input id="slika" type="file" name="slika" data-url="skripti/add_profesor.php">


                            <br/>

                            <input type="submit" value="Внеси" class="vnesi_profesor">
                        </div>

                    </form>



            </div>

			<!-- sidebar -->
            <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
            <div class="sidebar">

				<div class="antiScroll">
					<div class="antiscroll-inner">
						<div class="antiscroll-content">

							<div class="sidebar_inner">
								<form action="index.php?uid=1&amp;page=search_page" class="input-append" method="post" >
									<input autocomplete="off" name="query" class="search_query input-medium" size="16" type="text" placeholder="Барај..." /><button type="submit" class="btn"><i class="icon-search"></i></button>
								</form>
								<div id="side_accordion" class="accordion">

									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-folder-close"></i> Нов запис
											</a>
										</div>
										<div class="accordion-body collapse" id="collapseOne">
											<div class="accordion-inner">
                                                <ul class="nav nav-list">
                                                    <li><a href="univerzitet.html">Универзитет</a></li>
                                                    <li><a href="fakultet.php">Факултет</a></li>
                                                    <li><a href="profesor.php">Професор</a></li>
                                                    <li><a href="predmet.php">Предмет</a></li>
                                                </ul>
											</div>
										</div>
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseThree" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-user"></i> Корисници
											</a>
										</div>
										<div class="accordion-body collapse" id="collapseThree">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="javascript:void(0)">Листа на корисници</a></li>
												</ul>

											</div>
										</div>
									</div>

								</div>

								<div class="push"></div>
							</div>
						</div>
					</div>
				</div>

			</div>


			<!-- smart resize event -->
			<script src="js/jquery.debouncedresize.min.js"></script>
			<!-- hidden elements width/height -->
			<script src="js/jquery.actual.min.js"></script>
			<!-- js cookie plugin -->
			<script src="js/jquery.cookie.min.js"></script>
			<!-- main bootstrap js -->
			<script src="bootstrap/js/bootstrap.min.js"></script>
			<!-- tooltips -->
			<script src="lib/qtip2/jquery.qtip.min.js"></script>
			<!-- jBreadcrumbs -->
			<script src="lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
			<!-- lightbox -->
            <script src="lib/colorbox/jquery.colorbox.min.js"></script>
            <!-- fix for ios orientation change -->
			<script src="js/ios-orientationchange-fix.js"></script>
			<!-- scrollbar -->
			<script src="lib/antiscroll/antiscroll.js"></script>
			<script src="lib/antiscroll/jquery-mousewheel.js"></script>
			<!-- common functions -->
			<script src="js/gebo_common.js"></script>

			<script src="lib/jquery-ui/jquery-ui-1.8.20.custom.min.js"></script>
            <!-- touch events for jquery ui-->
            <script src="js/forms/jquery.ui.touch-punch.min.js"></script>
            <!-- multi-column layout -->
            <script src="js/jquery.imagesloaded.min.js"></script>
            <script src="js/jquery.wookmark.js"></script>
            <!-- responsive table -->
            <script src="js/jquery.mediaTable.min.js"></script>
            <!-- small charts -->
            <script src="js/jquery.peity.min.js"></script>
            <!-- charts -->
            <script src="lib/flot/jquery.flot.min.js"></script>
            <script src="lib/flot/jquery.flot.resize.min.js"></script>
            <script src="lib/flot/jquery.flot.pie.min.js"></script>
            <!-- calendar -->
            <script src="lib/fullcalendar/fullcalendar.min.js"></script>
            <!-- sortable/filterable list -->
            <script src="lib/list_js/list.min.js"></script>
            <script src="lib/list_js/plugins/paging/list.paging.min.js"></script>
            <!-- dashboard functions -->
            <script src="js/gebo_dashboard.js"></script>

			<script>
				$(document).ready(function() {
					//* show all elements & remove preloader
					setTimeout('$("html").removeClass("js")',1000);
				});
			</script>

		</div>
	</body>
</html>