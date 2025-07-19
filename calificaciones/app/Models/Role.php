<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User; // 👈 Esta línea es clave
class Role extends Model
{
    protected $fillable = ['name'];

    /**
     * The roles that belong to the user.
     */
   public function users()
    {
        return $this->hasMany(User::class);
    }

}
