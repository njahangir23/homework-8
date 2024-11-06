<?php

namespace app\controllers;

use app\models\Post;

class PostController {

    public function getPosts() {
        $params = [
            'title' => $_GET['title'] ?: null, 
        ];
        $postModel = new Post();
        $posts = $postModel->getAllPostsByTitle($params); 
        header("Content-Type: application/json");
        echo json_encode($posts); 
        exit();
    }

    public function savePost() {
        $title = $_POST['title'] ?: null; 
        $content = $_POST['content'] ?: null; 
        $errors = [];

        if (empty($title) || strlen($title) < 5) {
            $errors['title'] = 'Title is required, needs to be at least 5 characters long.';
        }

        if (empty($content) || strlen($content) < 10) {
            $errors['content'] = 'Content is required, needs to be at least 10 characters long.';
        }

        if (count($errors)) {
            http_response_code(400); 
            echo json_encode($errors); 
            exit();
        }

        $returnData = [
            'title' => $title,
            'content' => $content;
        ];
        echo json_encode($returnData);
        exit();
    }
}