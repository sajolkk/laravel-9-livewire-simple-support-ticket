<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Image;

class Comments extends Component
{
    use WithPagination;
    public $message, $image;
    protected $listeners = ['imageUpload' => 'imageAssing'];
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
        $image = $this->imageUpload();
        $newComment = Comment::create([
            'message' => $this->message, 
            'image' => $image,
            'user_id' => 1
        ]);
        // $this->comments->prepend($newComment);
        $this->message = '';
        $this->image = '';
        session()->flash('message', 'Comment added successfully');
    }

    // mount function call on load time
    // public function mount()
    // {
    //     $initialComment = Comment::latest()->get();
    //     $this->comments = $initialComment;
    // }

    // comment remove from list
    public function delete($id)
    {
        $comment = Comment::find($id);
        Storage::disk('public')->delete($comment->image);
        $comment->delete();
        // $this->comments = $this->comments->where('id','!=',$id);
        // $this->comments = $this->comments->except($id);
        session()->flash('message', 'Comment deleted successfully');
    }

    // image upload function
    public function imageAssing($image)
    {
        $this->image = $image;
    }

    public function imageUpload()
    {
        if(!$this->image){
            return null;
        } 
        $img = Image::make($this->image)->encode('jpg');
        $name = time().'.jpg';
        Storage::disk('public')->put($name,$img);
        return $name;
    }
}
