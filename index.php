<html>
    <head>
        <title>Repeater form with HTML,CSS,JQuery,AJAX and Bootstrap by Suat Kuran :)</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css">
		<script type="text/javascript">
		$(document).ready(function() {

			var html = '<tr><td><input type="text" class="form-control" name="txtFullName[]" required=""></td><td><input type="text" class="form-control" name="txtPhone[]" required=""></td><td><input type="button" class="btn btn-danger" name="remove" id="remove" value="remove" required=""></td></tr>'

			var max = 5;

			var x = 1;

			$('#add').click(function(){
				$.ajax({
				if (x <= max) {
				$('#table_field').append(html);
				x++;
				}
			}
			})
			$('#table_field').on('click','#remove',function(){
				$(this).closest('tr').remove();
				x--;
			})

		});
		</script>
    </head>
<body>
    <div class="container">
		<form class="insert-form" id="insert_form" method="post" action="">
			<hr>
			<h1 class="text-center">Repeater form with HTML,CSS,JQuery,AJAX and Bootstrap by Suat Kuran :)</h1>
			<hr>
			<div class="input-field">
			  <table class="table table-bordered" id="table_field">
			    <tr>
			      <th>Ad Soyad</th>
				  <th>Telefon</th>
				  <th>Add or Remove</th>
				</tr>
				<?php 
				  $conn = mysqli_connect("localhost","root","","repeater_db");

				  if (isset($_POST['save'])) {
					$txtFullName = $_POST['txtFullName'];
					$txtPhone = $_POST['txtPhone'];

					foreach($txtFullName as $key => $value) {
						$save = "INSERT INTO tbl_name(name,number)VALUES('".$value."','".$txtPhone[$key]."')";
						$query = mysqli_query($conn, $save);
					}
				}

				?>
				<tr>
				   <td><input type="text" class="form-control" name="txtFullName[]" required=""></td>
				   <td><input type="text" class="form-control" name="txtPhone[]" required=""></td>
				   <td><input type="button" class="btn btn-warning" name="add" id="add" value="Add" required=""></td>
				</tr>
			</table>
			<center>
			<input class="btn btn-success" type="submit" name="save" id="save" value="Save Data">
			</center>

			</div>
</form>
<table class="table table-striped">
	<tr>
		<th>Ad Soyad</th>
		<th>Telefon</th>
	</tr>
	<?php 
	$select = "SELECT * FROM tbl_name ORDER BY id DESC";
	$result = mysqli_query($conn, $select);
	while ($row = mysqli_fetch_array($result)) { ?>

	}
	<tr>
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['number']; ?></td>
</tr>
<?php 
	}
?>
</table>
</div>
</body>
</html>