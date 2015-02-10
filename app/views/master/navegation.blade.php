<nav>
	<div class="navbar navbar-default">
		<div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		    </button>
		    <a class="navbar-brand" href="{{ URL::route('home') }}">Sistema de Nómina</a>
		</div>
	  	<div class="navbar-collapse collapse navbar-responsive-collapse">
		    <ul class="nav navbar-nav">
		      	<li><a href="{{ URL::route('home') }}">Inicio</a></li>
		      	<li><a href="{{ route('empresas.index') }}">Empresa</a></li> 
		      	<li><a href="{{ route('conceptos.index') }}">Conceptos</a></li> 	
		      	<li><a href="{{ route('trabajadores.index') }}">Trabajadores</a></li>
		      	<li><a href="{{ route('recibos.index') }}">Recibos</a></li>
		      	<li><a href="{{ route('representantes.index') }}">Representantes</a></li>
		      	<li><a href="{{ route('constancias.index') }}">Constancias</a></li> 	    
		    </ul>	 
		    <ul class="nav navbar-nav navbar-right">	   
		      <li class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuario <b class="caret"></b></a>
		        <ul class="dropdown-menu">
			        @if(Auth::check() && (Auth::user()->id_rol == 2))
				      	<li><a href="{{ URL::route('account-sign-out') }}">Sign out</a></li>
				      	<li><a href=" {{ URL::route('account-change-password') }} ">Change password</a></li>
			      	@elseif(Auth::check() && (Auth::user()->id_rol == 1))
						<li><a href=" {{ URL::route('account-sign-out') }} ">Sign out</a></li>
						<li><a href=" {{ URL::route('account-change-password') }} ">Change password</a></li>
						<li><a href=" {{ URL::route('editor') }} ">Editor</a></li>
					@elseif(Auth::check() && (Auth::user()->id_rol == 0))
						<li><a href=" {{ URL::route('profile-user') }} ">Mi Perfil</a></li>
						<li><a href=" {{ URL::route('account-sign-out') }} ">Sign out</a></li>
						<li><a href=" {{ URL::route('account-change-password') }} ">Change password</a></li>
						<li><a href=" {{ URL::route('editor') }} ">Editor</a></li>
						<li><a href=" {{ URL::route('admin') }} ">Administracion</a></li>
					@else
						<li><a href=" {{ URL::route('account-sign-in') }} ">Sign in</a></li>
						<li><a href=" {{ URL::route('account-create') }} ">Create an account</a></li>
						<li><a href=" {{ URL::route('account-forgot-password') }} ">Forgot password</a></li>
					@endif
		        </ul>
		      </li>
		    </ul>
	  	</div>
	</div>
</nav>
