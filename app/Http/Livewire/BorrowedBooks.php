<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\BorrowedBook;
use App\Models\Member;
use Livewire\Component;
use Livewire\WithPagination;

class BorrowedBooks extends Component
{
    use WithPagination;
    public
    $member_id,
    $book_id,
    $return_date,
    $status,
    $borrowedbook,
    $borrowedbook_id;
    public $isOpen = 0;
    public $btn_nm = 'Create';


    public function render()
    {
        $members = Member::all();
        $books = Book::all();
        $borrowedbooks = BorrowedBook::latest()->paginate(3);
        return view('livewire.borrowed-books',[
            'borrowedbooks' => $borrowedbooks,
            'members' => $members,
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
        $this->member_id = '';
        $this->book_id = '';
        $this->return_date = '';
        $this->status = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'member_id' => 'required',
            'book_id' => 'required',
            'return_date' => 'required',
            'status' => 'required',
        ]);

        BorrowedBook::create([
            'member_id' => $this->member_id,
            'book_id' => $this->book_id,
            'return_date' => $this->return_date,
            'status' => $this->status,
        ]);


        session()->flash('message','Borrowed Book Details Created Successfully.');

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
        $borrowedbook = BorrowedBook::findOrFail($id);
        $this->borrowedbook_id = $id;
        $this->member_id = $borrowedbook->member_id;
        $this->book_id = $borrowedbook->book_id;
        $this->return_date = $borrowedbook->return_date;
        $this->status = $borrowedbook->status;
        $this->btn_nm = 'Edit';

        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function modify()
    {
        $this->validate([
            'member_id' => 'required',
            'book_id' => 'required',
            'return_date' => 'required',
            'status' => 'required',
        ]);

        $borrowedbook = BorrowedBook::find($this->borrowedbook_id);
            $borrowedbook->member_id = $this->member_id;
            $borrowedbook->book_id = $this->book_id;
            $borrowedbook->return_date = $this->return_date;
            $borrowedbook->status = $this->status;
            $borrowedbook->save();


        session()->flash('message',
            $this->id ? 'Borrowed Book Info Updated Successfully.' : 'Borrowed Book Info Updated Successfully.');

        $this->closeModal();
        $this->resetInputFields();
        $this->btn_nm = 'Create';
    }


    public function delete($id)
    {
        BorrowedBook::find($id)->delete();
        session()->flash('message', 'BorrowedBook has been Deleted Successfully.');
    }
}
