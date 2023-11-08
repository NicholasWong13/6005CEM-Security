<?php
function pdo_connect_mysql() {
   
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'studio c hair & beauty salon';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    
    	exit('Failed to connect to database!');
    }
}

function clean($data) {
    $data = trim($data);
    $data = stripslashes($data);

    return $data;
}

function showPrompt() {
    echo "<div class='alert alert-success'>".$_SESSION['prompt']."</div>";
}

function showError() {
    echo "<div class='alert alert-danger'>".$_SESSION['errprompt']."</div>";
}


function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
        <header>
            <div class="content-wrapper">
                <h1>Studio C Hair & Beauty Salon</h1>
				<nav>
					<a href="index.php?page=products">Products</a>
				</nav>

                <div class="link-icons">
                    <a href="index.php?page=profile">
                        <i class="fa fa-user"></i>
                    </a>
                    <a href="index.php?page=cart">
						<i class="fas fa-shopping-cart"></i>
					</a>
					<a href="logout.php">LogOut
                    </a>
                </div>

            </div>
        </header>
        <main>
EOT;
}

?>