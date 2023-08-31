<x-layout>

  
    <x-slot name='title'>FastSales - {{__($category->name)}}</x-slot>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center titulo_letra">{{__('Anuncios por categoria:')}} {{__($category->name)}}</h1>
            </div>
        </div>
        <div class="row">
            @forelse($ads as $ad)
            <div class="col-12 col-md-4 d-flex justify-content-center">
                <div class="card  mi_card" style="width: 22rem;">
                 <img src="{{!$ad->images()->get()->isEmpty() ? $ad->images()->first()->getUrl(400,300) : 'https://via.placeholder.com/150'}}" class="card-img-top mi_img" alt="...">
                    <div class="">
                        <h5 class="card-title"> {{$ad->title}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">€ {{$ad->price}}</h6>
                        {{-- <p class="card-text"> {{$ad->body}}</p> --}}
                        <div>
                            <a href="{{route("ads.show",$ad)}}" class="card-title text-decoration-none text-dark">
                                <p class="bi bi-geo-alt-fill"> {{$ad->location}}</p>
                            </a>
                        </div>
                        <div class="card-subtitle mb-2">
                            <a href="{{route('category.ads',$ad->category)}}" class="text-decoration-none letra_dark">#{{__($ad->category->name)}}</a>
                            <i>{{$ad->created_at->format('d/m/Y')}}</i>
                        </div>
                        <div class="card-subtitle mb-2">
                            <small>{{ $ad->user->name }}</small>
                        </div> 
                        <a href="{{route("ads.show",$ad)}}" class="text-decoration-none nav_letra mi_boton">{{__('Mostrar Más')}}</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                  <p class="letra_dark fs-3">{{__('Uyy.. parece que no hay nada')}}</p>
                  <a href="{{route('ads.create')}}" class="btn btn-success me-3">{{__('Vende tu primer objeto ')}}</a>{{__(' o')}} <a href="{{route('home')}}" class="btn btn-primary ms-3">{{__('Vuelve a la home')}}</a> 
              </div>
            @endforelse
        </div>
    </div>
    <div class="d-flex justify-content-center mb-5">
        {{-- {{$ads->links()}}  --}}
        {{$ads->links()}} 
    </div>
   
</x-layout>