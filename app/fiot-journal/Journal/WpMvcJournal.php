<?php
namespace Magazine\Journal;

use \Magazine\TiblMemberShip;

class WpMvcJournal extends Journal
{
	public function __construct(\MvcModelObject $object)
	{
		$this->setId($object->id);
		$this->setNumber($object->number);
		$this->setVolume($object->volume);
		$this->setYear($object->year);
		$this->setPdfLink($object->pdf_link);
		$this->setLinkContents($object->link_contents);
		$this->setLinkContents($object->link_contents_en, "en");
	}

	public function showPdf()
	{
		$year = $this->getYear();
		$number = $this->getNumber();
		$pdf_link = $this->getPdfLink();
	if(TiblMemberShip::canWatchPdf($this->getYear(), $this->getNumber()) && $pdf_link)
	{
		//$pdf_href = "/wp-content/uploads/journals/$year/$number/".$pdf_link;
		$pdf_href = "/wp-content/uploads/journals/".$pdf_link;
		?>
	<div class="pdf-container">
	<object data="<?=$pdf_href?>" type="application/pdf" width="100%" height="600px">
	<a href="<?=$pdf_href?>">
		<?=$this->title?>
	</a>
	</object>
	</div>
		<?php
	}
	elseif(\SwpmMemberUtils::is_member_logged_in())
	{
		?>
			Для получения подписки свяжитесь с нами!
		<?php
	}
	else
		{						
			?>			
			<div style="width: 100%; min-height: 300px; text-align: left;">
				<h3>Для доступа нужна подписка. Войдите в систему для подтверждения ее наличия. </h3>
				<?=do_shortcode("[swpm_login_form]");?>
			</div>
			<?php
		}

	}
}