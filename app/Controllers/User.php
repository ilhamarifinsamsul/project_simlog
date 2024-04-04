<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class User extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

    private $modeluser;
    public function __construct()
    {
        $this->modeluser = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola User',
            'user' => $this->modeluser->join('tb_role', 'tb_role.id_role = tb_user.id_role')->orderBy('id_user', 'DESC')->findAll()
        ];

        return view('user/index', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'title' => 'New User',
            'role' => $this->modeluser->getRole()
        ];

        return view('user/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = [
            'username' => $this->request->getVar('username'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'password' =>  password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'id_role' => $this->request->getVar('id_role')
        ];

        $rules = [
            'password' => 'required|min_length[3]',
            'nama_lengkap' => 'required|min_length[3]',
            'id_role' => 'required',
            'username' => 'required|is_unique[tb_user.username]'
        ];

        if (!$this->validateData($data, $rules)) {
            $error = '';
            foreach ($this->validator->getErrors() as $key => $value) {
                $error .= $value . '';
            }
            $this->alert->set('warning', 'Warning', $error);
            return redirect()->to('user/new');
        }

        $res = $this->modeluser->save($data);
        if ($res) {
            $this->alert->set('success', 'Success', 'Add Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Add Failed');
        }

        return redirect()->to('user');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'title' => 'Edit User',
            'user' => $this->modeluser->find($id),
            'role' => $this->modeluser->getRole()
        ];

        return view('user/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = [
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'id_role' => $this->request->getVar('id_role')
        ];

        $rules = [
            'nama_lengkap' => 'required|min_length[3]',
            'id_role' => 'required'
        ];

        if (!$this->validateData($data, $rules)) {
            $error = '';
            foreach ($this->validator->getErrors() as $key => $value) {
                $error .= $value . '';
            }
            $this->alert->set('warning', 'Warning', $error);
            return redirect()->to('user/edit');
        }

        $password = $this->request->getVar('password');
        if ($password != '') {
            $data['password'] = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }

        $res = $this->modeluser->update($id, $data);
        if ($res) {
            $this->alert->set('success', 'Success', 'Update Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Update Failed');
        }

        return redirect()->to('user');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->modeluser->delete($id);
        $this->alert->set('success', 'Success', 'Delete Success');
        return redirect()->to('user');
    }
}
