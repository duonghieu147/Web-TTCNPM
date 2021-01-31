<!-- Kết nối với database -->
<?php

$conn = null;


function db_connect(){
  global $conn;
  if (!$conn){
      $conn = mysqli_connect('localhost', 'root', '' , 'assignment2') 
              or die ('Không thể kết nối CSDL');
      mysqli_set_charset($conn, 'utf8');
  }
}

function db_close(){
  global $conn;
  if ($conn){
      mysqli_close($conn);
  }
}

?>