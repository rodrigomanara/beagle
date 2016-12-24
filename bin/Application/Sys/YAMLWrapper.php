<?php


namespace Application\Sys;

use Symfony\Component\Yaml\Yaml;

/**
 * Description of YAMLWrapper
 *
 * @author rodrigo
 */
class YAMLWrapper {
    //put your code here
     public function read($path) {
        try {
            $value = Yaml::parse(file_get_contents($path));
            return $value;
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
        }
    }
}
