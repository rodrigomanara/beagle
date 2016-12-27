<?php


namespace Beagle\Application\Sys;

use Beagle\Application\Exception\ExceptionWrapper;

/**
 * Description of YAMLWrapper
 *
 * @author rodrigo
 */
class YAMLWrapper {
    //put your code here
     public function read($path) {
        try {
            $value = \Spyc::YAMLLoad($path);
            //$value = Yaml::parse(file_get_contents($path));
            return $value;
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
        }
    }
    public function writer($path , array $content, $level = 3){
        
        try{
        \Spyc::YAMLDump($content , $level);
        } catch (\Exception $e){
            $exception = new ExceptionWrapper("yaml");
            $exception->addWarning('yaml' , ['message' => $e->getMessage() ]);
            
        }
    }
}
