@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @if (count($errors) > 1)           
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach            
           
            @else
                {{$errors->first()}}
            @endif
        </ul>
    </div>  
@endif



@if (!session()->has('type') && session()->has('message'))
    <div class="alert alert-success">
        <p>{{ session('message') }}</p>
    </div>
@else
    @if (session()->has('message'))
        <div class="alert alert-{{session('type')}}">
            <p>{{ session('message') }}</p>
        </div>
    @endif
@endif