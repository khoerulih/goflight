<?php

namespace App\Controllers;

use \App\Models\UsersModel;
use \App\Models\TransaksiModel;

class Admin extends BaseController
{
	protected $userModel;
	protected $transaksiModel;

  public function __construct()
  {
    $this->userModel = new UsersModel();
    $this->transaksiModel = new TransaksiModel();
  }

	public function index()
	{
		$data = [
			'title' => 'Admin | GoFlight',
			'successCount' => $this->transaksiModel->countSuccessTransaction(),
			'pendingCount' => $this->transaksiModel->countPendingTransaction(),
			'allProfit' => $this->transaksiModel->sumAllProfit(),
			'userCount' => $this->userModel->countUser(),
		];
		return view('admin/index', $data);
	}

	public function user_list()
	{
		$data = [
			'title' => 'User List | GoFlight',
			'users'  => $this->userModel->getAllUser(),
		];
		return view('admin/user-list', $data);
	}

	public function admin_list()
	{
		$data = [
			'title' => 'Admin List | GoFlight',
			'users'  => $this->userModel->getAllAdmin(),
		];
		return view('admin/admin-list', $data);
	}

	public function userDelete($id)
	{
		$this->userModel->deleteUser($id);
    session()->setFlashdata('pesan', 'Data berhasil dihapus.');
    return redirect()->to('/user_list');
	}
}

?>
