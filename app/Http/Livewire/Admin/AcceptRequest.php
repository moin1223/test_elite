<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\UserType;

class AcceptRequest extends Component
{
    public $user;

    public $user_types, $assign_users;
    public $user_id;
    public $assign_to;
    public $role;

    public function updatedRole()
    {
        if ($this->role) {
            $id = UserType::where('user_type', $this->role)->pluck('id')->first();
            $previousValue = UserType::where('id', '<', $id)
                ->orderBy('id', 'desc')
                ->pluck('user_type')->toArray();

            $this->assign_users = User::whereIn('role', $previousValue)->get();
        }
    }

    public function updateAssignTo()
    {
        dd($this->assign_to);
    }

    protected $rules = [
        'role' => 'string'
    ];

    public function save()
    {
    }

    public function mount()
    {
        $this->user_types = UserType::all();
        $this->assign_users = User::all();
    }

    public function render()
    {
        return view('livewire.admin.accept-request');
    }
}
