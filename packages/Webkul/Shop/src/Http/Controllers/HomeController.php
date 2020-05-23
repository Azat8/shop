<?php

namespace Webkul\Shop\Http\Controllers;

use Webkul\Shop\Http\Controllers\Controller;
use Webkul\Core\Repositories\SliderRepository;

/**
 * Home page controller
 *
 * @author    Prashant Singh <prashant.singh852@webkul.com> @prashant-webkul
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
 class HomeController extends Controller
{
    /**
     * SliderRepository object
     *
     * @var Object
    */
    protected $sliderRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Core\Repositories\SliderRepository $sliderRepository
     * @return void
    */
    public function __construct(SliderRepository $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;

        parent::__construct();
    }

    /**
     * loads the home page for the storefront
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if(request('token') && $order_id = request('orderId')){
            $api_data = [
                'orderId'     => $order_id,
                'language'    => app()->getLocale(),
                'password'    => config('bank-api.bank_api.password'),
                'userName'    => config('bank-api.bank_api.login'),
            ];

            $client         = new \GuzzleHttp\Client;
            $request        = $client->get(config('bank-api.bank_api.url').config('bank-api.methods.get_status').http_build_query($api_data));
            $body           = $request->getBody();
            $response       = json_decode($body, true);
            $responseStatus = 'error'

            if($response['errorCode'] == 0){
                $order           = \Webkul\Sales\Models\Order::whereToken(request('token'))->first();
                $responseMessage = config('bank-api.statuses')[$response['orderStatus']][app()->getLocale()];

                if($order){
                    if($response['orderStatus'] == 2){
                        $order->update(['status' => 'completed']);
                        $responseMessage = 'Գնումը Հաջողությամբ կատարվեց: Գնման հաստատումը կուղարկվի ձեր էլ հասցեին։';
                        $responseStatus = 'success';
                    } elseif ($response['orderStatus'] == 6 || $response['orderStatus'] == 3) {
                        $order->update(['status' => 'canceled']);
                    }
                }
            } else {
              $responseMessage = $response['errorMessage'];
            } session()->flash($responseStatus, $responseMessage);
        }

        $currentChannel = core()->getCurrentChannel();

        $sliderData = $this->sliderRepository->findByField('channel_id', $currentChannel->id)->toArray();

        return view($this->_config['view'], compact('sliderData'));
    }

    /**
     * loads the home page for the storefront
     */
    public function notFound()
    {
        abort(404);
    }
}