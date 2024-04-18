<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class UserTwoFacCode extends Model
{
    use HasFactory;
  
    public $table = "user_twofactorcodes";
  
    protected $fillable = [
        'user_id',
        'code',
    ];
}