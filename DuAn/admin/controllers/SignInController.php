<?php
include "models/SignInModels.php";
class SignInController extends Controller
{
    use SignInModles;
    // load views
    public function index()
    {
        $data = $this->modelSignIn();
        $this->loadView("SignIn.php", $data);
    }
}