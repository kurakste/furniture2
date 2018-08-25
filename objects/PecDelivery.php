<?php

namespace app\objects;

use yii\base\Model;
use app\models\Cities;
use yii\db\Query;

Class PecDelivery extends Model
{
    public $width;
    public $length;
    public $height;
    public $volume;
    public $weight;    
    public $town;    

    public function rules()
    {
        return [
            [['width', 'length', 'height', 'volume', 'weight', 'town'], 'required'],
            [['width', 'length', 'height', 'volume', 'weight', 'town'], 'safe'],
        ];
    }


    /**
     *  Returns cities and codes for PEC delivery
     *  service.
     *
     * @param string $pattern - Pattern for search;
     * @return array
     *
     */
    public function getCitiesWithFilter($pattern) 
    {
        $cities = new Cities;
    }

    public function getCitylist($q = null, $id = null) 
    {
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select('peccityid as id, name AS text')
                ->from('cities')
                ->where(['like', 'name', $q])
                ->limit(5);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Cities::find($id)->name];
        }
        return $out;
    }

    public function calcDeliveryCost
        (
            bool $deliveryToDoor = false,   // Доставка до двери или до отделения ПЭК?
            bool $takeFromSender = false  // Забарать у отправителя?
        ): float
    {
        $data = [];
        //Ширина, Длина, Высота, Объем, Вес, Признак негабаритности груза, Признак ЖУ
        $data['places'][0][]=$this->width;
        $data['places'][0][]=$this->length;
        $data['places'][0][]=$this->height;
        $data['places'][0][]=$this->volume;
        $data['places'][0][]=$this->weight;
        $data['places'][0][]=0; // признак не габоритности
        $data['places'][0][]=0; // Признак ЖУ
        $data['take']['town']= 69143; // Код города киров по их кодировки
        $data['take']['tent']= 0; // требуется растентовка при заборе. 
        $data['take']['gidro']= 0; // требуется гидролифт при заборе. 
        $data['take']['manip']= 0; // требуется манипулятор при заборе. 
        $data['take']['speed']= 0; // Срочный забор (только для Москвы) 
        $data['deliver']['town']= $this->town; // Город доставки(код)
        $data['deliver']['tent']= 0; // Город доставки(код)
        $data['deliver']['gidro']= 0; // требуется гидролифт при доставке. 
        $data['deliver']['manip']= 0; // требуется манипулятор при доставке. 
        $data['deliver']['speed']= 0; // Срочная доставка (только для Москвы) 
        $data['plombir'] = 0; // Кол-во пломб.
        $data['strah'] = 0; // величина страховки.
        $data['achan'] = 0; // Доставка в Ашан
        $data['night'] = 0; // Забор в ночное время
        $data['pal'] = 0; //Требуется запаллечивание груза (0 - не требуется, значение больше нуля - количество паллет)
        $data['pallets'] = 0; // Кол-во паллет для расчет услуги паллетной перевозки (только там, где эта услуга предоставляется)
        
        $request = http_build_query($data);
        /* var_dump($request); */
        /* die; */
        $data = file_get_contents('http://calc.pecom.ru/bitrix/components/pecom/calc/ajax.php?' . $request);
        $res = json_decode($data, true);
        $deliver = ($deliveryToDoor) ? $res['deliver'][2] : 0;
        $taken = ($takeFromSender) ? $res['take'][2] : 0;

        (float)$out = $taken + $res['auto'][2] + $deliver; 
            /* + $res['ADD'][2] ?? 0 + $res['ADD_1'][2] ?? 0 + */
            /* + $res['ADD_2'][2] ?? 0 + $res['ADD_3'][2] ?? 0 + $res['ADD_4'][2] ?? 0; */ 
        //take + auto + deliver + ADD + ADD_1 + ADD_2 + ADD_3 + ADD_4 
    
        return $out;
    }


}
