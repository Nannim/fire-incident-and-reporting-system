<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Response;

class CrudResponse extends Component
{
    public $response, $name, $email, $mobile, $time, $occupation, $response_id;
    public $isModalOpen = 0;

    public function render()
    {
        $this->response = Response::all();
        return view('livewire.crud-response');
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
        $this->isModalOpen = false;
    }

    private function resetCreateForm(){
        $this->name = '';
        $this->email = '';
        $this->mobile = '';
        $this->response = '';
        $this->responsetime = '';
        $this->occupation = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'response' => 'required',
            'responsetime' => 'required',
            'occupation' => 'required',
        ]);

        Response::updateOrCreate(['id' => $this->response_id], [
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'response' => $this->response,
            'responsetime' => $this->responsetime,
            'occupation' => $this->occupation,
        ]);

        session()->flash('message', $this->response_id ? 'Response posted.' : 'You have successfully responded to this incident verbally.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $response = Response::findOrFail($id);
        $this->id = $id;
        $this->name = $response->name;
        $this->email = $response->email;
        $this->mobile = $response->mobile;
        $this->response = $response->response;
        $this->responsetime = $response->responsetime;
        $this->occupation = $response->occupation;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        Response::find($id)->delete();
        session()->flash('message', 'Response deleted.');
    }

}