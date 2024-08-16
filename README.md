# DisplayGeoDate
A PHP class for displaying dates in Georgian with various formats.

### Available Formats

- DMY: Day Month Year (e.g., 01 იანვარი, 2020 წ)
- YDM: Year Day Month (e.g., 2020 წლის 01 იანვარი)
- YDMS: Year Day Month (Suffix 'ს') (e.g., 2020 წლის 01 იანვარს)
- YDMI: Year Day Month (Possessive 'ის') (e.g., 2020 წლის 01 იანვრის)
- YDMF: Year Day Month (From 'დან') (e.g., 2020 წლის 01 იანვრიდან)
- YDME: Year Day Month (Until 'მდე') (e.g., 2020 წლის 01 იანვრამდე)

### Usage
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
