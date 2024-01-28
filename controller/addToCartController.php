<?php

    session_start();

        
        include_once '../repository/cartRepository.php'; 

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['id'])) {
            $userId = $_SESSION['id'];
            
            $postData = file_get_contents("php://input");
        
            $data = json_decode($postData);
        
            if (isset($data->productId)) {
               
                $productId = $data->productId;
                $productPrice = $data->productPrice;
                $productName = $data->productName;
                $productImage = $data->productImage;

                $cartRepository = new CartRepository();
                $cartData = $cartRepository->addToCart($userId,$productId,$productPrice,$productName,$productImage); 
    
            }
        }
    
?>