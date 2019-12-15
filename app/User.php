<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'password_web',
        'nama_pria',
        'nama_wanita',
        'nik_pria',
        'nik_wanita',
        'tanggal_lahir_pria',
        'tanggal_lahir_wanita',
        'no_hp',
        'desa',
        'kecamatan',
        'puskesmas',
        'status_assesment',
        'status_kelulusan',
        'role',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
