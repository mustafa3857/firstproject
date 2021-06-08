<div>
    @if(session()->has('message'))
    {{$slot}}
    <div class="py-2 px-2 bg-green-200 my-3">{{ session()->get('message') }}</div>
    @elseif(session()->has('error'))
    {{$slot}}
    <div class="py-2 px-2 bg-red-200">{{ session()->get('error') }}</div>
    @endif

    @if ($errors->any())
    <div class="py-2 px-2 bg-red-200 my-3"  style="display:inline-block;" >
       <ul>
          @foreach ($errors->all() as $error)
                <li style="text-decoration:underline;">{{ $error }}</li>
                
          @endforeach
       </ul>
    </div>
@endif

</div>