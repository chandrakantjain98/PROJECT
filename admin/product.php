<form action="" method="post" enctype="multipart/form-data">
    <table border="1" align="center">
        <tr>
            <td>Category:</td>
            <td><select name = "cat">
                <?php
                foreach($pro as $p)
                {
            ?>
            <option value="<?php echo $p->cat_id;?>"><?php echo $p->cat_name;?></option>
            <?php
                }
                ?>
                </select>
                </td>
        </tr>

        <tr>
            <td>Product:</td>
            <td><input type="text" name="pro_name"></td>
        <tr>

        </tr>
            <td>Price:</td>
            <td><input type="text" name="price"></td>
        <tr>
        </tr>
            <td>Image:</td>
            <td><input type="file" name="pro_image"></td>
        <tr>
           
        </tr>
            <td>Desc:</td>
            <td><input type="text" name="desc"></td>
        <tr>
        </tr>
            <td colspan="2" align="center"><input type="submit" name="submit" value="submit"></td>
        <tr>
    </table>
</form>