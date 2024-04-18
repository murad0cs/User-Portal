<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">
  .wrapper{
  	margin: 0 auto;
  	width: 75%;
  	margin-top: 10px;
  }
  </style>

</head>
<body>
	<div class="wrapper">
		<section class="panel panel-primary">
			<div class="panel-heading">
				Download Files Laravel
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<th>Title</th>
						<th>Upload Date</th>
						<th>Action</th>
					</thead>

					<tbody>

					@foreach($downloads as $down)
						<tr>
							<td>{{$down->file_title}}</td>
							<td>{{$down->created_at}}</td>
							<td>
							<a href="download/{{$down->file_name}}" download="{{$down->file_name}}">
								<button type="button" class="btn btn-primary">
								<i class="glyphicon glyphicon-download">
									Download
								</i>
								</button>
							</a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</section>
	</div>

</body>
</html>
