<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <form  method="post" style="text-align: center;">
    <table border="1" align="center" style="margin-top: 150px;margin-left:550px;">
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name" value="<?php echo $user_data->name;?>"></td>
        </tr>
        <tr>
            <td>passwpord</td>
            <td><input type="password" name="password"  value="<?php echo $user_data->password;?>></td>
        </tr>

        <tr>
            <td>Email:</td>
           <td><input type="email"name="email"  value="<?php echo $user_data->email;?></td>
        </tr>

        <tr>
            <td>Bio</td>
            <td><textarea name="bio" ><?php echo $user_data->bio;?></textarea></td>
            <tr>

         
        <tr>
            <td>Gender:</td>
            <td><input type="radio" name="gender" value="male"
            <?php
                $g = $user_data->gender;
                if($g == "male")
                {
                    echo "Checked='Checked'";
                }
                ?>
                >Male
                <input type="radio" name="gender" value="female"

                <?php
                $g = $user_data->gender;
                if($g == "female")
                {
                    echo "Checked='Checked'";
                }
                ?>
                >Female
            
            </td>
        </tr>
        <tr>
            <td>Language:</td>
            <td><input type="checkbox" name="lang[]" value="Gujrati"
            <?php
                $h = $user_data->language;
                $hh = explode(",",$h);
                if(in_array("Gujrati",$hh))
                {
                    echo "Checked='Checked'";
                }
            ?>

            >Gujrati
                <input type="checkbox" name="lang[]" value="Hindi"
                <?php
                $h = $user_data->language;
                $hh = explode(",",$h);
                if(in_array("Hindi",$hh))
                {
                    echo "Checked='Checked'";
                }
            ?>
                >Hindi
            
            </td>
        </tr>
        <tr>
            <td>Country:</td>
            <td><select name="country">
                <option value=""></option>
              <?php
              foreach($alldata as $c)
              {
                if($user_data->country ==$c->cid)
                {
                ?>
                    <option value="<?php echo $c->cid;?>" selected='selected'><?php echo $c->cname;?></option>
                    <?php
                }else
                {

                ?>
                <option value="<?php echo $c->cid;?>"><?php echo $c->cname;?></option>
                <?php
              }}?>
            </select></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="updatet" value="Update">
                <input type="reset" name="reset" value="Reset">

            </td>
        </tr>

    </table>
  </form>
</body>
</html>