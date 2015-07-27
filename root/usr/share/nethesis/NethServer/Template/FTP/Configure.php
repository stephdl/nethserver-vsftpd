<?php

echo $view->header()->setAttribute('template', $T('FTP_Configure_header'));

echo $view->radioButton('status', 'enabled');
echo $view->radioButton('status', 'disabled');

echo $view->buttonList($view::BUTTON_SUBMIT | $view::BUTTON_CANCEL | $view::BUTTON_HELP);
