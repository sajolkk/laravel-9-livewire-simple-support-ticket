<div class="border rounded shadow p-2">
    <div class="card">
        <div class="card-header">
            New Comment
        </div>
        @error('message')<div class="alert alert-danger" role="alert">{{ $message }}</div>@enderror
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <form class="card-body" wire:submit.prevent="newComment">
            <input type="file" id="image" class="form-control mb-2" wire:change="$emit('fileChoosen')">
            <textarea wire:model="message" class="form-control" rows="2" placeholder="Write your comment..."></textarea>
            <button type="submit" class="btn btn-primary float-end mt-2" >Submit</button>
            <img src="{{ ($image)? $image:""}}" alt="" class="img-fluid">
        </form>
    </div>
    <br> 
    @forelse ($comments as $comment)
        <div class="card mb-1">
            <div class="card-header">
            {{ $comment->user->name }}
            <small class="text-secondary">{{ $comment['created_at']->diffForHumans() }}</small>
            <small class="text-danger float-end p-1 border hover-focus" wire:click="delete({{ $comment->id }})" >x</small>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $comment['message'] }}</p>
                @if($comment->image)
                    <img src="{{ $comment->ImagePath }}" alt="" class="img-fluid rounded border" >
                @endif
            </div>
        </div>  
    @empty 
        <div class="card">
            <div class="card-body text-center">
                <p>Comment not found!!</p>
            </div>
        </div>      
    @endforelse
    <div class="card">
        <div class="card-header">{{ $comments->links('pagination-links') }}</div>
    </div>
</div>
<script>
        Livewire.on('fileChoosen', () => {
            let inputFile = document.getElementById('image');
            let file = inputFile.files[0];
            let reader = new FileReader();
            reader.onloadend = ()=>{
                Livewire.emit('imageUpload',reader.result);
            }
            reader.readAsDataURL(file);
        });
</script>
