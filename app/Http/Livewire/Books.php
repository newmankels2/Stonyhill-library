<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;

class Books extends Component
{
    public $title,
    $desc,
    $author,
    $book,
    $book_id;
    public $isOpen = 0;
    public $btn_nm = 'Create';


    public function render()
    {
        $books = Book::latest()->get();
        return view('livewire.books',[
            'books' => $books,
        ]);
    }



    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->title = '';
        $this->desc = '';
        $this->author = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'title' => 'required',
            'desc' => 'required',
            'author' => 'required',
        ]);

        Book::create([
            'title' => $this->title,
            'desc' => $this->desc,
            'author' => $this->author,
        ]);


        session()->flash('message','Book Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
        $this->btn_nm = 'Create';
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $this->book_id = $id;
        $this->title = $book->title;
        $this->desc = $book->desc;
        $this->author = $book->author;
        $this->btn_nm = 'Edit';

        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Book::find($id)->delete();
        session()->flash('message', 'Book has been Deleted Successfully.');
    }


    public function modify()
    {
        $this->validate([
            'title' => 'required',
            'desc' => 'required',
            'author' => 'required',
        ]);

        $book = Book::find($this->book_id);
            $book->title = $this->title;
            $book->desc = $this->desc;
            $book->author = $this->author;
            $book->save();


        session()->flash('message',
            $this->id ? 'Book Info Updated Successfully.' : 'Book Info Updated Successfully.');

        $this->closeModal();
        $this->resetInputFields();
        $this->btn_nm = 'Create';
    }
}
