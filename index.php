<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8" />
	<title>Hack PT</title>
	<link href="css/normalize.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />
</head>
<body>
<h1 id="header">
	Hackers PT
</h1>
<div id="news">
<?
$news = json_decode(file_get_contents('http://pipes.yahoo.com/pipes/pipe.run?_id=0af0ddb7e7ce4bbcba3e8c3bb3a19ade&_render=json'));
	
foreach($news->value->items as $item){
	echo "<a class='item' target='_blank' title='".strip_tags($item->description)."' href='".$item->link."'>";
	echo ' <span class="author">'.$item->author.'</span>';	
	echo ' <span class="title">'.$item->title.'</span>';
	echo ' <span class ="time">há '.ago(strtotime($item->pubDate))."</span>";
	echo "</a>";
}
?>
</div>
<div id="footer">
 <div class="sugestion"> Sugere blogs a adicionar para correio@donaesperanca.com</div>
<iframe class="fork" src="http://ghbtns.com/github-btn.html?user=markdotto&repo=github-buttons&type=fork"
  allowtransparency="true" frameborder="0" scrolling="0" width="53" height="20"></iframe>
</div>
<?
// TIME AGO FUNCITON
function ago($time)
{
   $periods = array("segundo", "minuto", "hora", "dia", "semana", "mês", "ano", "decada");
   $lengths = array("60","60","24","7","4.35","12","10");

   $now = time();

       $difference     = $now - $time;
       $tense         = "ago";

   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
       $difference /= $lengths[$j];
   }

   $difference = round($difference);

   if($difference != 1) {
		if($j == 5){
	   	  $periods[$j] = "meses";
		}else{
		   $periods[$j].= "s";
		}
   }

   return "$difference $periods[$j]";
}
?>
</body>
</html>

