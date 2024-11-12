<?php 
define('ROOT', 'http://localhost/ecom/index.php/');
define('TEMPLATES_DIR', 'http://localhost/ecom/routes/templates/');
define('STORAGE_DIR', 'http://localhost/ecom/routes/templates/storage/upload-files/');

include("include.php");
		


$urlParts = parse_url($_SERVER['REQUEST_URI']);
$url = $urlParts['path'];
$https = $_SERVER['REQUEST_SCHEME'] ==='https';

$indexPHPPosition = strpos($url,'index.php');
$baseUrl = $url;

						//logData('INFO','Starte Routing');
						if (false !== $indexPHPPosition) {
						$baseUrl = substr($url,0, $indexPHPPosition);
						//logData('INFO','es gibt eine index.php URL');
						}

if (substr($baseUrl,-1)!=='/') {
$baseUrl .='/';}

define('BASE_URL',$baseUrl);
$projectUrl = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$baseUrl;
$route =null;

if (false !==$indexPHPPosition) {
	$route = substr($url, $indexPHPPosition);
	$route = str_replace('index.php', '', $route);
	}


		$ip = get_ip();	
		$brand = cat_or_brand($s='brands') ;
		$cat = cat_or_brand($s='categories') ;
		$count_cart =total_item($ip);
			
		$user_id=$_SESSION['user_id'];

		$select_user = $db->prepare("SELECT * FROM users WHERE user_id='$user_id'");
		$select_user->execute();
		$data_user = $select_user->fetch();



							//начало вызов index.php 
if (!$route) {
	//$isAdmin = isAdmin();
				
				$products=get_Pro($sq = 'ORDER BY RAND() LIMIT 0,6');
				require 'routes/templates/result.php';
	 			exit();
}

		//добавить в корзину
if (strpos($route, '/cart/add/') !== false) {
			
				$routeParts = explode('/', $route);
				$productId = (int)$routeParts[3];

				$_SESSION['redirectTarget']=$baseUrl."index.php/cart/add/".$productId;
				//redirectIfNotLogged('/login');
				insert_to_cart($ip,$productId);	
				header("Location: " .$baseUrl."index.php"); 
				exit();
}	 

//просмотреть детали	1.подкл функ и вызов передаем ID prod 2. вызов темлате details
if (strpos($route, '/details') !== false) {
				$routeParts = explode('/', $route);

				if (count($routeParts) !==3) {
				echo "ungulige URL";
				exit();		}

		 		$productId = $routeParts[2];

				if (0 === strlen($productId)) {
				echo "ungulige product";
				exit();
				}

				$row_pro=get_prod_details($productId);
				require_once 'routes/templates/details.php';
				exit();
}


// поисковик
if(strpos($route,'/search') !== false){
				
				$keyword = $_GET['user_query'];
				$products = search_Pro($keyword);	
				require_once 'routes/templates/result.php';
				exit();
}

// категория товаров
if(strpos($route,'/brand') !== false){
				
				require_once 'routes/getByCatBraand.php';
				exit();
}

// сортировка бренду  товаров
if(strpos($route,'/cat') !== false){
				
				require_once 'routes/getByCatBraand.php';
				exit();
}

// перехок на страницу home
if(strpos($route,'/home') !== false){
		
				$products=get_Pro($sq=null);
				require 'routes/templates/result.php';
 				exit();header("Location: ".$baseUrl."index.php");
}


// перехок на страницу all products
if(strpos($route,'/all_products') !== false){
	
  		  		$products = get_Pro($sq=null);
				require 'routes/templates/result.php';
 				exit();
}

// спмсок купленных продуктов
if(strpos($route,'/cart') !== false){
				
				$total = total_in_cart();
				include("routes/templates/header.php"); 
				include("routes/templates/sidebar.php"); 
				require 'routes/templates/cart.php';
				//header("Location: ".$baseUrl."index.php");
 				
 				include("routes/templates/footer.php");
 				exit();  
}

if(strpos($route,'/logout') !== false){
				session_start();
				session_destroy();
				header("Location: ".$baseUrl."index.php");
		 	
				exit();
}
//// авторизаия пользователя
if (strpos($route, '/login') !== false) {
				
				require_once 'routes/templates/loginUser.php';	
				require_once 'routes/functions/login.php';
				exit();	
}


// регистрация пользователя
if(strpos($route,'/register') !== false){
				
				require_once 'routes/templates/register.php';
				require_once 'routes/register.php';
				exit();
}

if(strpos($route,'/checkout') !== false){
				session_start();
				session_destroy();
				require 'routes/templates/checkout.php';
				//header("Location: ".$baseUrl."index.php");
		 	
				exit();
}

if(strpos($route,'/contact') !== false){
		
				require"routes/templates/header.php";
				require 'routes/templates/contact.php';
				require "routes/templates/footer.php";
 				exit();
				
}
if(strpos($route,'/my_account') !== false){

				require"routes/templates/header.php";
				require 'routes/templates/my_account.php';
 				require "routes/templates/footer.php";
 				exit();

}
