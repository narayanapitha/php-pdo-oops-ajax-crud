<?php
require_once '/usermodel.php';
if(isset($_POST['action']) &&  $_POST['action']== 'update'){
	$data = new UserModel();
	$data = $data->updateUserInfo($_POST['mobile'],$_POST['id']);
	echo json_encode($data);
	exit;
}else if(isset($_POST['action']) && $_POST['action']== 'delete'){
	$data = new UserModel();
	$data = $data->deleteUserInfo($_POST['id']);
	echo json_encode($data);
	exit;
	
}else{
	$data = new UserModel();
	$data = $data->getUserInfo();
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Crud PHP AJAX Call</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="script.js"></script>
</head>
<body>

<div class="container">
  <h2>Basic Table</h2>
  <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>            
  <table class="table">
    <thead>
      <tr>
        <th>user Id</th>
        <th>Mobile</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
     
        
        <?php

	        foreach ($data as $key => $value) {
	        	# code...
	        	?>
	        	<tr class="table-container" id="<?php echo $value['user_id'];?>">
		        	<td><?php echo $value['user_id'];?></td>
		        	<td>
		        		<p id="mobile_<?php echo $value['user_id'];?>">
		        			<?php echo $value['mobile'];?>
		        		</p>
		        		<p id="mobile_edit_<?php echo $value['user_id'];?>" class="hidden">
		        			<input type="text" id="mobile_data_<?php echo $value['user_id'];?>" name="mobile" value="<?php echo $value['mobile'];?>">
		        		</p>
		        	</td>

		        	<!-- <td><p><?php echo $value['user_email'];?></p></td> -->
		        	<td>
		        		<a class="edit" href="#" id="edit_<?php echo $value['user_id'];?>">
		        			<span class="glyphicon glyphicon-pencil"></span>
		        		</a>
		        		<a class="save hidden" href="#" id="save_<?php echo $value['user_id'];?>">
		        			<span class="glyphicon glyphicon-saved"></span>
		        		</a>
		        	</td>
		        	<td><a href="#" class="delete" id="delete_<?php echo $value['user_id'];?>"> <span class="glyphicon glyphicon-trash"></span></a></td>
		        </tr>
	        	<?php
	        }

        ?>
      
      
    </tbody>
  </table>
</div>


</body>
</html>

