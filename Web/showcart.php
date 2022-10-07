<script src="https://code.jquery.com/jquery-3.6.1.js" 
integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('#btn').click(function(){
            alert("You Have Been Redirect To Merchant Page!");
            window.location='paytm-payment';
        });
    })
</script>
<table border="1" align="center" style="margin-top: 100px;">
    <tr>
        <th>Image</th>
        <th>Pro_name</th>
        <th>Pro_Price</th>
        <th>qty</th>
        <th>Total</th>
    </tr>
    <?php
    $sub_total = 0;
    foreach($cart_data as $c)
    {
        ?>
        <td><img src="../admin//upload/<?php echo $c->pro_image;?>" alt="" height="100" width="100"> </td>
        <td><?php echo $c->pro_name;?></td>
        <td><?php echo $c->pro_price;?></td>
        <td><?php echo $c->qty;?></td>
        <td><?php echo $c->pro_price*$c->qty;?></td>

    <tr>

    <?php
        $sub_total+= $c->pro_price*$c->qty;
    }
    ?>
        <tr>
            <td colspan="5" align="right"><?php echo $sub_total;?></td>

            <tr>
            </tr>
            <td colspan="5" align="right"><button type="button" id="btn" class="btn btn-warning">Place Order</button></td>
        </tr>
</table>