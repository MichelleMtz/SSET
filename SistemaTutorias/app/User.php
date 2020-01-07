<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
class User extends Authenticatable
{
    use Notifiable;
    /* {

        /* public function roles(){
            //return $this->belongsToMany('App\Role');
            //return $this->tipo('App\GnralTiposUsuario');
        }

        public function authorizeRoles($roles){
            //dd($roles);
            if ($this->hasAnyRole($roles)) {
                return true;
            }
            abort(401,'Esta accion no esta autorizada');
        }

        public function hasAnyRole($roles){
            //dd($roles);
            if (is_array($roles)) {
                foreach ($roles as $role) {
                    if($this->hasRole($role)){
                        return true;
                    }
                }
            }else{
                if($this->hasRole($roles)){
                    return true;
                }
            }
            return false;
        }
        public function hasRole($role){
            if ($this->roles()->where('id_tipo_usuario',$role)->first()) {
                return true;
            }
            return false;
        }
    } */
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */



    protected $fillable = [
        'email', 'password','tipo_usuario'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public static function insertUser($data){
        DB::insert('INSERT INTO users (email, password, tipo_usuario, updated_at, created_at) VALUES ("'.$data->email.'", "'.Hash::make($data->password).'", 2, "'.date("Y-m-d H:i:s").'", "'.date("Y-m-d H:i:s").'");');
    }
    public static function getRol($id){
        $id=DB::select('SELECT id_rol from users where id='.$id);
        return $id;
    }
}
