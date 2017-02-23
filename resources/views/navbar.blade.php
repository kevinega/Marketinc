<nav class="navbar navbar-inverse fixed-top bg-inverse">
	<div class="container-nav">
		<a href="{{ url('/') }}" class="navbar-brand"><img src="{{ elixir('img/favicon.png') }}" alt=""></a>
		@if(Auth::guard()->check())
		<a href="#">Hi, <strong>{{ Auth::guard()->user()->name }}</strong></a>
		@elseif(Auth::guard('admin_users')->check() && Request::is('unicorn*'))
		<a href="#">Hi, <strong>{{ Auth::guard('admin_users')->user()->name }}</strong></a>
		@else
		<a href='{{ url('/login') }}'>Log In</a>
		@endif
	</div>
</nav>