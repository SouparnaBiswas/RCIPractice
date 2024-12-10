<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CdaBillAuditTeam extends Model
{
    use HasFactory;

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    public function variableType()
    {
        return $this->belongsTo(VariableType::class, 'var_type_id', 'id');
    }
}
