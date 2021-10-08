
<?php

class View {

    protected $_template;

    public function __construct($file) {
        $this->_template = $file;
    }

    public function render($data) {
        if (!file_exists($this->_template)) {
            throw new Exception("Teplate file " . $this->_template . " doesn't exist.");
        }
        include 'app/view/inc/header.php';
        if($this->_template !== 'app/view/pages/login.php' && $this->_template !== 'app/view/pages/register.php'){
            include 'app/view/inc/navbar.php';
        }
        include $this->_template;
        include 'app/view/inc/footer.php';
        die();
    }

}
