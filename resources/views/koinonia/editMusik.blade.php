<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

</head>
<body>

     
     
         <div class="row">
             <div class="col-lg-12 margin-tb">
                 <div class="pull-left">
                     <h2>Edit Product</h2>
                 </div>
                 <div class="pull-right">
                     <a class="btn btn-primary" href="{{ route('musik.index') }}"> Back</a>
                 </div>
             </div>
         </div>
          
         @if ($errors->any())
             <div class="alert alert-danger">
                 <strong>Whoops!</strong> There were some problems with your input.<br><br>
                 <ul>
                     @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             </div>
         @endif
         
         <form action="{{ route('musik.update',$musik->id) }}" method="POST" enctype="multipart/form-data"> 
             @csrf
             @method('PUT')
          
              <div class="row">
                 <div class="col-xs-12 col-sm-12 col-md-12">
                     <div class="form-group">
                         <strong>Judul:</strong>
                         <input type="text" name="name" value="{{ $musik->name }}" class="form-control" placeholder="Name">
                     </div>
                 </div>
                 <div class="col-xs-12 col-sm-12 col-md-12">
                     <div class="form-group">
                         <strong>Keterangan:</strong>
                         <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $musik->detail }}</textarea>
                     </div>
                 </div>
                 <div class="col-xs-12 col-sm-12 col-md-12">
                     <div class="form-group">
                         <strong>Image:</strong>
                         <input type="file" name="image" class="form-control" placeholder="image">
                         <img src="/image/{{ $musik->image }}" width="300px">
                     </div>
                 </div>
                 <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                   <button type="submit" class="btn btn-primary">Submit</button>
                 </div>
             </div>
          
         </form>
    
</body>
</html>