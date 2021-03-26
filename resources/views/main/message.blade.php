@extends('main.master')

@section('content')



    <!-- Page Content -->
    <div class="container">

        <div class="row">


          <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
            	  <!-- Blog Categories Well -->
                <div class="well">
                    <div class="row">
                       <div class="user_details ">
                          <a href="#">  <img src="{{url('/frontend/'.Auth::user()->profile_pic)}}"> </a>

                          <div class="user_details_left_right">
                           <a href="">{{ Auth::user()->username }} </a><br>
              
                           Posts: {{ Auth::user()->num_post }}  <br>
                           Likes: 0

      
                        </div>
                       </div>
  
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Blog Search Well -->
            
                <!-- Blog Categories Well -->
                <div class="well">
                    
                    <div class="row">
                      @if($search)
                      <h4>Friend Search</h4>
                        <div class="col-lg-12">
                            <input type="text" id="search" class="form-control">
                        
                        
                        
                            
                        </div>
                        @else
                        @foreach($details as $user)
                        <div class="user_details ">
                          <a href="#">  <img src="{{url('/frontend/'.$user->profile_pic)}}"> </a>

                          <div class="user_details_left_right">
                           <a href="">{{ $user->username }} </a><br>
              
                           Posts: {{ $user->num_post }}  <br>
                           Likes: 0

      
                        </div>
                       </div>
                       @endforeach
                        
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                      
                      
                        <div class="result"></div>
                        
                    </div>
                    <!-- /.row -->
                </div>
              </div>

                <!-- Side Widget Well -->
                

            </div>

            


            <!-- Blog Post Content Column -->
            <div class="col-lg-8 mb-5">
              @if(!$search)
               <div class="main_column column">
                <div class='loaded_messages' id='scroll_messages'>
        You
   
    </div>

     <div class="messages_post">
      <form action="" method="POST">
     
     
        <textarea name='message_body' id='message_textarea' placeholder='write yoyr message'></textarea>
        <input type='submit' name='post_message' class='info' id='message_submit' value='Send'>
     

      </form>
    </div>
    
   

   </div>
   @endif
    
        </div>

            
            

        </div>
    </div>

   
  <script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('message.liveSearch') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('.result').html(data.liveSearchData);
    
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});
</script>









@endsection