<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'question';
    protected $fillable = ['question', 'option_A', 'option_B', 'option_C', 'option_D', 'category_id'];

    // Define the relationship with the Category model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function hasUserVoted($userId)
{
    // Convert voted_users to an array or an empty array if it's NULL
    $votedUsers = json_decode($this->voted_users, true) ?? [];

    // Check if the user's ID is present in the voted_users array
    return in_array($userId, $votedUsers);
}
}