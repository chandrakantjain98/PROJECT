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

   function delete_data($tbl,$where)
   {
    $sql = "DELETE FROM $tbl WHERE 1=1";
    $key = array_keys($where);
    $val = array_values($where);
    $i = 0;
    foreach($where as $w)
    {
        $sql.= " AND $key[$i]='$val[$i]'";
        $i++;
    }
    $q =$this->con->query($sql);
    return $q;
   }
   function updata_data($tbl,$data,$where)
   {
    $sql = "UPDATE $tbl SET";
    $dk = array_keys($data);
    $dv = array_values($data);

    $i = 0;
    $count = count($data);
    foreach($data as $d)
    {
        if($count == $i+1)
        {
            $sql.= " $dk[$i] = '$dv[$i]'";
        }
        else
        {
            $sql.= "$dk[$i] = '$dv[$i]',";
        }
        $i++;
     }
     $sql.="WHERE 1=1";
     $wk = array_keys($where);
     $wv = array_values($where);
     $j=0;
     foreach($where as $w)
     {
        $sql.= "AND $wk[$j] = '$wv[$j]'";
        $j++;
     }
    //  echo $sql;exit;
     $q = $this->con->query($sql);
     return $q;
   }
}