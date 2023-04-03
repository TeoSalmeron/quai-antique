<?php
     
     namespace App\Controllers;
      
     use App\Models\UsersModel;
     use App\Models\CustomerModel;
     use App\Controllers\Controller;
      
     class ProfileController extends Controller
     {
         public function index()
         {
             require_once ROOT . '/Controllers/functions/block_profile_access.php';
             require_once ROOT . '/Controllers/functions/define_schedule.php';
             block_profile_access();
             $users_model = new UsersModel;
             $user = $users_model->findBy(["id" => $_SESSION["customer_id"]])[0];
             $customer_model = new CustomerModel;
             $customer = $customer_model->findBy(["id" => $_SESSION["customer_id"]])[0];
             $schedule = define_schedule();
             $this->render("profile/profile", [
                 "title" => "Le Quai Antique - Profil",
                 "user" => $user,
                 "schedule" => $schedule
             ], ["nav", "scrollreveal", "profile"]);
         }
      
         public function delete_user()
         {
             require_once ROOT . '/Controllers/functions/delete_user.php';
             echo json_encode(delete_user($_SESSION["customer_id"]));
         }
     }
      