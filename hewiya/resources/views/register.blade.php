<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> 
</head>
<body> 
   <div class="container-fluid">
      <div class="row mt-5">
          <div class="col-md-6 offset-md-3">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif  
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
           <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" required name="email" id="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                     <label for="firstName">Nom</label>
                    <input type="text" class="form-control"  required name="firstName" id="firstName" placeholder="Nom">
                </div>
                <div class="form-group">
                    <label for="lastName">Prenom</label>
                    <input type="text" class="form-control" required name="lastName" id="lastName" placeholder="Prenom">
                </div>
                <div class="form-group">
                    <label for="nni">NNI</label>
                    <input type="number"  name="nni" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tel">Telephone</label>
                    <input type="number"  name="tel" class="form-control">
                </div>
                <div class="form-group">
                    <label for="type_document">Type de document</label>
                    <select name="type_document" id="" class="form-control">
                        <option value=""></option>
                        <option value="carte_id">Carte d'dentification</option>
                        <option value="passport">passport</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="file">Document d'identification</label>
                    <input type="file" accept="image/*" name="file" class="form-control" required id="file">
                </div>
                <button type="submit" class="btn btn-success float-right">Enregistrer</button>
            </form>
          </div>
      </div>
   </div>
</body>
</html>
