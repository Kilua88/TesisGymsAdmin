
@if( Auth::check()  )
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
			
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				@foreach ($menus as $key => $item)
					@if ($item['padre'] != 0)
						@break
					@endif
						@include('shared.menu-item', ['item' => $item])
				@endforeach
			</ul>
		</div>
	</nav>
@endif