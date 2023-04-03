<?php
     
     use App\Models\CustomerModel;
     use App\Models\UsersAllergenModel;
     use App\Models\UsersModel;
      
     function delete_user(string $id)
     {
         if (isset($_SESSION["auth"])) {
             $customer_model = new CustomerModel;
             $user_model = new UsersModel;
             if (!$user_model->deleteUser($id)) {
                 $response = [
                     "error" => 1,
                     "msg" => "Impossible de supprimer l'utilisateur"
                 ];
                 return $response;
             } else {
                 unset($_SESSION["customer_id"]);
                 unset($_SESSION["auth"]);
                 $response = [
                     "error" => 0
                 ];
                 return $response;
             }
         }
     }
      