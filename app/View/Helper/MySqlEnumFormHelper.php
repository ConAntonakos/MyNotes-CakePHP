<?php
App::uses('FormHelper', 'View/Helper');
/**
 * APP/View/Helper/MySqlEnumFormHelper.php
 * It extends FormHelper to implement ENUM datatype of MySQL.
 * 
 * http://blog.xao.jp/blog/cakephp/implementation-of-mysql-enum-datatype-in-formhelper/
 *
 * CakePHP 2.2.3
 */
class MySqlEnumFormHelper extends FormHelper
{
    public function input($fieldName, $options = array())
    {
        if (!isset($options['type']) && !isset($options['options'])) {
            $modelKey = $this->model();
            if (preg_match(
                    '/^enum\((.+)\)$/ui',
                    $this->fieldset[$modelKey]['fields'][$fieldName]['type'],
                    $m
               )) {

                $match = trim($m[1]);
                $qOpen = substr($match, 0, 1);
                $qClose = substr($match, -1);
                $delimiter = $qOpen . ',' . $qClose;
                preg_match('/^'.$qOpen.'(.+)'.$qClose.'$/u', $match, $m);
                $_options = explode($delimiter, $m[1]);
                $options['type'] = 'select';
                $options['options'] = array_combine($_options, $_options);

            }
        }
        return parent::input($fieldName, $options);
    }
}
?>