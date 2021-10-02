<?php
require_once "connection.php";

   if(function_exists($_GET['function'])) {
      $_GET['function']();
   }   

   function get_pengguna()
   {
      global $connect;      
      $query = $connect->query("SELECT * FROM pengguna");   

      if($query->num_rows > 0)
      {
         while($row = mysqli_fetch_object($query))
         {
            $data[] = $row;
         }

         $response=array(
            'status' => 1,
            'message' =>'Success',
            'data' => $data
            );
      }
      else
      {
         $response = array(
            'status' => 0,
            'message' =>'Data tidak ditemukan!'
         );
      }

      header('Content-Type: application/json');
      echo json_encode($response);
   }   
   
   function get_pengguna_id()
   {
      global $connect;
      if (!empty($_GET["pengguna_id"])) {
         $pengguna_id = $_GET["pengguna_id"];      
      }            

      $query = "SELECT * FROM pengguna WHERE pengguna_id = '$pengguna_id'";      
      $result = $connect->query($query);

      if($result->num_rows > 0)
      {
         while($row = mysqli_fetch_object($result))
         {
            $data = $row;
         }    

         if($data)
         {
            $response = $data;             
         }
      }
      else
      {
         $response = array(
            'status' => 0,
            'message' =>'Data tidak ditemukan!'
         );
      }
      
      header('Content-Type: application/json');
      echo json_encode($response);
   }

   function insert_pengguna()
   {
      global $connect;   
      $check = array(
         'pengguna_nama' => '', 
         'pengguna_email' => '', 
         'pengguna_username' => '',
         'pengguna_password' => ''
      );

      $check_match = count(array_intersect_key($_POST, $check));
      
      
      if($check_match == count($check)){
         $penggunaNama = $_POST["pengguna_nama"];
         $penggunaEmail = $_POST["pengguna_email"];
         $penggunaUsername = $_POST["pengguna_username"];
         $penggunaPassword = $_POST["pengguna_password"];
         $penggunaFoto = $_POST["pengguna_foto"];

         if(!empty($penggunaUsername) && !empty($penggunaPassword)) 
         {
            $result = mysqli_query($connect, "INSERT INTO pengguna SET
               pengguna_id = '',
               pengguna_nama = '$_POST[pengguna_nama]',
               pengguna_email = '$_POST[pengguna_email]',
               pengguna_username = '$_POST[pengguna_username]',
               pengguna_password = '$_POST[pengguna_password]',
               pengguna_foto = '$_POST[pengguna_foto]'");
               
            if($result)
            {
               $response = array(
                  'status' => 1,
                  'message' =>'Insert Success'
               );
            }
            else
            {
               $response = array(
                  'status' => 0,
                  'message' =>'Insert Failed.'
               );
            }
         }
         else
         {
            $response = array(
               'status' => 2,
               'message' => 'Data tidak lengkap'
            );
         }
      }
      else
      {
         $response = array(
            'status' => 0,
            'message' =>'Wrong Parameter'
         );
      }

      header('Content-Type: application/json');
      echo json_encode($response);
   }

   function update_pengguna()
   {
      global $connect;
      if (!empty($_GET["pengguna_id"])) {
         $pengguna_id = $_GET["pengguna_id"];      
      }   
      
      $check = array(
        'pengguna_nama' => '', 
        'pengguna_email' => '', 
        'pengguna_username' => '',
        'pengguna_password' => ''
      );

      $check_match = count(array_intersect_key($_POST, $check));         
      if($check_match == count($check)){
      
         $result = mysqli_query($connect, "UPDATE pengguna SET               
            pengguna_nama = '$_POST[pengguna_nama]',
            pengguna_email = '$_POST[pengguna_email]',
            pengguna_username = '$_POST[pengguna_username]',
            pengguna_password = '$_POST[pengguna_password]',
            pengguna_foto = '$_POST[pengguna_foto]
            WHERE pengguna_id = '$pengguna_id'");
      
         if($result) 
         {
            $response=array(
               'status' => 1,
               'message' =>'Update Success'                  
            );
         }
         else
         {
            $response=array(
               'status' => 0,
               'message' =>'Update Failed'                  
            );
         }
         
      }
      else
      {
         $response=array(
                  'status' => 0,
                  'message' =>'Wrong Parameter',
                  'data'=> $pengguna_id
               );
      }

      header('Content-Type: application/json');
      echo json_encode($response);
   }

   function delete_pengguna()
   {
      global $connect;
      $pengguna_id = $_GET['pengguna_id'];
      $query = "DELETE FROM pengguna WHERE pengguna_id = '$pengguna_id'";

      if(mysqli_query($connect, $query)) 
      {
         $response=array(
            'status' => 1,
            'message' =>'Delete Success'
         );
      } 
      else 
      {
         $response=array(
            'status' => 0,
            'message' =>'Delete Fail.'
         );
      }

      header('Content-Type: application/json');
      echo json_encode($response);
   }


   function login() {
      global $connect;   
      $check = array(
         'pengguna_username' => '',
         'pengguna_password' => ''
      );

      $check_match = count(array_intersect_key($_POST, $check));
      
      if($check_match == count($check)){
         $penggunaUsername = $_POST["pengguna_username"];
         $penggunaPassword = $_POST["pengguna_password"];

         if(!empty($penggunaUsername) && !empty($penggunaPassword)) 
         {
            $result = mysqli_query($connect, "SELECT * FROM pengguna
            WHERE
            pengguna_username = '$_POST[pengguna_username]'
            AND
            pengguna_password = '$_POST[pengguna_password]'");
               
            if($result->num_rows > 0)
            {
               while($row = mysqli_fetch_object($result))
               {
                  $data = $row;
               } 
               $response = array(
                  'status' => 1,
                  'message' =>'Login Success',
                  'data' => $data
               );
            }
            else
            {
               $response = array(
                  'status' => 0,
                  'message' =>'Username atau Password salah'
               );
            }
         }
         else
         {
            $response = array(
               'status' => 2,
               'message' =>'Data tidak lengkap'
            );
         }
      }
      else
      {
         $response = array(
            'status' => 0,
            'message' =>'Wrong Parameter'
         );
      }

      header('Content-Type: application/json');
      echo json_encode($response);
   }
 ?>