<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>UpdateStore.Az Panel</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>

	<form method="post" action="/" class="bg-primary m-5 d-inline-block shadow rounded-3 p-5">
		<fieldset><legend class="text-danger fw-bold">Admin panelə giriş sorğusu</legend>
		<label for="admin" class="fw-bold shadow p-2 m-2 text-white">Admin:</label><br>
		<input type="text" name="admin" placeholder="Kod-adınız" class="rounded-3 shadow fw-bold border-0  m-2 text-primary" required><br>
		<input type="submit" name="panel" value="Link göndər" class="btn shadow text-white bg-secondary p-1 m-2 fw-bold"></fieldset>
		<div class="font-monospace m-2 text-white">
			<?php 
			$ip=$_SERVER['REMOTE_ADDR'];
			$cihaz= $_SERVER['HTTP_USER_AGENT'];
			$vaxt=time();
			$var=0;
			$fopen=fopen("data.txt", "a+");
			$fread=fread($fopen, filesize("data.txt"));
			 for($i=0;$i<count(explode("\n", $fread));++$i){
				
				if( explode("+" , explode("\n", $fread)[$i] )[0]==$ip ){
					echo "0";
					for($j=0;$j<count(explode("\n", $fread));++$j){
						echo $i." ".$j."\n";
						if($j==$i){
							fwrite(fopen("data.txt", "w+"), $ip."+".$cihaz."+".$vaxt."+"."3"."\n");
						}
					// 	else{
					// 		fwrite($fopen, (explode("+" , explode("\n", $fread)[$i] )[0])."+".(explode("+" , explode("\n", $fread)[$i] )[1])."+".(explode("+" , explode("\n", $fread)[$i] )[2])."+"."1"."\n");
					// 	}
					 }
					 break;
				}
				else{echo "0";
					$var=1;
				}
			}
			if($var==1){
				fwrite($fopen, $ip."+".$cihaz."+".$vaxt."+"."1"."\n");
			}
			
			?>
			<p>Qeyd: 5 cəhdiniz qaldı!</p>
			<p>Sizin ip: <?php echo $ip;?></p>
			<p>Sizin cihaz: <?php echo $cihaz;?></p>
			<p>Vaxt göstəricisi: <?php echo $vaxt;?></p>
		</div>
	</form>
</body>
</html>
