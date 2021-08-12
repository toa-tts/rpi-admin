<?php //>

return new class('cfg/network') extends matrix\web\backend\bundle\UpdateCustomBundle {

    protected function validate($form) {
        $errors = parent::validate($form);

        foreach (['ip', 'netmask', 'gateway'] as $name) {
            if (@$form[$name]) {
                if (validate($form[$name], 'ip') !== true) {
                    $errors[] = ['name' => $name, 'type' => 'ip'];
                }
            }
        }

        return $errors;
    }

    protected function postprocess($form, $result) {
        $diff = $result['diff'];

        if ($diff) {
            $data = array_merge($result['data'], $diff);

            if ($data['ip'] && $data['netmask']) {
                $text = "auto eth0\niface eth0 inet static\naddress {$data['ip']}\nnetmask {$data['netmask']}\n";

                if ($data['gateway']) {
                    $text = "{$text}gateway {$data['gateway']}\n";
                }
            } else {
                $text = '';
            }

            file_put_contents(APP_DATA . 'network', $text);

            //--

            $command = 'cp ' . APP_DATA . 'network ' . APP_HOME . "etc\n" . APP_HOME . "bin/change-ip.sh\n";

            file_put_contents('/home/pi/bin/command.sh', $command);
        }

        return $result;
    }

};
