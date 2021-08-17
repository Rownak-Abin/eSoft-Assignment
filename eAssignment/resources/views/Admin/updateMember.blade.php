<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body style="background-color:#c0c0c0; font-size:20px">

	<form action="" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{csrf_token()}}">

		<h2 align="center">Update Member Details</h2>

		<table align="center">

			
			<tr>
				<td>Name: </td>
				<td><input type="text" name="nm" value="{{$editMem->name}}"> </td>
			</tr>

			<tr>
				<td>Address: </td>
				<td><input type="text" name="address" value="{{$editMem->address}}"> </td>
			</tr>

			<tr>
				<td>Phone No: </td>
				<td><input type="text" name="phn" value="{{$editMem->phone}}"> </td>
			</tr>

			<tr>
				<td>District: </td>
				<td>
					<select name="dist"  >
					  <option value="Dhaka">Dhaka</option>
					  <option value="Chittagong">Chittagong</option>
					  <option value="Rangpur">Rangpur</option>
					  <option value="Sylhet">Sylhet</option>
					</select>

				</td>
			</tr>

			<tr>
				<td>NID: </td>
				<td><input type="file" name="nid" required > </td>
			</tr>

			<tr>
				<td>Photo: </td>
				<td><input type="file" name="photo" required> </td>
			</tr>

			<tr>
				<td>Fee: </td>
				<td><input type="text" name="fee" value="{{$editMem->fee}}"> </td>
			</tr>

			<tr>
				<td>User's Id: </td>
				<td><input type="text" name="email" value="{{$editMem->user_id}}"> </td>
			</tr>

			<tr>
				<td>Password: </td>
				<td><input type="Password" name="pass" value="{{$editMem->pass}}"> </td>
			</tr>

			<tr>
				<td>Confirm Password: </td>
				<td><input type="Password" name="passConf" value="{{$editMem->conPass}}"> </td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="UPDATE"></td>

			</tr>


			
		

			
		</table>
		           @foreach($errors->all() as $err)
              <div style="color:red;  text-align: center">
                {{$err}} <br>
              </div>
            @endforeach
		
	</form>
	<p align="center" style="color:green">Change The Infos And Click Update</p>
</body>
</html>