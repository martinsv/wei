<?php
return array(
    'style' => array(
        'padding' => '5px',
        'width' => '600px',
    ),
    'fieldDefaults' => array(
        'type' => 'text',
        'attr' => array(
        ),
    ),
    'lableDefaults' => array(
        'width' => '75',
    ),
    'elems' => array(
        'id' => array(
            'type' => 'hidden',
            'name' => 'id',
        ),
        'group_id' => array(
            'name' => 'group_id',
            'readonly' => true,
            '_link' => true,
            '_type' => 'text',
            '_relation' => array(
                'module' => 'member/group',
                'alias' => 'group',
                'display' => 'name',
                'loaded' => true,
            ),
            '_widgets' => array(
                array(
                    array('PopupPicker_Widget', 'render'),
                    array(array(
                            'layout' => 'id,name,date_modified',
                    )),
                ),
            ),
        ),
        'username' => array(
            'name' => 'username',
            '_onEdit' => array(
                'readonly' => 'true',
            ),
        ),
        'password' => array(
            'name' => 'password',
            '_type' => 'password',
            '_onAdd' => array(
                '_value' => '',
            ),
            '_onEdit' => array(
                '_type' => 'text',
                'readonly' => 'true',
                '_value' => '●●●●●'
            ),
            // TODO 更好的方法,如显示<em>(不可见)</em>
            '_onView' => array(
                '_value' => '●●●●●',
            ),
        ),
        'sex' => array(
            'name' => 'sex',
            '_type' => 'checkbox',
            '_resourceGetter' => array(
                array('Ide_Option_Widget', 'get'),
                'sex',
            ),
            '_onView' => array(
                '_sanitiser' => array(
                    array(
                        array('Ide_Option_Widget', 'sanitise'),
                        array('sex'),
                    ),
                ),
            ),
        ),
        'birthday' => array(
            'name' => 'birthday',
            '_widgets' => 'datepicker',
        ),
        'language' => array(
            'name' => 'language',
            '_type' => 'select',
            '_resourceGetter' => array(
                array('Ide_Option_Widget', 'get'),
                'language',
            ),
        ),
        'email' => array(
            'name' => 'email',
        ),
        'first_name' => array(
            'name' => 'first_name',
        ),
        'last_name' => array(
            'name' => 'last_name',
        ),
        'photo' => array(
            'name' => 'photo',
        ),
        'reg_ip' => array(
            'name' => 'reg_ip',
        ),
        'theme' => array(
            'name' => 'theme',
            '_type' => 'select',
            '_resourceGetter' => array(
                array('Style_Widget', 'getResource'),
            ),
        ),
        'telephone' => array(
            'name' => 'telephone',
        ),
        'mobile' => array(
            'name' => 'mobile',
        ),
        'homepage' => array(
            'name' => 'homepage',
        ),
        'address' => array(
            'name' => 'address',
        ),
    ),
    'buttons' => array(
        array(
            'type' => 'submit',
            'label' => 'Submit',
            'icon' => 'ui-icon-check',
        ),
        array(
            'type' => 'reset',
            'label' => 'Reset',
            'icon' => 'ui-icon-arrowreturnthick-1-w',
        ),
    ),
);