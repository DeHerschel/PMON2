<?php

namespace App\Http\Livewire\Settings;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ChangeDB extends Component
{
    

    public $dbfile = '';
    public $deletedb=0;
    public $confModal=false;
    public $shell = '';

    protected $rules = [
        'dbfile' => 'required|max:100',    ];

    protected $validationAttributes = [
        'dbfile' => 'dbfile',
    ];

    public function render()
    {
        if ($this->dbfile == '') {
            $this->dbfile=env('DB_DATABASE');
        }
        $shell = $this->shell;
        
        return view('livewire.settings.change-db');
    }

    public function updatefile()
    {
        $this->validate();
        $dbfile = $this->dbfile;
        $deletedb = $this->deletedb;
        $cmd_changedb="pmon-changedb ".$dbfile." ".$deletedb;
        $this->shell=$deletedb;
        shell_exec($cmd_changedb);
    }
}
