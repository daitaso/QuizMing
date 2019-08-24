<?php

namespace QuizMing;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as IAuthenticatable;
use Illuminate\Auth\Authenticatable;

class User extends Model implements IAuthenticatable
{
    use Authenticatable, Notifiable;
    //
}
