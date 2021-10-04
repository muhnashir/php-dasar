<?php


function average($nilai){
    $arrLength = count($nilai);
    $tmp=0;
    for($i = 0; $i<$arrLength; $i++){
        $tmp = $tmp + $nilai[$i];
    }
    return $tmp/$arrLength;
}

function minimum($nilai){
    $arrLength = count($nilai);
    $tmp;
    for($i = 0; $i<$arrLength; $i++){
        if($i==0){
            $tmp=$nilai[$i];
        }else{
            if($nilai[$i]<$tmp){
               $tmp=$nilai[$i]; 
            }
        }
    }

    return "Nilai terkecil ".$tmp;
}

function maksimum($nilai){
    $arrLength = count($nilai);
    $tmp;
    for($i = 0; $i<$arrLength; $i++){
        if($i==0){
            $tmp=$nilai[$i];
        }else{
            if($nilai[$i]>$tmp){
               $tmp=$nilai[$i]; 
            }
        }
    }

    return "Nilai terbesar ".$tmp;
}

function hurufkecil($string){
    $tmp=0;
    $kalimat = str_split($string);
    for($i = 0; $i<count($kalimat); $i++){
        if(ctype_lower($kalimat[$i])){
            $tmp++;
        }
    }
    return $string." mengandung ".$tmp. " huruf kecil";
}

function generate($kalimat){
    $arrInput = explode(' ', $kalimat);
	$unigram = '';
	foreach ($arrInput as $data) {
		$unigram .= $data.', ';
	}
	$unigram = substr($unigram, 0, -2);

	$x = 0;
	$bigram = '';
	foreach ($arrInput as $data) {
		if($x < 1) {
			$bigram .= $data.' ';
			$x++;
		}else {
			$bigram .= $data.', ';
			$x = 0;
		}
	}
	$bigram = substr($bigram, 0, -2);

	$y = 0;
	$trigram = '';
	foreach ($arrInput as $data) {
		if($y < 2) {
			$trigram .= $data.' ';
			$y++;
		}else {
		    $trigram .= $data.', ';
		    $y = 0;
		}
	}
	$trigram = substr($trigram, 0, -2);


	$hasil = 'Unigram : '.$unigram. '<br>';
	$hasil .= 'Bigram : '.$bigram. '<br>';
	$hasil .= 'Trigram : '.$trigram;

	return $hasil;
}


$nilai = [8,8,9,10];
echo average($nilai);
echo "<br>";
echo minimum($nilai);
echo "<br>";
echo maksimum($nilai);
echo "<br>";

$string = "muHAmmAD NaSHIr";
echo hurufkecil($string);
echo "<br>";


$kalimat = "Jakarta adalah ibukota negara Republik Indonesia";
echo generate($kalimat);

?>