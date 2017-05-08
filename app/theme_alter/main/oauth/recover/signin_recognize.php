<?php
/**
 * @var Module\Foundation\HttpSapi\ViewModelRenderer $this
 * @var array                                        $user { 'fullname' => string(19) "پیام نادری" }
 */
if (isset($user) && is_array($user))
    $template = 'signin_recognize-success';
elseif (isset($user) && $user === false)
    $template = 'signin_recognize-input';
else
    $template = 'signin_recognize-input';

return get_defined_vars();
