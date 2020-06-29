<div class="card">
<div class="card-header"><h2>Management Student</h2></div>
<div class="card-body">
<table class="table table-responsive-sm table-bordered">
<thead>
<tr>
<th>Username</th>
<th>Full Name</th>
<th>Email</th>
<th>Phone Number</th>
<th>Role</th>
<th style="text-align:right;">Action</th>
</tr>
</thead>
<tbody>
<?php foreach ($list_user as $row): ?>
        <tr>
        <?php
        foreach ($row as $key => $value) {
            if ($key != 'id' and $key != 'password' and $key !='role') {
                echo ("<td>".htmlentities($value, ENT_QUOTES, "UTF-8")."</td>\n");
            }
        }
        ?>
        <td>

        <?php if($_SESSION['role'] == 0): ?>
        <div class="float-right" style="margin:2px">
          <div class="btn btn-dark" onclick="submit_form('update_user','username_update','<?=$row['username'] ?>')" type="button"> Update</div>
        </div>
        <?php endif;?>
        <div class="float-right" style="margin:2px">
          <div class="btn btn-success" onclick="submit_form('info','user_id','<?=$row['id'] ?>')" type="button"> Info</div>
        </div>
        </td>
        </td>
        </tr>
        
<?php endforeach; ?>
</tbody>
</table>
<form action="<?= PATH_INDEX ?>?c=management&a=deleteuser" id="delete_user" method="POST">
  <input type="text" id="username_delete" name="username" value="a" style="display:none">
  <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
</form> 
<form action="<?= PATH_INDEX ?>" id="inbox" method="GET">
  <input type="text" name="c" value="message" style="display:none">
  <input type="text" id="inbox_id" name="id" value="a" style="display:none">
</form> 
<form action="<?= PATH_INDEX ?>" id="info" method="GET">
  <input type="text" name="c" value="info" style="display:none">
  <input type="text" id="user_id" name="id" value="a" style="display:none">
</form> 
<form action="<?= PATH_INDEX ?>?c=update" id="update_user" method="POST">
  <input type="text" id="username_update" name="username" value="a" style="display:none">
</form> 
</div>
</div>