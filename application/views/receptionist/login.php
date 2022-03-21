<!DOCTYPE html>
<html>
<head>
 
    <?php $this->load->view('_template/header.php') ?>

	<meta charset="utf-8">
	<meta name="viewport" content="width=devic-width, initial-scale=1">
	<title></title>
</head>
<body>
<div class="border p-5">
		<center>
	<h4>hotel zzz</h4>
    
	<div class="d-flex justify-content-center p-5">
		<form action="" method="POST">
		<div class="border p-5">
			<h4>Login</h4>
			<div class="form-group">
				<input type="text" class="form-control" name="username" placeholder="masukan nama">
		</div>

		<div class="form-group">
				<input type="text" class="form-control" name="password" placeholder="masukan password">
		</div>

		<button type="submit" id="login" value="login"
		    class="form-control btn btn-primary" style="margin: 3.3em auto;">Login</button>


    </div>
		</form>
</div>

</body>
</html>

