<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;
    public $message;
    // render function
    public function render()
    {
        $data['comments'] = Comment::latest()->paginate(2);
        return view('livewire.comments',$data);
    }

    // message updated time validation function
    public function updated($name)
    {
        $this->validateOnly($name,['message' => 'required|max:255']);
    }

    // new comment function insert function
    public function newComment()
    {
        $this->validate(['message' => 'required|max:255']);
        $newComment = Comment::create(['message'=>$this->message, 'user_id'=>1]);
        // $this->comments->prepend($newComment);
        $this->message = '';
        session()->flash('message', 'Comment added successfully');
    }

    // mount function
    // public function mount()
    // {
    //     $initialComment = Comment::latest()->get();
    //     $this->comments = $initialComment;
    // }

    // comment remove from list
    public function delete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        // $this->comments = $this->comments->where('id','!=',$id);
        // $this->comments = $this->comments->except($id);
        session()->flash('message', 'Comment deleted successfully');
    }
}
