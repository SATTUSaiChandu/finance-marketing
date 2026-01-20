<?php
require_once 'BaseController.php';

class CommonController extends BaseController
{
  public function about()
  {
    $this->view('common/about');
  }

  public function contact()
  {
    $this->view('common/contact');
  }

  public function faq()
  {
    $this->view('common/faq');
  }

  public function privacy()
  {
    $this->view('common/privacy');
  }

  public function terms()
  {
    $this->view('common/terms');
  }
}
