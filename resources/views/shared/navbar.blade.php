
@if( Auth::check()  )
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="#">Aprendiendo Laravel</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
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