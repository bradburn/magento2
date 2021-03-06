<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Magento
 * @package     Magento_Code
 * @subpackage  unit_tests
 * @copyright   Copyright (c) 2013 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Magento_Code_Generator_ClassTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test class name for generation test
     */
    const TEST_CLASS_NAME = 'Magento_Code_Generator_TestAsset_TestGenerationClass';

    /**
     * Expected arguments for test class constructor
     *
     * @var array
     */
    protected $_expectedArguments = array(
        0 => 'Magento\Code\Generator\TestAsset\ParentClass',
        1 => 'Magento\Code\Generator\TestAsset\SourceClass',
        2 => 'Not_Existing_Class',
    );

    public function testGenerateForConstructor()
    {
        $generatorMock = $this->getMock('Magento_Code_Generator', array('generateClass'), array(), '', false);
        foreach ($this->_expectedArguments as $order => $class) {
            $generatorMock->expects($this->at($order))
                ->method('generateClass')
                ->with($class);
        }

        $classGenerator = new Magento_Code_Generator_Class($generatorMock);
        $classGenerator->generateForConstructor(self::TEST_CLASS_NAME);
    }
}
