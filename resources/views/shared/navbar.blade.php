
@if( Auth::check()  )
	<nav class="navbar navbar-expand-md navbar-dark bg-primary  text-white " >
			
		<div class="collapse navbar-collapse text-white" aria-labelledby="navbarDropdown"  id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto text-white " >
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