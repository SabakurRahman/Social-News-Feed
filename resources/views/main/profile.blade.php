@extends('main.master')

@section('content')



    <!-- Page Content -->
    <div class="container">

        <div class="row">


          <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-2">
            	 

            </div>

            @foreach($details as $profile_details)


            <!-- Blog Post Content Column -->
            <div class="col-lg-8 mb-5">
               <div class="well">
                    <div class="row">
                       <div class="user_details ">
                          <a href="#">  <img src="{{url('/frontend/'.$profile_details->profile_pic)}}"> </a>

                          <div class="user_details_left_right">
                           <a href="">{{ $profile_details->username }} </a><br>
              
                           Posts: {{ $profile_details->num_post }}  <br>
                           Likes: 0<br>
                           @if(Auth::user()->username != $profile_details->username)
                           <form action="{{route('post.userfriends',['username'=>$profile_details->username])}}" method="POST" >
                              @if($result)
                               <input type="submit" name="remove_friend" class="danger" value="Remove Friend"><br>
                              @elseif($request_send)
                              <input type="submit" name="" class="success" value="Request Sent"><br>
                              @elseif($request_recive)
                              <input type="submit" name="response" class="success" value="Response"><br>
                            
                             @else
                            <input type="submit" name="add_friend" class="success" value="Add Friend"><br>

                             @endif
                              {{csrf_field()}}

                           </form>
                          
                           @endif

      
                        </div>
                       </div>
  
                    </div>
                    <!-- /.row -->
                </div>
    


            </div>
            @endforeach
        </div>

            
            

        </div>


 






@endsection