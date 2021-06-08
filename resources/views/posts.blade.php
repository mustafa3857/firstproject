<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      
    <title>All Post</title>
</head>
<body>
    <section style="padding-top:60px; ">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
               <div class="card">
                  <div class="card-header">
                    Posts crud part        <a href="\allpostswithcomments" class="btn btn-success" style="float:right;" >Back</a>
                  </div> 
                  <div class="card-body">
                     <div style="display:inline-block;"  ><x-alert  /> </div>
                     <table class="table table-striped">
                      <thead>
                          <tr style="background-color:lightblue;" >
                              <th>ID</th>
                              <th>Post Title</th>
                              <th>Post Description</th>
                              <th>User_Id</th>
                              <th>Image</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($posts as $post)
                          <tr>
                          <td>{{ $post->id }}</td>
                          <td>{{ $post->title }}</td>
                          <td>{{ $post->body }}</td> 
                          <td>{{ $post->user_id }}</td>
                          <td>
                    
                            <img src="{{ asset('images') }}/{{ $post->image }}" alt="image"  width="100px"  />
                            
                          </td>
                          <td>
                            
                              <a href="/update-post/{{ $post->id }}"  class="btn btn-success">Update</a>
                              <a href="/delete-post/{{ $post->id }}" class="btn btn-danger" >Delete</a>
                        </td>
                          </tr>
                          @endforeach
                         
                      </tbody>
                     </table>
                  </div>
               </div> 
            </div>
        </div>
    </div>
    </section>
</body>
</html>