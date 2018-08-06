<?php

if ($view->getModule()->getIdentifier() == 'update') {
    $keyFlags = $view::STATE_DISABLED;
    $template = 'Update_User_Header';
} else {
    $keyFlags = 0;
    $template = 'Create_User_Header';
}

echo $view->header()->setAttribute('template', $T($template));

echo $view->panel()
        ->insert($view->textInput('username', $keyFlags))
        ->insert($view->textInput('Password', $view::TEXTINPUT_PASSWORD))
        ->insert($view->fieldsetSwitch('Chroot', 'enabled', $view::FIELDSETSWITCH_CHECKBOX|$view::FIELDSETSWITCH_EXPANDABLE)
            ->setAttribute('uncheckedValue', 'disabled')
            ->insert($view->textInput('ChrootDir'))
        )
        ->insert($view->textLabel('status')->setAttribute('template', $T('status_label')))
        ->insert($view->radioButton('status', 'enabled'))
        ->insert($view->radioButton('status', 'disabled'))
        ->insert($view->textInput('Description'));
;

echo $view->buttonList($view::BUTTON_SUBMIT | $view::BUTTON_CANCEL | $view::BUTTON_HELP);
