<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priest extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeParishPriest()
    {
        return $this->where('designation', 'parish_priest')->first();
    }

    public function scopeAssistantParishPriest()
    {
        return $this->where('designation', 'assistant_priest')->first();
    }
}
