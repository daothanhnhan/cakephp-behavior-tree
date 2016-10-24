<?php 
	foreach($allChildren as $item){
		//var_dump($item);echo '<br/>';
		//echo $item['Category']['name'];echo '<br/>';
	}
	
	echo 'con truc tiep cua 1';echo '<br/>';
	foreach($directChildren as $item){
		echo $item['Category']['id'];echo '<br/>';
	}
	
	echo 'so con truc tiep cua 1 la:';echo $numChildren;echo '<br/>';	
	
	echo 'cha cua 2';echo '<br/>';
	var_dump($parent);echo '<br/>';
	
	echo 'cac cha cua 15';echo '<br/>';
	//echo '<pre>';
	//var_dump($parents);
	//echo '</pre>';
	foreach($parents as $item){
		echo 'id :'.$item['Category']['id'];echo '  parent id :'.$item['Category']['parent_id'];echo '<br/>';
	}
?>