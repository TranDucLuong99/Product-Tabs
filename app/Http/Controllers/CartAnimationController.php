<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
//use OhMyBrew\ShopifyApp\ShopifyApp;
use http\Response;
use Illuminate\Support\Facades\View;
use OhMyBrew\ShopifyApp\Facades\ShopifyApp;

class CartAnimationController extends Controller
{
    public function index(){
        $cart = Cart::findOrFail(1);
        return view('cartAnimation.index', compact('cart'));
    }
    public function add_cartAnimation(Request $request)
    {
        $data = $request->all();
        $shop = ShopifyApp::shop();
        $cart = Cart::findOrFail(1);
        $data['shopify_domain'] = $shop->shopify_domain;
        if ($request->status == "on")
            $data['status'] = 1;
        else
            $data['status'] = 0;
        $cart->update($data);
        $this->addCartToTheme();
        $this->addCssToTheme();
        return redirect()->route('cartAnimation.index',compact('cart'))->with('message', 'Update Success');
    }
    public function addCartToTheme()
    {
        $data = [];
        $shop = ShopifyApp::shop();
        if (!$shop) {
            return false;
        }
        $cart = Cart::findOrFail(1);
        if ($cart->status == 1) {
            if ($cart->name == 1){
                $data = View::make('page.cartAnimation', compact('cart'))->render();
            }
            elseif ($cart->name == 2){
                $data = View::make('page.cartAnimation2', compact('cart'))->render();
            }
            elseif ($cart->name == 3) {
                $data = View::make('page.cartAnimation3', compact('cart'))->render();
            }
            elseif ($cart->name == 4) {
                $data = View::make('page.cartAnimation4', compact('cart'))->render();
            }
            elseif ($cart->name == 5) {
                $data = View::make('page.cartAnimation5', compact('cart'))->render();
            }
            elseif ($cart->name == 6) {
                $data = View::make('page.cartAnimation6', compact('cart'))->render();
            }
            elseif ($cart->name == 7) {
                $data = View::make('page.cartAnimation7', compact('cart'))->render();
            }
            elseif ($cart->name == 8) {
                $data = View::make('page.cartAnimation8', compact('cart'))->render();
            }
        }
        $fileScript = file_get_contents('js/ndnapps_cart.js');
//        $fileScriptt = file_get_contents('js/ndnapps_cart.js');
        $fileScript = 'var ndn_cart_data= "' . base64_encode(json_encode($data)) . '";' . $fileScript;
        $fileScript = 'var ndn_cart_status= "' . base64_encode(json_encode($cart->status)) . '";' . $fileScript;
        $theme = $shop->api()->rest('GET', '/admin/themes.json', ['fields' => 'id,name,role'])->body->themes;
        foreach ($theme as $_child) {
            if ($_child->role == "main") {
                $layout = $shop->api()->rest('GET', '/admin/themes/' . $_child->id . '/assets.json', ['asset' => ['key' => 'layout/theme.liquid']])->body->asset->value;
                $add_script = ["key" => "assets/ndnapps-cart.js", "value" => $fileScript];
                $put_script = $shop->api()->rest('PUT', '/admin/themes/' . $_child->id . '/assets.json', ['asset' => $add_script]);
                $new_layout = $layout;
                if (!strpos($layout, 'ndnapps-cart.js')) {
                    $new_layout = str_replace("</body>", "<script src='{{ 'ndnapps-cart.js' | asset_url }}' defer='defer'></script>\n</body>", $layout);
                }
                $put2 = $shop->api()->rest('PUT', '/admin/themes/' . $_child->id . '/assets.json', ['asset' => ["key" => "layout/theme.liquid", 'value' => $new_layout]]);
            }
        }
    }
    public function addCssToTheme()
    {
        $data = [];
        $shop = ShopifyApp::shop();
        if (!$shop) {
            return false;
        }
        $cart = Cart::findOrFail(1);
        if ($cart->font_family == 0) {
            $font_family = 'Arapey, serif';
        } elseif ($cart->font_family == 1) {
            $font_family = 'sans-serif, Arial';
        } else {
            $font_family = 'Consolas, Menlo';
        }


//        dd($cart);
        $fileCss = '
        .add-cartttt button{
            margin-bottom: 16px;
            background: '."$cart->background_title". ';
            color: '."$cart->color_title". ';
            --c: '."$cart->background_title_hover". ';
            font-size: '."$cart->font_size".'px'. ';
            font-family: '."$font_family". ';
            background: '."$cart->background_title". ';
        }
        .btn:not([disabled]):hover{
            color: '."$cart->color_title_hover".';
            background-color: '."$cart->background_title_hover".';
            
        }
        ';
        $theme = $shop->api()->rest('GET', '/admin/themes.json', ['fields' => 'id,name,role'])->body->themes;
        foreach ($theme as $_child) {
            if ($_child->role == "main") {
                $layout = $shop->api()->rest('GET', '/admin/themes/' . $_child->id . '/assets.json', ['asset' => ['key' => 'layout/theme.liquid']])->body->asset->value;
                $add_script = ["key" => "assets/ndn_cart.css", "value" => $fileCss];
                $put_script = $shop->api()->rest('PUT', '/admin/themes/' . $_child->id . '/assets.json', ['asset' => $add_script]);
                $new_layout = $layout;
                if (!strpos($layout, 'ndn_cart.css')) {
                    $new_layout = str_replace("</body>", "<link rel='stylesheet' href='{{ 'ndn_cart.css' | asset_url }}' defer='defer'/>\n</body>", $layout);
                }
                $put2 = $shop->api()->rest('PUT', '/admin/themes/' . $_child->id . '/assets.json', ['asset' => ["key" => "layout/theme.liquid", 'value' => $new_layout]]);
            }
        }
    }
    public function cart_ani(){
        return view('page.cartAnimation7');
    }
}
