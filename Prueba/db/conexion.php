<?php  

function Conectarse()  
{ 
   $db_host = 'localhost';
   $db_user = 'ruleta';
   $db_pass = 'ruleta';
   $db_name = 'ruleta';

   $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

   if (!($connection))  
   {  
      echo "Error conectando a la base de datos.";  
      exit();  
   }  
   
   return $connection;  
}  
?> 