<?php
include "models/FixAccountModels.php";
class FixAccountController extends Controller
{
    use FixAccountModels;
    public function index()
    {
        $id = isset($_COOKIE['IdAccount']) ? $_COOKIE['IdAccount'] : 0;
        if ($id == 0) {
            echo "<script> alert('The data editing session has expired') </script>";
            header("location:index.php?controller=LisstAccount");
        }
        $datadisplay = $this->FixAccountDisplayModels($id);
        $dataMessage = $this->modelFixAccount($id);
        $data = array(
            "display" => $datadisplay,
            "dataMessage" => $dataMessage

        );
        $this->loadView("FixAccount.php", $data);
    }
}