<?php 
class Controller{
    public $view = NULL;
    public $layoutPath = NULL;
    // hàm load view
    public function loadView($viewPath, $data = NULL)
    {
        if (file_exists("views/$viewPath")) {
            ob_start();
            if ($data != NULL) {
                extract($data);
            }
            include "views/$viewPath";
            $this->view = ob_get_contents();
            ob_end_clean(); // Thêm lệnh này để gán nội dung đầu ra và đóng buffer.
        }

        if ($this->layoutPath != NULL) {
            include "views/$this->layoutPath";
        } else {
            echo $this->view;
        }
    }

}
?>