<?php

namespace App\Http\Livewire\Admin;

use App\Models\Role;
use Livewire\Component;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class Roles extends Component
{
    public $role;
    public $info = false;

    public $form = [
        "role_name" => "",
        "role_slug" => "",
        "roles_permissions" => "",
        "id" => "",
    ];

    protected $rules = [
        'form.role_name' => 'required|max:255',
        'form.role_slug' => 'required|max:255',
        'form.roles_permissions' => 'required',
    ];

    public function store()
    {
        $this->form['role_slug'] = strtolower(str_replace(" ", "-", $this->form['role_name']));

        $this->validate();

        $role = new Role();

        $role->name = $this->form['role_name'];
        $role->slug = $this->form['role_slug'];
        $role->save();

        $listOfPermissions = explode(', ', $this->form['roles_permissions']); //create array from separated/coma permissions

        foreach ($listOfPermissions as $permission) {
            $permissions = new Permission();
            $permissions->name = $permission;
            $permissions->slug = strtolower(str_replace(" ", "-", $permission));
            $permissions->save();
            $role->permissions()->attach($permissions->id);
            $role->save();
        }

        $this->formInit();

        $this->dispatchBrowserEvent("roleAdded");
    }

    public function show($id)
    {
        $this->role = Role::where('id', $id)->first();
        $this->info = true;
    }

    public function edit($id)
    {
        $role = Role::where('id', $id)->first();


        $names = "";

        foreach ($role->permissions as $value) {
            $names .= $value->name.", ";
        }

        $this->form['id'] = $role->id;
        $this->form['role_name'] = $role->name;
        $this->form['role_slug'] = $role->slug;
        $this->form['roles_permissions'] = rtrim($names, ', ');

    }

    public function update()
    {
        $role = Role::where('id', $this->form['id'])->first();
        if($role){
            $this->form['role_slug'] = strtolower(str_replace(" ", "-", $this->form['role_name']));

            $this->validate();


            $role->name = $this->form['role_name'];
            $role->slug = $this->form['role_slug'];
            $role->save();

            $role->permissions()->delete();
            $role->permissions()->detach();

            $listOfPermissions = explode(', ', $this->form['roles_permissions']); //create array from separated/coma permissions

            foreach ($listOfPermissions as $permission) {
                $permissions = new Permission();
                $permissions->name = $permission;
                $permissions->slug = strtolower(str_replace(" ", "-", $permission));
                $permissions->save();
                $role->permissions()->attach($permissions->id);
                $role->save();
            }

            $this->dispatchBrowserEvent("roleUpdated");
        }
    }

    public function delete($id)
    {
        $role = Role::where('id', $id)->first();

        $role->permissions()->delete();
        $role->delete();
        $role->permissions()->detach();

        $this->dispatchBrowserEvent("roleDeleted");
    }

    public function mount()
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }
    }

    public function render()
    {
        return view('livewire.admin.roles.roles', [
            'roles' => Role::orderBy('id', 'DESC')->get()
        ])->layout('layouts.app', [
            'page' => 'role',
        ]);
    }

    private function formInit()
    {
        $this->form['role_name'] = "";
        $this->form['role_slug'] = "";
        $this->form['roles_permissions'] = "";
    }
}
