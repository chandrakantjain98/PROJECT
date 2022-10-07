<?php
class model{
    public $con;
   function __construct()
   {
    $this->con = new mysqli('localhost','root','','15june');
   }
   function SelectAll($tbl)
   {
    $sql= "SELECT * FROM $tbl";
    $q = $this->con->query($sql);
    while($country = $q->fetch_object())
    {
        $arr[] = $country;
    }
    return $arr;
   }
   function Ins_Data($tbl,$data)
   {
    $keys = array_keys($data);
    $dk = implode(",",$keys);
    $vals = array_values($data);
    $dv = implode("','",$vals);

    $sql = "INSERT INTO $tbl ($dk) VALUES ('$dv')";
    // echo $sql;exit;
    $q = $this->con->query($sql);
    return $q;
   }
   function Select_Where($tbl,$where)
   {

    $sql = "SELECT * FROM $tbl WHERE 1=1";
    $keys = array_keys($where);
    $val = array_values($where);
    $i=0;
    foreach($where as $w)
    {
        $sql.=" AND $keys[$i]='$val[$i]'";
        $i++;
    }
   // echo $sql;exit;
    $q = $this->con->query($sql);
    return $q;
   }
function join_two($tbl1,$tbl2,$on)
{
    $sql= "SELECT * FROM $tbl1 JOIN $tbl2 ON $on";
    // echo $sql;exit;
    $q = $this->con->query($sql);
    while($country = $q->fetch_object())
    {
        $arr[] = $country;
   
    }
    return $arr;
}
}