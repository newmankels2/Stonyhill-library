<?php

namespace App\Http\Livewire;

use App\Models\Member;
use Livewire\Component;

class Members extends Component
{
    public 
    $first_name,
    $last_name,
    $email,
    $address,
    $phone_number,
    $member,
    $member_id;
    public $isOpen = 0;
    public $btn_nm = 'Create';


    public function render()
    {
        $members = Member::all();
        return view('livewire.members',[
            'members'=>$members,
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
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->address = '';
        $this->phone_number = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
        ]);

        Member::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
        ]);


        session()->flash('message',
            $this->id ? 'Member Created Successfully.' : 'Member Created Successfully.');

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
        $member = Member::findOrFail($id);
        $this->member_id = $id;
        $this->first_name = $member->first_name;
        $this->last_name = $member->last_name;
        $this->email = $member->email;
        $this->address = $member->address;
        $this->phone_number = $member->phone_number;
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
        Member::find($id)->delete();
        session()->flash('message', 'Member Deleted Successfully.');
    }


    public function modify()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
        ]);

        $member = Member::find($this->member_id);
            $member->first_name = $this->first_name;
            $member->last_name = $this->last_name;
            $member->email = $this->email;
            $member->address = $this->address;
            $member->phone_number = $this->phone_number;
            $member->save();


        session()->flash('message',
            $this->id ? 'Member Info Updated Successfully.' : 'Member Info Updated Successfully.');

        $this->closeModal();
        $this->resetInputFields();
        $this->btn_nm = 'Create';
    }
}
