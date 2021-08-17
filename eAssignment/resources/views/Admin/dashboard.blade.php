<!DOCTYPE html>
<html>
<head>
	<title>User list page</title>
</head>
<body style="background-color:#c0c0c0" align="center">

	<h2>View List</h2>
	

	<br>
	<br>

	<table border="2" align="center" style="background-color:black; color:white; height:150px; font-size:19px">
		<tr>
			<td>SL</td>
			<td>TITLE</td>
			<td>EMAIL</td>
			<td>ADDRESS</td>
			<td>Action</td>
			
		</tr>

		@for($i=0; $i < count($members); $i++)
		<tr>
			<td>{{$members[$i]->id}}</td>
			<td>{{$members[$i]->name}}</td>
			<td>{{$members[$i]->user_id}}</td>
			<td>{{$members[$i]->address}}</td>
	
			<td>
			
				<a style="color:white" href="{{route('admin.edit', $members[$i]->id)}}">Edit</a> |
				<a style="color:white" href="{{route('admin.delete', $members[$i]->id)}}">Delete</a> 
			</td>
		</tr>
		@endfor
	</table>

	<h3>{{$members->onEachSide(3)->links()}}</h3><br>

	<h2>SEARCH</h2>

	<button style="height:30px; width:90px"><a href="/searchPage" >Search</a></button><br><br><br>

	

	<a href="/logout" title="">Logout</a>

	<p>Session is also applied</p>

</body>
</html>

