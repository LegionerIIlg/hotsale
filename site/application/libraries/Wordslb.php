<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of words
 *
 * @author Администратор
 */
class Wordslb {
    
    
    
    function clearData($text){
        $text=  strip_tags($text);
        $text=  stripcslashes($text);
        $text = trim($text);
        return $text;
    }
    
      function clearSearch($text){
       $w = ['*', "'", '"', ',', '!', "?", ')', '(', '-'];
         $search = str_replace($w, '', $text);
        return $search;
    }
    
    
        function utf8_strlen($s) {// количевство введеных символов для Utf-8
    $c = strlen($s); $l = 0;
    for ($i = 0; $i < $c; ++$i) if ((ord($s[$i]) & 0xC0) != 0x80) ++$l;
    return $l;
} 
 
    
        function cutStr_utf8($str, $lenght = 100) {
       $stroka = iconv('UTF-8','windows-1251',$str ); 
        
        $str = strip_tags($stroka);
        if (strlen($str) >= $lenght) {
            $wrap = wordwrap($str, $lenght, "~");
            $str_cut = substr($wrap, 0, strpos($wrap, "~"));
            $str_cut .= ' ...';
            
            $stroka = iconv('windows-1251','UTF-8',$str_cut ); 
            return $stroka;
        } else {
            $stroka = iconv('windows-1251','UTF-8',$stroka );
     
            return $stroka;
        }
    }
    
        // Обрезать строку до заданной длины
    function cutStr($str, $lenght = 100) {
        $str = strip_tags($str);
        if (strlen($str) >= $lenght) {
            $wrap = wordwrap($str, $lenght, "~");
            $str_cut = substr($wrap, 0, strpos($wrap, "~"));
            $str_cut .= ' ...';
            return $str_cut;
        } else {
           $str_cut = $str ;//. ' ...';
            return $str_cut;
        }
    }

    function change_mans_ukr($data){
        $ukr_m2=["сiчень","лютий","березень","квiтень","травень","червень",
            "липень","серпень","вересень","жовтень","листопад","грудень"];
        $ukr_m=["Сiч","Лют","Бер","Квi","Тра","Чер",
            "Лип","Сер","Вер","Жов","Лист","Гру"];
$eng_m=["January","February","March","April","May","June","July","August","September","October","November","December"];
 
foreach ($eng_m as $k=>$v )    { if($data==$v) {$data= $ukr_m[$k];
return $data;

}}


    }
    
    
function translit ($string) # Функция перекодировки кириллицы в транслит.
{
$trans = [
'ий' => 'iy',    
'ая' => 'aya',
'є' => 'ye',    
'i' => 'i',
'і' => 'i',    
'ж' => 'zh',
'ё' => 'yo',
'й' => 'i',
'ю' => 'yu',
'ь' => "",
'ч' => 'ch',
'щ' => 'sh',
'ц' => 'c',
'у' => 'u',
'к' => 'k',
'е' => 'e',
'н' => 'n',
'г' => 'g',
'ш' => 'sh',
'з' => 'z',
'х' => 'h',
'ъ' => "",
'ф' => 'f',
'ы' => 'y',
'в' => 'v',
'а' => 'a',
'п' => 'p',
'р' => 'r',
'о' => 'o',
'л' => 'l',
'д' => 'd',
'э' => 'yе',
'я' => 'ya',
'с' => 's',
'м' => 'm',
'и' => 'i',
'т' => 't',
'б' => 'b',
'Ё' => 'yo',
'Й' => 'I',
'Ю' => 'YU',
'Ч' => 'CH',
'Ь' => "'",
'Щ' => 'SH',
'Ц' => 'C',
'У' => 'U',
'К' => 'K',
'Е' => 'E',
'Н' => 'N',
'Г' => 'G',
'Ш' => 'SH',
'З' => 'Z',
'Х' => 'H',
'Ъ' => "''",
'Ф' => 'F',
'Ы' => 'Y',
'В' => 'V',
'А' => 'A',
'П' => 'P',
'Р' => 'R',
'О' => 'O',
'Л' => 'L',
'Д' => 'D',
'Ж' => 'Zh',
'Э' => 'Ye',
'Є' => 'Ye',
'Я' => 'Ja',
'С' => 'S',
'М' => 'M',
'И' => 'I',
'Т' => 'T',
'Б' => 'B',
 'І' => 'I'];
return strtr($string, $trans);
}




function _strtolower($string)
{
    $small = ['а','б','в','г','д','е','ё','ж','з','и','й',
                   'к','л','м','н','о','п','р','с','т','у','ф',
                   'х','ч','ц','ш','щ','э','ю','я','ы','ъ','ь',
                   'э', 'ю', 'я','і'];
    $large = ['А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й',
                   'К','Л','М','Н','О','П','Р','С','Т','У','Ф',
                   'Х','Ч','Ц','Ш','Щ','Э','Ю','Я','Ы','Ъ','Ь',
                   'Э', 'Ю', 'Я','І'];
    return str_replace($large, $small, $string); 
}
 
function _strtoupper($string)
{
    $small = ['а','б','в','г','д','е','ё','ж','з','и','й',
                   'к','л','м','н','о','п','р','с','т','у','ф',
                   'х','ч','ц','ш','щ','э','ю','я','ы','ъ','ь',
                   'э', 'ю', 'я'];
    $large = ['А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й',
                   'К','Л','М','Н','О','П','Р','С','Т','У','Ф',
                   'Х','Ч','Ц','Ш','Щ','Э','Ю','Я','Ы','Ъ','Ь',
                   'Э', 'Ю', 'Я'];
    return str_replace($small, $large, $string);  
}




