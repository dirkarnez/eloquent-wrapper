<?php
/*
https://php.watch/versions/8.2/dynamic-properties-deprecated#exempt
PHP 8.2 introduces a new attribute in the global namespace named #[AllowDynamicProperties]. Classes declared with this attribute signals PHP to not emit any deprecation notices when setting dynamic properties on objects of that class.
*/
function generateClass($propertyName, $propertyValue){
	$clazz = new #[AllowDynamicProperties]
	class{};
	
    $clazz->{$propertyName} = $propertyValue;
    return $clazz;
}

$test = generateClass('property1', 50);
echo $test->property1; // 50
echo $test->{"property1"}; // 50

echo gettype($test->property1); // integer
echo gettype($test->{"property1"}); // integer
