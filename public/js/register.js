var input = document.getElementById( 'profile_picture' );
var infoArea = document.getElementById( 'profile_picture-filename' );

infoArea.textContent = "Choose File...";

input.addEventListener( 'change', showFileName );

function showFileName( event ) {
  
  var input = event.srcElement;

  var fileName = input.files[0].name;
  
  infoArea.textContent = fileName;
}