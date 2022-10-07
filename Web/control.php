<?php
ob_start();
use JetBrains\PhpStorm\Language;
include_once 'model.php';
class MyControl extends model{
    function __construct(){
        parent::__construct();
        session_start();
        $url = $_SERVER['PATH_INFO'];
        
        switch($url)
        {
            case '/index':
            include_once 'header.php';
            if(isset($_POST['login']))
            {
                $email = $_POST['email'];
                $pwd = $_POST['password'];
                $where = array('email'=>$email,'password'=>$pwd);
                $login = $this->Select_Where('register',$where);
                $fetch = $login->num_rows;
                if($fetch > 0)
                {
                    $sdata = $login->fetch_object();
                    $_SESSION['uid'] = $sdata->id;
                    $_SESSION['uname'] = $sdata->name;
                    echo "<script>alert('login success');</script>";
                    header('location:products');
                }
                else {
                    echo "<script>alert('invalid data');</script>";
                }
            }
            include_once 'login.php';
            include_once 'footer.php';
            break;

            case '/register':
                include_once 'header.php';
                $alldata = $this->SelectAll("country");

                if(isset($_POST['submit']))
                {
                    $name = $_POST['name'];
                    $pwd = $_POST['password'];
                    $email = $_POST['email'];
                    $bio = $_POST['bio'];
                    $gender = $_POST['gender'];
                    $lan = $_POST['lang'];
                    $l = implode(",",$lan);
                    $country = $_POST['country'];
                    $data = array('name' =>$name,
                                  'password'=>$pwd,
                                  'email'=>$email,
                                  'bio'=>$bio,
                                  'gender'=>$gender,
                                  'language'=>$l,
                                  'country'=>$country);
                    $this->Ins_Data('register',$data);
                }
                include_once 'register.php';
                // print_r($alldata);exit;
                include_once 'footer.php';
                break;

                case '/products':
                    if(isset($_SESSION['uid']))
                    {
                    include_once 'header.php';
                    $all_product = $this->SelectAll('product');
                    if(isset($_POST['cart']))
                    {
                        $uid = $_SESSION['uid'];
                        $pid = $_POST['pid'];
                        $qty = $_POST['qty'];

                        $data = array('uid'=>$uid,'pro_id'=>$pid,'qty'=>$qty);
                        $this->Ins_Data('cart',$data);
                        echo "<script>alert('data inserted');</script>";
                    }
                    include_once 'products.php';
                    include_once 'footer.php';
                    }
                    else{
                        header('location:index');
                    }

                    break;

                    case '/logout':
                        session_destroy();
                        header('location:index');
                        break;

                        case '/showcart':
                            if(isset($_SESSION['uid']))
                            {
                                include_once 'header.php';
                                $cart_data = $this->join_two('cart','product','cart.pro_id=product.pid');
                                include_once 'showcart.php';
                                include_once 'footer.php';
                            }
                            else{
                                header('location:index');
                            }
                                break;

                                case '/paytm-payment':
                                    if(isset($_SESSION['uid']))
                                    {
                                        include_once 'header.php';
                                        $cart_data = $this->join_two('cart','product','cart.pro_id=product.pid');
                                        include_once 'paytm-paymnet.php';
                                        include_once 'footer.php';
                                    }
                                    else{
                                        header('location:index');
                                    }
                                        break;
        }
    }
}
$obj = new MyControl;
ob_flush();