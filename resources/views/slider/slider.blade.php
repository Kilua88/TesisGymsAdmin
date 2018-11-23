<div id="carousel-example" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($slides as $item)
            @if($item->estado)
                <li data-target="#carousel-example" data-slide-to="{{ $loop->index }}"
                    class="{{ $loop->first ? ' active' : '' }}"></li>
            @endif   
        @endforeach
    </ol>
    <div class='carousel-inner'  heigth=800px width=800px>
        @foreach($slides as $item)
            @if($item->estado)
                <div class="carousel-item {{ $loop->first ? ' active' : '' }}"  style="border-color: white;" >
                    <center><img class="d-block w-100" src="{{ url($item->url) }}" alt="{{ $item->titulos }}"  style="margin: auto;" height=480 width=1024></center>
                    <div class="carousel-caption">
                        <h5 style="color:#2e86c1"; text-shadow: "5px 5px 5px black;">{{ $item->titulos }}</h5>
                        <p style="color:white"; text-shadow: "5px 5px 5px black;">{{ $item->descripcion}}</p>
                    </div>
                </div>
            @endif 
        @endforeach
    </div>
</div>
    
<a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
<!-- End Carousel Controls -->