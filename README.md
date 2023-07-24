# DisplayGeoDate
PHP Class for Display date in Georgian

Usage
```php
require_once 'classes/DisplayGeoDate.php';


$output1 = new DisplayGeoDate('2020-01-01','DMY');
echo $output1->convert();
// 01 იანვარი, 2020 წ

$output2 = new DisplayGeoDate('2020-01-01','YDM');
echo $output2->convert();
// 2020 წლის 01 იანვარი

$output3 = new DisplayGeoDate('2020-01-01','YDMS');
echo $output3->convert();
// 2020 წლის 01 იანვარს

$output4 = new DisplayGeoDate('2020-01-01','YDMI');
echo $output4->convert();
// 2020 წლის 01 იანვრის

$output5 = new DisplayGeoDate('2020-01-01','YDMF');
echo $output5->convert();
// 2020 წლის 01 იანვრიდან

$output6 = new DisplayGeoDate('2020-01-01','YDME');
echo $output6->convert();
// 2020 წლის 01 იანვრამდე
```
