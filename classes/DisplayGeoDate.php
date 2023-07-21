<?php
/*

  ___  _         _            ___         ___       _       
 |   \(_)____ __| |__ _ _  _ / __|___ ___|   \ __ _| |_ ___ 
 | |) | (_-< '_ \ / _` | || | (_ / -_) _ \ |) / _` |  _/ -_)
 |___/|_/__/ .__/_\__,_|\_, |\___\___\___/___/\__,_|\__\___|
           |_|          |__/                                

File: DisplayGeoDate.php
Author: Kakhaber Mekvabishvili
Description: Display date in Georgian

*/

class DisplayGeoDate {

    const MONTHS = array(
        'DMY' => array('','იანვარი','თებერვალი','მარტი','აპრილი','მაისი','ივნისი','ივლისი','აგვისტო','სექტემბერი','ოქტომბერი','ნოემბერი','დეკემბერი'),
        'YDM' => array('','იანვარი','თებერვალი','მარტი','აპრილი','მაისი','ივნისი','ივლისი','აგვისტო','სექტემბერი','ოქტომბერი','ნოემბერი','დეკემბერი'),
        'YDMS' => array('','იანვარს','თებერვალს','მარტს','აპრილს','მაისს','ივნისს','ივლისს','აგვისტოს','სექტემბერს','ოქტომბერს','ნოემბერს','დეკემბერს'),
        'YDMI' => array('','იანვრის','თებერვლის','მარტის','აპრილის','მაისის','ივნისის','ივლისის','აგვისტოს','სექტემბერის','ოქტომბერის','ნოემბერის','დეკემბერის'),
        'YDMF' => array('','იანვრიდან','თებერვლიდან','მარტიდან','აპრილიდან','მაისიდან','ივნისიდან','ივლისიდან','აგვისტოდან','სექტემბერიდან','ოქტომბერიდან','ნოემბერიდან','დეკემბერიდან'),
    );

    private $date;
    private $format;

    public function __construct(string $date, string $format) 
    {

        $this->date = $date;
        $this->format = $format;
       
        // Check Date and output Format
        $this->checkDate();
        $this->checkFormat();

    }

    //
    // Check format
    //

    private function checkFormat()
    {
        
        if(!array_key_exists($this->format, self::MONTHS))
        {
            throw new Exception('Error: Format ' . $this->format . ' not correct!');
        }
        
    }

    //
    // check Date string
    //

    private function checkDate()
    {
        if(!preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $this->date))
        {
            throw new Exception('Error: Date ' . $this->date . ' not valid use Y-m-d!');
        }
    }


    //
    // Convert into Georgian
    //

    public function convert()
    {
        
        // Get year,month and day from Date string
        $year = date("Y",strtotime($this->date));
        $month = ceil(date("m",strtotime($this->date)));
        $day = date("d",strtotime($this->date));

        if($this->format == 'DMY')
        {
            return $day . ' ' . self::MONTHS[$this->format][$month] . ', ' . $year.' წ.';
        }
        else
        {
            return $year . ' წლის ' . $day . ' '. self::MONTHS[$this->format][$month];
        }
        
    }

        
}