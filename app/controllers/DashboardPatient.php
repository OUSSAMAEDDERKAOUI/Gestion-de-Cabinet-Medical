<?php 

/**
 * home class
 */
class DashboardPatient
{
	use Controller;

	public function index()
	{

		$this->view('dashboardPatient');
	}

}