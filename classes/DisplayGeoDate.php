<?php
/**
 * 
 *  |   \(_)____ __| |__ _ _  _ / __|___ ___|   \ __ _| |_ ___ 
 *  | |) | (_-< '_ \ / _` | || | (_ / -_) _ \ |) / _` |  _/ -_)
 *  |___/|_/__/ .__/_\__,_|\_, |\___\___\___/___/\__,_|\__\___|
 *            |_|          |__/                                
 * 
 *  File: DisplayGeoDate.php
 *  Author: Kakhaber Mekvabishvili
 *  Description: Display date in Georgian
 * 
 */



class DisplayGeoDate {

    /**
     * Constants for months in Georgian with various formats.
     */
    const MONTHS = array(
        'DMY' => array('','იანვარი','თებერვალი','მარტი','აპრილი','მაისი','ივნისი','ივლისი','აგვისტო','სექტემბერი','ოქტომბერი','ნოემბერი','დეკემბერი'),
        'YDM' => array('','იანვარი','თებერვალი','მარტი','აპრილი','მაისი','ივნისი','ივლისი','აგვისტო','სექტემბერი','ოქტომბერი','ნოემბერი','დეკემბერი'),
        'YDMS' => array('','იანვარს','თებერვალს','მარტს','აპრილს','მაისს','ივნისს','ივლისს','აგვისტოს','სექტემბერს','ოქტომბერს','ნოემბერს','დეკემბერს'),
        'YDMI' => array('','იანვრის','თებერვლის','მარტის','აპრილის','მაისის','ივნისის','ივლისის','აგვისტოს','სექტემბერის','ოქტომბერის','ნოემბერის','დეკემბერის'),
        'YDMF' => array('','იანვრიდან','თებერვლიდან','მარტიდან','აპრილიდან','მაისიდან','ივნისიდან','ივლისიდან','აგვისტოდან','სექტემბერიდან','ოქტომბერიდან','ნოემბერიდან','დეკემბერიდან'),
        'YDME' => array('','იანვრამდე','თებერვლამდე','მარტამდე','აპრილამდე','მაისამდე','ივნისამდე','ივლისამდე','აგვისტომდე','სექტემბრამდე','ოქტომბრამდე','ნოემბრამდე','დეკემბრამდე'),
    );

    /**
     * @var string
     */
    private $date;
    private $format;

    /**
     * Class construct
     * 
     * @param string $date The date string in Y-m-d format.
     * @param string $format The format key for converting the date.
     */
    public function __construct(string $date, string $format) 
    {

        $this->date = $date;
        $this->format = $format;
       
        // Validate the date and format upon object creation.

        $this->ValidateDate();
        $this->validateFormat();

    }

    /**
     * Validate date format
     * 
     * @return void
     * @throws Exception if the format is not valid.
     */
    private function validateFormat()
    {
        
        if(!array_key_exists($this->format, self::MONTHS))
        {
            throw new Exception('Error: Format ' . $this->format . ' not correct!');
        }
        
    }


    /**
     * Validate format string
     * 
     * @return void
     * @throws Exception if the date is not in the correct format.
     */
    private function ValidateDate()
    {
        if(!preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $this->date))
        {
            throw new Exception('Error: Date ' . $this->date . ' not valid use Y-m-d!');
        }
    }


    /**
     * Converts the date into a Georgian formatted string.
     * 
     * @return string The converted date string in Georgian.
     */
    public function convert()
    {
        
        // Extract year, month, and day from the date string.

        $year = date("Y",strtotime($this->date));
        $month = ceil(date("m",strtotime($this->date)));
        $day = date("d",strtotime($this->date));

        if($this->format == 'DMY')
        {
            return $day . ' ' . self::MONTHS[$this->format][$month] . ', ' . $year.' წ.';
        }
        
        return $year . ' წლის ' . $day . ' '. self::MONTHS[$this->format][$month];
        
    }

        
}