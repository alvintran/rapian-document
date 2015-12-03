<?php

namespace Nht\Http\Controllers\Admin;

// Repository
use Nht\Hocs\Settings\SettingRepository;

use Nht\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use Nht\Http\Requests\AdminSettingFormRequest;
use Nht\Http\Requests\AdminMetadataFormRequest;
use Nht\Http\Requests\AdminSocialFormRequest;

use App, Config;

/**
 * Class description.
 *
 * @author  SaturnLai
 */

class SettingController extends AdminController
{
	protected $setting;

	public function __construct(SettingRepository $setting)
	{
		$this->setting = $setting;
		$this->image 	=  App::make('ImageFactory');
		$this->config 	=  Config::get('image');
		parent::__construct();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  1 (Default)
	 * @return Response
	 */
	public function edit()
	{
		$website = $this->setting->getById(1);

		return view('admin/settings/website', compact('website'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id = 1 (Default)
	 * @return Response
	 */
	public function update(AdminSettingFormRequest $request)
	{
		$dataFields = $request->except('_token', 'logo');

		if ($request->hasFile('logo')) {
			$config       = $this->config['array_crop_image'];
			$resultUpload = $this->image->upload('logo', LOGO_SETTING_PATH_UPLOAD , $config, 'crop');
			if($resultUpload['status'] > 0)
			{
				$dataFields['logo'] = $resultUpload['filename'];
			}
		}

		if ($this->setting->update($dataFields, ['id' => 1]))
		{
			return redirect()->route('website.edit')->with('success', trans('general.messages.update_success'));
		}

		return redirect()->back()->withInputs($request->except('_token'))->with('warning', trans('general.messages.update_warning'));
	}

	/**
	 * Setting metadata website
	 */

	public function metadata()
	{
		$metadata = $this->setting->getById(1);

		return view('admin/settings/metadata', compact('metadata'));
	}

	/**
	 * Cập nhật thông tin metadata
	 * @param  int  $id = 1 (Default)
	 * @return Response
	 */
	public function postMetadata(AdminMetadataFormRequest $request)
	{
		if ($this->setting->update($request->except('_token'), ['id' => 1]))
		{
			return redirect()->route('metadata.show')->with('success', trans('general.messages.update_success'));
		}

		return redirect()->back()->withInputs($request->except('_token'))->with('warning', trans('general.messages.update_warning'));
	}

	/**
	 * Setting Social Network
	 */

	public function social()
	{
		$social = $this->setting->getById(1);

		return view('admin/settings/social', compact('social'));
	}

	public function postSocial(AdminSocialFormRequest $request)
	{
		if ($this->setting->update($request->except('_token'), ['id' => 1]))
		{
			return redirect()->route('social.show')->with('success', trans('general.messages.update_success'));
		}

		return redirect()->back()->withInputs($request->except('_token'))->with('warning', trans('general.messages.update_warning'));
	}
}
