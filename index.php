<!DOCTYPE html>
<html lang="en">
	<head>
        <title>TODO</title>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="dataTable/dataTables.bootstrap4.min.css">
        
	</head>
    <style>
        .well {
            background-color: #ddd;
            padding: 20px;
           border-radius: 8px;
        }
    </style>
<body>
	<nav class="navbar navbar-light bg-light shadow-sm">
		<div class="container">
			<a class="navbar-brand">MY TODO LIST APP</a>
		</div>
	</nav>
	<div class="col-md-8 mt-4 m-auto well">
		<h3 class="text-primary text-center">PHP - Simple To Do List App</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-8 m-auto">
			<center>
				<form method="POST" action="add_query.php">
					<div class="input-group">
                        <input type="text" class="form-control" name="task" placeholder="Enter Your Task Here..." autocomplete="off" required/>
					    <button class="input-group-text bg-dark text-light" name="add" id="basic-addon2">Add Task</button>
                    </div>
				</form>
			</center>
		</div>
		<br /><br /><br />
		<table class="table table-striped table-hover" id="todo">
			<thead>
				<tr>
					<th>#</th>
					<th>Task</th>
					<th>Date</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					require 'conn.php';
					$query = $conn->query("SELECT * FROM `task` ORDER BY `task_id` DESC");
					$count = 1;
					while($fetch = $query->fetch_array()){
				?>
				<tr>
					<td><?php echo $count++?></td>
					<td><?php echo $fetch['task']?></td>
					<td><?php echo date('M-d-Y h:i A',strtotime($fetch['created_at']))?></td>
					<td><?php echo $fetch['status']?></td>
					<td colspan="2">
						<center>
							<?php
								if($fetch['status'] != "Done"){
									echo 
									'<a href="update_task.php?task_id='.$fetch['task_id'].'" class="btn btn-success btn-sm"><span class="fa fa-check"></span></a> |';
								}
							?>
							 <a href="delete_query.php?task_id=<?php echo $fetch['task_id']?>" class="btn btn-danger btn-sm"><span class="fa fa-remove"></span></a>
						</center>
					</td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
    <script src="dataTable/jquery-3.4.1.min.js"></script>
    <script src="dataTable/jquery.dataTables.min.js"></script>
    <script src="dataTable/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#todo').DataTable();
        });
    </script>
</body>
</html>