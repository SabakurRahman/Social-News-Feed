@extends('main.master')

@section('content')



    <!-- Page Content -->
    <div class="container">

        <div class="row">


          <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-2">
               

            </div>
            
           

            <!-- Blog Post Content Column -->
            <div class="col-lg-8 mb-5">
               <div class="well">
                    <div class="row">
                      
                      
  
                       <div class="user_details ">
                         @if($num_row==0)
                        
                         <h6>No Friends Request At This Time</h6>
                         @else
                        
                        <h4>Friends Request</h4>
                        

                        {!! $data['fname'] !!}
                        
                             
 



                         

      
                      @endif
                       </div>
                      
                    </div>
                    <!-- /.row -->
                </div>
    


            </div>
           
           
        </div>

            
            

        </div>



 






@endsection