<?php

  function pola($input){
    $color['black']  = [1,2,5,7,10,11];
    $color['white'] = [3,4,6,8,9,12];

    if (in_array($input, $color['black'])) {
      return 'style="background : black; color: white;"';
    } else {
      return 'style="background : white"';
    }
  }

  //analisis 
  // D  F  H  K  N  Q
  // E  D  K  G  S  K
  // +1 -2 +3 -4 +5 -6
  function enkripsi($plaintext){

    $huruf = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
    $toUPPER = strtoupper($plaintext);
    $arrInput = str_split($toUPPER);
    $arrLength = count($arrInput);
    $chippertext = "";
    $genap =true;
    $tmp;
    for($i=0; $i<$arrLength; $i++){
        $tmp = array_search($arrInput[$i], $huruf);
        if($genap){
            $chippertext.=$huruf[$tmp+($i+1)];
            $genap = false;
        }else{
            $ne = $tmp-($i+1);
			if($ne < 0) {
			    $ne = count($huruf) + ($ne);
			}
			$chippertext .= $huruf[$ne];
			$genap = true;
        }

    }
    return $chippertext;
		
  } 

  $no = 1;
  $v = 1;
  echo "<table>";
  for($i = 0; $i < 8; $i++){
   echo '<tr>';
    for($x = 0; $x < 8; $x++){
      echo '<td '.pola($v).'>';
      echo $no++;
      echo '</td>';
      if ($v==12) {
        $v = 1;
      } else {
        $v++;
      }
    }
   echo '</tr>';
  }
  echo "</table>";

  echo "<br>";

$plaintext = "DFHKNQ";
echo enkripsi($plaintext);

?>