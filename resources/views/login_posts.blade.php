<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Post details</title>

 

</head>
<body>


    <div>
        <a href="\allpostswithcomments" class="btn btn-success" >Back</a>
    </div>
    @foreach (auth()->user()->posts as $post)
    <section>
    <div class="container">
        <div class="row">
            <div class="col-md-6"  style="margin-left:300px;" >
               <div class="card">
                  <div class="card-header" style="text-align:center;"  >
                      Post Details
                  </div> 
                  <div class="card-body">
                   
                      <h6  style="display:inline-block;"  >POST Title:</h6>
        
                      <span>{{ $post->title }}</span>
                      <br>
                    <img src="{{ asset('images') }}/{{ $post->image }}" alt="image"  width="200px" height="200px"  />
                   <br>
             
               <h6  style="display:inline-block;" >POST Description:</h6> <span>{{ $post->body }}</span>
               <br>   
               <span>{{ $post->created_at }}</span> 
                
                          @csrf
                          <br>
                        <input type="submit"  style="background-color:whtie; " class="btn btn-primary"  value="Comment"  onclick="addHide({{ $post->id }});"  />

                     <div class="form group"  style="display:none;"  id="form_group{{ $post->id }}" >
                         
                         <textarea name="body" class="form-control"  class="body"  ></textarea>
                         <button type="submit" class="btn btn-primary" id="btn_submit" onclick="addComment({{ $post->id }},this);" >Add Comment</button>
                        </div>
                     <br>
                     
                     <div   id="commentbody{{ $post->id }}"  style="border:1px solid black; "  >

                     @foreach ($post->comments as $comment)
                     <ul style="background-color:white; "  >
                      <li><b>{{ $comment->user->name }}</b></li>
                      <br>
                      <li>{{ $comment->body }}</li>
                      <br>
                      <input type="submit"  style="background-color:whtie; "  class="btn btn-success"  value="Reply"  onclick="addReplyshow({{ $comment->id }});"  />
                      <div class="form group"  style="display:none;"  id="form_reply{{ $comment->id }}" >
                        <textarea name="body" class="form-control"  class="body" style="font-weight:bold;"  >{{ $comment->user->name }}:</textarea>
                        <button type="submit" class="btn btn-success"  id="btn_submitreply" onclick="addReply({{ $comment->id }},this);" >Add Reply</button>
                       </div>
                       <div   id="replybody{{ $comment->id }}">
                       @foreach ($comment->replies as $reply)
                 
                       <li style="float:right;" ><b>{{ $reply->user->name }}</b></li>
                       <br  style="float:right;">
                       <li style="float:right;">{{ $reply->body }}</li>
                        <br style="float:right;">
                       @endforeach
                      </div>
                     </ul>
                    @endforeach
                    </div>
                     
                
                <br>
               {{--    @if($post->comments->count())
                  <br>
                  <ul class="list-group-item" >
                   @foreach ($post->comments as $comment)

                   <li  class="list-item"><b>{{ $comment->user->name }}</b></li>
                   <br>
                   <li  class="list-item" style="color:red;" >{{ $comment->body }}</li>
                   <br>
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
                  @endif    --}}    
                  </div>
               </div> 
            </div>
        </div>
    </div>
    </section>
   
    @endforeach



    <script>
         function addHide(pid){
           $('#form_group'+pid).toggle();
         }

         function addReplyshow(commentid){
           $('#form_reply'+commentid).toggle();
         }
         function addComment(pid,me){
      //  let text=$(".body").val();
       let text=$(me).prev().val();
    
        let _token=$("input[name=_token]").val();
        $.ajax({
          url:"{{ route('commentsave') }}",
          type:"POST",
          data:{
            body:text,
            _token:_token,
            post_id:pid
          },
          success:function(response){
          for (const key in response) {
            if (Object.hasOwnProperty.call(response, key)) {
            /*  const element = response[key].user.name;
              console.log(element);    */

              $("#commentbody"+pid).prepend('<li><b>'+response[key].user.name+'</b></li><br><li>'+response[key].body+'</li><br>');
            }
          }  
          }
        });   
        
        }

        function addReply(commentid,me){
      //  let text=$(".body").val();
       let text=$(me).prev().val();
    
        let _token=$("input[name=_token]").val();
        $.ajax({
          url:"{{ route('replysave') }}",
          type:"POST",
          data:{
            body:text,
            _token:_token,
            comment_id:commentid
          },
          success:function(response){
          for (const key in response) {
            if (Object.hasOwnProperty.call(response, key)) {
            /*  const element = response[key].user.name;
              console.log(element);    */

              $("#replybody"+commentid).prepend('<li><b>'+response[key].user.name+'</b></li><br><li>'+response[key].body+'</li><br>');
            }
          }  
          }
        });   
        
        }
     
    </script>    
</body>
</html>