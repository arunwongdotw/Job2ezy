<?
function mount_thai($strDate)
{
$strYear = date("Y",strtotime($strDate))+543;
$strMonth= date("n",strtotime($strDate));
$strDay= date("j",strtotime($strDate));
$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
$strMonthThai=$strMonthCut[$strMonth];
return "$strMonthThai $strYear";
}
//-----------------
function dateth($date)
{
$y = date("Y",strtotime($date))+543;
$m= date("m",strtotime($date));
$d= date("d",strtotime($date));
return $d."/".$m."/".$y;
}

function datetimeth($date)
{
$y = date("Y",strtotime($date))+543;
$m= date("m",strtotime($date));
$d= date("d",strtotime($date));
$t= date("H:i:s",strtotime($date));
return $d."/".$m."/".$y." ".$t;
}

function dmy($strDate)
{
$strYear = date("Y",strtotime($strDate))+543;
$strMonth= date("n",strtotime($strDate));
$strDay= date("j",strtotime($strDate));
$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
$strMonthThai=$strMonthCut[$strMonth];
return "$strDay $strMonthThai $strYear";
}

function qaotation($date)
{
$y = date("Y",strtotime($date));
$m= date("m",strtotime($date));
$d= date("d",strtotime($date));
$h= date("H",strtotime($date));
$i= date("i",strtotime($date));
$s= date("s",strtotime($date));
return $y.$m.$d.$h.$i.$s;
}
?>