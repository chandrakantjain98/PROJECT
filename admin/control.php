<?php
ob_start();

// use JetBrains\PhpStorm\Language;

include_once 'model.php';
class MyControl extends model{
    function __construct(){
        parent::__construct();
        $url = $_SERVER['PATH_INFO'];
        $alldata = $this->SelectAll("country");
        $pro = $this->SelectAll('categories');
        
        switch($url)
        {
            case '/index':
            if(isset($_POST['login']))
            {
                $email = $_POST['email'];
                $pwd = $_POST['password'];
                $where = array('email'=>$email,'password'=>$pwd);
                $login = $this->Select_Where('admin',$where);
                $fetch = $login->num_rows;
                if($fetch > 0)
                {
                    echo "<script>alert('login success');</script>";
                }
                else {
                    echo "<script>alert('invalid data');</script>";
                }
            }
            include_once 'login.php';
            break;

            case '/users':
                include_once 'header.php';
                include_once 'sidebar.php';
                $users = $this->SelectAll('register');
                include_once 'allusers.php';
                include_once 'footer.php';
                break;

            case '/delete':
                include_once 'header.php';
                include_once 'sidebar.php';
                if(isset($_GET['did']))
                {
                    $did = $_GET['did'];
                    $where = array('id'=>$did);
                    $this->delete_data('register',$where);
                    header('location:users');
                }

                include_once 'footer.php';
                break;
            case '/edit_user':
                include_once 'header.php';
                include_once 'sidebar.php';
                if(isset($_GET['eid']))
                {
                    $eid = $_GET['eid'];
                    $where = array('id'=>$eid);
                    $data = $this->Select_Where('register',$where);
                    $user_data = $data->fetch_object();

                    //update data
                    if(isset($_POST['update']))
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
                            $this->updata_data('register',$data,$where);
                            header('location:users');         
                    }
                }
                include_once 'edit_user.php';
                include_once 'footer.php';
                break;

                case '/add_category':
                    include_once 'header.php';
                    include_once 'sidebar.php';
                    if(isset($_POST['submit']))
                    {
                        $cat = $_POST['cat'];
                        $data = array('cat_name'=>$cat);
                        $this->Ins_Data('categories',$data);
                        echo "<script>alert('Data Succesfully Added!');</script>";
                    }
                    include_once 'category.php';
                    include_once 'footer.php';
                    break;

                    case '/add_product':
                        include_once 'header.php';
                        include_once 'sidebar.php';
                       
                        if(isset($_POST['submit']))
                        {
                            $cat = $_POST['cat'];
                            $pro= $_POST['pro_name'];
                            $price= $_POST['price'];
                            $pro_img = $_FILES['pro_image']['name'];
                           $desc= $_POST['desc'];
                            $data = array('cat_id'=>$cat,
                                        'pro_name'=>$pro,
                                        'pro_price'=>$price,
                                        'pro_image'=>$pro_img,
                                        'pro_desc'=>$desc);
                            move_uploaded_file($_FILES['pro_image']['tmp_name'],'upload/'.$_FILES['pro_image']['name']);
                            // $this->Ins_Data('categories',$data);
                            $this->Ins_Data('product',$data);
                            echo "<script>alert('Data Succesfully Added!');</script>";
                        }
                        include_once 'product.php';
                        include_once 'footer.php';
                        break;    
         }
    }
}
$obj = new MyControl;
ob_flush();