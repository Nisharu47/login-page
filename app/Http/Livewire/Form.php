<?php

namespace App\Http\Livewire;
use App\Models\Customer;
use Livewire\WithPagination;

use Livewire\Component;

class Form extends Component
{

    //boolen
    public $selectData = true;
    public $createData = false;
    public $updateData = false;

    //variables
    public $username;
    public $nic;
    public $email;
    public $mobile;


    public $data;
    
    use WithPagination;


    //save
    public function saveData()
    {

         //validate data
         $this->validate(
            [
                'username' => 'required',
                'email' => 'required|max:255|unique:customers,email',
                'nic' => 'required|max:12|unique:customers,nic',
                'mobile' => 'required|max:16|unique:customers,mobile'
                
                

            ]
        );

        $customer = new Customer();
        $customer->name=$this->username;
        $customer->nic=$this->nic;
        $customer->email=$this->email;
        $customer->mobile=$this->mobile;

        $customer->save();
        Session()->flash('add_message','Done!');
        $this->selectData = true;
        $this->createData = false;


    }
    

    //render
    public function render()
    {
        $customer = Customer::orderBy('id', 'ASC')->paginate();
        return view('livewire.form', ['customers' => $customer])->layout('layouts.layout'); 
    }


    //show
    public function showFrom()
    {
        $this->createData = true;
        $this->selectData = false;
    }

    //delete
    public function delete($id)
    {
        $customer = Customer::findOrFail($id);
        $result = $customer->delete();
    }



    //edit
    public function edit($id)
    {
        $this->selectData = false;
        $this->updateData = true;

        $customer = Customer::findOrFail($id);
        $this->ids = $customer->id;
        $this->edit_username = $customer->name;
        $this->edit_email = $customer->email;
        $this->edit_nic = $customer->nic; 
        $this->edit_mobile = $customer->mobile;
    }


    //update
    public function update($id)
    {
        $customer = Customer::findOrFail($id);
        

        $customer->name = $this->edit_username;
        $customer->email = $this->edit_email;
        $customer->nic = $this->edit_nic;
        $customer->mobile = $this->edit_mobile;
        $result = $customer->save();

        
        $this->selectData = true;
        $this->updateData = false;
    }


}
