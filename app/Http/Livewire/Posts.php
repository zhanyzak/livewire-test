<?php

namespace App\Http\Livewire;

use App\Models\Post\Post;
use Livewire\Component;

class Posts extends Component
{
    public $posts, $title, $body, $post_id;
    public bool $updateMode = false;

    public function render()
    {
        $this->posts = Post::where(['deleted' => false])->select('id', 'title', 'body')->get();
        return view('livewire.posts');
    }

    private function resetInputFields(){
        $this->title = '';
        $this->body = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        Post::create($validatedDate);

        session()->flash('message', 'Статья создана успешно.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->title = $post->title;
        $this->body = $post->body;

        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = Post::find($this->post_id);
        $post->update([
            'title' => $this->title,
            'body' => $this->body,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'Статья обновлена успешно.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Post::where('id', $id)->update(['deleted' => true]);
        session()->flash('message', 'Статья удалена успешно.');
    }
}
