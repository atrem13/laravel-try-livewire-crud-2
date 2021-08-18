<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;

class Crud extends Component
{
    public $students;      
    public $name;      
    public $email;      
    public $mobile;      
    public $student_id;
    public $isModalOpen = false;      

    public function render()
    {
        $this->students = Student::all();
        return view('livewire.crud');
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->resetCreateForm();
        $this->isModalOpen = false;
    }

    public function resetCreateForm()
    {
        $this->name = null;
        $this->email = null;
        $this->mobile = null;
        $this->student_id = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ]);
    
        Student::updateOrCreate(['id' => $this->student_id], [
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
        ]);

        session()->flash('message', $this->student_id ? 'Student updated.' : 'Student created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $this->student_id = $id;
        $this->name = $student->name;
        $this->email = $student->email;
        $this->mobile = $student->mobile;
    
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Student::find($id)->delete();
        session()->flash('message', 'Studen deleted.');
    }
}
