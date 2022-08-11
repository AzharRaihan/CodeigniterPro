<?php

/**
 * For Dump
 * @return string
 * @param string
 */
	function dd($value){
		var_dump($value);
		exit;
	}
/**
 * For Pre
 * @return string
 * @param string
 */
function pre($value){
	echo '<pre>';
	print_r($value);
	echo '</pre>';
	exit();
}

