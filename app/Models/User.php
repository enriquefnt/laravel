<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';  // Usa tu tabla

    protected $fillable = [
        'nombre',  // Mapea a tu columna 'nombre'
        'apellido',  // Campo extra
        'nombre_usuario',  // Username
        'email',
        'password',
        'funcion',  // Campos extra
        'institucion',
        'fecha_agregado',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'fecha_agregado' => 'datetime',  // Si es timestamp
        'password' => 'hashed',
    ];

    // Getter para combinar nombre y apellido (opcional, para mostrar "name")
    public function getNameAttribute()
    {
        return $this->nombre . ' ' . $this->apellido;
    }

    // Si quieres usar 'nombre_usuario' como username en lugar de email
    public function getAuthIdentifierName()
    {
        return 'nombre_usuario';  // Cambia a 'email' si prefieres login por email
    }
    public function getAuthIdentifier()
{
    return $this->getAttribute($this->getAuthIdentifierName());
}

}