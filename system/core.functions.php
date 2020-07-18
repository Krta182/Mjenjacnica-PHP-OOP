<?php

set_exception_handler(array(AppCore::class, 'handleException'));
spl_autoload_register(array(APPCore::class, 'autoload'));

?>