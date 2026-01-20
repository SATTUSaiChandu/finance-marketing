<?php
require_once 'BaseController.php';

class AgentController extends BaseController
{
  public function index()
  {
    $this->view('agent/index');
  }

  public function history()
  {
    $this->view('agent/history');
  }
}
