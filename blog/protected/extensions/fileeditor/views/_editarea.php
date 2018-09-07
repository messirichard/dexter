	

	<?php
		echo CHtml::textArea(
			$this->pars['name'].$this->feId, 
			$this->pars['value'],
			array(
				'id'=> $this->feId,
				'class'=>$this->pars['class'],
				'encode'=> $this->encode,
				'rows'=> $this->pars['rows'],
				'cols'=> $this->pars['cols']
			)
		);
	?>