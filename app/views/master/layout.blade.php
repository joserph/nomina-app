<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nómina</title>
	{{ HTML::style('assets/css/reset.css', array('media' => 'screen')) }}
	{{ HTML::style('assets/css/yeti-bootstrap.css', array('media' => 'screen')) }}
	{{ HTML::style('assets/css/font-awesome.min.css', array('media' => 'screen')) }}  
	
</head>
<body>
	<div class="container">
		@include('master.navegation')
		@if(Session::has('global'))
	  		<div class="alert alert-warning">
		      	<button type="button" class="close" data-dismiss="alert">×</button>
				<p>{{ Session::get('global') }}</p>
		    </div>
	    @endif
	    @if(Session::has('create'))
		    <div class="alert alert-dismissable alert-info">
			  	<button type="button" class="close" data-dismiss="alert">×</button>
			  	<p><strong>Bien hecho! </strong> {{ Session::get('create') }}</p>
			</div>	
	    @endif
	    @if(Session::has('editar'))
	    	<div class="alert alert-dismissable alert-success">
			  	<button type="button" class="close" data-dismiss="alert">×</button>
			  	<p><strong>Bien hecho! </strong> {{ Session::get('editar') }}</p>
			</div>			  		
	    @endif
	    @if(Session::has('delete'))
	    	<div class="alert alert-dismissable alert-danger">
			  	<button type="button" class="close" data-dismiss="alert">×</button>
			  	<p>{{ Session::get('delete') }}</p>
			</div>
	    @endif
		
		@yield('content')
	</div>
	<!--Javascript-->
	{{ HTML::script('assets/js/jquery.min.js') }}
	{{ HTML::script('assets/js/bootstrap.js') }}
	{{ HTML::script('assets/js/menuresponsive.js') }}
</body>
</html>