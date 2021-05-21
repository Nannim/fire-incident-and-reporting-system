<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Reports;
use App\Models\Response;

class Crud extends Component
{
    public $reports, $level, $description, $autocomplete, $longitude, $latitude, $time, $email, $report_id;
    public $isModalOpen = 0;

    public function render()
    {
        $this->reports = Reports::all();
        return view('livewire.crud-report');
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
        $this->autocomplete = '';
        $this->longitude = '';
        $this->latitude = '';
        $this->time = '';
        $this->email = '';
    }

    public function store()
    {
        $this->validate([
            'level' => 'required',
            'description' => 'required',
            'autocomplete' => 'required',
            'latitude' => 'required',
            'longitude'=> 'required',
            'time' => 'required',
        ]);

        Reports::updateOrCreate(['id' => $this->report_id], [
            'level' => $this->level,
            'description' => $this->description,
            'autocomplete' => $this->autocomplete,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'time' => $this->time,
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
        $this->autocomplete = $report->autocomplete;
        $this->longitude = $report->longitude;
        $this->latitude = $report->latitude;
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
    public $response, $name, $email, $mobile, $description, $responsetime, $occupation, $response_id;
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
        $this->description = '';
        $this->responsetime = '';
        $this->occupation = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'description' => 'required',
            'responsetime' => 'required',
            'occupation' => 'required',
        ]);

        Response::updateOrCreate(['id' => $this->response_id], [
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'description' => $this->description,
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
        $this->description = $response->description;
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
