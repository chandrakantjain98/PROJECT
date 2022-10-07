<table border="1" align="center" style="margin-top: -100px;">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Language</th>
        <th>Action</th>
    </tr>
    <?php
    foreach($users as $u)
    {
        ?>
        <tr>
            <td><?php echo $u->id;?></td>
            <td><?php echo $u->name;?></td>
            <td><?php echo $u->email;?></td>
            <td><?php echo $u->gender;?></td>
            <td><?php echo $u->language;?></td>
            <td><a href="delete?did=<?php echo $u->id;?>">Delete</a>/
            <a href="edit_user?eid=<?php echo $u->id;?>">Update</a>
            <td>
        </tr>
        <?php
    }
    ?>
    </table>