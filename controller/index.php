<?php //>

return new class() extends matrix\web\Controller {

    public function available() {
        return true;
    }

    protected function process($form) {
        return ['success' => true, 'view' => '302.php', 'path' => APP_ROOT . 'backend/'];
    }

};
