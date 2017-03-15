<nav class="navbar navbar-inverse fixed-top bg-inverse">
	<div class="container-nav">
		<a href="{{ url('/') }}" class="navbar-brand"><img src="{{ elixir('img/favicon.png') }}" alt=""></a>
		@if(Auth::guard()->check() && !Request::is('unicorn*'))
		<div class="dropdown">
			<a href="#" class="dropdown-toggle" id="dropdown-logout" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				Hi, <strong>{{ Auth::guard()->user()->brand_name }}</strong>
			</a>
			<ul class="dropdown-menu" aria-labelledby="dropdown-logout">
				<li><a href='{{ url('/brand/logout') }}'>Log Out</a></li>
			</ul>
		</div>
		@elseif(Auth::guard('admin_users')->check() && Request::is('unicorn*'))
		<div class="dropdown">
			<a href="#" class="dropdown-toggle" id="dropdown-logout" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				Hi, <strong>{{ Auth::guard('admin_users')->user()->name }}</strong>
			</a>
			<ul class="dropdown-menu" aria-labelledby="dropdown-logout">
				<li><a href='{{ url('/brand/logout') }}'>Log Out</a></li>
			</ul>
		</div>
		@else
		<a href='{{ url('/brand/login') }}'>Log In</a>
		@endif
	</div>
</nav>

<div class="navbar-seperation"></div>