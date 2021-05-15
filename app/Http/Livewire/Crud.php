<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Reports;
use App\Models\Response;

class Crud extends Component
{
    public $reports, $level, $description, $location, $time, $report_id;
    public $isModalOpen = 0;

    public function render()
    {
        $this->reports = Reports::all();
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
        $this->isModalOpen = false;
    }

    private function resetCreateForm(){
        $this->level = '';
        $this->description = '';
        $this->location = '';
        $this->time = '';
    }

    public function store()
    {
        $this->validate([
            'level' => 'required',
            'description' => 'required',
            'location' => 'required',
            'time' => 'required'
        ]);

        Reports::updateOrCreate(['id' => $this->report_id], [
            'level' => $this->level,
            'description' => $this->description,
            'location' => $this->location,
            'time' => $this->time
        ]);

        session()->flash('message', $this->report_id ? 'Report updated.' : 'Report created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }


    public function edit($id)
    {
        $report = Reports::findOrFail($id);
        $this->id = $id;
        $this->level = $report->level;
        $this->description = $report->description;
        $this->location = $report->location;
        $this->time = $report->time;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        Reports::find($id)->delete();
        session()->flash('message', 'Report deleted.');
    }

}


class CrudResponse extends Component
{
    public $response, $name, $email, $mobile, $responsetime, $occupation, $response_id;
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
