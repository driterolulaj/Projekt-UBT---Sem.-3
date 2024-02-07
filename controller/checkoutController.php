<?php

    session_start();

        
        include_once '../repository/cartRepository.php'; 

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['id'])) {
            $userId = $_SESSION['id'];
            
            $postData = file_get_contents("php://input");
        
            $data = json_decode($postData);
        
            if (isset($data->totalAmount)) {
               
                $totalAmount = $data->totalAmount;

                $cartRepository = new CartRepository();
                $cartData = $cartRepository->addToOrders($userId,$totalAmount); 
    
                
            }
        }
    
?>