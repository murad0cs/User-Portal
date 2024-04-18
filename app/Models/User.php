<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Exception;
use Mail;
use App\Mail\SendCodeMail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'address',
        'phone',
        'email',
        'dob',
        'password',
        'file_up',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            //'email_verified_at' => 'datetime',
            //'two_factor_expires_at' => 'datetime',
            'password' => 'hashed',
            'dob' => 'date',
        ];
    }

    // /**
    //  * Generate 6 digits MFA code for the User
    //  */
    // public function generateTwoFactorCode()
    // {
    //     $this->timestamps = false;
        
    //     $this->two_factor_code = rand(100000, 999999);
    //     $this->two_factor_expires_at = now()->addMinutes(10);
    //     $this->save();
    // }

    // /**
    //  * Reset the MFA code generated earlier
    //  */
    // public function resetTwoFactorCode()
    // {
    //     $this->timestamps = false; //Dont update the 'updated_at' field yet
        
    //     $this->two_factor_code = null;
    //     $this->two_factor_expires_at = null;
    //     $this->save();
    // }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function generateCode()
    {
        $code = rand(100000, 999999);
  
        UserTwoFacCode::updateOrCreate(
            [ 'user_id' => auth()->user()->id ],
            [ 'code' => $code ]
        );
    
        try {
  
            $details = [
                'title' => 'Log in OTP from Bit Mascot',
                'code' => $code
            ];
             
            Mail::to(auth()->user()->email)->send(new SendCodeMail($details));
    
        } catch (Exception $e) {
            info("Error: ". $e->getMessage());
        }
    }
}
