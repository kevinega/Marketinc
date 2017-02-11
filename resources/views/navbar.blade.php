{{-- navbar register page --}}
<div class="container">
	<nav class="navbar navbar-inverse fixed-top bg-inverse">
		<div class="container-nav">
			<a href="#" class="navbar-brand"><img src="{{ elixir('img/favicon.png') }}" alt=""></a>

			@if (Auth::guest())
				<a href='{{ url('/login') }}'>Log In</a>
			@else
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" id="user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    Hi, {{ Auth::user()->brand_name }}!
					</a>

					<div class="dropdown-menu" aria-labelledby="user-dropdown">
						<a class="dropdown-item" href="#">Profile</a>
						<a class="dropdown-item" href="#">Log Out</a>
					</div>
				</div>
	        @endif
	    </div>
	</nav>
	<div class="navbar-seperation"></div>
</div>