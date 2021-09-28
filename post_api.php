<?php
require_once "connection.php";

   if(function_exists($_GET['function'])) {
      $_GET['function']();
   }   

   function get_post()
   {
      global $connect;      
      $query = $connect->query("SELECT * FROM post");   

      while($row = mysqli_fetch_object($query))
      {
         $data[] =$row;
      }

      $response=array(
         'status' => 1,
         'message' =>'Success',
         'data' => $data
         );

      header('Content-Type: application/json');
      echo json_encode($response);
   }   
   
   function get_post_id()
   {
      global $connect;
      if (!empty($_GET["post_id"])) {
         $post_id = $_GET["post_id"];      
      }            

      $query = "SELECT * FROM post WHERE post_id = '$post_id'";      
      $result = $connect->query($query);

      while($row = mysqli_fetch_object($result))
      {
         $data[] = $row;
      }    

      if($data)
      {
         $response = array(
            'status' => 1,
            'message' =>'Success',
            'data' => $data
         );               
      }
      else
      {
         $response = array(
            'status' => 0,
            'message' =>'No Data Found'
         );
      }
      
      header('Content-Type: application/json');
      echo json_encode($response);
   }

   function insert_post()
   {
      global $connect;   
      $check = array(
         'post_title' => '', 
         'post_body' => '', 
         'post_image' => '',
         'post_time' => '',
         'post_credit' => ''
      );

      $check_match = count(array_intersect_key($_POST, $check));
      
      if($check_match == count($check)){
         $result = mysqli_query($connect, "INSERT INTO post SET
            post_id = '',
            post_title = '$_POST[post_title]',
            post_body = '$_POST[post_body]',
            post_image = '$_POST[post_image]',
            post_time = '$_POST[post_time]',
            post_credit = '$_POST[post_credit]'");
            
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
            'status' => 0,
            'message' =>'Wrong Parameter'
         );
      }

      header('Content-Type: application/json');
      echo json_encode($response);
   }

   function update_post()
   {
      global $connect;
      if (!empty($_GET["post_id"])) {
         $post_id = $_GET["post_id"];      
      }   
      
      $check = array(
         'post_title' => '', 
         'post_body' => '', 
         'post_image' => ''
      );

      $check_match = count(array_intersect_key($_POST, $check));         
      if($check_match == count($check)){
      
         $result = mysqli_query($connect, "UPDATE post SET               
            post_title = '$_POST[post_title]',
            post_body = '$_POST[post_body]',
            post_image = '$_POST[post_image]'
            WHERE post_id = '$post_id'");
      
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
                  'data'=> $post_id
               );
      }

      header('Content-Type: application/json');
      echo json_encode($response);
   }

   function delete_post()
   {
      global $connect;
      $post_id = $_GET['post_id'];
      $query = "DELETE FROM post WHERE post_id = '$post_id'";

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
 ?>