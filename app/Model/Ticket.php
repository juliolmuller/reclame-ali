<?php

namespace App\Model;

use App\Model\TicketMessage;
use App\Model\TicketStatus;
use App\Model\TicketType;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * Mass assignable attributes
     *
     * @var array
     */
    protected $fillable = ['created_by', 'created_at', 'closed_at', 'product_id', 'type_id', 'status_id'];

    /**
     * Attributes to be cast to native types
     *
     * @var array
     */
    protected $casts = [
        'closed_at' => 'datetime',
    ];

    /**
     * Get the status associated with $this ticket
     *
     * @return \App\Model\TicketStatus
     */
    public function status()
    {
        return $this->belongsTo(TicketStatus::class, 'status_id');
    }

    /**
     * Get the type associated with $this ticket
     *
     * @return \App\Model\TicketType
     */
    public function type()
    {
        return $this->belongsTo(TicketType::class, 'type_id');
    }

    /**
     * Get the messages associated with $this ticket
     *
     * @return \Illuminate\Database\Eloquent\Collection<\App\Model\TicketMessage>
     */
    public function messages()
    {
        return $this->hasMany(TicketMessage::class);
    }
}
