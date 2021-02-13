<?php
/**
 * Created by PhpStorm.
 * User: maver
 * Date: 12.09.2018
 * Time: 11:40
 */
include "../_func.php";
if($_POST['mode']=="mtserializeEdit"){
    //pre($_POST);
    unset($_POST['mode']);
    echo mt_serialize($_POST);
}
if($_POST['mode']=="base64Encode"){
    //pre($_POST);
    unset($_POST['mode']);
    echo base64_encode($_POST["text"]);
}
function getInputs($params,$prevKey="",$deepnum =0 ){
    $texts = "";
    //$prevKey = $prevKey=="" ?
    if($params){
        foreach($params as $key=>$val){
            if(is_array($val)){
                $prevKey = "";
                $deepnum++;
                $prevKey .= "[".$key."]";
                $texts .= getInputs($val,$prevKey,$deepnum);
            }else{
                $keyVal = $prevKey=="" ? $key:$prevKey;
                $texts .= str_repeat("-",$deepnum).$key.': <input type="text" class="respInput" name="'.$keyVal.'" value="'.$val.'"/><br>';
            }
        }
    }
    return $texts;
}
if($_POST['mode']=="submit"){
    if($_POST['serializeType']==1){
        $text = mt_serialize($_POST['text']);
    }elseif($_POST['serializeType']==3){
        $text = '<p>';
        $text .= '<form method="" id="responseForm">';
        $text .= '<input type="hidden" name="mode" value="mtserializeEdit">';
        $params = mt_unserialize($_POST['text']);
        $text .= getInputs($params);
        $text .= '</form>';
        $text .= '<textarea id="responseTextarea2" style="width: 100%;height: 250px;"></textarea>';
        $text .= '</p>';
    }elseif($_POST['serializeType']==4){
        $decode = base64_decode(urldecode($_POST['text']));
        $text = '';
        $text .= '<form method="" id="responseForm">';
        $text .= '<input type="hidden" name="mode" value="base64Encode">';
        $text .= '<textarea class="respInput" id="responseTextarea1" name="text" style="width: 100%;height: 250px;">'.$decode.'</textarea>';
        $text .= '<textarea id="responseTextarea2" style="width: 100%;height: 250px;"></textarea>';
        $text .= '</form>';
    }elseif($_POST['serializeType']==5){
        $text = json_decode(stripslashes($_POST['text']));
    }elseif($_POST['serializeType']==6){
        //require_once "Array2XML.php";
        $json = json_decode(stripslashes($_POST['text']));
        $json = objectToArray($json);
        $jsonx["list"] = $json;
        unset($json);
        //pre($json);
        $xml = Array2XML::createXML('ROOT', $jsonx);
        $xml->encoding = "UTF-8";
        $rawXML = $xml->saveXML();

        $text = "";
        $text .= '<textarea id="responseTextarea2" style="width: 100%;height: 250px;">'.$rawXML.'</textarea>';
    }else{
        $text = mt_unserialize($_POST['text']);
    }
    pre($text);
}