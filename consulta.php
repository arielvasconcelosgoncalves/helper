<?php
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helper";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
*/

session_start();

	

echo '<html lang="en">
<head>
<link rel="icon" 
      type="image/png" 
      href="images/hicon.png">
	  
<title>Helper</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Travel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--// bootstrap-css -->
<!-- css -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<!--// css -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- font -->
<link href="//fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Raleway:100,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<!-- //font -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$("html,body").animate({scrollTop:$(this.hash).offset().top},1000);
		});
	})
</script> 
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
</head>
<body>
	<!-- banner -->
	<div class="banner-1">
		<div class="w3-header-bottom">
		<div class="container">
			<div class="w3layouts-logo">
				<h1>
					<a href="indexpessoal.php">Helper </a>
				</h1>
			</div>
			<div class="top-nav">
						<nav class="navbar navbar-default">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav">
									<li class="first-list"><a href="indexpessoal.php">Página Inicial</a></li>
									<li><a href="perfilpessoal.php">'.$_SESSION["nome"].'</a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle hvr-sweep-to-right" data-hover="Pages" data-toggle="dropdown">Denúncias <b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><a href="areadedenuncia.php">Denunciar</a></li>
											<li><a class="active" href="consulta.php">Consultar Denúncias</a></li>
										</ul>
									</li>
									<li><a href="logout.php">Sair</a></li>
									

									
								</ul>	
								<div class="clearfix"> </div>
							</div>	
						</nav>		
			</div>
			<div class="agileinfo-social-grids">
				<ul>
					<li><a href="https://www.facebook.com/Helper-Denúncia-Online-2070322706623352/"><i class="fa fa-facebook"></i></a></li>
					
					
				</ul>
			</div>
			<div class="clearfix"> </div>
			</div>
		</div>
	</div>';

	
		
		

	echo'	<div class="contact">
		<div class="container">
			<h2 class="heading-agileinfo">Consulta de Denúncias<span>Helper - Denúncia Online</span></h2>
			<div class="w3layouts_mail_grids">
				<div class="col-md-8 w3layouts_mail_grid_right">';
	
$host = "localhost";
$username = "root";
$password = "";
$db = "helper";
$id = $_SESSION['id_pessoa'];
$nome = $_SESSION['nome'];
$telefone = $_SESSION['telefone'];
$email = $_SESSION['email'];

@mysql_connect($host,$username,$password) or die("Impossível conectar ao banco."); 
mysql_select_db($db);


$sqltest = mysql_query("Select count(descricao) as cont From denuncia WHERE pessoa_id_pessoa = $id");
$test = mysql_fetch_assoc($sqltest);

$sql = mysql_query("Select descricao, imagem From denuncia WHERE pessoa_id_pessoa = $id");
//$exibe = mysql_fetch_array($sql, MYSQL_NUM);



 //while ($a < $test) {
         
		//echo $row[$a];
		//$a = $a + 1;
   // }

   
   

   
   /*
   
    while ($row = mysql_fetch_array($sql, MYSQL_NUM)) {
        echo '<center>';
		echo '<img src="obterImagens.php?pessoa_id_pessoa=$id" class="img-responsive" 
width="300px" height="300px" align="#">';
		echo $row[0];
		echo '<br><br>';
		echo '</center>';
    }




*/
$a = 1;


$sth = mysql_query("SELECT imagem,descricao,id_denuncia FROM denuncia WHERE pessoa_id_pessoa = ".$_SESSION['id_pessoa']);


	
	
	while ($row = mysql_fetch_object($sth)) {
	
	$arq_destino = 'Blob'.$row->id_denuncia.'.JPG';
	$conteudo_blob = $row->imagem;
	$img_blob = imagecreatefromstring($conteudo_blob);
	imagejpeg($img_blob, $arq_destino)or die('No foi possvel criar o arquivo .'. $arq_destino . '.');
	
	echo '<b><font face="Arial" size="+5" align="center">Denúncia '.$a.'</font> <br><br>';
	echo '<tr><td colspan="2"><div align="center"><img src="'.$arq_destino.'" width="1200px" height="900px" align="center"></div></td></tr><br><br>';
	echo '<font color="#000066" face="Arial" size="+2" align="center">'.$row->descricao.'</font><br><br><br><br><br><br><br><br><br><br><br>';
	
	$a = $a +1;
	
}

	
	echo '<br><br><br><br><font color="#990000" face="Arial" size="+2" align="center">Dados do delator: <br><br> Nome: '.$nome.'<br>Email: '.$email.'<br>Telefone: '.$telefone.'</font>';





