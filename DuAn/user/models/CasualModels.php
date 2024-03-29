<?php
trait CasualModels
{
    public $data = array();

    public function showCategory()
    {
        $conn = Connection::getInstance();
        $query = $conn->query('select IdCategory,NameCategory from category where status = 0');
        if ($query) {
            while ($row = $query->fetch_assoc()) {
                $this->data['showCategory'][] = $row;
            }
        } else {
            $this->data['messageError'] = "Hệ thống đang bảo trì";
        }
        return $this->data;
    }

    public function showProduct()
    {
        $IdCategory = $_GET['id'];
        $conn = Connection::getInstance();

        if ($IdCategory === "All") {
            $query = $conn->query("
            SELECT p.*, i.Image
            FROM product p
            INNER JOIN (
                SELECT IdProduct, Image
                FROM image
                GROUP BY IdProduct
            ) i ON p.IdProduct = i.IdProduct
            WHERE p.Status = 0 
            ORDER BY p.IdProduct DESC
            LIMIT 10
            ");
            if ($query) {
                 
                while ($row = $query->fetch_assoc()) {
                    $this->data['showProduct'][] = $row;
                }
            } else {
                $this->data['messageError'] = "Hệ thống đang bảo trì";
            }
        } else {
            $query = $conn->query("
            SELECT p.*, i.Image
            FROM product p
            INNER JOIN (
                SELECT IdProduct, Image
                FROM image
                GROUP BY IdProduct
            ) i ON p.IdProduct = i.IdProduct
            WHERE p.Status = 0 and p.IdCategory  = '$IdCategory '
            ORDER BY p.IdProduct DESC
            LIMIT 10
            ");
            if ($query) {
                 
                while ($row = $query->fetch_assoc()) {
                    $this->data['showProduct'][] = $row;
                }
            } else {
                $this->data['messageError'] = "Hệ thống đang bảo trì";
            }
        }
        return $this->data;
    }

    public function sortBy()
    {
        $IdCategory = $_GET['id'];
        $quantity = $_GET['quantity'];
        $conn = Connection::getInstance();
        if ($IdCategory === "All") {
            $query = $conn->query("
            SELECT p.*, i.Image
            FROM product p
            INNER JOIN (
                SELECT IdProduct, Image
                FROM image
                GROUP BY IdProduct
            ) i ON p.IdProduct = i.IdProduct
            WHERE p.Status = 0 
            ORDER BY p.IdProduct DESC
            LIMIT $quantity
            ");
            if ($query) {
                while ($row = $query->fetch_assoc()) {
                    $this->data['showProduct'][] = $row;
                }
            } else {
                $this->data['messageError'] = "Hệ thống đang bảo trì";
            }
        } else {
            $query = $conn->query("
            SELECT p.*, i.Image
            FROM product p
            INNER JOIN (
                SELECT IdProduct, Image
                FROM image
                GROUP BY IdProduct
            ) i ON p.IdProduct = i.IdProduct
            WHERE p.Status = 0 and p.Idcategory = '$IdCategory'
            ORDER BY p.IdProduct DESC
            LIMIT $quantity
            ");
            if ($query) {
                while ($row = $query->fetch_assoc()) {
                    $this->data['showProduct'][] = $row;
                }
            } else {
                $this->data['messageError'] = "Hệ thống đang bảo trì";
            }
        }
        return $this->data;
    }
    public function sortByShearch()
    {
        extract($_POST);
        if (isset($_GET['quantity'])) {
            $sheach = $_SESSION['sheach'];

            $quantity =  $_GET['quantity'];
            $conn = Connection::getInstance();
            $query = $conn->query("
                SELECT p.*, i.Image
                FROM product p
                INNER JOIN (
                    SELECT IdProduct, Image
                    FROM image
                    GROUP BY IdProduct
                ) i ON p.IdProduct = i.IdProduct
                WHERE p.Status = 0 and p.NameProducts like '%{$sheach}%'
                ORDER BY p.IdProduct DESC
                LIMIT $quantity
                ");
            if ($query) {
                while ($row = $query->fetch_assoc()) {
                    $this->data['showProduct'][] = $row;
                }
            } else {
                $this->data['messageError'] = "Hệ thống đang bảo trì";
            }
        }


        return $this->data;
    }

    public function showProductShearch()
    {
        extract($_POST);
        if (isset($sheach)) {
            $_SESSION['sheach'] = $sheach;
            $conn = Connection::getInstance();
            $query = $conn->query("
            SELECT p.*, i.Image
            FROM product p
            INNER JOIN (
                SELECT IdProduct, Image
                FROM image
                GROUP BY IdProduct
            ) i ON p.IdProduct = i.IdProduct
            WHERE p.Status = 0 and p.NameProducts like  '%{$sheach}%'
            ORDER BY p.IdProduct DESC
            LIMIT 10
            ");
            if ($query) {
                 
                while ($row = $query->fetch_assoc()) {
                    $this->data['showProduct'][] = $row;
                }
            } else {
                $this->data['messageError'] = "Hệ thống đang bảo trì";
            }
        }
        return $this->data;
    }
}