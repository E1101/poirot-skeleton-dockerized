<?php
return array(
    'modules' => array(
        // Enabled Application Module(s)
    ),

    'module_manager' => array(
        'modules_dir' => array(
            # default modules directory
            PT_DIR_CORE,
            // set with .env.php 
            PT_DIR_WWW.'/Modules',
        ),
    ),
);
