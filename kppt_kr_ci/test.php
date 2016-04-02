<?php 
	$a = array('nasi', 'goreng');
	$k = array_search('nasi', $a);
	if (false !== $k){
		echo 'emu';
	}
	else{
		echo 'ga';
	}