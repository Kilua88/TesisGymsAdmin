@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              

                <div class="card-body">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                @if(Auth::user()->hasRole('admin'))
                    <div>Acceso como administrador</div>
                @else
                    @if( Auth::user()->hasRole('gimnasio') )
                            <div class="container">
                            
                                <div class="slider">

                                @include('slider.slider',array('slides'=>DB::table('image__sliders')->where('users_id','=',Auth::id())->get()))
                                </div>

                               
                             
                        
                        @endif
                @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
