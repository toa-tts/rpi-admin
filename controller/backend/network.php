<?php //>

return new class('cfg/network') extends matrix\web\backend\bundle\GetCustomBundle {

    protected function postprocess($form, $result) {
        $network = file_get_contents(APP_HOME . 'etc/network');

        $result['data']['ip'] = preg_replace('/.*address ([\d.]+).*/s', '$1', $network);
        $result['data']['netmask'] = preg_replace('/.*netmask ([\d.]+).*/s', '$1', $network);
        $result['data']['gateway'] = preg_replace('/.*gateway ([\d.]+).*/s', '$1', $network);

        return $result;
    }

};
