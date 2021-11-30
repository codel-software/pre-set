<?php


namespace App\Core\User;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'type',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Generate new token
     *
     * @param int $id
     */
    public static function generateNewToken($id)
    {
        $user = User::find($id);

        //Comentado devido a uma nova regra onde o usuário de conecta com o mesmo usuário, na mesma máquina
        //$user->tokens()->delete();

        return $user->createToken('api')->accessToken;
    }

        /**
     * Get user for email
     *
     * @param string $indentification
     */
    public static function getUserByEmail($email)
    {
        $user = User::where('email', $email)
            ->first();

        if (! is_null($user)) {
            return $user;
        }

        return null;
    }

    /**
 * Validation password
 *
 * @param string $inputOfPassword
 */
public function validatePassword($inputOfPassword)
{
    if (Hash::check($inputOfPassword, $this->password)) {
        return true;
    }
    return false;


}
}
