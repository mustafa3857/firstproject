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
    <title>Resetpassword</title>
</head>
<body>
    <section style="padding-top:60px; ">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                   <div class="card">
                      <div class="card-header" style="text-align:center;"  >
                          Password reset
                      </div> 
                      <div class="card-body">
                         <x-alert />
                      <form action="{{ route('reset') }}" method="post"  enctype="multipart/form-data" >
                         @csrf
                       <input type="hidden" name="id" value="{{ $user->id }}"/>   
                         <div class="form-group">
                             <label for="title">Previous password</label>
                             <input type="text" name="password" class="form-control" placeholder="{{ $user->password }}" style="margin-top:10px;" />
                             @error('title')
                                 <span class="text-danger" >{{ $message }}</span>
                             @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">New Password</label>
                                <input type="text" name="newpassword" class="form-control"  style="margin-top:10px;" />
                                @error('title')
                                    <span class="text-danger" >{{ $message }}</span>
                                @enderror
                               </div>
                               <div class="form-group">
                                <label for="title">Confirm Password</label>
                                <input type="text" name="confirmpassword" class="form-control"  style="margin-top:10px;" />
                                @error('title')
                                    <span class="text-danger" >{{ $message }}</span>
                                @enderror
                               </div>
                    
                         <button type="submit" class="btn btn-success" style="margin-top:10px;"  >Password reset</button>
                         <a href="\allpostswithcomments" style="margin-top:10px; " class="btn btn-info">Back</a>
                         
                        </form>
                      </div>
                   </div> 
                </div>
            </div>
        </div>
        </section>
</body>
</html>