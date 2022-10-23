<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * get group name of permissions
     */
    public static function getPermissionGroup()
    {
        return Permission::select('group_name')->groupBy('group_name')->get();
    }

    /**
     * get permission by group name
     * 
     * @param $groupName
     */
    public static function getPermissionByGroupName($groupName)
    {
        return Permission::select('id', 'name')->where('group_name', $groupName)->get();
    }

    public static function checkSinglePermission($role, $permissions)
    {
        $checkedPermission = true;
        foreach ($permissions as $permission) {
            if(!$role->hasPermissionTo($permission->name)){
                $checkedPermission = false;
            }
        }    
        return $checkedPermission;
    }
}
