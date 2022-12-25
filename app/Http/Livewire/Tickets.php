<?php

namespace App\Http\Livewire;

use App\Models\SupportTicket;
use Livewire\Component;
use Livewire\WithPagination;

class Tickets extends Component
{
    use WithPagination;
    public $ticketId;
    protected $listeners = ['ticketSelected'];
    // render ticket page with data
    public function render()
    {
        $data['tickets'] = SupportTicket::latest()->paginate(2);
        return view('livewire.tickets', $data);
    }

    // ticket select lister function
    public function ticketSelected($ticketId)
    {
        $this->ticketId = $ticketId;
    }
}
