<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConsultationRequest extends Model
{
    use SoftDeletes;
    protected $fillable= ['name','phone','role','need','email', 'company','message','status'];
    public const STATUSES = [
        'en_attente' => 'En attente',
        'en_cours'   => 'En cours',
        'valide'     => 'Validé',
    ];
    public function statusLabel(): string
    {
        return self::STATUSES[$this->status] ?? $this->status;
    }
}
