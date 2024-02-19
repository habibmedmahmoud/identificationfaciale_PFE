<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<script defer  src="{{ asset('custome-script/face-api.min.js') }}"></script>
<script defer  src="{{ asset('custome-script/detect-face.js') }}"></script>
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <style>

    canvas {
      position: absolute;
    }
  </style>
</head>
<body> 
  <div class="container">
        <div class="row" id="vid">
          <div class="col-md-8 offset-2" id="video-div" style="
      display: flex;
      justify-content: center;
      align-items: center;">
             
             <ul>
               <li><h2> <i class="fa-solid fa-check"></i> Register</h2></li>
               <li><h2> <i class="fa-solid fa-check"></i> email verifier</h2></li>
               <li><h2> <i class="fa-solid fa-check"></i> processing</h2></li>
               <li><h2> @if ($matching == 1)
                   <i class="fa-solid fa-check"></i> @else
                   <i class="fa-solid fa-xmark"></i>
               @endif Matching</h2></li>
               
            </ul>
          </div>
        </div> 
  </div>
</body>
</html>
