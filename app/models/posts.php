<?php

namespace app\models;

class Post {

    public function getAllPostsByTitle($params) {
        $allposts = [
            [
                'title' => 'Post one', 
                'content' => 'This is the first post.'
            ],
            [
                'title' => 'Post two', 
                'content' => 'This is the second post.'
            ],
        ];


        if (!empty($params['title'])) {
            return array_filter($allposts, function ($post) use ($params) {
                if($post['title']===$params['title']){
                    return $post;
                };
                return null;
            });
        }

        return $allposts;
    }

    public function savePost($title, $content) {
      
    }
}