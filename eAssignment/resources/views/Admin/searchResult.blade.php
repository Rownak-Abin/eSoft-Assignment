<!DOCTYPE html>
<html>
<head>
	<title>User list page</title>
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	

</head>
<body style="background-color:#C0C0C0">

	<h2 align="center">Search Result</h2>
	

	<br>
	<br>

	<table border="1" align="center" style="background-color:black; color:white; height:150px; font-size:19px">
		<tr>
			<td >SL &nbsp</td>
			<td >TITLE&nbsp &nbsp</td>
			<td >EMAIL</td>
			<td >Fee &nbsp &nbsp</td>
			<td >Action</td>
			
		</tr>

		
		@for($i=0; $i < count($members); $i++)

		
		<tr>

			
			<td>{{$members[$i]->id}}</td>
			<td>{{$members[$i]->name}}</td>
			<td>{{$members[$i]->user_id}}</td>
			<td class="totfee">{{$members[$i]->fee}}</td>
	
			<td >
			
				<a style="color:white" href="{{route('admin.edit', $members[$i]->id)}}">Edit</a> |
				<a style="color:white" href="{{route('admin.delete', $members[$i]->id)}}">Delete</a> 
			</td>
		</tr>

		
		@endfor

		<tr>
			<td></td>
			<td></td>
			<td> Total</td>
			<td class="total"></td>
		</tr>
	</table>

	<script type="text/javascript">
		$(document).ready(function(){

			var totalfee = 0;

			$('.totfee').each(function(){

				var x = $(this).text();

				var y = parseFloat(x);
				totalfee = totalfee + y;
				
			});


			var fee = $('.total').text(totalfee);
			
			
		});


	</script>

</body>
</html>