<!DOCTYPE html>
<html>
	<head>
	<title>Evaporate.JS</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

	<style type="text/css">
	body{
		padding-top: 20px;
	}
	.btn-file {
	    position: relative;
	    overflow: hidden;
	}
	.btn-file input[type=file] {
	    position: absolute;
	    top: 0;
	    right: 0;
	    min-width: 100%;
	    min-height: 100%;
	    font-size: 999px;
	    text-align: right;
	    filter: alpha(opacity=0);
	    opacity: 0;
	    outline: none;
	    background: white;
	    cursor: inherit;
	    display: block;
	}
	</style>
	</head>

<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">


	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script src="{{ asset('js/evaporate.js') }}"></script>


		<div style="margin-bottom:20px;">
			<div class="progress">
			  <div class="progress-bar" role="progressbar" style="width: 0%;">
			  </div>
			</div>
		</div>

		<div id="upload-complete" style="margin-bottom:20px;">
		</div>

		<span class="btn btn-primary btn-lg btn-file">
		 	Browse <input type="file" id="files"  multiple />
		</span>


	      <script language="javascript">
	      
	         var files;
	         
	         var _e_ = new Evaporate({
	            signerUrl: '/sign_auth',
	            aws_key: 'AWS_KEY',
	            bucket: 'BUCKET_NAME',
	            aws_url: 'AWS_URL' // something like https://s3-ap-southeast-1.amazonaws.com
	         });
	      
	         $('#files').change(function(evt){
	            files = evt.target.files;
	            
	            for (var i = 0; i < files.length; i++){
	            
	               _e_.add({
	                  name: 'test_' + Math.floor(1000000000*Math.random()) + '.' + files[i].name.replace(/^.*\./, ''),
	                  file: files[i],
	                  xAmzHeadersAtInitiate : {
	                     'x-amz-acl': 'public-read'
	                  },
	                  signParams: {
	                     foo: 'bar'
	                  },
	                  complete: function(r){
	                     console.log('complete................yay!');

	                     $('#upload-complete').html('Upload Completed');

	                     $('.progress-bar').css({width:Math.floor(0) + '%'});
	                  },
	                  progress: function(progress){
	                  	$('.progress-bar').css({width:Math.floor(progress*100) + '%'});
	                  }
	               });
	            }
	            
	            $(evt.target).val('');
	            
	         });
	      
	      </script>

		</div>
	</div>
</div>

	</body>
</html>