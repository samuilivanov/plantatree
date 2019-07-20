<?php
namespace App\Tests\Form;

use App\Form\RegistrationFormType;
use App\Model\TestObject;
use Symfony\Component\Form\Test\TypeTestCase;

class RegistrationFormTypeTest extends TypeTestCase
{
    public function testSubmitValidData()
    {
        $formData = array(
            'test' => 'test',
            'test2' => 'test2',
        );

        $type = new RegistrationFormType();
        $form = $this->factory->create($type);

        $object = new TestObject();
        $object->fromArray($formData);

        // submit the data to the form directly
        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($object, $form->getData());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
}
