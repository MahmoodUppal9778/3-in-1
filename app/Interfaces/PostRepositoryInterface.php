<?php

namespace App\Interfaces;
use Illuminate\Http\Request;

interface PostRepositoryInterface 
{
    public function getAllPosts();
    public function storePost(Request $request, string $imgPath, string $slugUrl);
    public function updatePost(Request $request, string $imgPath, string $slugUrl, int $postId);
    public function deleteAPost(int $id);
    public function postUserId(string $postId);


}