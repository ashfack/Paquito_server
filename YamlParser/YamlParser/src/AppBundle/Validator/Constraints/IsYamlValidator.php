<?php

namespace AppBundle\Validator\Constraints;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Exception\ParseException;
 
/**
 * @Annotation
 */
class IsYamlValidator extends ConstraintValidator
{
     
    public function validate($value, Constraint $constraint)
    {
        $yaml = new Parser();
         
        try {
            $yaml->parse($value);
        } catch (ParseException $e) {
            //printf("Unable to parse the YAML string: %s", $e->getMessage());
                 
            $this->context->addViolation($constraint->message);
        }
    }
}