<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Laravel\Cashier\Billable;
//use Laravel\Cashier\Contracts\Billable as BillableContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword, Billable;

    protected $dates = ['trial_ends_at', 'subscription_ends_at'];

    protected $table = 'users';

    protected $fillable = ['name', 'email', 'password', 'confirmed'];

    protected $hidden = ['password', 'remember_token', 'confirmation_code'];

}