        function Time_To_Show($value){
                $montharray = ['1' => 'Января','2' => 'Февраля','3' => 'Марта','4' => 'Апреля','5' => 'Мая','6' => 'Июня','7' => 'Июля','8' => 'Августа','9' => 'Сентября','10' => 'Октября','11' => 'Ноября','12' => 'Декабря'];
                $time           = explode(' ',$value);
                $date = $time[0];
                        $dateconvert = explode('-',$date);
                        $year  = $dateconvert[0];
                        $month = $montharray[(intval($dateconvert[1]))];
                        $day   = intval($dateconvert[2]);
              if(!empty($time[1])) $time = $time[1]; else $time='';  
        return $day." ".$month." ".$year." ".$time;
        }      

      function Time_To_Show_Break($value){
                $time           = explode(' ',$value);
                $date = $time[0];
                        $dateconvert = explode('-',$date);
                        $year  = $dateconvert[0];
                        $month = $dateconvert[1];
                        $day   = $dateconvert[2];
               if(!empty($time[1])) $time = $time[1]; else $time='';
                   return $day.".".$month.".".$year." ".$time;
        } 


        
        
        
        function orfFilter($string){
	/*Кол-во попадений не правильных слов в строке чтобы считать что строка написана в не правильной раскладке*/
	$countErrorWords = 1;
	/*счетчик не правильных слов*/
	$countError = 0;
	/*При попадении таких слов, считать что выбрана не правильная раскладка клавиатуры*/
	$errorWords = ['b', 'd', 'yt', 'jy', 'yf', 'z', 'xnj', 'c', 'cj', 'njn', ',snm', 'f', 'dtcm', "'nj", 'rfr', 'jyf', 'gj', 'yj', 'jyb', 'r', 'e', 'ns', 'bp', 'pf', 'ds', 'nfr', ';t', 'jn', 'crfpfnm',"'njn", 'rjnjhsq', 'vjxm', 'xtkjdtr', 'j', 'jlby', 'tot', ',s', 'nfrjq', 'njkmrj', 'ct,z', 'cdjt', 'rfrjq', 'rjulf', 'e;t', 'lkz', 'djn', 'rnj', 'lf', 'ujdjhbnm', 'ujl', 'pyfnm', 'vjq', 'lj', 'bkb', 'tckb', 'dhtvz', 'herf', 'ytn', 'cfvsq', 'yb', 'cnfnm', ',jkmijq', 'lf;t', 'lheujq', 'yfi', 'cdjq', 'ye', 'gjl', 'ult', 'ltkj', 'tcnm', 'cfv', 'hfp', 'xnj,s', 'ldf', 'nfv', 'xtv', 'ukfp', ';bpym', 'gthdsq', 'ltym', 'nenf', 'ybxnj', 'gjnjv', 'jxtym', '[jntnm', 'kb', 'ghb', 'ujkjdf', 'yflj', ',tp', 'dbltnm', 'blnb', 'ntgthm', 'nj;t', 'cnjznm', 'lheu', 'ljv', 'ctqxfc', 'vj;yj', 'gjckt', 'ckjdj', 'pltcm', 'levfnm', 'vtcnj', 'cghjcbnm', 'xthtp', 'kbwj', 'njulf', 'dtlm', '[jhjibq', 'rf;lsq', 'yjdsq', ';bnm', 'ljk;ys', 'cvjnhtnm', 'gjxtve', 'gjnjve', 'cnjhjyf', 'ghjcnj', 'yjuf', 'cbltnm', 'gjyznm', 'bvtnm', 'rjytxysq', 'ltkfnm', 'dlheu', 'yfl', 'dpznm', 'ybrnj', 'cltkfnm', 'ldthm', 'gthtl', 'ye;ysq', 'gjybvfnm', 'rfpfnmcz', 'hf,jnf', 'nhb', 'dfi', 'e;', 'ptvkz', 'rjytw', 'ytcrjkmrj', 'xfc', 'ujkjc', 'ujhjl', 'gjcktlybq', 'gjrf', '[jhjij', 'ghbdtn', 'pljhjdj', 'pljhjdf', 'ntcn', 'yjdjq', 'jr', 'tuj', 'rjt', 'kb,j', 'xnjkb', 'ndj.', 'ndjz', 'nen', 'zcyj', 'gjyznyj', 'x`', 'xt'];
	/*Символы которые нужно исключить из строки*/
	$delChar = ['!' => '', '&' => '', '?' => '', '/' => ''];
	/*Исключения*/
	$expectWord = ['.ьу'=>'/me'];
	/*Символы для замены на русские*/
	$arrReplace = ['q'=>'й', 'w'=>'ц', 'e'=>'у', 'r'=>'к', 't'=>'е', 'y'=>'н', 'u'=>'г', 'i'=>'ш', 'o'=>'щ', 'p'=>'з', '['=>'х', ']'=>'ъ', 'a'=>'ф', 's'=>'ы', 'd'=>'в', 'f'=>'а', 'g'=>'п', 'h'=>'р', 'j'=>'о', 'k'=>'л', 'l'=>'д', ';'=>'ж', "'"=>'э', 'z'=>'я', 'x'=>'ч', 'c'=>'с', 'v'=>'м', 'b'=>'и', 'n'=>'т', 'm'=>'ь', ','=>'б', '.'=>'ю', '/'=>'.', '`'=>'ё', 'Q'=>'Й', 'W'=>'Ц', 'E'=>'У', 'R'=>'К', 'T'=>'Е', 'Y'=>'Н', 'U'=>'Г', 'I'=>'Ш', 'O'=>'Щ', 'P'=>'З', '{'=>'Х', '}'=>'Ъ', 'A'=>'Ф', 'S'=>'Ы', 'D'=>'В', 'F'=>'А', 'G'=>'П', 'H'=>'Р', 'J'=>'О', 'K'=>'Л', 'L'=>'Д', ':'=>'Ж', '"'=>'Э', '|'=>'/', 'Z'=>'Я', 'X'=>'Ч', 'C'=>'С', 'V'=>'М', 'B'=>'И', 'N'=>'Т', 'M'=>'Ь', '<'=>'Б', '>'=>'Ю', '?'=>',', '~'=>'Ё', '@'=>'"', '#'=>'№', '$'=>';', '^'=>':', '&'=>'?'];
	/*Меняем ключ со значением в массиве $arrReplace*/
	$arrReplace2 = array_flip($arrReplace);
	/*Удаляем некоторые символы*/
	unset($arrReplace2['.']);
	unset($arrReplace2[',']);
	unset($arrReplace2[';']);
	unset($arrReplace2['"']);
	unset($arrReplace2['?']);
	unset($arrReplace2['/']);
	/*И соединяем массивы в один*/
	$arrReplace = array_merge($arrReplace, $arrReplace2);
	/*Переводим в нижний регистр, удаляем пробелы с начала и конца, разбиваем предложение на слова*/
	$string2 = strtr(trim(strtolower($string)), $delChar);
	$arrString = explode(" ", $string2);
	/*Проверям есть ли неправильно написаные слова и считаем их кол-во*/
	foreach ($arrString as $val){
		if (array_search($val, $errorWords)){
			$countError++;
		}
	}
	return ($countError >= $countErrorWords)?strtr(strtr($string ,$arrReplace),$expectWord):$string;
}



     
        function orfFilter_to($string){
  
    $arrReplace = ['q'=>'й', 'w'=>'ц', 'e'=>'у', 'r'=>'к', 't'=>'е', 'y'=>'н', 'u'=>'г', 'i'=>'ш', 'o'=>'щ', 'p'=>'з', '['=>'х', ']'=>'ъ', 'a'=>'ф', 's'=>'ы', 'd'=>'в', 'f'=>'а', 'g'=>'п', 'h'=>'р', 'j'=>'о', 'k'=>'л', 'l'=>'д', ';'=>'ж', "'"=>'э', 'z'=>'я', 'x'=>'ч', 'c'=>'с', 'v'=>'м', 'b'=>'и', 'n'=>'т', 'm'=>'ь', ','=>'б', '.'=>'ю', '/'=>'.', '`'=>'ё', 'Q'=>'Й', 'W'=>'Ц', 'E'=>'У', 'R'=>'К', 'T'=>'Е', 'Y'=>'Н', 'U'=>'Г', 'I'=>'Ш', 'O'=>'Щ', 'P'=>'З', '{'=>'Х', '}'=>'Ъ', 'A'=>'Ф', 'S'=>'Ы', 'D'=>'В', 'F'=>'А', 'G'=>'П', 'H'=>'Р', 'J'=>'О', 'K'=>'Л', 'L'=>'Д', ':'=>'Ж', '"'=>'Э', '|'=>'/', 'Z'=>'Я', 'X'=>'Ч', 'C'=>'С', 'V'=>'М', 'B'=>'И', 'N'=>'Т', 'M'=>'Ь', '<'=>'Б', '>'=>'Ю', '?'=>',', '~'=>'Ё', '@'=>'"', '#'=>'№', '$'=>';', '^'=>':', '&'=>'?'];
  
    
    $string2 = trim($string);
   
    return strtr($string, $arrReplace);
}       
   




}

?>
