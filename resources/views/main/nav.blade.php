<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
  <a class="navbar-brand" href="{{route('index')}}">Social App</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      
                        
     

      <li class="nav-item active">
        <a class="nav-link" href="{{route('index')}}">{{ Auth::user()->username }} <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active" >
        <a class="nav-link" href="{{route('user.request')}}"> Notification <span class="badge badge-pill badge-light" id="load_notification">{{Session::get('count')>0?Session::get('count') : ''}}</span></a>
       
        
      </li>

     




     <li class="nav-item active">
        <a class="nav-link" href="{{route('user.message',['username'=>'new'])}}">Message<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('user.logout')}}">Logout<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    
  </div>
</nav>