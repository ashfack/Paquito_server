<?php

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class IsYaml extends Constraint
{
    public $message = 'error.';
	
	
	public function validatedBy()
{
    return get_class($this).'Validator';
}
}
