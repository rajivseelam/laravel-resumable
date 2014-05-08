@extends('master')


@section('content')

<div>

<div class="container">
	<div class="row">
		<div class="col-md-12" style="text-align:center;">

			<div class="jumbotron">
			  <h1><span class="glyphicon glyphicon-file"></span> {{ $file }}</h1>
			  <p><a href="{{ $url }}" class="btn btn-primary btn-lg" role="button">
			  <span class="glyphicon glyphicon-download-alt"></span> Download</a></p>
			</div>

		</div>
	</div>
</div>

</div>

	
@stop