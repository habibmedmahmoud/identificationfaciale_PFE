<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
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
             <video id="video" width="500" height="400"  autoplay > </video>
          </div>
        </div> 
        <form action="{{ route('send_screenshot') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
               <div class="col-md-12">
                 <input type="text" value="0" id="number-sreen" hidden >
                 <input name="userToken" type="text" value="{{ $token }}" id="token" hidden > 
                 <input name="bineryImage"  type="text"  id="binery-image" hidden > 
               </div>
               <div class="col-md-4 offset-4 mt-4" id="screenshot">
                
               </div>
               <div class="col-md-4 offset-4 mb-5 mt-3">
                   <button style="width: 100%" class="btn btn-success" id="submit_form" type="submit"> Envoyer </button>
               </div>
        </div>
        </form>
  </div>

    
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
      function getImage(){
      jQuery(document).ready(function() {
                var img = document.getElementById('img');
                //console.log(img);
                 
                var fullPath = img.src;
                //var filename = fullPath.replace(/^.*[\\\/]/, '');
                //var token = document.getElementById('token').value;
                document.getElementById('binery-image').value = fullPath;
        });
      }
    </script>
</body>
</html>
