<?php if (strpos($_SERVER['HTTP_HOST'], 'webnet.ml') !== false) {
    echo "Webnet Chat";
}elseif (strpos($_SERVER['HTTP_HOST'], 'swivro.net') !== false){
	echo "Swivro Chat";
}
else{
	echo "localhost Chat";
}?>