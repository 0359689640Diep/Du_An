<?php 
class Controller{
    public $view = NULL;
    public $layoutPath = NULL;
    // hàm load view
    public function loadView($viewPath, $data = NULL) {
        if(file_exists("views/$viewPath")){
            // sử dụng để bắt đầu một buffer cho đầu ra của script
            ob_start();
            if($data !=NULL) 
            // chuyển các cặp key và value trong mảng thành biến
            extract($data);
                include "views/$viewPath";
                // lấy nội dung đầu ra đang được lưu trữ trong out buffering(bộ đệm đầu ra).
                $this->view = ob_get_contents();
                // gửi trang HTML đến trình duyệt
                ob_get_clean();
        }
        if($this->layoutPath != NULL) {
            include "views/$this->layoutPath";
        }else{
            echo $this->view;
        }
    }
}
?>