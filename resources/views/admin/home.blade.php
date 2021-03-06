@extends('admin.template')

@section('content')

    <div class="container text-center">
        <div class="row">
            <div class="col-md-6">   
                <img class="img-fluid" src=" {{ asset('storage/images/icon/log.gif') }} ">
            </div>
            <div class="col-md-6"  >
                <h1 class="font-weight-light">Bienvenido(a) {{ Auth::user()->name}} al Panel de administración de la Friki Zone.</h1>
                <h5>El mejor sitio para fans del anime</h5>
                <h6 class="small">Pasala bien!</h6>   

            </div>
        </div>

        <hr>
       
        <div class="row">
            
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                      <img class="img-fluid" src=" {{ asset('storage/images/icon/cat.png') }} ">
                    </div>
                    <div class="">   
                        <a href="{{ route('category.index') }}" class="btn btn-warning btn-block btn-home-admin">CATEGORÍAS</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <img class="img-fluid" src=" {{ asset('storage/images/icon/car.png') }} ">
                    </div>
                    <div>    
                        <a href=" {{route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">PRODUCTOS</a>
                    </div>
                </div>
            </div>
                    
        </div>
        <br><br> 
        <div class="row">
            
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <img class="img-fluid" src=" {{ asset('storage/images/icon/paypal.png') }} ">   
                    </div>
                    <div>
                        <a href="{{ route('order.index') }}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS</a>
                    </div>
                </div>
            </div> 
            
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <img class="img-fluid" src=" {{ asset('storage/images/icon/users.png') }} ">
                    </div>
                    <div>
                        <a href="{{ route('user.index') }}" class="btn btn-warning btn-block btn-home-admin">USUARIOS</a>
                    </div>
                </div>      
            </div>
                    
        </div>
        
    </div>
    <hr>
    <br>    <br>
@stop