<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <title>Post details</title>
</head>
<body>
    <section style="padding-top:60px; ">
    <div class="container">
        <div class="row">
            <div class="col-md-6"  style="margin-left:300px;" >
               <div class="card">
                  <div class="card-header" style="text-align:center;"  >
                      Post Details
                  </div> 
                  <div class="card-body">
                      @if(Session::has('comments_created'))
                      <div class="alert alert-success" role="alert" >{{ Session::get('comments_created') }}</div>
                      @endif
                      <h6  style="display:inline-block;"  >POST Title:</h6>
        
                      <span>{{ $post->title }}</span>
                      <br>
                    <img src="{{ asset('images') }}/{{ $post->image }}" alt="image"  width="500px"  />
                   <br>
             
               <h6  style="display:inline-block;" >POST Description:</h6> <span>{{ $post->body }}</span>
                   
                 <form action="/allpostswithcomments/{{ $post->id }}" style="margin-top:5px;"  method="POST" >
                          @csrf
                     <div class="form group">
                         <label for="body1"  ><b><u>New Comment:</u></b></label>
                         <textarea name="body1" class="form-control"></textarea>
                     </div>
                     <br>
                     <button type="submit" class="btn btn-primary">Add Comment</button>
                     <a href="\posts" class="btn btn-success">Back</a>
                </form>
                <br>
                @if($post->comments->count())
                <br>
                <ul class="list-group-item" >
                 @foreach ($post->comments as $comment)

                 <li  class="list-item"><b>{{ $comment->user->name }}</b></li>
                 <br>
                 <li  class="list-item" style="color:red;" >{{ $comment->body }}</li>

                 <li  class="list-item">{{ $comment->created_at }}</li>
                 <br>
                 <hr>
                 <form action="/allpostswithcomments/{{ $comment->id }}" style="margin-top:5px;"  method="POST" >
                  @csrf
             <div class="form group">
                 
                 <textarea name="body1" class="form-control"></textarea>
             </div>
             <br>
             <button type="submit" class="btn btn-success">Reply</button>
             <br>
            @if($comment->replies->count())
             @foreach ($comment->replies as $reply)
             <li  class="list-item"><b>{{ $reply->user->name }}</b></li>
             <br>
             <li  class="list-item">{{ $reply->body }}</li>
             <br>
             <li  class="list-item">{{ $reply->created_at }}</li>
             <br>
             @endforeach
        </form>
            @endif
          
                <br>
                <br>
                 @endforeach
                </ul>
                @endif 
                  </div>
               </div> 
            </div>
        </div>
    </div>
    </section>
</body>
</html>