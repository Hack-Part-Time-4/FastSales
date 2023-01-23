<x-layout>
  <x-slot name='title'>{{('FastSales')}}</x-slot>
  
  <div class="container-fluid mt-5" style="width: 80%;">
    <div class="card-body">
      <div class="">
        @if (session()->has('message'))
        <script>
       Swal.fire({
      title: 'Ad created successfully',
      icon: 'success',
      showConfirmButton: false,
      timer: 1500
    })
    // se importa la clase en app.js
          </script>
        @endif
        <form wire:submit.prevent="store">
            @csrf 
            <div class="mb-3"> 
                <h4 class="card-title titulo_letra text-center">{{__('Nuevo anuncio')}}</h4>
                <label for="title" class="form-label mi_letra">{{__('Titulo:')}}</label>
                <input wire:model="title" type="text" value="{{$ad->title}}" class="form-control @error('title') is-invalid @enderror"> 
                @error('title')
                {{__($message)}}
                @enderror
            </div>
           
            <div class="mb-3">
                <label for="price" class="form-label mi_letra">{{__('Precio:')}}</label>
                <input wire:model="price" type="number" value="{{$ad->price}}" class="form-control @error('price') is -invalid 
                    
                @enderror"> 
                @error('price')
                {{__($message)}}
                @enderror 
            </div>
    
            <div class="mb-3">
                <label for="category" class="form-label mi_letra">{{__('Categoria:')}}</label>
                <select wire:model.defer ="category" class="form-control mi_letra">
                    <option value="{{$ad->category->id}}">{{$ad->category->name}}</option>
                    @foreach ($categories as $category)
                        <option 
                        value="{{$category->id}}">{{__($category->name)}}</option>
                       
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label for="body" class="form-label mi_letra">{{__('Descripcion:')}}</label>
                <textarea wire:model="body" rows="5" class="form-control @error('body') is-invalid               
                @enderror">{{$ad->body}}</textarea>  
                @error('body')
                {{__($message)}}
                    
                @enderror
                
            </div>
            <div class="mb-3">
                <input wire:model="temporary_images" type="file" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror">
                @error('temporary_images.*')
                <p class="text-danger mt-2">{{__($message)}}</p>
                @enderror
            </div>
    
            @if (!empty($ad->images))
                <div class="row">
                    <div class="col-12">
                        <p class="mi_letra">{{__('Vista previa')}}:</p>
                        <div class="row">
                            @foreach ($ad->images as $key=>$ad->image)
                                <div class="col-12 col-md-4">
                                    <img src="{{$ad->image->getUrl(400,300)}}" alt="" class="img-fluid">
                                    <img src="{{$ad->image->temporaryUrl()}}" alt="" class="img-fluid">
                                    <button type="button" class="borrar_boton mt-2" wire:click="removeImage({{$key}})">{{__('Eliminar')}}</button>
                                </div>
                            @endforeach
                        </div>
<<<<<<< HEAD
=======
                        
>>>>>>> modificar
    
                    </div>
                </div>
                
            @endif
            {{-- <div class="d-flex justify-content-center">
                <button type="submit" class="mi_boton mb-3">{{__('Modificar')}}</button>
            </div>   {{ route ('panel.index') }}--}}
            <div class="d-flex justify-content-center mt-4">
     
              <button type="submit" class="mi_boton mb-3">{{__('Guardar')}}</button> 
             <a class="btn btn_back" href="{{ route('panel.index')}}">{{__('Volver')}}</a>
            </div>
        </form> 
        
      </div>
    </div>
  </div>
</x-layout>