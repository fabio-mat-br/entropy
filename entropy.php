<?php
// Based on https://rosettacode.org/wiki/Entropy
$data = array(
      "1223334444",
      "1223334444555555555", 
      "122333", 
      "1227774444",
      "aaBBcccDDDD",
      "1234567890abcdefghijklmnopqrstuvwxyz",
      "Rosetta Code"
);
/*
Outputs 
Shannon entropy of "1223334444": 1.846439
Shannon entropy of "1223334444555555555": 1.969811
Shannon entropy of "122333": 1.459148
Shannon entropy of "1227774444": 1.846439
Shannon entropy of "aaBBcccDDDD": 1.936260
Shannon entropy of "1234567890abcdefghijklmnopqrstuvwxyz": 5.169925
Shannon entropy of "Rosetta Code": 3.084963
*/
function getShannonEntropy($s){
	$n = 0;
	$occ = array();
	for($c_ = 0; $c_ < strlen($s); ++$c_) {
		$cx = substr($s, $c_, 1);
		if(array_key_exists($cx, $occ)) {
			$occ[$cx] = $occ[$cx] + 1;
		}
		else {
			$occ[$cx] = 1;
		}
		++$n;
	}
	
	$e = 0;
	
	$ak = array_keys($occ);
	for($j = 0; $j < count($ak); $j++){
		$p = $occ[$ak[$j]] / $n;
		$e += $p * log2($p);
	}
	return -$e;
}

function log2($a) {
    return log($a) / log(2);
}

for($i = 0; $i < count($data); $i++){
	$entropy = getShannonEntropy($data[$i]);
	printf("Shannon entropy of %s: %f\n", "\"" . $data[$i] . "\"", $entropy);
}