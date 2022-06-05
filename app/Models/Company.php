<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'city'];

    /**
     * Get the clients.
     */
    public function clients(): BelongsToMany
    {
        return $this->belongsToMany(Client::class, 'company_client');
    }
}
