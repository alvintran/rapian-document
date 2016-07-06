<?php

namespace Nht\Hocs\Users;

use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, EntrustUserTrait;
    /**,
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'password', 'name', 'nickname', 'phone', 'address', 'avatar', 'gender', 'facebook_id', 'google_id', 'github_id', 'twitter_id'];

    protected $guarded = ['roles'];

     //active
    const ACTIVE = 1;
    const NOACTIVE = 0;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function getId() {
        return $this->id;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getName() {
        return $this->name;
    }

    public function getAvatarPath($type = 'sm_') {
        $avatar = PATH_UPLOAD_USER_AVATAR . $type . $this->avatar;

        if (is_file($avatar))
        {
            $avatar = PATH_USER_AVATAR . $type . $this->avatar;
            return $avatar;
        }

        return '/images/profiles/lock_thumb.png';
    }

    public function getUrlAut() {
        return route('frontend.blogByAuthor', [ $this->id, removeTitle($this->nickname)]);
    }

    public function getActive() {
        return $this->active;
    }

    /**
     * - lấy checked của checkbox của user đã active
     * @return string
     */
    public function showCheckActive() {
        switch($this->getActive()) {
            case User::ACTIVE:
                echo '<i class="fa fa-check-square"></i>';
                break;
            default:
                echo '<i class="fa fa-square"></i>';
                break;
        }
    }
}
