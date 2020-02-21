<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitemapController extends Controller
{
	public function sitemap()
	{
		$xml_version = 'xml version="1.0" encoding="UTF-8"';
		return response()->view('front.sitemap',compact('xml_version'))->header('Content-Type', 'text/xml');
	}
	public function Layouts()
	{
		$coupon_code = "CFM52";
		$to = "abc@gmail.com";
		return view('front.emails.coupon_layout',compact('coupon_code','to'));
	}
}
