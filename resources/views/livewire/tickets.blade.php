<div class="border rounded shadow p-2">
    <div class="card-header mb-1">Support Ticket</div>
    @foreach ($tickets as $ticket)
        <div class="card mb-1">
            <div class="card-body question-bg {{ $ticket->id == $ticketId? 'question-bg-active':'' }}" wire:click="$emit('ticketSelected',{{ $ticket->id }})">
                <p class="card-text">{{ $ticket['questions'] }}</p>
            </div>
        </div>        
    @endforeach
    <div class="card">
        <div class="card-header">{{ $tickets->links('pagination-links') }}</div>
    </div>
</div>
