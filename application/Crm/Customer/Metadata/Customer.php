<?php
/**
 * Customer
 *
 * Copyright (c) 2008-2010 Twin Huang. All rights reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @author      Twin Huang <twinh@yahoo.cn>
 * @copyright   Twin Huang
 * @license     http://www.opensource.org/licenses/apache2.0.php Apache License
 * @version     $Id$
 * @since       2011-01-04 22:55:48
 */

class Crm_Customer_Metadata_Customer extends Common_Metadata
{
    public function setMetadata()
    {
        $this->setAdvancedMetadata();
        $this->parseMetadata(array(
            'field' => array(
                'name' => array(
                    'attr' => array(
                        'isList' => 1,
                    ),
                    'validator' => array(
                        'rule' => array(
                            'required' => true,
                        ),
                    ),
                ),
                'number' => array(

                ),
                'sex' => array(
                    'form' => array(
                        '_type' => 'select',
                        '_resourceGetter' => array(
                            array('Common_Helper_Option', 'get'),
                            'sex',
                        ),
                    ),
                    'filter' => array(
                        'list' => array(
                            array('Common_Helper_Option', 'filter'),
                            'sex',
                        ),
                        'view' => 'list',
                    ),
                    'attr' => array(
                        'isLink' => 1,
                        'isList' => 1,
                    ),
                ),
                'type' => array(
                    'form' => array(
                        '_type' => 'select',
                        '_resourceGetter' => array(
                            array('Common_Helper_Option', 'get'),
                            'customer-type',
                        ),
                    ),
                    'filter' => array(
                        'list' => array(
                            array('Common_Helper_Option', 'filter'),
                            'customer-type',
                        ),
                        'view' => 'list',
                    ),
                    'attr' => array(
                        'isLink' => 1,
                        'isList' => 1,
                    ),
                ),
                'source' => array(
                    'form' => array(
                        '_type' => 'select',
                        '_resourceGetter' => array(
                            array('Common_Helper_Option', 'get'),
                            'customer-source',
                        ),
                    ),
                    'filter' => array(
                        'list' => array(
                            array('Common_Helper_Option', 'filter'),
                            'customer-source',
                        ),
                        'view' => 'list',
                    ),
                    'attr' => array(
                        'isLink' => 1,
                        'isList' => 1,
                    ),
                ),
                'grade' => array(
                    'form' => array(
                        '_type' => 'select',
                        '_resourceGetter' => array(
                            array('Common_Helper_Option', 'get'),
                            'customer-grade',
                        ),
                    ),
                    'filter' => array(
                        'list' => array(
                            array('Common_Helper_Option', 'filter'),
                            'customer-grade',
                        ),
                        'view' => 'list',
                    ),
                    'attr' => array(
                        'isLink' => 1,
                        'isList' => 1,
                    ),
                ),
                'status' => array(
                    'form' => array(
                        '_type' => 'select',
                        '_resourceGetter' => array(
                            array('Common_Helper_Option', 'get'),
                            'customer-status',
                        ),
                    ),
                    'attr' => array(
                        'isLink' => 1,
                        'isList' => 1,
                    ),
                    'filter' => array(
                        'list' => array(
                            array('Common_Helper_Option', 'filter'),
                            'customer-status',
                        ),
                        'view' => 'list',
                    ),
                ),
                'email' => array(
                    'basic' => array(
                        'group' => 1,
                    ),
                    'attr' => array(
                        'isList' => 1,
                    ),
                ),
                'qq' => array(
                    'basic' => array(
                        'group' => 1,
                    ),
                ),
                'msn' => array(
                    'basic' => array(
                        'group' => 1,
                    ),
                ),
                'skype' => array(
                    'basic' => array(
                        'group' => 1,
                    ),
                ),
                'office_phone' => array(
                    'basic' => array(
                        'group' => 1,
                    ),
                ),
                'phone' => array(
                    'basic' => array(
                        'group' => 1,
                    ),
                ),
                'fax' => array(
                    'basic' => array(
                        'group' => 1,
                    ),
                ),
                'website' => array(
                    'basic' => array(
                        'group' => 1,
                    ),
                ),
                'company_id' => array(
                ),
                'bill_country' => array(
                    'basic' => array(
                        'group' => 3,
                    ),
                ),
                'ship_country' => array(
                    'basic' => array(
                        'group' => 3,
                    ),
                ),
                'bill_province' => array(
                    'basic' => array(
                        'group' => 3,
                    ),
                ),
                'ship_province' => array(
                    'basic' => array(
                        'group' => 3,
                    ),
                ),
                'bill_city' => array(
                    'basic' => array(
                        'group' => 3,
                    ),
                ),
                'ship_city' => array(
                    'basic' => array(
                        'group' => 3,
                    ),
                ),
                'bill_street' => array(
                    'basic' => array(
                        'group' => 3,
                    ),
                ),
                'ship_street' => array(
                    'basic' => array(
                        'group' => 3,
                    ),
                ),
                'bill_zip' => array(
                    'basic' => array(
                        'group' => 3,
                    ),
                ),
                'ship_zip' => array(
                    'basic' => array(
                        'group' => 3,
                    ),
                ),
                'bank_name' => array(
                    'basic' => array(
                        'group' => 4,
                    ),
                ),
                'bank_account_name' => array(
                    'basic' => array(
                        'group' => 4,
                    ),
                ),
                'bank_account_id' => array(
                    'basic' => array(
                        'group' => 4,
                    ),
                ),
                'payment_type' => array(
                    'basic' => array(
                        'group' => 4,
                    ),
                    'form' => array(
                        '_type' => 'select',
                        '_resourceGetter' => array(
                            array('Common_Helper_Option', 'get'),
                            'payment-type',
                        ),
                    ),
                    'filter' => array(
                        'list' => array(
                            array('Common_Helper_Option', 'filter'),
                            'payment-type',
                        ),
                        'view' => 'list',
                    ),
                    'attr' => array(
                        'isLink' => 1,
                    ),
                ),
                'payment_credit' => array(
                    'basic' => array(
                        'group' => 4,
                    ),
                    'attr' => array(
                        'isList' => 0,
                    ),
                ),
            ),
            'group' => array(
                0 => 'LBL_GROUP_BASIC_DATA',
                1 => 'LBL_GROUP_CONTACT_DATA',
                2 => 'LBL_GROUP_COMPANY_DATA',
                3 => 'LBL_GROUP_ADDRESS_DATA',
                4 => 'LBL_GROUP_BANK_DATA',
                5 => 'LBL_GROUP_DESCRIPTION_DATA'
            ),
            'layout' => array(

            ),
            'model' => array(
                'receiver' => array(
                    'alias' => 'receiver',
                    'type' => 'view',
                    'local' => 'assign_to',
                    'fieldMap' => array(
                        'assign_to' => 'username',
                    ),
                    'asc' => array(
                        'namespace' => 'Common',
                        'module' => 'Member',
                        'controller' => 'Member',
                    ),
                ),
                'care' => array(
                    'alias' => 'care',
                    'type' => 'relatedList',
                    'relation' => 'hasMany',
                    'foreign' => 'customer_id',
                    'fieldMap' => array(
                        'id' => 'name',
                    ),
                    'list' => array(
                        //'id', 'name', 'care_at', 'type'
                    ),
                    'asc' => array(
                        'namespace' => 'Crm',
                        'module' => 'Customer',
                        'controller' => 'Care',
                    ),
                ),
                'contacts' => array(
                    'alias' => 'contacts',
                    'type' => 'relatedList',
                    'relation' => 'hasMany',
                    'foreign' => 'customer_id',
                    'fieldMap' => array(
                        'id' => 'full_name',
                    ),
                    'asc' => array(
                        'namespace' => 'Crm',
                        'module' => 'Contact',
                        'controller' => 'Contact',
                    ),
                ),
            ),
            'db' => array(
                'table' => 'customer',
                'order' => array(
                    array('date_created', 'DESC')
                ),
                'defaultWhere' => array(
                    array('is_deleted', 0),
                ),
            ),
            'page' => array(
                'title' => 'LBL_MODULE_CUSTOMER',
                'icon' => 'user',
                'tableLayout' => 1,
                'alias' => 'customer',
                'useRecycleBin' => true,
                'letter' => 'C',
                'mainField' => 'name',
            ),
        ));
    }

    public function filterAddNumber($value, $name, $data, $dataCopy)
    {
        $count = $this->metaHelper->getQuery($this)->count() + 1;
        return $this['page']['letter'] . str_pad($count, 6, '0', STR_PAD_LEFT);
    }
}
