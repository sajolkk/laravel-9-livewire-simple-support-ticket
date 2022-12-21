<div class="col-md-6 offset-3">
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
            {{-- <textarea wire:model="message" class="form-control" rows="2" placeholder="Write your comment..."></textarea> --}}
            {{-- after 500ms call ajax --}}
            {{-- <textarea wire:model.debounce.500ms="message" class="form-control" rows="2" placeholder="Write your comment..."></textarea> --}}
            {{-- stop call ajax --}}
            {{-- <textarea wire:model.lazy="message" class="form-control" rows="2" placeholder="Write your comment..."></textarea> --}}
            <textarea wire:model="message" class="form-control" rows="2" placeholder="Write your comment..."></textarea>
            {{-- <button class="btn btn-primary float-end mt-2" wire:click="newComment">Submit</button> --}}
            <button type="submit" class="btn btn-primary float-end mt-2" >Submit</button>
        </form>
    </div>
    <br> 
    @foreach ($comments as $comment)
        <div class="card mb-1">
            <div class="card-header">
            {{ $comment->user->name }}
            <small class="text-secondary">{{ $comment['created_at']->diffForHumans() }}</small>
            <small class="text-danger float-end p-1 border hover-focus" wire:click="delete({{ $comment->id }})" >x</small>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $comment['message'] }}</p>
            </div>
        </div>
    @endforeach

    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus quia provident molestias ad architecto error enim, unde accusantium laboriosam placeat quos ipsum! Cum perspiciatis corrupti officia, voluptate ipsam nobis inventore!
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus quia provident molestias ad architecto error enim, unde accusantium laboriosam placeat quos ipsum! Cum perspiciatis corrupti officia, voluptate ipsam nobis inventore!
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus quia provident molestias ad architecto error enim, unde accusantium laboriosam placeat quos ipsum! Cum perspiciatis corrupti officia, voluptate ipsam nobis inventore!
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus quia provident molestias ad architecto error enim, unde accusantium laboriosam placeat quos ipsum! Cum perspiciatis corrupti officia, voluptate ipsam nobis inventore!
</div>