/*
$descricao = @mysql_query("SELECT d.descricao FROM denuncia d join pessoa p on (p.id_pessoa = d.pessoa_id_pessoa) AND (d.pessoa_id_pessoa = $id)") or mysqli_error();
$exibe = mysql_fetch_assoc($descricao);

echo $exibe["descricao"];*/

/*@mysql_connect($host,$username,$password) or die("Impossível conectar ao banco."); 
 
@mysql_select_db($db) or die("Impossível conectar ao banco"); 
 
$result=@mysql_query("SELECT d.imagem FROM denuncia as d join pessoa as p on (p.id_pessoa = d.pessoa_id_pessoa) WHERE d.pessoa_id_pessoa = $id") or die('vsf wilson'); 
 
while($row=@mysql_fetch_object($result)) { 
    echo "<img src='getImagem.php?PicNum=$row->pessoa_id_pessoa' \">"; 
} */


			echo'	</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>';
	











	
	
	
	
	
	

	echo '<div class="footer">
		<div class="container">
			<div class="agile-footer-grids">
				<div class="col-md-4 agile-footer-grid">
					<h4>Sobre nosso site</h4>
					<p>Esse site foi desenvolvido por alunos do curso Técnico de Informática, da ETEC Arnaldo Pereira Cheregatti para apresentar como Trabalho de Conclusão de Curso. <span> O mesmo sendo desenvolvido sem nenhum fim lucrativo.</span></p>
				</div>
			
				
				
				<div class="col-md-2 agile-footer-grid">
					<h4>Crimes Virtuais</h4>
					<ul>
						<li>Discriminação/Racismo</li>
						<li>Sexismo</li>
						<li>Bullying Virtual</li>
						<li>Homofobia</li>
						<li>Pornografia Infantil</li>
					</ul>
				</div>
				
				
				
				<div class="col-md-2 agile-footer-grid" align="right">
					<h4>Navegação</h4>
					<ul>
					<li class="text"><a href="indexpessoal.php">Página Inicial</a></li>
						<li class="text"><a href="perfilpessoal.php">'.$_SESSION["nome"].'</a></li>
						<li class="text"><a href="areadedenuncia.php">Denuncia</a></li>
						<li class="text"><a href="suportepessoal.php">Suporte</a></li>
						<li class="text"><a href="logout.php">Sair</a></li>
						
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //footer -->

<!-- footer -->
<div class="copy-right">
	<div class="container">
			<p> &copy; 2018 Helper . Todos direitos reservados | Design by  <a href="http://w3layouts.com/"> W3layouts</a></p>
	</div>
</div>
<!-- //footer -->
<!--Start-slider-script-->
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: "toTop", // fading element id
				containerHoverID: "toTopHover", // fading element hover id
				scrollSpeed: 1200,
				easingType: "linear"
				};
			*/
								
			$().UItoTop({ easingType: "easeOutQuart" });
								
			});
	</script>
	<!-- //here ends scrolling icon -->
</body>	
</html>';




































/*
try {

   
   /*echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Nome: </th><th>Telefone: </th><th>E-mail: </th><th>Senha: </th></tr>";
/*
class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
}
    $stmt = $conn->prepare("SELECT descricao, imagem from denuncia join pessoa on (id_pessoa = pessoa_id_pessoa) WHERE id_pessoa = $id"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
		echo "<img src='getImagem.php?PicNum=$row->pessoa_id_pessoa' \">";
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";*/


?>