<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" type="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ url('/') }}">Laravel App</a>
		</div>
		<div class="colapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="{{ (request()->is('siswa*')) ? 'active' : '' }}"><a href="{{ url('siswa') }}">Siswa</a></li>				
				<li class="{{ (request()->is('kelas*')) ? 'active' : '' }}"><a href="{{ url('kelas') }}">Kelas <span class="sr-only">(current)</span></a></li>
				<li class="{{ (request()->is('hobi*')) ? 'active' : '' }}"><a href="{{ url('hobi') }}">Hobi <span class="sr-only">(current)</span></a></li>			
				<li class="{{ (request()->is('about*')) ? 'active' : '' }}"><a href="{{ url('about') }}">About</a></li>				
				@if(Auth::check() && Auth::user()->level == 'admin')
					<li class="{{ (request()->is('user*')) ? 'active' : '' }}"><a href="{{ url('user') }}">User <span class="sr-only">(current)</span></a></li>
				@endif
			</ul>
			<ul class="nav navbar-nav navbar-right">
				@if(Auth::check())
					<li class="nav-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('logout') }}
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</div>
					</li>
				@else
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">{{ __('login') }}</a>
					</li>
				@endif				
			</ul>
		</div>
	</div>
</nav>