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
                    <h4>Friend Search</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="text" id="search" class="form-control">
                        
                        
                        
                            
                        </div>
                        
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                      
                      
                        <div class="result"></div>
                        
                    </div>
                    <!-- /.row -->
                </div>
              </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

            


            <!-- Blog Post Content Column -->
            <div class="col-lg-8 mb-5">
    <div class="main_column column">
    <form class="post_form" action="{{route('index')}}" method="POST" enctype="multipart/form-data">
    <textarea name="body" id="post_text" placeholder="What's on your mind " ></textarea>
    <input type="submit" value="Post" name="post">
      {{csrf_field()}}

    </form>

      <hr>
       
      {!!$friends['friends_post'] !!}


            </div>
        </div>

            
            

        </div>
    </div>

   
  <script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('user.liveSearch') }}",
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