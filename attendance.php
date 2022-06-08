<div class="card-header">
<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index.php?page=new_attendance"><i class="fa fa-plus"></i> Marker sa presance</a>
			</div>
			</div>
<table class="table tabe-hover table-bordered" id="list">
<tr>
<thead>
  <tr>
    <th class="text-center">User</th>
    <th>In time</th>
    <th>Out time</th>
    <th>Action</th>
  </tr>
<?php include 'db_connect.php' ?>
<?php
$qry = $conn->query("SELECT * from attendance");
$i = 1;
while($row= $qry->fetch_assoc()):
?>

</thead>
          <?php 
          $a = $row['atn_user_id'];
            $id = $conn->query("SELECT firstname , lastname from users where id=$a");
            $name = $id->fetch_assoc();
          ?>
		<tr>
						<td><b><?php  echo ($name['firstname'].' '.$name['lastname']) ?></b></td>
						<td><b><?php echo $row['int_time'] ?></b></td>
            <td><b><?php echo $row['out_time'] ?></b></td>
						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
                        <div class="dropdown-menu" style="">
		                   
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item" href="./index.php?page=edit_user&id=<?php echo $row['id'] ?>">Edit</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item delete_user" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
		                    </div>
                        </td>
                        </tr>

<?php endwhile; ?>
</table>
