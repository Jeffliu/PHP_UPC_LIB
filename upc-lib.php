<?php

// UPC Code Library
// I know this could be cleaned up, but I tried to make it easier to read and tell what was going on than to make it fewer lines of code.

function UPCLIB_getUPCFromGS1Number( $GS1Number ) {
	return $GS1Number.UPCLIB_GetCheckDigit($GS1Number);
}

function UPCLIB_GetCheckDigit( $GS1Number ) {
	
	if( strlen($GS1Number) != 11 ) {
		throw new Exception('GS1 Numbers must be 11 digits in length.');
	}
	if( !is_int($GS1Number) ) {
		throw new Exception('GS1 Numbers must be whole numbers, 11 digits in length.');
	}
	
	$c = str_split($GS1Number);
	// Add the odd positions (the even array indexes)
	$odds = $c[0] + $c[2] + $c[4] + $c[6] + $c[8] + $c[10] ;
	// Add the even positions (the odd array indexes)
	$evens = $c[1] + $c[3] + $c[5] + $c[7] + $c[9] ;
	$total = ($odds * 3) + $evens;
	$mod10 = $total % 10;
	$reverse = 10 - $mod10;
	if( $reverse == 10 ) { $reverse = 0; }
	return $reverse;	
}

function UPCLIB_isValidUPC($upc) {
	if( strlen($upc) != 12 ) {
		return false;
	}
	
	if( !is_int($upc) ) {
		return false;
	}
	
	// Split the GS1 from the check digit
	
	
	return true;
}

?>