<?php
require "models/PersonalModels.php";
class PersonalController extends Controller
{
    use PersonalModel;
    public function index()
    {
        $data = $this->showAccount();
        $data = $this->showCategory();
        $_SESSION["ImageUser"] = $data["showAccount"]["Image"];
        $_SESSION["NameUser"] = $data["showAccount"]["Name"];
        $this->loadView("Personal.php", $data);
    }

    public function UpdateAccount()
    {
        $this->Update();
        $IdAccount = $_GET['id'];
        header("location: index.php?controller=Personal&id=$IdAccount");
    }
}