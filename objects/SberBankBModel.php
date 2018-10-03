<?php 

namespace app\objects;

class SberBankBModel 
{
    // == Sberbank fields =======
    private $userName;
    private $password;
    private $token; 
    private $orderNumber; // Номер (идентификатор) заказа в системе магазина, уникален для каждого магазина в пределах системы. Если номер заказа генерируется на стороне платёжного шлюза, этот параметр передавать необязательно. 
    private $amount; // Сумма платежа в копейках (или центах)
    private $currency = 643 ; //Код валюты платежа ISO 4217. Единственное допустимое значение - 643.
    private $returnUrl; //Адрес, на который требуется перенаправить пользователя в случае успешной оплаты. Адрес должен быть указан полностью, включая используемый протокол (например, https://test.ru вместо tes t.ru).
    private $failUrl; //Адрес, на который требуется перенаправить пользователя в случае неуспешной оплаты.
    private $description; //Описание заказа в свободной форме. В процессинг банка для включения в финансовую отчётность продавца передаются только первые 24 символа этого поля.
    private $lanuage; //Язык в кодировке ISO 639-1. Если не указан, будет использован язык, указанный в настройках магазина как язык по умолчанию (default language)
    private $pageView; // Какой вид платежной страницы нужно загрузить.  DESKTOP, MOBILE
    private $clientId; //Номер (идентификатор) клиента в системе магазина. Используется для реализации функционала связок. Может присутoствовать, если магазину разрешено создание связок.
    private $sessionTimeoutSecs; //Продолжительность жизни заказа в секундах. по умолчанию (1200 секунд = 20 минут).
// ================================
    private $testMode = false; 
    //private $testUrl ='https://3dsec.sberbank.ru/payment/webservices/merchant-ws?wsdl'; 
    private $testUrl ='https://3dsec.sberbank.ru/payment/rest/register.do'; 
    private $workUrl ='https://securepayments.sberbank.ru/rest/register.do';

    /*
     *  I will use .env to setup some setting in constructor
     *
     */
    public function __construct($orderNumber, $amount, $returnUrl, $failUrl, $description, $pageView)
    {
        $this->userName = env('BANK_USER_NAME');
        $this->password = env('BANK_PASSWORD');
        $this->orderNumber = $orderNumber;
        $this->amount = $amount;
        $this->returnUrl = $returnUrl;
        $this->failUrl = $failUrl;
        $this->description = $description;
        $this->pageView = $pageView;
    }

    /*
     * @return link to page where cosumer may pay order;
     * @throw 
     *
     */
    public function doPaymentRequest()
    {
        $data['userName'] = $this->userName;
        $data['password'] = $this->password;
        $data['currency'] = $this->currency;
        $data['orderNumber'] = $this->orderNumber;
        $data['amount'] = $this->amount*100;
        $data['returnUrl'] = $this->returnUrl;
        $data['failUrl'] = $this->failUrl;
        $data['description'] = $this->description; 
        $data['pageView'] = $this->pageView;


        $request = http_build_query($data);
//        var_dump($this->testUrl.'?'.$request);


        if ($this->testMode) {
            $response = file_get_contents($this->testUrl.'?'.$request);
        } else {
//            var_dump($this->workUrl.'?'.$request); die;
            $response = file_get_contents($this->workUrl.'?'.$request);
        } 

        return $response;
    
    }




}
