<?php
include "models/LisstProductModels.php";
class LisstProductController extends Controller
{
    use LisstProductModels;
    public function index()
    {
        $data = $this->LisstProductModels();
        $this->loadView('LisstProduct.php', $data);
    }

    public function deleteProduct()
    {
        $id = isset($_GET['IdProduct']) ? $_GET['IdProduct'] : 0;
        $data = $this->LisstProductModels();
        $this->delete($id);
        $this->loadView('LisstProduct.php', $data);
    }
}