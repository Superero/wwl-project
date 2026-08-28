<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultationRequest extends Model
{
    protected $fillable= ['name','phone','role','need','status'];
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
