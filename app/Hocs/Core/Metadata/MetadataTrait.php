<?php

namespace Nht\Hocs\Core\Metadata;

trait MetadataTrait
{

	/**
	 * Init metadata variable in controller and shared view
	 * @return void
	 */
	public function getMetadata()
	{
		$this->metadata = \App::make(Metadata::class);
		view()->share('metadata', $this->metadata);
	}
}