const video = document.getElementById('video')

Promise.all([
  faceapi.nets.tinyFaceDetector.loadFromUri('/models'),
  faceapi.nets.faceLandmark68Net.loadFromUri('/models'),
  faceapi.nets.faceRecognitionNet.loadFromUri('/models'),
  faceapi.nets.faceExpressionNet.loadFromUri('/models')
]).then(startVideo)

function startVideo() {
    navigator.getUserMedia = ( navigator.getUserMedia ||
        navigator.webkitGetUserMedia ||
        navigator.mozGetUserMedia ||
        navigator.msGetUserMedia);

    navigator.getUserMedia(
        { video: {} },
        stream => video.srcObject = stream,
        err => console.error(err)
    )
}

video.addEventListener('play', () => {
  const canvas = faceapi.createCanvasFromMedia(video)
    document.getElementById('video-div').append(canvas);
  const displaySize = { width: video.width, height: video.height }
  faceapi.matchDimensions(canvas, displaySize)
  setInterval(async () => {
    const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks().withFaceExpressions()
    const resizedDetections = faceapi.resizeResults(detections, displaySize)
    canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)
    faceapi.draw.drawDetections(canvas, resizedDetections , lineColor = 'rgba(251, 249, 249,1)')
    faceapi.draw.drawFaceLandmarks(canvas, resizedDetections, '', 'rgba(251, 249, 249,1)')
    var nbrScreen = document.getElementById("number-sreen").value;
    nbrScreen = parseInt(nbrScreen);
    //faceapi.draw.drawFaceExpressions(canvas, resizedDetections)
    if (resizedDetections.length == 1 && resizedDetections[0].detection.score > 0.7 && nbrScreen < 2) {
    const myCanvas = document.createElement('canvas');
    myCanvas.width = canvas.width;
    myCanvas.height = canvas.height;
      myCanvas.getContext('2d').drawImage(video, 0, 0,350, 450);
      console.log(canvas.getContext('2d'));

      const img = document.createElement("img");
      img.src = myCanvas.toDataURL('image/png');
      img.id = 'img'; 
      
      var nbrScreen = document.getElementById("number-sreen").value;
      nbrScreen = parseInt(nbrScreen);
      document.getElementById("number-sreen").value = nbrScreen + 1; 
      if (nbrScreen === 1) {
        document.getElementById('screenshot').appendChild(img);
        document.getElementById('binery-image').value = img.src;
      }
         
      
    }
  }, 100)

})
