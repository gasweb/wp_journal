<?php
namespace Magazine\Pdf;

class JournalPdfExtractor extends \FPDI
{
    private $file = "";

    public function setFile($file)
    {
        $this->file = $file;
    }

   public function getRange($start, $end)
    {
            $pageCount = $this->setSourceFile($this->file);
            for ($pageNo = $start; $pageNo <= $end; $pageNo++) {
                 $tplIdx = $this->ImportPage($pageNo);
                 $s = $this->getTemplatesize($tplIdx);
                 $this->AddPage($s['w'] > $s['h'] ? 'L' : 'P', array($s['w'], $s['h']));
                 $this->useTemplate($tplIdx);
        }
    }
}