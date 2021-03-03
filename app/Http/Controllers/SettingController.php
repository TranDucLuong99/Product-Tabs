<?php

namespace App\Http\Controllers;

use App\Navbar;
use App\Setting;
use http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use OhMyBrew\ShopifyApp\Facades\ShopifyApp;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::findOrFail(1);
        return view('setting.index', compact('setting'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $shop = ShopifyApp::shop();
        $data['shopify_domain'] = $shop->shopify_domain;
        if ($request->hasfile('thumbnail')) {
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/settings/', $filename);
            $data['thumbnail'] = 'uploads/settings/' . $filename;
        }
        Setting::create($data);
        return redirect()->route('setting.index')->with('message', 'add-success !');
    }

    public function ajax_modal(Request $request)
    {
//        dd(2);
        if ($request->ajax()) {
            $html = view('component.modal_setting')->render();
//            dd($request);
            return response([
                'html' => $html
            ]);
        }
    }

    public function ajax_edit_modal(Request $request, $id)
    {
        $setting = Setting::findOrFail($id);
        if ($request->ajax()) {
            $html = view('component.modal_setting_edit', compact('setting'))->render();
            return response([
                'html' => $html
            ]);
        }
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $shop = ShopifyApp::shop();
            $setting = Setting::findOrFail(1);
            $data['shopify_domain'] = $shop->shopify_domain;
            if ($request->status == "on")
                $data['status'] = 1;
            else
                $data['status'] = 0;
            $setting->update($data);

            $this->addCssToTheme();
//            $this->addScriptNarbarToTheme();
            return response([
                'message' => 'success',
                'type' => 'success'
            ]);
        } else {
            return response([
                'message' => 'error',
                'type' => 'error'
            ]);

        }
    }
    public function addCssToTheme()
    {
        $data = [];
        $shop = ShopifyApp::shop();
        if (!$shop) {
            return false;
        }
        $setting = Setting::findOrFail(1);
        if ($setting->font_family == 0) {
            $font_family = 'Arapey, serif';
        } elseif ($setting->font_family == 1) {
            $font_family = 'sans-serif, Arial';
        } else {
            $font_family = 'Consolas, Menlo';
        }
        $fileCss = '
        .ndnapps-nav-wrapper {     
           font-family: '. $font_family.';
           font-size: ' . "$setting->font_site".'px'. ';
           color: '."$setting->color". ';
        }
        .resp-tab-content-active{
            padding: 8px;
            font-size: 11px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            border: 1px solid #eae4e4;
            border-top: none;
            background: '."$setting->background_title". ';
            color: '."$setting->color_title". ';
        }
        .resp-tab-content-active p{
            color: '."$setting->color_title". ';
        }
        ';
        $theme = $shop->api()->rest('GET', '/admin/themes.json', ['fields' => 'id,name,role'])->body->themes;
        foreach ($theme as $_child) {
            if ($_child->role == "main") {
                $layout = $shop->api()->rest('GET', '/admin/themes/' . $_child->id . '/assets.json', ['asset' => ['key' => 'layout/theme.liquid']])->body->asset->value;
                $add_script = ["key" => "assets/ndn.css", "value" => $fileCss];
                $put_script = $shop->api()->rest('PUT', '/admin/themes/' . $_child->id . '/assets.json', ['asset' => $add_script]);
                $new_layout = $layout;
                if (!strpos($layout, 'ndn.css')) {
                    $new_layout = str_replace("</body>", "<link rel='stylesheet' href='{{ 'ndn.css' | asset_url }}' defer='defer'/>\n</body>", $layout);
                }
                $put2 = $shop->api()->rest('PUT', '/admin/themes/' . $_child->id . '/assets.json', ['asset' => ["key" => "layout/theme.liquid", 'value' => $new_layout]]);
            }
        }
    }

    public function delete($id)
    {
        $setting = Setting::findOrFail($id);
        $setting->delete();
        return redirect()->back()->with('message', 'delete-success !');
    }

    public function addScriptNarbarToTheme()
    {
        $data = [];
        $shop = ShopifyApp::shop();
        if (!$shop) {
            return false;
        }
        $setting = Setting::findOrFail(1);
        if ($setting->status == 1) {
            $navbars = Navbar::take($setting->max_column)->get();
            $data = View::make('page.nav', compact('navbars', 'setting'))->render();
        }
        $fileScript = file_get_contents('js/ndnapps_navbar.js');
        $fileScript = 'var ndn_navbar_data= "' . base64_encode(json_encode($data)) . '";' . $fileScript;
        $theme = $shop->api()->rest('GET', '/admin/themes.json', ['fields' => 'id,name,role'])->body->themes;
        foreach ($theme as $_child) {
            if ($_child->role == "main") {
                $layout = $shop->api()->rest('GET', '/admin/themes/' . $_child->id . '/assets.json', ['asset' => ['key' => 'layout/theme.liquid']])->body->asset->value;
                $add_script = ["key" => "assets/ndnapps-navbar.js", "value" => $fileScript];
                $put_script = $shop->api()->rest('PUT', '/admin/themes/' . $_child->id . '/assets.json', ['asset' => $add_script]);
                $new_layout = $layout;

                if (!strpos($layout, 'ndnapps-navbar.js')) {
                    $new_layout = str_replace("</body>", "<script src='{{ 'ndnapps-navbar.js' | asset_url }}' defer='defer'></script>\n</body>", $layout);
                }
                $put2 = $shop->api()->rest('PUT', '/admin/themes/' . $_child->id . '/assets.json', ['asset' => ["key" => "layout/theme.liquid", 'value' => $new_layout]]);
            }
        }
    }
}
