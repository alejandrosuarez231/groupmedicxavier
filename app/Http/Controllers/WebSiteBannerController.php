<?php

namespace Cpanel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Cpanel\Http\Requests\BannerStoreRequest;

use Cpanel\SiteBanner;

use Session;

class WebSiteBannerController extends Controller
{
    public function index()
	{

		Session::put('breadCrumb', 'promotions');
		Session::flash('title', 'Banner y Ofertas');
		return view('web.banner.index', [
						'animation' 	=> ['bounce' => 'bounce','flash' => 'flash','pulse' => 'pulse','rubberBand' => 'rubberBand','shake' => 'shake','headShake' => 'headShake','swing' => 'swing','tada' => 'tada','wobble' => 'wobble','jello' => 'jello','bounceIn' => 'bounceIn','bounceInDown' => 'bounceInDown','bounceInLeft' => 'bounceInLeft','bounceInRight' => 'bounceInRight','bounceInUp' => 'bounceInUp','bounceOut' => 'bounceOut','bounceOutDown' => 'bounceOutDown','bounceOutLeft' => 'bounceOutLeft','bounceOutRight' => 'bounceOutRight','bounceOutUp' => 'bounceOutUp','fadeIn' => 'fadeIn','fadeInDown' => 'fadeInDown','fadeInDownBig' => 'fadeInDownBig','fadeInLeft' => 'fadeInLeft','fadeInLeftBig' => 'fadeInLeftBig','fadeInRight' => 'fadeInRight','fadeInRightBig' => 'fadeInRightBig','fadeInUp' => 'fadeInUp','fadeInUpBig' => 'fadeInUpBig','fadeOut' => 'fadeOut','fadeOutDown' => 'fadeOutDown','fadeOutDownBig' => 'fadeOutDownBig','fadeOutLeft' => 'fadeOutLeft','fadeOutLeftBig' => 'fadeOutLeftBig','fadeOutRight' => 'fadeOutRight','fadeOutRightBig' => 'fadeOutRightBig','fadeOutUp' => 'fadeOutUp','fadeOutUpBig' => 'fadeOutUpBig','flipInX' => 'flipInX','flipInY' => 'flipInY','flipOutX' => 'flipOutX','flipOutY' => 'flipOutY','lightSpeedIn' => 'lightSpeedIn','lightSpeedOut' => 'lightSpeedOut','rotateIn' => 'rotateIn','rotateInDownLeft' => 'rotateInDownLeft','rotateInDownRight' => 'rotateInDownRight','rotateInUpLeft' => 'rotateInUpLeft','rotateInUpRight' => 'rotateInUpRight','rotateOut' => 'rotateOut','rotateOutDownLeft' => 'rotateOutDownLeft','rotateOutDownRight' => 'rotateOutDownRight','rotateOutUpLeft' => 'rotateOutUpLeft','rotateOutUpRight' => 'rotateOutUpRight','hinge' => 'hinge','rollIn' => 'rollIn','rollOut' => 'rollOut','zoomIn' => 'zoomIn','zoomInDown' => 'zoomInDown','zoomInLeft' => 'zoomInLeft','zoomInRight' => 'zoomInRight','zoomInUp' => 'zoomInUp','zoomOut' => 'zoomOut','zoomOutDown' => 'zoomOutDown','zoomOutLeft' => 'zoomOutLeft','zoomOutRight' => 'zoomOutRight','zoomOutUp' => 'zoomOutUp','slideInDown' => 'slideInDown','slideInLeft' => 'slideInLeft','slideInRight' => 'slideInRight','slideInUp' => 'slideInUp','slideOutDown' => 'slideOutDown','slideOutLeft' => 'slideOutLeft','slideOutRight' => 'slideOutRight','slideOutUp' => 'slideOutUp'],
						'promotions'	=> SiteBanner::withTrashed()->orderBy('position')->get(),
					]);
	}

	public function store(BannerStoreRequest $request)
	{
		
        $imgPath = Storage::disk('ftp')->putFileAs(
            'img/banner', $request->file('img'), fileName($request->file('img')) 
            );
		
		$promotions = SiteBanner::create([
				'position'				=> collect(SiteBanner::all())->last()->position + 1,
				'title' 				=> $request->title,
				'title_animation' 		=> $request->title_animation,
				'description' 			=> $request->description,
				'description_animation' => $request->description_animation,
				'img' 					=> $imgPath,
				'img_animation' 		=> $request->img_animation,
			]);
        
        return back();
	}

	public function destroy($id)
	{
		$promotion = SiteBanner::find($id);
		$promotion->forceDelete();
        return back();
        
	}
}
