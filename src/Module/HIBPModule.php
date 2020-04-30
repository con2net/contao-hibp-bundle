<?php
namespace con2net\ContaoHIBPBundle\Module;

use Icawebdesign\Hibp\Breach\Breach;
use Icawebdesign\Hibp\Exception\BreachNotFoundException;

class HIBPModule extends \Module
{
    /**
     * @var string
     */
    protected $strTemplate = 'mod_hibp';

    /**
     * Displays a wildcard in the back end.
     *
     * @return string
     */
    public function generate()
    {
        if (TL_MODE == 'BE') {
            $template = new \BackendTemplate('be_wildcard');

            $template->wildcard = '### '.utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['hibp'][0]).' ###';
            $template->title = $this->headline;
            $template->id = $this->id;
            $template->link = $this->name;
            $template->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id='.$this->id;

            return $template->parse();
        }

        return parent::generate();
    }

    /**
     * Generates the module.
     */
    protected function compile()
    {
        $breachCheck = true;
        if (\Contao\Input::post('FORM_SUBMIT') == 'HIBPFORM') {
            $email_address = strval(\Contao\Input::post('email'));
            $breach = new Breach($this->APIKey);
            try {
                $data = $breach->getBreachedAccount($email_address);
            } catch (\Icawebdesign\Hibp\Exception\BreachNotFoundException $e) {
                //echo sprintf("E-Mail-Adresse wurde nicht gefunden!\n%s", $e->getMessage());
                return false;
            }
             $breaches = $data->map(function ($item) {
                 return [
                     'name'=>$item->getName(),
                     'domain'=>$item->getDomain(),
                     'date'=>$item->getBreachDate()->format('d.m.Y'),
                     'description'=>$item->getDescription(),
                     'types'=>$item->getDataClasses(),
                     'logo'=>$item->getLogoPath()
                 ];
             })->toArray();
         }
        $this->Template->breaches = $breaches;
        $this->Template->breachCheck = $breachCheck;
        }
}
