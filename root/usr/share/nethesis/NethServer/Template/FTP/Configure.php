<?php

echo $view->header()->setAttribute('template', $T('FTP_Configure_header'));

echo $view->radioButton('status', 'enabled');
echo $view->radioButton('status', 'disabled');

echo $view->fieldset(NULL, $view::FIELDSET_EXPANDABLE)
    ->setAttribute('template', $T('AdvancedConfiguration_label'))
    ->insert($view->textInput('port'));

echo $view->buttonList($view::BUTTON_SUBMIT | $view::BUTTON_CANCEL | $view::BUTTON_HELP);
