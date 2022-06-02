<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Link extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'destination_url',
        'code',
        'visits',
        'last_visited'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'last_visited' => 'datetime',
    ];

    public function getGeneratedRoute() : string
    {
        return route('visit', ['code' => $this->code]);
    }

    public function setVisitInformation()
    {
        DB::beginTransaction();

        $this->visits++;
        $this->last_visited = $this->freshTimestamp();
        $this->save();

        DB::commit();
    }
}
