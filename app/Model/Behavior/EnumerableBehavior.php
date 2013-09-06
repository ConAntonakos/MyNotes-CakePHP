<?php

/*
* Behavior with useful functionality around models containing an enum type field
*
* Copyright (c) Debuggable, http://debuggable.com
*
*
*
* @package default
* @access public
*
* reworked by Nathanael Mallow for cakephp 2.0
*
*/
/*
 *Use case:Add this (EnumerableBehavior.php)  to app/Model/Behavior/
 *  -->in the Model add public $actsAs = array('Enumerable');     
 *  -->in the *_controller add $enumOptions = $this->Categorie->enumOptions('Section');
 *  -->in the view add print $this->Form->input('{db_field_name}', array('options' =>       $enumOptions, 'label' => 'here'));
 *
 *
 */
function enumOptions( $model, $field ) {
        $cacheKey = $model->alias . '_' . $field . '_enum_options';
        $options = Cache::read($cacheKey);
 
        if (!$options) {
            $options = false;
            $conn = ConnectionManager::getInstance();
            switch( $conn->config->{$model->useDbConfig}['driver'] ) {
                case 'postgres':
                    $sql = "SELECT udt_name FROM information_schema.columns WHERE table_name = '{$model->useTable}' AND column_name = '{$field}';";
                    $enumType = $model->query( $sql );
                    if(!empty($enumType)) {
                        $enumType = Set::extract( $enumType, '0.0.udt_name' );
 
                        $sql = "SELECT enum_range(null::$enumType);";
                        $enumData = $model->query($sql);
                        if(!empty($enumData)) {
                            $patterns = array( '{', '}' );
                            $enumData = r( $patterns, '', Set::extract( $enumData, '0.0.enum_range' ) );
                            $options = explode( ',', $enumData );
                        }
 
                    }
                    break;
                case 'mysql':
                case 'mysqli':
                    $sql = "SHOW COLUMNS FROM `{$model->useTable}` LIKE '{$field}'";
                    $enumData = $model->query($sql);
                    if(!empty($enumData)) {
                        $patterns = array('enum(', ')', '\'');
                        $enumData = r($patterns, '', $enumData[0]['COLUMNS']['Type']);
                        $options = explode(',', $enumData);
                    }
                    break;
            }
 
            Cache::write($cacheKey, $options);
        }
 
        return $options;
    }