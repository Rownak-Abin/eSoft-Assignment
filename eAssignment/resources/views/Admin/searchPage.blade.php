<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<style>

	.basic{
		 background-color:black; 
		 color:white; height:40px; 
		 font-size:19px
	}
		
	</style>
	
</head>
<body style="background-color:#c0c0c0">

	<form action="" method="POST" >
		
		<input type="hidden" name="_token" value="{{csrf_token()}}">

	<h2>Search Member</h2>

	<input type="text" name="fromdate" placeholder="From" class="basic"  required>
	to
	<input type="text" name="todate" placeholder="to" class="basic"   required>
	-
	<input type="text" name="keyword" placeholder="Keyword" class="basic"   required>

	<input type="submit" name="submit" value="submit">
	</form>
</body>
</html>